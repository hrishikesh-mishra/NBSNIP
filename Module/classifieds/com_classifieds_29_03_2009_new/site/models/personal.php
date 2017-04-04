<?php 

	/*
		classifieds Personal model 
	*/

	// Direct Acces not allow 
	defined ('_JEXEC') or die ('Restricted Access');

	jimport ('joomla.application.component.model');


	class classifiedsModelPersonal extends JModel
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

	function &getPersonal()
	{
		$db=& JFactory::getDBO();
		$where = array();

		$where []=' (p.published >0)';
		$where []=' (v.published >0)';
		$where []=' (p.vid= v.id)';
		$where []=' (curdate() <= p.regenddate )';

		if ( !empty($this->_searchkey) ) 
		{
			$where[] = '(p.title LIKE '.$db->Quote( '%'.$db->getEscaped( $this->_searchkey, true ).'%', false ).')';

		}
		if ( !empty($this->_city)) 
		{
			$where[] = '(p.city LIKE '.$db->Quote( '%'.$db->getEscaped( $this->_city, true ).'%', false ).')';

		}

		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
	
		if(empty($this->_data))
		{
			$query = "select p.* from #__cf_personal p, #__cf_vendor v " .$where; 
			$limitstart= $this->getState('limitstart');
			$this->_data= $this->_getList($query);
		}
		
		return $this->_data;
	}
	
	
	

	
}
?>