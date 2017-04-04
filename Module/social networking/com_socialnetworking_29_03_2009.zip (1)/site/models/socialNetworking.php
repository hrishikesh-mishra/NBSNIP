<?php 

	/*
		Social Networking model 
	*/

	// Direct Acces not allowed 
	defined ('_JEXEC') or die ('Restricted Access');
	
	require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'user.php');
	require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'profile.php');
	require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'friend.php');
	require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'friendship.php');
	require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'group.php');
	require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'groupDiscussion.php');
	
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
		
		$where[]=' (s.published >0)';
		$where[]=' (p.published >0)';
		$where[]=' (s.sender=p.userid)';		
		$where[] = ' (lower(s.recevier) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select s.* ,p.firstname, p.lastname , p.image from #__sn_scrap s, #__sn_profile p " .$where.' order by s.sdate desc'; 
		//echo $query;
		$result = $this->_getList( $query );
		
		return $result;
	}
	
	function chngScrpStatus($id,$privatemsg)
	{
		$query = "UPDATE #__sn_scrap "
		. " SET private_scrap ='" . $privatemsg . "'"
		. " WHERE id='".$id."'";
		
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		
		if( $db->query())
			return true;
		else
			return false;
	}
	
	function delScrap($id)
	{
		$query = "delete from #__sn_scrap "		
		. " WHERE id='".$id."'";
		
		//echo $query;

		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		
		if( $db->query())
			return true;
		else
			return false;
	}
	
	function askAsFrnd($logOnUsr, $userid)
	{
		$logOnUsr=strtoupper($logOnUsr);
		$userid=strtoupper($userid);
		$db 	=& JFactory::getDBO();
		
		$where[] = ' ( lower(asker) ='.$db->Quote( $db->getEscaped( $logOnUsr, true ), false ) 
					.'  or lower(askfor) ='.$db->Quote( $db->getEscaped( $logOnUsr, true ), false ) .')';
					
		$where[] = ' ( lower(asker) ='.$db->Quote( $db->getEscaped( $userid, true ), false ) 
					.'  or lower(askfor) ='.$db->Quote( $db->getEscaped( $userid, true ), false ) .')';
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select * from #__sn_ask_for_friendship  " .$where ; 
		//echo $query;
		$result = $this->_getList( $query );
		//echo "<br> count=" .count($result);
		if (count($result))
			return 1;
		else
			return 0;
	}

	function requestForFriendship($logOnUser,$uid)
	{
		$logOnUser=strtoupper($logOnUser);
		$uid=strtoupper($uid);
		$dateNow= new JDate();
		
		$data=array();
		
		$data['asker']=$logOnUser;
		$data['askfor']=$uid;
		$data['rdate']=$dateNow->toMySQL();
		$data['status']=0;
		$data['published']=1;
		
	 	$row =& JTable::getInstance('Friendship','Table');
	
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
	
	function listOfRequetToMeForFriendship($userid)
	{
		
		$userid=strtoupper($userid);
		$db 	=& JFactory::getDBO();
		
		$where[] = ' ( lower(f.askfor) ='.$db->Quote( $db->getEscaped( $userid, true ), false ) .')';
		$where[] = ' ( f.published >0 ) ';
		$where[] = ' ( u.published >0 ) ';
		$where[] = ' ( f.status =0 ) ';
		$where[]=  ' (f.asker =u.userid) ';
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select f.*, u.userid, u.firstname, u.lastname, u.image from #__sn_ask_for_friendship f, #__sn_profile u " .$where ; 
		//echo $query;
		$result = $this->_getList( $query );
		
		return $result;
	}	
	
	function addFriend($user1, $user2)
	{
		$dateNow= new JDate();
		$data =array();
		$data['userid']=strtoupper($user1);
		$data['friend']=strtoupper($user2);
		$data['adate']=$dateNow->toMySQL();
		$data['published']=1;
		
		$row =& JTable::getInstance('Friend','Table');
	
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
	
	function updateAskFriend($asker, $askfor, $status)
	{
	
		$asker=strtoupper($asker);
		$askfor=strtoupper($askfor);
		
		$db 	=& JFactory::getDBO();
		$where = array();
		$where[] = ' ( lower(askfor) ='.$db->Quote( $db->getEscaped( $askfor, true ), false ) .')';
		$where[] = ' ( lower(asker) ='.$db->Quote( $db->getEscaped( $asker, true ), false ) .')';
		$where[]=  ' ( published >0 )';
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
		$query = "UPDATE #__sn_ask_for_friendship "
		. " SET status ='" . $status . "'"
		.$where;
				
		$db->setQuery( $query );
		//echo $query;
		if( $db->query()) 
			return true;
		else
			return false;
	}
	
	function checkForFrndship($logOnUsr,$userid)
	{
		$logOnUsr=strtoupper($logOnUsr);
		$userid=strtoupper($userid);
		$db 	=& JFactory::getDBO();
		
		$where[] = ' ( lower(asker) ='.$db->Quote( $db->getEscaped( $logOnUsr, true ), false ) 
					.'  or lower(askfor) ='.$db->Quote( $db->getEscaped( $logOnUsr, true ), false ) .')';
					
		$where[] = ' ( lower(asker) ='.$db->Quote( $db->getEscaped( $userid, true ), false ) 
					.'  or lower(askfor) ='.$db->Quote( $db->getEscaped( $userid, true ), false ) .')';
		$where[] = ' ( status =0 )';
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select * from #__sn_ask_for_friendship  " .$where ; 
		//echo $query;
		$result = $this->_getList( $query );
		//echo "<br> count=" .count($result);
		if (count($result))
			return 1;
		else
			return 0;
	}
	
	function deleteUsrFor($asker,$askfor)
	{
		$asker=strtoupper($asker);
		$askfor=strtoupper($askfor);
		
		$db 	=& JFactory::getDBO();
		$where = array();
		$where[] = ' ( lower(askfor) ='.$db->Quote( $db->getEscaped( $askfor, true ), false ) .')';
		$where[] = ' ( lower(asker) ='.$db->Quote( $db->getEscaped( $asker, true ), false ) .')';
		$where[]=  ' ( published >0 )';
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
		$query = "DELETE from #__sn_ask_for_friendship ".$where;
		
		$db->setQuery( $query );
		//echo $query;
		if( $db->query()) 
			return true;
		else
			return false;
	}
	
	function loadFriendList($userid)
	{
		$userid=strtoupper($userid);
		
		$db=& JFactory::getDBO();
		$where =array();

		$where[] = ' (lower(f.userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where[] = ' ( f.friend = p.userid) ';
		$where[] = ' ( f.published > 0) ';
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select f.* ,p.firstname, p.lastname, p.image from #__sn_user_friends f , #__sn_profile p" .$where; 
		
		$result = $this->_getList( $query );
		return $result;
	}
	
	function duplicateGrp($grpName)
	{
		$db=& JFactory::getDBO();
		$where =array();
		$grpName = strtolower($grpName);

		$where[] = ' (lower(topic) ='.$db->Quote( $db->getEscaped( $grpName, true ), false ).')';
	
	
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select * from #__sn_group " .$where; 
		
		$result = $this->_getList( $query );
		if (count($result))
			return true;
		else
			return false;
	}
	
	function createGroup($data)
	{
		$dateNow= new JDate();
		$data['creationdate'] = $dateNow->toMySQL();
		$data['addedbyip']=$_SERVER['REMOTE_ADDR'];
		$data['published']=1;
		
		
	 	$row =& JTable::getInstance('group','Table');
	
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
	
	function getMyGrp($userid)
	{
		$db=& JFactory::getDBO();
		$where =array();
		$userid = strtolower($userid);

		$where[] =' (lower(createdby) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where[] =' (published = 1) ' ; 
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select * from #__sn_group " .$where; 
		
		$result = $this->_getList( $query );
		
		return $result;
	}
	
	function validateTopic($id)
	{
		$db=& JFactory::getDBO();
		$where =array();
		

		$where[] = '(id ='.$db->Quote( $db->getEscaped( $id, true ), false ).')';
		$where[] =' (published = 1) ' ; 
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select * from #__sn_group " .$where; 
		
		$result = $this->_getList( $query );
		if (count($result))
			return true;
		else
			return false;
	}
	
	function loadGroupData($id)
	{
		$db=& JFactory::getDBO();
		$where =array();
		

		$where[] = '(d.gid ='.$db->Quote( $db->getEscaped( $id, true ), false ).')';
		$where[] =' (d.published = 1) ' ; 
		$where[] =' (lower(p.userid) = lower(d.userid) )' ; 
				
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select  d.discussion,d.adate,  p.firstname, p.lastname from #__sn_profile p ,  #__sn_group_discussion d" .$where. ' order by d.adate desc'; 
	
		$result = $this->_getList( $query );
		return $result;
	}	
	function grpTopicDtl($id)
	{
		$db=& JFactory::getDBO();
		$where =array();
		

		$where[] = '(g.id ='.$db->Quote( $db->getEscaped( $id, true ), false ).')';
		$where[] =' ( lower(p.userid) = lower(g.createdby) )' ; 
		
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select g.id, g.topic, g.creationdate, p.firstname, p.lastname from #__sn_profile p , #__sn_group g " .$where; 
		
		$result = $this->_getList( $query );
		
		return @$result[0];
	}
	
	function duplicateOnGroupDisc($desc)
	{
		$db=& JFactory::getDBO();
		$where =array();
		$desc = strtolower($desc);

		$where[] = '( lower(discussion)='.$db->Quote( $db->getEscaped( $desc, true ), false ).')';
		
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = " select * from  #__sn_group_discussion  " .$where; 
		
		$result = $this->_getList( $query );
		
		if (count($result))
			return true;
		else
			return false;
		
	}
	
	function addCmtOnGroupDisc($data)
	{
		$dateNow= new JDate();
		$data['adate'] = $dateNow->toMySQL();
		$data['ipaddress']=$_SERVER['REMOTE_ADDR'];
		$data['published']=1;
		
		
	 	$row =& JTable::getInstance('groupDiscussion','Table');
	
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
		
	function getMyCommentedGroupDisc($userid)
	{
		
		$db=& JFactory::getDBO();
		$where =array();
		$userid = strtolower($userid);

		$where[] =' (lower(d.userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where[] =' (d.published = 1) ' ; 
		$where[] =' (g.published = 1) ' ; 
		$where[] = ' (g.id = d.gid)'; 
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select distinct g.topic, g.id from #__sn_group g, #__sn_group_discussion d " .$where; 
		
		$result = $this->_getList( $query );
		
		return $result;
	}
	
	function searchGroup($skey)
	{
		
		$db=& JFactory::getDBO();
		$where =array();
		$skey = strtolower($skey);

		$where[] =' (topic LIKE '.$db->Quote( '%'.$db->getEscaped(  $skey , true ).'%', false ) .')';
		$where[] =' (published = 1) ' ; 
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select *  from #__sn_group  " .$where; 
		
		$result = $this->_getList( $query );
		
		return $result;
	}
	
}	
?>