<?php 

	/*
		classifieds Computer model 
	*/

	// Direct Acces not allow 
	defined ('_JEXEC') or die ('Restricted Access');

	jimport ('joomla.application.component.model');


	class classifiedsModelComputer extends JModel
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

	function &getcomputer()
	{
		$db=& JFactory::getDBO();
		$where = array();

		$where []=' (c.published >0)';
		$where []=' (v.published >0)';
		$where []=' (c.vid= v.id)';
		$where []=' (curdate() <= c.regenddate )';

		if ( !empty($this->_searchkey) ) 
		{
			$where[] = '(c.title LIKE '.$db->Quote( '%'.$db->getEscaped( $this->_searchkey, true ).'%', false ).')';

		}
		if ( !empty($this->_city)) 
		{
			$where[] = '(c.city LIKE '.$db->Quote( '%'.$db->getEscaped( $this->_city, true ).'%', false ).')';

		}

		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
	
		if(empty($this->_data))
		{
			$query = "select c.* from #__cf_computer c , #__cf_vendor v " .$where; 
			$limitstart= $this->getState('limitstart');
			$this->_data= $this->_getList($query);
		}
		
		return $this->_data;
	}
	
	
	

	
}
?>