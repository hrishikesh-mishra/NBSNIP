<?php 

	/*
		Classifieds Tea model 
	*/

	// Direct Acces not allow 
	defined ('_JEXEC') or die ('Restricted Access');

	jimport ('joomla.application.component.model');

	class classifiedsModelTeaInfo extends JModel
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
			$query = "select t.* from #__cf_tea t, #__cf_vendor v  where (t.published > 0) ".
			" and ( v.published>0) and (t.vid=v.id) and (curdate() <= t.regendate) and (  t.id= " .$this->_id . ")"; 
			
		 	$this->_data= $this->_getList($query);
		}
	
		return $this->_data;
	}
	
	
		
}
?>