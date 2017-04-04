<?php 

	

	// Direct Acces not allow 
	defined ('_JEXEC') or die ('Restricted Access');

	jimport ('joomla.application.component.model');

	class reportModelBlog extends JModel
	{  

	function __construct()
	{
		parent::__construct();
	}
	
	function &getUser()
	{
			$query = "select id,userid from #__blog_user "; 
			$result= $this->_getList($query);
			return $result;
		
	}
	
	function allUsrRpt()
	{
		$query="select id, userid, username from #__blog_user";
		$result= $this->_getList($query);
		return $result;
	}
	function userBlog($uid)
	{
		$query="select * from #__blog_blogs where userid='". $uid. "'" ;
		
		$result= $this->_getList($query);
		return $result;
	}
	
	function userAct($uid)
	{
		$query="select * from #__blog_user where userid='". $uid. "'" ;
		$result= $this->_getList($query);
	 	return @$result[0];
	}	

}
?>