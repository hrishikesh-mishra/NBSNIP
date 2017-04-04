<?php
	
	/*
		yellowpage Hotel Lodge table class
	*/
	
	//no direct access 

	defined('_JEXEC') or die('Restricted Access');

 class TableHotelLodge extends JTable
 {
	 //table column defination 
	 //and variable of table class

	 var $id = null;
	 var $yid =null;
	 var $hotelname =null;
	 var $category =null;
	 var $speciality =null;
	 var $phone =null;
	 var $mobile =null;
	 var $location =null;
	 var $city =null;
	 var $state =null;
	 var $emailid =null;
	 var $website =null;
	 var $description=null;
	 var $checked_out =0;
	 var $checked_out_time=0;
	 var $params =null;
	 var $ordering=0;
	 var $hits =0;
	 var $published=0;
	var $addedby;

	function TableHotelLodge(& $db)
	{
		parent::__construct('#__yp_hotel_lodge', 'id',$db);
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
