<?php
 
 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class reportControllermatrimonial extends JController
 {
		


	function __construct()
	{
		$this->_flag=0;

		parent::__construct();
		
	}


	 function display()
	 {	
		$model= $this->getModel('matrimonial');
		$user= $model->getUser();
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'matrimonial'.DS.'view.html.php');
		$view = new reportViewMatrimonial();		
		$view->assign('user',$user);
		$view->display(); 		
		 
	 }
	 
	 function allUserRpt()
	{
		$model= $this->getModel('matrimonial');
		$allUser= $model->allUsrRpt();
		require_once (JPATH_COMPONENT.DS.'views'.DS.'matrimonial'.DS.'view.pdf.php');
		$view = new reportViewMatrimonial();
		$view->assign('allUser',$allUser);
		$view->display('allUserRpt'); 
		
		return true;
	}
	
	function userPrfRpt()
	{
		$uid = trim(JRequest::getVar('userid')); 
		
		$model= $this->getModel('matrimonial');
		$userPrf= $model->userPrf($uid);
		require_once (JPATH_COMPONENT.DS.'views'.DS.'matrimonial'.DS.'view.pdf.php');
		JRequest::getVar('format','pdf');
		$view = new reportViewMatrimonial();
		$view->assign('userPrf',$userPrf);
		
		$view->display('usrPrfRpt'); 
		
		return true;
	}
	function userAcitvityRpt()
	{
		$uid = trim(JRequest::getVar('userid')); 
		
		$model= $this->getModel('matrimonial');
		$userAct= $model->userAct($uid);
	
		require_once (JPATH_COMPONENT.DS.'views'.DS.'matrimonial'.DS.'view.pdf.php');
		$view = new reportViewMatrimonial();
		$view->assign('usrAct',$userAct);
		
		$view->display('usrActRpt'); 
		
		return true;
	}


	 				
}
?>



