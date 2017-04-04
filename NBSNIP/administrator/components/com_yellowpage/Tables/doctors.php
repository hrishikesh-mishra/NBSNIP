<?php 
	
	/* 
		Yellow page Doctors table 		
	*/

	//direct access not allowed
	defined('_JEXEC') or die ('Ristricted Access ');
	
	class TableDoctors extends JTable 
	{

		var $id =null;
		var $yid =null;
		var $docname =null;
		var $specialist =null;
		var $areaofoperations =null;
		var $parmanentclinic =null;
		var $phone =null;
		var $mobile =null;
		var $location =null;
		var $city =null;
		var $state =null;
		var $emailid =null;
		var $website =null;
		var $description =null;
		var $checked_out =0;
		var $checked_out_time =0;
		var $params = null;
		var $ordering =0;
		var $hits =0;
		var $published =0;
		var $addedby;


		function TableDoctors(& $db)
		{
			parent::__construct('#__yp_doctors', 'id',$db);
		}
		
		function check()
		{
		
			if (JFilterInput::checkAttribute(array ('href', $this->website)))
			{
				$this->setError(JText::_('Please provide a valid URL'));
				return false;
			}

			// check for http on website
			if (strlen($this->website) > 0 && (!(eregi('http://', $this->website) || (eregi('https://', $this->website)) || (eregi('ftp://', $this->website))))) 
			{
				$this->website = 'http://'.$this->website;
			}		
			return true;
		}

	}