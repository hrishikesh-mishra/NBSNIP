<?php 

 defined('_JEXEC') or die (" Restricted Access");

jimport('joomla.application.component.model');
jimport('joomla.utilities.date');
require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'visitor.php');

class nbsnipModelHome extends JModel
{
	function addVisitor ($ip)
	{
		$data = array();
		$dateNow= new JDate();
		$data['ipaddress']=$ip;
		$data['accesstime']=$dateNow->toMySQL();
			
		$row =& JTable::getInstance('visitor','Table');
		
		if (!$row->bind($data))
		{
			JError::raiseError(500,$row->getError());
			return false;
		}
		
		if (!$row->store())
		{
			JError::raiseError(500,$row->getError());
			return false;
		}
		
		return true;
	}

}



