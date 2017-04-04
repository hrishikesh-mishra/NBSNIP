<?php

	defined ('_JEXEC') or die('Restriced Access');
	
	class TableVisitor extends JTable 
	{
		
		var $id=null;
		var $ipaddress=null;
		var $accesspages=null;
		var $accesstime=null;
		
		function TableVisitor(&$db)
		{
			parent::__construct('#__visitor','id',$db);
		}
	}
	?>