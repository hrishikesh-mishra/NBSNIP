<?php 

	/*
		Classifieds Computer model 
	*/

	// Direct Acces not allow 
	defined ('_JEXEC') or die ('Restricted Access');

	jimport ('joomla.application.component.model');

	class classifiedsModelComputerInfo extends JModel
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
			$query = "select c.* from #__cf_computer c, #__cf_vendor v  where (c.published > 0) ".
			" and ( v.published>0) and (c.vid=v.id) and (curdate() <= c.regenddate) and (  c.id= " .$this->_id . ")"; 
		 	$this->_data= $this->_getList($query);
		}
	
		return $this->_data;
	}
	
	
		
}
?>