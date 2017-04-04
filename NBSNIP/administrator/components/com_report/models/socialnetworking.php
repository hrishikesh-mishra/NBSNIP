<?php 


	// Direct Acces not allow 
	defined ('_JEXEC') or die ('Restricted Access');

	jimport ('joomla.application.component.model');

	class reportModelSocialNetworking extends JModel
	{  

	function __construct()
	{
		parent::__construct();
	}
	
	function &getUser()
	{
			$query = "select id,userid from #__sn_user "; 
			$result= $this->_getList($query);
			return $result;
		
	}
	
	function allUsrRpt()
	{
		$query="select u.id, u.userid, p.firstname, p.lastname from #__sn_user u, #__sn_profile p where u.userid = p.userid";
		$result= $this->_getList($query);
		return $result;
	}
	function userSrap($uid)
	{
		$query="select * from #__sn_scrap where sender='". $uid. "'" ;

		$result= $this->_getList($query);
		return $result;
	}
	
	function userAct($uid)
	{
		$query="select * from #__sn_user u , #__sn_profile p where p.userid=u.userid and u.userid='". $uid. "'" ;
		$result= $this->_getList($query);
	 	return @$result[0];
	}	
	
	function userGrp($uid)
	{
		$query="select * from #__sn_group  where createdby='". $uid. "'" ;
		
		$result= $this->_getList($query);
	 	return $result;
	}
}
?>