<?php 

defined ('_JEXEC') or die("Restricted Access ");



class TableUser extends JTable
{
	var $id=null;
	var $userid=null;
	var $username=null;
	var $password= null;
	var $block = null;
	var $registrationdate=null;
	var $lastvisitdate = null;
	var $activation =null;
	var $emailid = null;
	var $addedat=null;
	var $params = null;
	

	function TableUser(&$db)
	{ 
	  	parent::__construct('#__mat_users', 'id',$db);
	}
}
