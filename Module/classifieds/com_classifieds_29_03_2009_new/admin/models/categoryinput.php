<?php

	/* 
		Classifieds Category input Model
	*/

	//direct access not allow
	defined('_JEXEC') or die ('Ristricted Access ');
	
	jimport ('joomla.application.component.model');

	class classifiedsModelCategoryInput extends JModel
	{

		var $_cid;
		var $_data;
		
		function __construct()
		{
			parent::__construct();
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

		$this->_cid= $id;
	
		$this->_data=null;
	}

	
	function &getData()
	{

		if (empty( $this->_data)) {
			$query = ' SELECT * FROM #__classifieds'.
					'  WHERE cid = '.$this->_cid;
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();
		}
		if (!$this->_data) {
			$this->_data = new stdClass();
			$this->_data->cid = 0;
			
		}
		return $this->_data;
	}
	
}
?>
