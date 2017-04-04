<?php

	defined ('_JEXEC') or die('Restricted Access');
	
	class TableFriend extends JTable
	{
		
		var $id=null;
		var $userid=null;
		var $friend=null;
		var $adate=null;
		var $params=null;
		var $published=1;
		
		function TableFriend(&$db)
		{
			parent::__construct('#__sn_user_friends','id',$db);
		}
	}
?>