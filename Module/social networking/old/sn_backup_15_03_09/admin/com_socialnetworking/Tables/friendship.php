<?php
	
	defined('_JEXEC') or die('Restricted Access');
		
	class TableFriendship extends JTable
	{
		
		var $id=null;
		var $asker=null;
		var $askfor=null;
		var $status=null;
		var $rdate=null;
		var $params=null;
		var $published=1;
		
		function TableFriendship(&$db)
		{
			parent::__construct('#__sn_ask_for_friendship','id',$db);
		}
	}
?>