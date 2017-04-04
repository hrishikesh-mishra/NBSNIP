<?php 

	defined ('_JEXEC') or die("Restricted Access");
	
	class TableBlog extends JTable 
	{
		
		var $id = null;
		var $userid = null;
		var $topic = null;
		var $blog =null;
		var $bdate =null;
		var $params = null;
		var $published= 1;
		var $addedbyip =null;
		
		function TableBlog(& $db)
		{
			parent::__construct('#__blog_blogs', 'id', $db);
		}
	}
?>