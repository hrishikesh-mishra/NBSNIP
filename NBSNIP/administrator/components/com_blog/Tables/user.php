<?php 
	
	/*
	*	BLOGGING SYSTEM USER TABLE
	*/
	
	class TableUser extends JTable
	{
		var $id=null;
		var $userid=null;
		var $username=null;
		var $password=null;
		var $emailid =null;
		var $activation =null;
		var $registrationdate=null;
		var $lastvisitdate =null;
		var $addedbyip=null;
		var $lastvisitip =null;
		var $location =null;
		var $city =null;
		var $state =null;
		var $image =null;
		var $params=null;
		var $published=0;
		
		function TableUser(&$db)
		{ 
			parent::__construct('#__blog_user', 'id',$db);
		}
	}
