<?php 
	
	/* 
		Classified club table 
		
	*/

	//direct access not allowed
	defined('_JEXEC') or die ('Ristricted Access ');
	
	jimport ('joomla.mail.helper');
	class TableVendor extends JTable 
	{
		
		var $id =null;
		var $name=null;
		var $phone =null;
		var $mobile =null;
		var $location =null;
		var $city =null; 
		var $state =null;
		var $emailid =null;
		var $website =null;
		var $image=null;
		var $about =null;
		var $checked_out =0;
		var $checked_out_time =null;
		var $params =null;
		var $ordering =0;
		var $published =0;



		function TableVendor(& $db)
		{
			parent::__construct('#__cf_vendor','id',$db);
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
			
			if (!JMailHelper::isEmailAddress($this->emailid))
			{
				$this->setError(JText::_('Please provide a valid EmailID.' ));
				return false;
			}

		
			return true;
		}

	}