<?php
	
	defined('_JEXEC') or die('Restricted Access');


	class TableScrap extends JTable
	{
		var $id=null;
		var	$sender=null;
		var	$recevier = null;
		var	$scrap = null;
		var	$sdate = null;
		var	$private_scrap = 0;
		var	$params=null;
		var	$published=1;
	
		function TableScrap(&$db)
		{
			parent::__construct('#__sn_scrap', 'id', $db);
		}
	}
?>