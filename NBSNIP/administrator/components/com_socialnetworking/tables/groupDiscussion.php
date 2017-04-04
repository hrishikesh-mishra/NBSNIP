<?php

	defined ('_JEXEC') or die('Restricted Access');
	
	class TableGroupDiscussion extends JTable
	{
		
		var $id=null;
		var $gid = null;
		var $userid=null;
		var $discussion=null;
		var $adate=null;
		var $ipaddress=null;
		var $params=null;
		var $published=1;
		
		function TablegroupDiscussion(&$db)
		{
			parent::__construct('#__sn_group_discussion','id',$db);
		}
	}
?>