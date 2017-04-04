<?php 

	/*
		Social Networking model 
	*/

	// Direct Acces not allowed 
	defined ('_JEXEC') or die ('Restricted Access');
	
	require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'user.php');
	require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'profile.php');
	//require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'comment.php');
	
	jimport ('joomla.application.component.model');
	jimport ('joomla.mail.helper');
	jimport('joomla.utilities.date');

class socialNetworkingModelSocialNetworking extends JModel
{  

	
	function __construct()
	{
		parent::__construct();
	}
	
	function validemail($emailid)
	{
		if (!JMailHelper::isEmailAddress($emailid))
			return false;
		else
			return true;
	}

	function duplicateemailid($emailid)
	{	
		$emailid=strtolower($emailid);
		$query = "select * from #__sn_user where lower(emailid)='".$emailid."'";
		$result = $this->_getList( $query );
		return @$result[0];
	}
	function duplicateuserid($userid)
	{	
		$userid=strtolower($userid);
		$query = "select * from #__sn_user where lower(userid)='".$userid."'";
		$result = $this->_getList( $query );
		return @$result[0];
	}
	function validateUseridEmailid($userid, $emailid)
	{	
		$userid=strtolower($userid);
		$emailid=strtolower($emailid);
		$query = "select * from #__sn_user where lower(userid)='".$userid."' and lower(emailid) ='".$emailid."'";
		$result = $this->_getList( $query );
		return @$result[0];
	}
	
	function saveuser($data)
	{
		
		$dateNow= new JDate();
		$data['registrationdate'] = $dateNow->toMySQL();
		$data['password']=sha1($data['password']);
		$data['addedbyip']=$_SERVER['REMOTE_ADDR'];
		$data['published']=0;
		
		
	 	$row =& JTable::getInstance('user','Table');
	
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
	
	function saveprofile($data)
	{
		
	 	$row =& JTable::getInstance('profile','Table');
	
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
	
	function imageupdate($userid,$filename)
	{
		$userid=strtolower($userid);
		$query = "UPDATE #__sn_profile "
		. " SET image ='" . $filename . "'"
		. " WHERE lower(userid)='".$userid."'";
	
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		
		if( $db->query())
			return true;
		else
			return false;
	}
	
	function activate($acode, $userid)
	{
   
		$query = "select * from #__sn_user where userid='".$userid."' and activation= '".$acode."'";
		$result = $this->_getList( $query );
  
		if (count($result) == 1)
		{
			$db 	=& JFactory::getDBO();

			$query = "UPDATE #__sn_user "
			. " SET published =1 "
			. " WHERE userid='".$userid."'";
   
			$db->setQuery( $query );
			if( $db->query()){
				return true;
			}
			else
			return false;
		} 
		else 
		return false;
      
	}
	
	function newpassword($userid, $emailid,$newpwd)
	{
		$userid=strtolower($userid);
		$emailid=strtolower($emailid);
		$newpwd=sha1($newpwd);

		$query = "UPDATE #__sn_user "
		. " SET password ='" . $newpwd . "'"
		. " WHERE lower(userid)='".$userid."' and lower(emailid)='".$emailid."'";
		
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		
		if( $db->query())
			return true;
		else
			return false;
	}
	
	function login($userid, $password)
	{
		$userid=strtolower($userid);
		$password= sha1($password);

		$db=& JFactory::getDBO();
		$where =array();

		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where[] = ' (password ='.$db->Quote( $db->getEscaped( $password, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select * from #__sn_user " .$where; 
		
		$result = $this->_getList( $query );
		
		if (count($result))
		
			return true;
		
		else
			return false;
	}
	
	function checkblock($userid)
	{
		$userid=strtolower($userid);
		$db=& JFactory::getDBO();
		$where =array();

		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select published from #__sn_user " .$where; 
		$result = $this->_getList( $query );
		
		if (count($result))
		{
			if($result[0]->published==0)
				return true;
			else
				return false;
		}
		else
			return true;
	}
	
	function lastvisit($userid)
	{
		$userid=strtolower($userid);
		$dateNow= new JDate();
		$datesql = $dateNow->toMySQL();
		$lastVisitIp= $_SERVER['REMOTE_ADDR'];
		$query = "UPDATE #__sn_user "
		. " SET lastvisitdate ='" . $datesql . "', "
		. "  lastvisitip ='" . $lastVisitIp . "'"
		. " WHERE lower(userid)='".$userid."'";
		
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		$db->query();
	}	
	
	function loadUserProfile($userid)
	{
		$userid=strtolower($userid);
		$db=& JFactory::getDBO();
		$where =array();

		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select * from #__sn_profile " .$where; 
		$result = $this->_getList( $query );
		
		return @$result[0];
	}
	
	function loadProfileID($userid)
	{
		$userid=strtolower($userid);
		$db=& JFactory::getDBO();
		$where =array();

		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select id from #__sn_profile " .$where; 
		$result = $this->_getList( $query );
		
		return @$result[0];
	}
	
	function ChangePassword($password,$userid)
	{
		$userid=strtolower($userid);
		$db 	=& JFactory::getDBO();
		$password=sha1($password);
		$where =array();
		
		$where[] ='(published >0 )';
		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
		$query = "UPDATE #__sn_user "
		. " SET password ='" . $password . "'"
		. $where;
		
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );

		if( $db->query())
			return true;
		else
			return false;
	}
	
	function searchProfile($name,$city,$state)
	{
		$db=& JFactory::getDBO();
		$where =array();
		
		if ( !empty($name) ) 
		{
			$where[] = '( firstname LIKE '.$db->Quote( '%'.$db->getEscaped( $name, true ).'%', false ) 
						.' OR lastname LIKE '.$db->Quote( '%'.$db->getEscaped( $name, true ).'%', false ) .')';
		}
		if ( !empty($city)) 
		{
			$where[] = '( city  LIKE '.$db->Quote( '%'.$db->getEscaped( $city, true ).'%', false ) .')';

		}
		if ( !empty($state)) 
		{
			$where[] = '( state LIKE '.$db->Quote( '%'.$db->getEscaped( $state, true ).'%', false ) .')';

		}

		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
		$query = "select * from #__sn_profile " .$where; 
		//echo $query;
		
		$result = $this->_getList( $query );
		
		//echo "<pre>";
		//print_r($result);
		return $result;
	}
	
	function varfiyUser($ldUsID)
	{
		$ldUsID=strtolower($ldUsID);
		
		$db 	=& JFactory::getDBO();
		
		$where =array();

		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $ldUsID, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select id from #__sn_user " .$where; 
		$result = $this->_getList( $query );
		
		if(count($result))
			return true;
		else
			return false;
	}
	
	function loadProfileDataToRead($userid)
	{
		$userid=strtolower($userid);
		$db=& JFactory::getDBO();
		$where =array();

		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select * from #__sn_profile " .$where; 
		$result = $this->_getList( $query );
		
		return @$result[0];
	}
	
	function getEmailID($userid)
	{
	
		$userid=strtolower($userid);
		$db=& JFactory::getDBO();
		$where =array();

		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select emailid from #__sn_user " .$where; 
		$result = $this->_getList( $query );
		
		return @$result[0]->emailid;
	}	
	
	function getFirstName($userid)
	{
	
		$userid=strtolower($userid);
		$db=& JFactory::getDBO();
		$where =array();

		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select firstname from #__sn_profile " .$where; 
		$result = $this->_getList( $query );
		
		return @$result[0]->firstname;
	}	

	function saveScrap($scrapData)
	{
	 	$row =& JTable::getInstance('scrap','Table');
	
		if (!$row->bind($scrapData))
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
	
	function loadScrapDataToRead($userid)
	{
		$userid=strtolower($userid);
		$db=& JFactory::getDBO();
		$where =array();

		$where[] = ' (lower(recevier) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select * from #__sn_scrap " .$where; 
		$result = $this->_getList( $query );
		
		return $result;
	}
	
}

?>