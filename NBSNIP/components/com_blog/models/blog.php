<?php 

	/*
		BLOG Categories model 
	*/

	// Direct Acces not allow 
	defined ('_JEXEC') or die ('Restricted Access');
	
	require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'user.php');
	require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'blog.php');
	require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'comment.php');
	
	jimport ('joomla.application.component.model');
	jimport ('joomla.mail.helper');
	jimport('joomla.utilities.date');

class blogModelBlog extends JModel
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
		$query = "select * from #__blog_user where lower(emailid)='".$emailid."'";
		$result = $this->_getList( $query );
		return @$result[0];
	}
	function duplicateuserid($userid)
	{	
		$userid=strtolower($userid);
		$query = "select * from #__blog_user where lower(userid)='".$userid."'";
		$result = $this->_getList( $query );
		return @$result[0];
	}
	function validateUseridEmailid($userid, $emailid)
	{	
		$userid=strtolower($userid);
		$emailid=strtolower($emailid);
		$query = "select * from #__blog_user where lower(userid)='".$userid."' and lower(emailid) ='".$emailid."'";
		$result = $this->_getList( $query );
		return @$result[0];
	}
	
	function saveuser($data,$new=false)
	{
		
		if ($new)
		{
			$dateNow= new JDate();
			$data['registrationdate'] = $dateNow->toMySQL();
			$data['password']=sha1($data['password']);
			$data['addedbyip']=$_SERVER['REMOTE_ADDR'];
			$data['published']=0;
		}
		
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
	
	function imageupdate($userid,$filename)
	{
		$userid=strtolower($userid);
		$query = "UPDATE #__blog_user "
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
   
		$query = "select * from #__blog_user where userid='".$userid."' and activation= '".$acode."'";
		$result = $this->_getList( $query );
  
		if (count($result) == 1)
		{
			$db 	=& JFactory::getDBO();

			$query = "UPDATE #__blog_user "
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

		$query = "UPDATE #__blog_user "
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

		$query = "select * from #__blog_user " .$where; 
		
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

		$query = "select published from #__blog_user " .$where; 
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
		$query = "UPDATE #__blog_user "
		. " SET lastvisitdate ='" . $datesql . "', "
		. "  lastvisitip ='" . $lastVisitIp . "'"
		. " WHERE lower(userid)='".$userid."'";
		
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		$db->query();
	}	
	
	function blogDeskData($userid)
	{
		$userid=strtolower($userid);
	
		$db=& JFactory::getDBO();
		
		$where =array();
		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		$query = "select count(id) as total from #__blog_blogs " .$where; 
		$res1 = $this->_getList( $query );
		
				
		$where =array();		
		$where[] = ' (published >0) ';	
		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		$query = "select count(id) as total from #__blog_blogs " .$where; 
		$res2 = $this->_getList( $query );
		
		
		$query="SELECT count(bc.id) as total FROM  jos_blog_comment bc ,".
				" jos_blog_blogs bb where (bc.blogid= bb.id) and ( bc.blogid in  ".
				" (select id from jos_blog_blogs where userid='" . $userid ."'))";
		$res3 = $this->_getList( $query );
		
		$where =array();		
		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';				
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		$query = "select lastvisitdate from #__blog_user " .$where; 		
		$res4 = $this->_getList( $query );
		
		
		$where =array();		
		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';				
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		$query = "select image from #__blog_user " .$where; 		
		$res5 = $this->_getList( $query );
		
		
		$result['ttlblg'] =$res1[0]->total;
		$result['ttlpblg'] =$res2[0]->total;
		$result['ttlcmt'] =$res3[0]->total;
		$result['lstvstdate'] =$res4[0]->lastvisitdate;
		$result['image'] =$res5[0]->image;
		return $result;
		
	}
	
	function saveBlog ($data)
	{
				
		$row =& JTable::getInstance('blog','Table');
		
		$dateNow= new JDate();
		$data['bdate'] = $dateNow->toMySQL();
		$data['addedbyip']=$_SERVER['REMOTE_ADDR'];
		$data['published']=1;
		
		
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
		
	
	function getBlogs($userid)
	{
		$userid=strtolower($userid);
		$db=& JFactory::getDBO();
		$where =array();

		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select * from #__blog_blogs " .$where; 
		$result = $this->_getList( $query );
		
		return $result;
	}
	
	function getBlogsToRead($userid,$id)
	{
		$userid=strtolower($userid);
		
		$db=& JFactory::getDBO();
		$where =array();
		
		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where[] = ' (id ='.$db->Quote( $db->getEscaped( $id, true ), false ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select * from #__blog_blogs " .$where; 
		$result = $this->_getList( $query );
		
		return @$result[0];
	}
	
	function deleteBlog($userid, $id)
	{
		$userid=strtolower($userid);

		$db=& JFactory::getDBO();
		$where =array();
		
		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where[] = ' (id ='.$db->getEscaped( $id, true ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "delete from #__blog_blogs " .$where;
		
	
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		if ($db->query())
			return true;	
		else
			return false;	
	}
	
	function publishBlog($userid,$id,$state=0)
	{
		$userid=strtolower($userid);
			$db 	=& JFactory::getDBO();
		$where =array();
		
		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		$where[] = ' (id ='.$db->getEscaped( $id, true ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
		$query = "UPDATE #__blog_blogs "
		. " SET published =" . $state . $where;
		
		$db->setQuery( $query );
		
		if( $db->query())
			return true;
		else
			return false;
			
	}
	
	function getComnt($userid)
	{
		$userid=strtolower($userid);
		$db=& JFactory::getDBO();
		$where =array();

		$query="SELECT bc.*, bb.topic   FROM  jos_blog_comment bc , ".
		" jos_blog_blogs bb where (bc.blogid= bb.id) and ( bc.blogid in ".
		" (select id from jos_blog_blogs where userid='".$userid. "'))";
		$result = $this->_getList( $query );	
		return $result;
	}
	
	function getCmtToRead($userid,$id)
	{
		$userid=strtolower($userid);
		
		$db=& JFactory::getDBO();
		
		$query="SELECT bc.*, bb.topic   FROM  jos_blog_comment bc , ".
		" jos_blog_blogs bb where (bc.blogid= bb.id) and ( bc.blogid in ".
		" (select id from jos_blog_blogs where userid='".$userid. "')) and " .
		" (bc.id = '" .$id."' )";

		$result = $this->_getList( $query );
		
		return @$result[0];
	}
	
	function SaveEditCmt($data)
	{
		$row =& JTable::getInstance('comment','Table');
		
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
	
	function deleteCmt($userid,$id)
	{
		$userid=strtolower($userid);
		
		if(!count($this->getCmtToRead($userid,$id)))
			return false;
		

		$db=& JFactory::getDBO();
		$where =array();
		
		$where[] = ' (id ='.$db->getEscaped( $id, true ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "delete from #__blog_comment " .$where;
			
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		if ($db->query())
			return true;	
		else
			return false;	
		
	
	}
	
	function publishCmt($userid,$id,$state=0)
	{
		$userid=strtolower($userid);
		
		if(!count($this->getCmtToRead($userid,$id)))
			return false;
		
		$db 	=& JFactory::getDBO();
		$where =array();
	
		$where[] = ' (id ='.$db->getEscaped( $id, true ).')';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
		$query = "UPDATE #__blog_comment "
		. " SET published =" . $state . $where;
		
		$db->setQuery( $query );
		
		if( $db->query())
			return true;
		else
			return false;
			
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
		
		$query = "UPDATE #__blog_user "
		. " SET password ='" . $password . "'"
		. $where;
		
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );

		if( $db->query())
			return true;
		else
			return false;
	}
	
	function loadUserProfile($userid)
	{
		$userid=strtolower($userid);
		
		$db=& JFactory::getDBO();
		$where =array();
		
		$where[]= ' (published > 0)';
		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
		$query = "select * from #__blog_user " .$where; 
		$result = $this->_getList( $query );
		
		return @$result[0];
	}
	
	function getUserID($userid)
	{
		$userid=strtolower($userid);
		
		$db=& JFactory::getDBO();
		$where =array();
		
		$where[]= ' (published > 0)';
		$where[] = ' (lower(userid) ='.$db->Quote( $db->getEscaped( $userid, true ), false ).')';
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select id from #__blog_user " .$where; 
		$result = $this->_getList( $query );
		
		return @$result[0];
	}
	
	function loadBlogByDate($bdate=null)
	{
		if (!$bdate)
		{
			$dateNow= new JDate();
			$bdate = $dateNow->toFormat('%Y-%m-%d');	
		}
		
		
		$db=& JFactory::getDBO();
		$where =array();
		
		$where[]= ' (published > 0)';
		$where[] = ' ( date(bdate) ='.$db->Quote( $db->getEscaped( $bdate, true ), false ).')';
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select * from #__blog_blogs " .$where; 
		
		$result = $this->_getList( $query );
		
		return $result;
	}
	
	function loadBlogFullDetail($id)
	{
		$db=& JFactory::getDBO();
		$where =array();
		
		$where[]= ' ( b.published > 0)';
		$where[]= ' ( u.published > 0)';
		$where[]= ' ( lower(b.userid) = lower(u.userid ))';
		$where[] = ' ( b.id ='.$db->Quote( $db->getEscaped( $id, true ), false ).')';
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select b.*, u.image from #__blog_blogs b , #__blog_user u " .$where; 
		$result = $this->_getList( $query );
		
		return @$result[0];
	}
	
	function loadBlogComnt($id)
	{
		$db=& JFactory::getDBO();
		$where =array();
		
		$where[]= ' ( published > 0)';
		
		$where[] = ' ( blogid ='.$db->Quote( $db->getEscaped( $id, true ), false ).')';
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select * from #__blog_comment " .$where; 
		
		$result = $this->_getList( $query );
		
		return $result;
	}
	
	function loadBlogByTopic($txtsOnTopic)
	{
		$txtsOnTopic=strtolower($txtsOnTopic);
		$db=& JFactory::getDBO();
		$where =array();
		
		$where[]= ' (published > 0)';
		$where[] = ' ( lower(topic) LIKE '.$db->Quote( '%'.	$db->getEscaped( $txtsOnTopic, true ).'%', false ).')';
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select * from #__blog_blogs " .$where; 
		
		$result = $this->_getList( $query );
		
		return $result;
	}
	
	function loadBlogOfBlogger($txtBlogOfBlogger)
	{
		$txtBlogOfBlogger=strtolower($txtBlogOfBlogger);
		$db=& JFactory::getDBO();
		$where =array();
		
		$where[]= ' (published > 0)';
		$where[] = ' ( lower(userid) LIKE '.$db->Quote( '%'.	$db->getEscaped( $txtBlogOfBlogger, true ).'%', false ).')';
		
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select * from #__blog_blogs " .$where; 
		
		$result = $this->_getList( $query );
		
		return $result;
	}
}

?>