<?php 

	/*
		yellowpage club model 
	*/

	// Direct Acces not allow 
	defined ('_JEXEC') or die ('Restricted Access');

	jimport ('joomla.application.component.model');

	class yellowpageModelClubInfo extends JModel
	{  

		var $_id;
		
	
	
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

		
		$id= JRequest::getVar('row');
		

		$this->setId($id);
	}


	function setId($id=0)
	{

		$this->_id= $id;
		$this->_data=null;
	}

	function &getData()
	{
	
		if(empty($this->_data))
		{
			$query = "select * from #__yp_club where id= " .$this->_id; 
		 	$this->_data= $this->_getList($query);
		}
		return $this->_data;
	}
	
	
		
}
?>