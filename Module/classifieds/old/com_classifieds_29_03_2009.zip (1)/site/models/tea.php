<?php 

	/*
		classifieds Tea model 
	*/

	// Direct Acces not allow 
	defined ('_JEXEC') or die ('Restricted Access');

	jimport ('joomla.application.component.model');


	class classifiedsModelTea extends JModel
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

	function &getTea()
	{
		$db=& JFactory::getDBO();
		$where = array();

		$where []=' (vl.published >0)';
		$where []=' (v.published >0)';
		$where []=' (vl.vid= v.id)';
		$where []=' (curdate() <= vl.regenddate )';

		if ( !empty($this->_searchkey) ) 
		{
			$where[] = '(vl.title LIKE '.$db->Quote( '%'.$db->getEscaped( $this->_searchkey, true ).'%', false ).')';

		}
		if ( !empty($this->_city)) 
		{
			$where[] = '(vl.city LIKE '.$db->Quote( '%'.$db->getEscaped( $this->_city, true ).'%', false ).')';

		}

		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
	
		if(empty($this->_data))
		{
			$query = "select vl.* from #__cf_tea vl , #__cf_vendor v " .$where; 
			$limitstart= $this->getState('limitstart');
			$this->_data= $this->_getList($query);
		}
		
		return $this->_data;
	}
	
	
	

	
}
?>