<?php 

	/*
		matrimonail  model 
	*/

	// Direct Acces not allow 
	defined ('_JEXEC') or die ('Restricted Access');
	require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'user.php');
	require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'profile.php');
	require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'msg.php');
	jimport ('joomla.application.component.model');
	jimport ('joomla.mail.helper');
	jimport('joomla.utilities.date');

	class matrimonialModelMatrimonial extends JModel
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
		$query = "select * from #__mat_users where lower(emailid)='".$emailid."'";
		$result = $this->_getList( $query );
		return @$result[0];
	}
	function duplicateuserid($userid)
	{	
		$userid=strtolower($userid);
		$query = "select * from #__mat_users where lower(userid)='".$userid."'";
		$result = $this->_getList( $query );
		return @$result[0];
	}
	function validateUseridEmailid($userid, $emailid)
	{	
		$userid=strtolower($userid);
		$emailid=strtolower($emailid);
		$query = "select * from #__mat_users where lower(userid)='".$userid."' and lower(emailid) ='".$emailid."'";
		$result = $this->_getList( $query );
		return @$result[0];
	}
	function saveuser($data)
	{
		
		$dateNow= new JDate();
		$data['registrationdate'] = $dateNow->toMySQL();
		$data['password']=sha1($data['password']);
		$data['addedat']=$_SERVER['REMOTE_ADDR'];
		
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
		
		$dateNow= new JDate();

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

	function activate($acode, $userid)
	{
   
		$query = "select * from #__mat_users where userid='".$userid."' and activation= '".$acode."'";
		$result = $this->_getList( $query );
  
		if (count($result) == 1)
		{
			$db 	=& JFactory::getDBO();

			$query = "UPDATE #__mat_users "
			. " SET block =0 "
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

		$query = "UPDATE #__mat_users "
		. " SET password ='" . $newpwd . "'"
		. " WHERE lower(userid)='".$userid."' and lower(emailid)='".$emailid."'";
		
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );

		if( $db->query())
			return true;
		else
			return false;
	}

	function imageupdate($userid,$filename)
	{
		$userid=strtolower($userid);
		$query = "UPDATE #__mat_profile "
		. " SET image ='" . $filename . "'"
		. " WHERE lower(userid)='".$userid."'";
	
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );

		if( $db->query())
			return true;
		else
			return false;
	}

	function searchmatch($gender, $community, $age1 ,$age2)
	{

	
		$db=& JFactory::getDBO();
		$where = array();

		$where []=' (p.published >0)';
		$where []=' (p.userid= u.userid)';


		
		if(!empty($gender))
		{
			switch(strtolower($gender))
			{
				case 'bride':
					$gender='male';
					break;
				default:
					$gender='female';
					break;
			}

			$where[] = ' (lower(p.gender) ='.$db->Quote( $db->getEscaped( $gender, true ), false ).')';
		}

		if ( !empty($community) ) 
		{
			$community= strtolower($community);
			$where[] = ' (lower(p.community) ='.$db->Quote($db->getEscaped( $community, true ), false ).')';

		}
		if ( !empty($age1) && !empty($age2)) 
		{
			if ($age1> $age2)
			{
				$temp=$age1;
				$age1=$age2;
				$age2=$temp;
			}
			$where[] = ' (p.age BETWEEN ' .$age1 . ' AND ' . $age2 .')';


		}

		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
		$query = "select p.*, u.username, u.emailid from #__mat_profile p , #__mat_users u" .$where; 
		
		return $this->_getList($query);
		
	}

	function proinfo($userid)
	{
		$db=& JFactory::getDBO();
		$userid=strtolower($userid);
		$where = array();

		$where []=' (p.published >0)';
		$where []=' (p.userid= u.userid)';
		$where[] = ' (lower(p.userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
		$query = "select p.*, u.username, u.registrationdate from #__mat_profile p , #__mat_users u " .$where; 
		
		$result = $this->_getList( $query );
		return @$result[0];
	}
	function searchprofile($userid)
	{
		$db=& JFactory::getDBO();
		$userid=strtolower($userid);
		$where = array();

		$where []=' (p.published >0)';
		$where []=' (p.userid= u.userid)';
		$where[] = ' (lower(p.userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
		$query = "select p.*, u.username, u.registrationdate from #__mat_profile p , #__mat_users u " .$where; 
		
		$result = $this->_getList( $query );
		return $result;
	}

	function sendmsg($data)
	{
		$dateNow= new JDate();
		$data['sdate'] = $dateNow->toMySQL();
		$data['ipaddress']=$_SERVER['REMOTE_ADDR'];
		$data['receiver']=$data['userid'];
		$row =& JTable::getInstance('msg','Table');
	
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

	function checkblock($userid)
	{
		$userid=strtolower($userid);
		$db=& JFactory::getDBO();
		$where =array();

		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select block from #__mat_users " .$where; 
		$result = $this->_getList( $query );
		
		if (count($result))
		{
			if($result[0]->block)
				return true;
			else
				return false;
		}
		else
			return true;
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

		$query = "select * from #__mat_users " .$where; 
		
		$result = $this->_getList( $query );
		
		if (count($result))
		
			return true;
		
		else
			return false;
	}
	
	function inbox($userid)
	{
		
		$userid=strtolower($userid);
		$db=& JFactory::getDBO();
		$where =array();

		$where []=' (published >0)';
		$where[] = ' (lower(receiver) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
	
		$query = "select * from #__mat_msg " .$where; 
		
		$result = $this->_getList( $query );
		
		return $result;
	}

	function lastvisit($userid)
	{
		$userid=strtolower($userid);
		$dateNow= new JDate();
		$datesql = $dateNow->toMySQL();
		$query = "UPDATE #__mat_users "
		. " SET lastvisitdate ='" . $datesql . "'"
		. " WHERE lower(userid)='".$userid."'";
	
			
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		$db->query();
		
	}
	function readmsg($mid,$userid)
	{
		$userid=strtolower($userid);

		$db=& JFactory::getDBO();
		$where =array();
		
		$where []=' (published >0)';
		$where[] = ' (lower(receiver) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where[] = ' (id ='.$db->getEscaped( $mid, true ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
	
		$query = "select * from #__mat_msg " .$where; 
		
		$result = $this->_getList( $query );
		
		return @$result[0];
	}
	function delmsg($id,$userid)
	{
		$userid=strtolower($userid);

		$db=& JFactory::getDBO();
		$where =array();
		
		$where []=' (published >0)';
		$where[] = ' (lower(receiver) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where[] = ' (id ='.$db->getEscaped( $id, true ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "delete from #__mat_msg " .$where;
		
	
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		 $db->query();
	}
	
	function chgpwd($newpwd,$userid)
	{
		$userid=strtolower($userid);
		$newpwd=sha1($newpwd);
		$db=& JFactory::getDBO();
		$where =array();
		
		$where []=' (block =0)';
		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
		$query = "UPDATE #__mat_users "
			. " SET password =".$db->Quote($db->getEscaped($newpwd,true),false)  
			. $where;
			
			$db->setQuery( $query );
			if( $db->query()){
				return true;
			}
			else
				return false;
			
	}
	
	function getinfo($userid)
	{
		$userid=strtolower($userid);
		
		$db=& JFactory::getDBO();
		$where =array();
		
		$where []=' (published >0)';
		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
		$query="select * from #__mat_profile ". $where;
		
		
		$result = $this->_getList( $query );
		
		return @$result[0];
	}
	
	function getID($userid)
	{
		$db=& JFactory::getDBO();
		$userid=strtolower($userid);
		$where = array();

		$where []=' (published >0)';
		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
		$query = "select id,image from #__mat_profile  " .$where; 
		
		$result = $this->_getList( $query );
		return @$result[0];
	}
	
	function segpartner($userid)
	{
		$db=& JFactory::getDBO();
		$userid=strtolower($userid);
		$crt=$this->partenerCriteria($userid);
		$gnd =strtolower($crt->gender);
		if ($gnd=='male')
			$gnd='female';
		else
			$gnd='male';
		
		$where = array();

		$where []=' (p.published >0)';
		$where []=' (p.userid = u.userid)';
		$where[] = ' (p.height between '.$db->Quote( $db->getEscaped( $crt->lfheight1, true ), false )
					.' and '. $db->Quote( $db->getEscaped( $crt->lfheight2, true ), false ) .' )';
		
		$where[] = ' (p.age between '.$db->Quote( $db->getEscaped( $crt->lfage1, true ), false ) 
					.' and '. $db->Quote( $db->getEscaped( $crt->lfage2, true ), false ) .' )';
						
		
		$where[] = ' (lower(p.gender) ='.$db->Quote( $db->getEscaped( strtolower($gnd), true ), false ).')';
		$where[] = ' (lower(p.mstatus) ='.$db->Quote( $db->getEscaped( strtolower($crt->lfmstatus), true ), false ).')';
		$where[] = ' (lower(p.community) ='.$db->Quote( $db->getEscaped( strtolower($crt->lfcommunity), true ), false ).')';
		$where[] = ' (lower(p.mothertongue) ='.$db->Quote( $db->getEscaped( strtolower($crt->lfmothertongue), true ), false ).')';
		$where[] = ' (lower(p.complexion) ='.$db->Quote( $db->getEscaped( strtolower($crt->lfcomplexion), true ), false ).')';
		$where[] = ' (lower(p.profession) ='.$db->Quote( $db->getEscaped( strtolower($crt->lfprofession), true ), false ).')';
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		$query = "select p.* , u.username from #__mat_profile p, #__mat_users u  " .$where; 
			
		$result = $this->_getList( $query );
		return $result;
	}
	
	function partenerCriteria($userid)
	{
		$db=& JFactory::getDBO();
		$userid=strtolower($userid);
		$where = array();

		$where []=' (published >0)';
		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
		$query = "select gender, lfheight1, lfheight2, lfage1,lfage2, lfmstatus, lfcommunity, lfmothertongue, ".
			" lfcomplexion, lfprofession, lfotherrequirement from #__mat_profile  " .$where; 
		
		$result = $this->_getList( $query );
		return @$result[0];	
	
	}
}

?>