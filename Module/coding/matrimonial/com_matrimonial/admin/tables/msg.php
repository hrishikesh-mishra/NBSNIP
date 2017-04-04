<?php
	

	defined('_JEXEC') or die('Restricted Access');
	jimport ('joomla.mail.helper');

class  TableMsg extends JTable
{

	var $id=null;
	var $sender=null;
	var $receiver=null;
	var $title=null;
	var $msg=null;
	var $sdate=null;
	var $ipaddress=null;
	var $params=null;
	var $ordering=0;
	var $read=0;
	var $published=1;
	
	function TableMsg(& $db)
	{
		parent::__construct('#__mat_msg', 'id',$db);
	}
	
}