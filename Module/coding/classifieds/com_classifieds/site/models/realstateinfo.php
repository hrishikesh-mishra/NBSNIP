<?php 

	/*
		Classifieds Realstate model 
	*/

	// Direct Acces not allow 
	defined ('_JEXEC') or die ('Restricted Access');

	jimport ('joomla.application.component.model');

	class classifiedsModelRealstateInfo extends JModel
	{  

		var $_id;
		
	
	
	function __construct()
	{
		parent::__construct();
		global $mainframe;

		
		$this->_searchkey =JRequest::getVar('serchkey');	
		$this->_city =JRequest::getVar('city');
	
				
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
			$query = "select r.* from #__cf_realstate r, #__cf_vendor v  where (r.published > 0) ".
			" and ( v.published>0) and (r.vid=v.id) and (curdate() <= r.regenddate) and (  r.id= " .$this->_id . ")"; 
		 	$this->_data= $this->_getList($query);
		}
	
		return $this->_data;
	}
	
	
		
}
?>