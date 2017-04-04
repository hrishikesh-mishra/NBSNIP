<?php 

	/*
		Classifieds Vehcile model 
	*/

	// Direct Acces not allow 
	defined ('_JEXEC') or die ('Restricted Access');

	jimport ('joomla.application.component.model');

	class classifiedsModelPersonalInfo extends JModel
	{  

		var $_id;
		
	
	
	function __construct()
	{
		parent::__construct();
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
			$query = "select p.* from #__cf_personal p, #__cf_vendor v  where (p.published > 0) ".
			" and ( v.published>0) and (p.vid=v.id) and (curdate() <= p.regenddate) and (  p.id= " .$this->_id . ")"; 
		 	$this->_data= $this->_getList($query);
		}
	
		return $this->_data;
	}
	
	
		
}
?>