<?php
 
 /* 
	Matrimonial User Controller
	
 */


 // direct access not allowed 

defined('_JEXEC') or die ('Ristricted Access ');

 jimport('joomla.application.component.controller');

 class matrimonialControllerUser extends JController
 {
		
		var $_flag=0;

	function __construct()
	{
		$this->_flag=0;

		parent::__construct();	
		$this->registerTask('mail','mail');
		
	}

	function edit()
	 {
		JRequest::setVar('view','useredit');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $model =& $this->getModel('user');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','user');
		 }

		 $this->_flag=0;

		 parent::display();
		 $model->getPagination();
	 }

	 function save()
	 {

		$data = JRequest::get('POST');
				
		$model = $this->getModel('user');

		if ($model->save($data))
		{
			$message =JText::_('User information is saved'); 
		}
		else
		{
			$message= JText::_('User Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_matrimonial&controller=user', $message );
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('user');
		if ($model->changeUser($cid,1))
		{
		$message =JText::_('User unblocked.'); 
		}
		else
		{
			$message= JText::_('User unblocked Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_matrimonial&controller=user', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('user');
		if ($model->changeUser($cid,0))
		{
		$message =JText::_('User Blocked'); 
		}
		else
		{
			$message= JText::_('User Blocked Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_matrimonial&controller=user', $message );
	}
	function remove()
	{
		$model = $this->getModel('user');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Content Could not be Deleted' );
		} else {
			$msg = JText::_( 'Content(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_matrimonial&controller=user', $msg );
	}


	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_matrimonial&controller=user', $msg );
	}
	
	function mail()
	{
		$model= $this->getModel('useredit');
		$data=$model->getData();
		
		if(!$data->id)
		{
			$msg = JText::_( 'First, select the user to mail.' );
			$this->setRedirect( 'index.php?option=com_matrimonial&controller=user', $msg );
			return;
		}
		echo $data->userid;
		
		
			require_once (JPATH_COMPONENT.DS.'views'.DS.'useremail'.DS.'view.html.php');
			$view = new matrimonialViewUserEmail();
			$view->assign('data', $data);
			$view->display('email');
			return true;
		
	}
	
	function sendmail()
	{
		
		
		$recipient=JRequest::getVar('emailid');
		$subject = trim(JRequest::getVar('subject'));
		$body=trim(JRequest::getVar('body'));
		$flag=false;
		$msg ='';
		
		
		if (empty($subject))
		{	
			$msg.='Subject is empty. ';
			$flag=true;
		}
		
		if (empty($body))
		{	
			$msg.='Message is empty. ';
			$flag=true;
		}
		
		if ($flag)
		{
			$this->setRedirect( 'index.php?option=com_matrimonial&controller=user', $msg );
			return false;
		}
		
		global $mainframe;
		
		$sitename=$mainframe->getCfg('sitename');
		$mailfrom=$mainframe->getCfg('mailfrom');
		$fromname=$mainframe->getCfg('fromname');

		
		$body= html_entity_decode($body, ENT_QUOTES);
		JUtility::sendMail($mailfrom, $fromname, $recipient, $subject,$body);
		
		$this->setRedirect( 'index.php?option=com_matrimonial&controller=user','' );
					
	}
}
?>



