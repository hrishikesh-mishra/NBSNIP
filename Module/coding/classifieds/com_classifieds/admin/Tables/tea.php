<?php
	
	//Tea table 
	defined ('_JEXEC') or die('Restriced Access'); 
	jimport ('joomla.mail.helper');
	class TableTea extends JTable 
	{
	 
		var $id = null;
		var $cid = null;
		var $vid = null;
		var $title = null;
		var $product_detail = null;
		var $offer = null;
		var $shopname = null;
		var $company = null;
		var $phone = null;
		var $mobile = null;
		var $fax = null;
		var $location = null;
		var $city = null;
		var $state = null;
		var $emailid = null;
		var $website = null;
		var $description = null;
		var $regstartdate = null;
		var $regendate = null;
		var $checked_out = null;
		var $hecked_out_time = null;
		var $params= null;
		var $hits = null;
		var $ordering = null;
		var $published = null;
		
		function TableTea(&$db)
		{
			parent::__construct('#__cf_tea', 'id',$db);
		}
		function check()
		{
	
			if (JFilterInput::checkAttribute(array ('href', $this->website)))
			{
				$this->setError(JText::_('Please provide a valid URL'));
				return false;
			}
			// check for http on website
			if (strlen($this->website) > 0 && (!(eregi('http://', $this->website) || (eregi('https://', $this->website)) || (eregi('ftp://', $this->comwebsite))))) 
			{
				$this->website = 'http://'.$this->website;
			}
			
			if (!JMailHelper::isEmailAddress($this->emailid))
			{
				$this->setError(JText::_('Please provide a valid EmailID.' ));
				return false;
			}
				
			return true;
		}
	
	}
		