<?php

	defined ('_JEXEC') or die('Restricted Access');
	
	class TableGroup extends JTable
	{
		
		var $id=null;
		var $topic = null;
		var $createdby=null;
		var $creationdate=null;
		var $addedbyip=null;
		var $params=null;
		var $published=1;
		
		function TableGroup(&$db)
		{
			parent::__construct('#__sn_group','id',$db);
		}
	}
?>