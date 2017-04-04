<?php 

	/*
		Developer-Zone Code-File model 
	*/

	// Direct Acces not allow 
defined('_JEXEC') or die ('Ristricted Access ');

	jimport ('joomla.application.component.model');

	class developerzoneModelCodeFile extends JModel
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

	function &getCodeFile()
	{

		if(empty($this->_data))
		{
			$query = "select df.*, dc.category from #__dev_codefile df , #__dev_categories dc where df.category=dc.id "; 
			$limitstart= $this->getState('limitstart');
			$limit = $this->getState('limit');
		 	$this->_data= $this->_getList($query,$limitstart, $limit);
		
		}
		
		return $this->_data;
	}
	
	
	function save ($data)
	{
				
		$row =& JTable::getInstance('codefile','Table');
		$id=$data['id'];
		
		if(!$id)
		{
			jimport('joomla.utilities.date');
			$dateNow= new JDate();
			$dateMySql= $dateNow->toMySQL();
			$data['creationdate']=$dateMySql;
			$data['addedby']='server';
			
		}
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
		else
		{
			if (!$id)
			{
				$row->load($row->$id);
			}

			if ($_FILES['cfile']['size'])
			{
				$this->fileupdload($id);
				
			}		
		
		}
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
			$this->_total = $this->_getListCount("select * from #__dev_codefile");
		}
		return $this->_total;
	}
			

	
	
	function changeCodeFile( $cid=null, $state=0 )
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

		$query = 'UPDATE #__dev_codeFile'
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
			$row =& JTable::getInstance('codeFile', 'Table');
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
	function fileupdload($id)
	{
	
	
	
		 if (!($_FILES['cfile']['size']) || ($_FILES['cfile']['size'])>6000000 ) 
		{
			return false;
		}
		 else 
		 {
		 
			$permitted = array('application/zip','application/x-rar-compressed');
			$typeOK = false;
			
			
			echo "file Type".$_FILES['cfile']['type'];
			foreach ($permitted as $type) 
			{
				if ($type == $_FILES['cfile']['type']) 
				{
					$typeOK = true;
					break;
				}
			}
			if ($typeOK )
			{
				$name=$_FILES['cfile']['name'];
				//$lastpos = strrpos($name, '.');
				//$ext = substr($name, $lastpos+1, strlen($name)-$lastpos);

				$filename='devzone_'.$id.'_'.$name;
				$cate='category_'.JRequest::getVar('category');
				echo $filename;
				$newname = JPATH_COMPONENT_ADMINISTRATOR.DS.'codefile'.DS.$cate.DS.$filename;
				
				echo "file : = " .$newname;
			
				if (!(move_uploaded_file($_FILES['cfile']['tmp_name'], $newname))) 
				{
					return false;
				} 
				else 
				{
			
					if($this->imageupdate($id,$filename))
					{
						return false;
					}
					else
					{
						return true;
					}
				
				}
			}
			else
			{
				return false;
			}

		}
		

	}
	
	function imageupdate($id,$filename)
	{
		
		$db 	=& JFactory::getDBO();
		$query = "UPDATE #__dev_codeFile "
		. " SET codefile = " . $db->Quote(  $filename, false ) 
		. " WHERE id=".$id;	
		
		$db->setQuery( $query );
		
		if (!$db->query()) 
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
	}
}
?>