<?php 

	/*
		Developer-Zone Categories  model 
	*/

	// Direct Acces not allow 
defined('_JEXEC') or die ('Ristricted Access ');

	jimport ('joomla.application.component.model');

	class developerzoneModelCategories extends JModel
	{  

		var $_id;
		var $_data;
	
	
	function __construct()
	{
		parent::__construct();
		global $mainframe;

		$limit = $mainframe->getUserStateFromRequest('global.list.limit','limit', $mainframe->getCfg('list_limit'));
		$limitstart = $mainframe->getUserStateFromRequest($option.'limitstart','limitstart',0);
		$this->setState('limit',$limit);
		$this->setState('limitstart',$limitstart);
		
		$cid= JRequest::getVar('cid',  0, '', 'array');
		

		if($cid)
		{
			$id=$cid[0];
		}
		else
		{
			$id=JRequest::getInt('id', 0);
		}
		$this->setId($id);
	}


	function setId($id=0)
	{

		$this->_id= $id;
		$this->_data=null;
	}

	function &getCategories()
	{

		if(empty($this->_data))
		{
			$query = "select * from #__dev_categories "; 
			$limitstart= $this->getState('limitstart');
			$limit = $this->getState('limit');
		 	$this->_data= $this->_getList($query,$limitstart, $limit);
		
		}
		
		return $this->_data;
	}
	
	
	function save ($data)
	{
				
		$row =& JTable::getInstance('categories','Table');
		$id=$data['id'];
		
		if (!$row->bind($data))
		{
			JError::raiseError(500,$row->getError());
			return false;
		}
		
		if (!$row->check()) 
		{
		JError::raiseError(500, $row->getError() );
		}

		if (!$row->store())
		{
			JError::raiseError(500,$row->getError());
			return false;
		}
		if (!$id)
		{
			$row->load($row->$id);
			jimport('joomla.filesystem.file');
			$baseFolder= JPATH_COMPONENT.DS.'codefile';
			$baseFolder=JFolder::makeSafe($path);
			
			if (!JFolder::exists($baseFolder))
			{
				JFolder::create($baseFolder);
				echo "<br>".$baseFolder;
			}
			
			$codeFolder=JPATH_COMPONENT.DS.'codefile'.DS.'category_'.$row->id;
			echo "<br>".$codeFolder;
			JFolder::create($codeFolder);
			
		}
		else
			echo "The old row". $id;
		
		
		return true;
	}

	function getPagination()
	{
		if(empty($this->_pagination))
		{
			jimport('joomla.html.pagination');
			$total =$this->getTotal();
			$limitstart = $this->getState('limitstart');
			$limit = $this->getState('limit');
			$this->_pagination = new JPagination($total, $limitstart,$limit);
		}
		return $this->_pagination;
	}
	
	function getTotal()
	{
		if (empty($this->_total))
		{
			$this->_total = $this->_getListCount("select * from #__dev_categories");
		}
		return $this->_total;
	}
			

	
	
	function changeCategories( $cid=null, $state=0 )
	{
	
		$db 	=& JFactory::getDBO();
		$user 	=& JFactory::getUser();
	
		JArrayHelper::toInteger($cid);

		if (count( $cid ) < 1) 
		{
			$action = $state ? 'publish' : 'unpublish';
			JError::raiseError(500, JText::_( 'Select an item to' .$action, true ) );
		}

	
		$cids = implode( ',', $cid );

		$query = 'UPDATE #__dev_categories'
		. ' SET published = ' . (int) $state
		. ' WHERE id IN ( '. $cids .' )'
		. ' AND ( checked_out = 0 OR ( checked_out = '. (int) $user->get('id') .' ) )'
		;
		
		$db->setQuery( $query );
		
		if (!$db->query()) 
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}

		if (count( $cid ) == 1) 
		{
			$row =& JTable::getInstance('categories', 'Table');
			$row->checkin( intval( $cid[0] ) );
		}

	}
	 
	function delete()
	{
		$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );

		$row =& $this->getTable();

		if (count( $cids )) {
			foreach($cids as $cid) {
				if (!$row->delete( $cid )) {
					$this->setError( $row->getErrorMsg() );
					return false;
				}
			}
		}
		return true;
	}	
}
?>