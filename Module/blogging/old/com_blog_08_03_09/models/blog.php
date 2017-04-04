<?php 

	/*
		BLOG Categories model 
	*/

	// Direct Acces not allow 
	defined ('_JEXEC') or die ('Restricted Access');
	
	require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'user.php');
	
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

}

?>