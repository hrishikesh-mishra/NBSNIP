<?php 

	
	// Direct Acces not allow 
	defined ('_JEXEC') or die ('Restricted Access');

	jimport ('joomla.application.component.model');

	class reportModelMatrimonial extends JModel
	{  

	function __construct()
	{
		parent::__construct();
	}
	
	function &getUser()
	{
			$query = "select id,userid from #__mat_users "; 
			$result= $this->_getList($query);
			return $result;
		
	}
	
	function allUsrRpt()
	{
		$query="select id, userid, username from #__mat_users ";
		$result= $this->_getList($query);
		return $result;
	}
	function userPrf($uid)
	{
		$query="select * from #__mat_profile where userid='". $uid. "'" ;
		
		$result= $this->_getList($query);
		return @$result[0];
	}
	
	function userAct($uid)
	{
		$query="select * from #__mat_users where userid='". $uid. "'" ;
		$result= $this->_getList($query);
	 	return @$result[0];
	}	

}
?>