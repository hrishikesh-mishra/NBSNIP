<?php 

defined ('_JEXEC') or die("Restricted Access ");



class TableLogin extends JTable
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
	var $params = null;
	

	function TableLogin(&$db)
	{ 
	  	parent::__construct('#__mat_users', 'id',$db);
	}
}
