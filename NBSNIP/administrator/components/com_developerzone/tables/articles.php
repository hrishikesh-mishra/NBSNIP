<?php
	/*
	* Developer Zone Article Table Clas 
	*/
	
	class TableArticles extends JTable 
	{
		
		var $id =null;
		var $category=null;
		var $title =null;
		var $article =null;
		var $author =null;
		var $createdate =null;
		var $addedby=null;
		var $params =null;
		var $checked_out =0;
		var $checked_out_time=null;
		var $ordering =0;
		var $hits =0;
		var $published =0;
		
	
	function TableArticles(& $db)
	{	
		parent::__construct('#__dev_articles', 'id',$db);
	}
	}	