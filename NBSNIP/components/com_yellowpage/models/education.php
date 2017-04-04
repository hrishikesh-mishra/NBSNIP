<?php 

	/*
		yellowpage education model 
	*/

	// Direct Acces not allow 
	defined ('_JEXEC') or die ('Restricted Access');

	jimport ('joomla.application.component.model');
	require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'education.php');

	class yellowpageModelEducation extends JModel
	{  

		var $_id;
		var $_data;
		var $_searckey;
		var $_city;
		var $_cat;
	
	
	function __construct()
	{
		parent::__construct();
		global $mainframe;

		$limit = $mainframe->getUserStateFromRequest('global.list.limit','limit', $mainframe->getCfg('list_limit'));
		$limitstart = $mainframe->getUserStateFromRequest($option.'limitstart','limitstart',0);
		$this->setState('limit',$limit);
		$this->setState('limitstart',$limitstart);

		$this->_searchkey =JRequest::getVar('serchkey');	
		$this->_city =JRequest::getVar('city');
	
		$this->_cat =JRequest::getVar('category');

		
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

	function &getEducation()
	{
		$db=& JFactory::getDBO();
		$where = array();

		$where []=' (published >0)';

		if ( !empty($this->_searchkey) ) 
		{
			$where[] = 'eduname LIKE '.$db->Quote( '%'.$db->getEscaped( $this->_searchkey, true ).'%', false );

		}
		if ( !empty($this->_cat)) 
		{
			$where[] = 'category LIKE '.$db->Quote( '%'.$db->getEscaped( $this->_cat, true ).'%', false );

		}
		if ( !empty($this->_city)) 
		{
			$where[] = 'city LIKE '.$db->Quote( '%'.$db->getEscaped( $this->_city, true ).'%', false );

		}

		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
	
		if(empty($this->_data))
		{
			$query = "select * from #__yp_education " .$where; 
			$limitstart= $this->getState('limitstart');
			$limit = $this->getState('limit');
		 	$this->_data= $this->_getList($query,$limitstart, $limit);
		}

		
		return $this->_data;
	}
	
	
	function save ($data)
	{
				
		$row =& JTable::getInstance('education','Table');
		
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
			$this->_total = $this->_getListCount("select * from #__yp_education");
		}
		return $this->_total;
	}
	
	function getEducationVal( $id )
	{
		$query	= "select * from #__yp_education where (published > 0) and id =" .$id ;
		$result = $this->_getList( $query );
		return @$result[0];
	}

		
}
?>