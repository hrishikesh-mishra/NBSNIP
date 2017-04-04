<?php
 
 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class reportControllerVisitor extends JController
 {
		


	function __construct()
	{
		$this->_flag=0;

		parent::__construct();
		
	}


	function display()
	{	
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'visitor'.DS.'view.html.php');
		$view = new reportViewVisitor();		
		
		$view->display(); 		
		 
	}
	function todayVisitor()
	{
		
		$model= $this->getModel('visitor');
		$vst= $model->todayVisitor();
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'visitor'.DS.'view.pdf.php');
		$view = new reportViewVisitor();
		$view->assign('vst',$vst);
		
		$view->display('visitorRpt'); 
		
		return true;
	}
	
	function visitorBetween()
	{
		$sdate = JRequest::getVar('sdate');
		$edate=JRequest::getVar('edate');
		$model= $this->getModel('visitor');
		$vst= $model->visitorBtwn($sdate,$edate);
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'visitor'.DS.'view.pdf.php');
		$view = new reportViewVisitor();
		$view->assign('vst',$vst);
		
		$view->display('visitorRpt'); 
		
		return true;
	}
}

?>



