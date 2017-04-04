<?php
 
 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class reportControllerClassifieds extends JController
 {
		


	function __construct()
	{
		$this->_flag=0;

		parent::__construct();
		
	}


	function display()
	{	
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'classifieds'.DS.'view.html.php');
		$view = new reportViewClassifieds();		
		
		$view->display(); 		
		 
	}
	function realstRpt()
	{
		$model= $this->getModel('classifieds');
		$realst= $model->realState();
	
		require_once (JPATH_COMPONENT.DS.'views'.DS.'classifieds'.DS.'view.pdf.php');
		$view = new reportViewClassifieds();
		$view->assign('realst',$realst);
		$view->assign('msg','RealState Classifieds Report');
		$view->display('realstrpt'); 
		
		return true;
	}
	function jobRpt() 
	{
		$model= $this->getModel('classifieds');
		$job= $model->jobRpt();
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'classifieds'.DS.'view.pdf.php');
		$view = new reportViewClassifieds();
		$view->assign('job',$job);
		$view->assign('msg','Jobs Classifieds Report');
		$view->display('jobrpt'); 
		
		return true;
	}
	function realStDefRpt() 
	{
		$model= $this->getModel('classifieds');
		$ven= $model->realStateDefaulter();
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'classifieds'.DS.'view.pdf.php');
		$view = new reportViewClassifieds();
		$view->assign('ven',$ven);
		$view->assign('msg','Real State Defaulter List');
		$view->display('realDefRpt'); 
		
		return true;
	}
	
	function jobDefRpt() 
	{
		$model= $this->getModel('classifieds');
		$ven= $model->JobDefaulter();
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'classifieds'.DS.'view.pdf.php');
		$view = new reportViewClassifieds();
		$view->assign('ven',$ven);
		$view->assign('msg','Jobs Defaulter List');
		$view->display('realDefRpt'); 
		
		return true;
	}
	function sendMail()
	{
		$type =JRequest::getVar('type');
		$model=$this->getModel('classifieds');
		if ($type==1)
		{
			//JOBs
			$VenData =$model->JobDefaulter();
		}else if($type==2)
		{
			//Computer
			$VenData =$model->compDefaulter();
		}
		else if($type==3)
		{
			//Computer
			$VenData =$model->realStateDefaulter();
		}
		else if($type==4)
		{
			//Computer
			$VenData =$model->teaDefaulter();
		}
		
		for ($i=0, $n=count($VenData); $i<$n; $i++)
		{
			$row=$VenData[$i];
			$sitename=$mainframe->getCfg('sitename');
			$mailfrom=$mainframe->getCfg('mailfrom');
			$fromname=$mainframe->getCfg('fromname');
			$siteURL=JURI::base();
		
			$subject=JText::_('Your subscription is expired: ' ). " at ". $sitename;
			$subject= html_entity_decode($subject, ENT_QUOTES);
		
			$msg ="Hello " . $row->name. ". Your subscription  of " .$sitename. " is expired. Please contact of new subscription. ";
				
				
			$msg= html_entity_decode($msg, ENT_QUOTES);
			JUtility::sendMail($mailfrom, $fromname, $row->emailid, $subject,$msg);
		}
		
		$this->setRedirect('index.php?option=com_report&controller=classifieds', $message );
	
	}
}

?>



