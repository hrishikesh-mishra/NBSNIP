<?php
 
 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class reportControllerSocialNetworking extends JController
 {
		


	function __construct()
	{
		$this->_flag=0;

		parent::__construct();
		
	}


	 function display()
	 {	
		$model= $this->getModel('SocialNetworking');
		$user= $model->getUser();
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'SocialNetworking'.DS.'view.html.php');
		$view = new reportViewSocialNetworking();		
		$view->assign('user',$user);
		$view->display(); 		
		 
	 }
	 
	 function allUserRpt()
	{
		$model= $this->getModel('SocialNetworking');
		$allUser= $model->allUsrRpt();
		require_once (JPATH_COMPONENT.DS.'views'.DS.'SocialNetworking'.DS.'view.pdf.php');
		$view = new reportViewSocialNetworking();
		$view->assign('allUser',$allUser);
		$view->display('allUserRpt'); 
		
		return true;
	}
	
	function usrScrpRpt()
	{
		$uid = trim(JRequest::getVar('userid')); 
		
		$model= $this->getModel('SocialNetworking');
		$usrSrp= $model->userSrap($uid);
		require_once (JPATH_COMPONENT.DS.'views'.DS.'SocialNetworking'.DS.'view.pdf.php');
		$view = new reportViewSocialNetworking();
		$view->assign('usrSrp',$usrSrp);
		
		$view->display('usrScrap'); 
		
		return true;
	}
	function userAcitvityRpt()
	{
		$uid = trim(JRequest::getVar('userid')); 
		
		$model= $this->getModel('SocialNetworking');
		$userAct= $model->userAct($uid);
	
		require_once (JPATH_COMPONENT.DS.'views'.DS.'SocialNetworking'.DS.'view.pdf.php');
		$view = new reportViewSocialNetworking();
		$view->assign('usrAct',$userAct);
		
		$view->display('usrActRpt'); 
		
		return true;
	}
	
	function usrGrpRpt()
	{
		$uid = trim(JRequest::getVar('userid')); 
		
		$model= $this->getModel('SocialNetworking');
		$userGrp= $model->userGrp($uid);
	
		require_once (JPATH_COMPONENT.DS.'views'.DS.'SocialNetworking'.DS.'view.pdf.php');
		$view = new reportViewSocialNetworking();
		$view->assign('usrGrp',$userGrp);
		
		$view->display('usrGrp'); 
		
		return true;
	}
	
}
?>



