<?php
	
	/*
		yellowpage Categories table class
	*/
	
	//no direct access 

	defined('_JEXEC') or die('Restricted Access');

 class TableCategories extends JTable
 {
	 //table column defination 
	 //and variable of table class

	 var $yid =null;
	 var $type =null;
	 var $checked_out =0;
	 var $checked_out_time=0;
	 var $params =null;
	 var $ordering=0;
	 var $published=0;

	function TableCategories(& $db)
	{
		parent::__construct('#__yellowpage', 'yid',$db);
	}
	
 }
