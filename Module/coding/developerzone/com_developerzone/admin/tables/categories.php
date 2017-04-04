<?php

	/*
	*	Developerzone cateogries Table Class
	*/	
	class TableCategories extends JTable
	{
	
		var $id = null;
		var $category = null;
		var $about = null;
		var $image = null;
		var $params = null;
		var $checked_out =0;
		var $checked_out_time = null;
		var $ordering = 0;
		var $published = 0;
	
	function TableCategories(& $db)
	{
		parent::__construct('#__dev_categories', 'id',$db);
	}
	
	}
?>

