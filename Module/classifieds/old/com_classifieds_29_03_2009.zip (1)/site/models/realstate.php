<?php 

	/*
		classifieds Realstate model 
	*/

	// Direct Acces not allow 
	defined ('_JEXEC') or die ('Restricted Access');

	jimport ('joomla.application.component.model');


	class classifiedsModelRealstate extends JModel
	{  

		var $_id;
		var $_data;
		var $_searckey;
		var $_city;
		
	
	
	function __construct()
	{
		parent::__construct();
		global $mainframe;

		
		$this->_searchkey =JRequest::getVar('searchkey');	
		$this->_city =JRequest::getVar('city');
				
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

	function &getRealstate()
	{
		$db=& JFactory::getDBO();
		$where = array();

		$where []=' (r.published >0)';
		$where []=' (v.published >0)';
		$where []=' (r.vid= v.id)';
		$where []=' (curdate() <= r.regenddate )';

		if ( !empty($this->_searchkey) ) 
		{
			$where[] = '(r.title LIKE '.$db->Quote( '%'.$db->getEscaped( $this->_searchkey, true ).'%', false ).')';

		}
		if ( !empty($this->_city)) 
		{
			$where[] = '(r.city LIKE '.$db->Quote( '%'.$db->getEscaped( $this->_city, true ).'%', false ).')';

		}

		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
	
		if(empty($this->_data))
		{
			$query = "select r.* from #__cf_realstate r , #__cf_vendor v " .$where; 
 			$limitstart= $this->getState('limitstart');
			$this->_data= $this->_getList($query);
		}
		
		return $this->_data;
	}
	
	
	

	
}
?>