<?php
 
 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class reportControllerBlog extends JController
 {
		


	function __construct()
	{
		$this->_flag=0;

		parent::__construct();
		
	}


	 function display()
	 {	
		$model= $this->getModel('blog');
		$user= $model->getUser();
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'blog'.DS.'view.html.php');
		$view = new reportViewBlog();		
		$view->assign('user',$user);
		$view->display(); 		
		 
	 }
	 
	 function allUserRpt()
	{
		$model= $this->getModel('blog');
		$allUser= $model->allUsrRpt();
		require_once (JPATH_COMPONENT.DS.'views'.DS.'blog'.DS.'view.pdf.php');
		$view = new reportViewblog();
		$view->assign('allUser',$allUser);
		$view->display('allUserRpt'); 
		
		return true;
	}
	
	function userBlgRpt()
	{
		$uid = trim(JRequest::getVar('userid')); 
		
		$model= $this->getModel('blog');
		$usrBlg= $model->userBlog($uid);
		require_once (JPATH_COMPONENT.DS.'views'.DS.'Blog'.DS.'view.pdf.php');
		$view = new reportViewBlog();
		$view->assign('usrBlg',$usrBlg);
		
		$view->display('usrBlog'); 
		
		return true;
	}
	function userAcitvityRpt()
	{
		$uid = trim(JRequest::getVar('userid')); 
		
		$model= $this->getModel('blog');
		$userAct= $model->userAct($uid);
	
		require_once (JPATH_COMPONENT.DS.'views'.DS.'blog'.DS.'view.pdf.php');
		$view = new reportViewblog();
		$view->assign('usrAct',$userAct);
		
		$view->display('usrActRpt'); 
		
		return true;
	}


	 				
}
?>



