<?php
	
	defined ('_JEXEC') or die ("Restricted Access");
	
	class TableComment extends JTable
	{
		var $id=null;
		var $blogid=null;
		var $cname=null;
		var $comment =null;
		var $cdate =null;
		var $addedbyip =null;
		var $params =null;
		var $published =1;
		
		function TableComment(&$db)
		{
			parent::__construct('#__blog_comment', 'id' ,$db);
		}
	}
	
?>