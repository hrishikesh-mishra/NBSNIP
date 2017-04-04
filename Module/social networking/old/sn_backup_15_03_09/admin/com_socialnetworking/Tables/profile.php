<?php

	defined('_JEXEC') or die('Restricted Access');
	
	
	class TableProfile extends JTable
	{ 
		var $id =null;
		var $userid=null;
		var $firstname =null;
		var $lastname =null;
		var $sex =null;
		var $dob =null;
		var $highschool =null;
		var $college =null;
		var $university =null;
		var $specificdegree =null;
		var $jobtitle =null;
		var $profession =null;
		var $company =null;
		var $location =null;
		var $city =null;
		var $state =null;
		var $postalcode =null;
		var $phone =null;
		var $mobile =null;
		var $careerskill =null;
		var $careerinterest =null;
		var $aboutyourself =null;
		var $image =null;
		var $params =null;
		var $published =1;
		
		
		function TableProfile(&$db)
		{
			parent::__construct('#__sn_profile','id',$db);
		}
	}