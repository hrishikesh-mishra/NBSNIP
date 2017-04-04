<?php
	

	defined('_JEXEC') or die('Restricted Access');
	jimport ('joomla.mail.helper');
class  TableJobs extends JTable
{
	
	var $id=null;
	var $cid=null;
	var $title=null;
	var $reference=null;
	var $jobtype=null;
	var $qualification=null;
	var $duration=null;
	var $howtoapply=null;
	var $joblocation=null;
	var $jobcity=null;
	var $jobstate=null;
	var $noofopenings=0;
	var $compensationrange=null;
	var $comname=null;
	var $comlocation=null;
	var $comcity=null;
	var $comstate=null;
	var $comemailid=null;
	var $comwebsite=null;
	var $contactname=null;
	var $contactphone=null;
	var $contactmobile=null;
	var $contactemailid=null;
	var $memberid=null;
	var $regstartdate=null;
	var $regenddate=null;
	var $description=null;
	var $checked_out=0;
	var $checked_out_time=null;
	var $params=null;
	var $hits=0;
	var $ordering=0;
	var $published=0;
	
	function TableJobs(& $db)
	{
		parent::__construct('#__cf_jobs', 'id',$db);
	}
	
	function check()
	{
	
		if (JFilterInput::checkAttribute(array ('href', $this->comwebsite)))
		{
			$this->setError(JText::_('Please provide a valid URL'));
			return false;
		}
			// check for http on website
		if (strlen($this->comwebsite) > 0 && (!(eregi('http://', $this->comwebsite) || (eregi('https://', $this->comwebsite)) || (eregi('ftp://', $this->comwebsite))))) 
		{
			$this->comwebsite = 'http://'.$this->comwebsite;
		}
			
		if (!JMailHelper::isEmailAddress($this->comemailid))
		{
			$this->setError(JText::_('Please provide a valid EmailID for company.' ));
			return false;
		}
		if (!JMailHelper::isEmailAddress($this->contactemailid))
		{
			$this->setError(JText::_('Please provide a valid EmailID for Contact Person.' ));
			return false;
		}

		
		return true;
	}


}