<?php 
	/*
	* Developer zone CodeFile Table Class 
	*/
	
	class TableCodeFile extends JTable
	{
		var $id=null;
		var $category =null;
		var $title =null;
		var $description =null;
		var $codefile =null;
		var $creationdate =null;
		var $addedby =null;
		var $params =null;
		var $checked_out =0;
		var $checked_out_time =null;
		var $ordering =0;
		var $hits =0;
		var $published =0;
	
		function TableCodeFile(& $db)
		{
			parent::__construct('#__dev_codefile', 'id',$db);
		}
	}
?>