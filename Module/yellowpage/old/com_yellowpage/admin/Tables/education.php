<?php 
	
	/* 
		Yellow page education table 
		Table name : - yp_education
	*/

	//direct access not allowed
	defined('_JEXEC') or die ('Ristricted Access ');
	
	class TableEducation extends JTable 
	{
		var $id;
		var $yid;
		var $eduname;
		var $category;
		var $standard;
		var $principal;
		var $totalstrength;
		var $phone;
		var $mobile;
		var $location;
		var $city;
		var $state;
		var $website;
		var $emailid;
		var $description;
		var $checked_out;
		var $checked_out_time;
		var $params;
		var $ordering;
		var $hits;
		var $published;
		var $addedby;


		function TableEducation(& $db)
		{
			parent::__construct('#__yp_education', 'id',$db);
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