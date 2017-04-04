<?php
	

	defined('_JEXEC') or die('Restricted Access');
	jimport ('joomla.mail.helper');
class  TableRealstate extends JTable
{
	
	var $id=null;
	var $cid=null;
	var $vid=null;
	var $title= null;
	var $company=null;
	var $phone=null;
	var $mobile=null;
	var $location=null;
	var $city=null;
	var $state=null;
	var $emailid=null;
	var $website=null;
	var $description=null;
	var $regstartdate=null;
	var $regenddate=null;
	var $checked_out=0;
	var $checked_out_time=null;
	var $params=null;
	var $hits=0;
	var $ordering=0;
	var $published=0;
	
	function TableRealstate(& $db)
	{
		parent::__construct('#__cf_realstate', 'id',$db);
	}
	
	function check()
	{
	
		if (JFilterInput::checkAttribute(array ('href', $this->website)))
		{
			$this->setError(JText::_('Please provide a valid URL'));
			return false;
		}
			// check for http on website
		if (strlen($this->website) > 0 && (!(eregi('http://', $this->website) || (eregi('https://', $this->website)) || (eregi('ftp://', $this->website))))) 
		{
			$this->website = 'http://'.$this->website;
		}
			
		if (!JMailHelper::isEmailAddress($this->emailid))
		{
			$this->setError(JText::_('Please provide a valid EmailID for company.' ));
			return false;
		}
		return true;
	}


}