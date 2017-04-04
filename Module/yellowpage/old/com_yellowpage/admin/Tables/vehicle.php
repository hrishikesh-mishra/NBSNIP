<?php 
	
	/* 
		Yellow page Vehicle table 		
	*/

	//direct access not allowed
	defined('_JEXEC') or die ('Ristricted Access ');
	
	class TableVehicle extends JTable 
	{

		var $id =null;
		var $yid =null;
		var $orgname =null;
		var $category =null;
		var $owner =null;
		var $branch =null;
		var $products =null;
		var $facility =null;
		var $shopkeeperword =null;
		var $phone=null;
		var $mobile =null;
		var $location =null;
		var $city =null;
		var $state =null;
		var $emailid =null;
		var $website =null;
		var $description =null;
		var $checked_out =0;
		var $checked_out_time =null;
		var $params =null;
		var $ordering =null;
		var $hits =null;
		var $published=null;
		var $addedby;


		function TableVehicle(& $db)
		{
			parent::__construct('#__yp_vehicle', 'id',$db);
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