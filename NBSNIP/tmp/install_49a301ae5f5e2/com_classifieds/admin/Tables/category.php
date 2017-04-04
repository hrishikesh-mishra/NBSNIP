<?php
	

	defined('_JEXEC') or die('Restricted Access');
	jimport ('joomla.mail.helper');
class  TableCategory extends JTable
{
	
	var $cid=null;
	var $title=null;
	var $description=null;
	var $image=null;
	var $checked_out =0;
	var $checked_out_time =null;
	var $params= null;
	var $ordering=0;
	var $published=0;
	
	function TableCategory(& $db)
	{
		parent::__construct('#__classifieds', 'cid',$db);
	}
	
}