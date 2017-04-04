<?php
 
 /* 
	social-networking- profile -Controller
	
 */


 // direct access not allowed 

defined('_JEXEC') or die ('Ristricted Access ');

 jimport('joomla.application.component.controller');

 class socialnetworkingControllerProfile extends JController
 {
		
		var $_flag=0;

	function __construct()
	{
		$this->_flag=0;

		parent::__construct();
		
	}

	function edit()
	 {
		JRequest::setVar('view','profileEdit');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $model =& $this->getModel('profile');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','profile');
		 }

		 $this->_flag=0;

		 parent::display();
		 $model->getPagination();
	 }

	 function save()
	 {

		$data = JRequest::get('POST');
		
		$model = $this->getModel('Profile');

		if ($model->save($data))
		{
			$message =JText::_('User Profile Saved'); 			
		}
		else
		{
			$message= JText::_('User Profile Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_socialnetworking&controller=profile', $message );
		
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('profile');
		if ($model->changeProfile($cid,1))
		{
		$message =JText::_('User Profile Published '); 
		}
		else
		{
			$message= JText::_('User Profile publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_socialnetworking&controller=profile', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('profile');
		if ($model->changeProfile($cid,0))
		{
		$message =JText::_('Profile unPublished'); 
		}
		else
		{
			$message= JText::_('Profile publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_socialnetworking&controller=profile', $message );
	}
	function remove()
	{
		$model = $this->getModel('Profile');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Content Could not be Deleted' );
		} else {
			$msg = JText::_( 'Content(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_socialnetworking&controller=profile', $msg );
	}


	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_socialnetworking&controller=profile', $msg );
	}
	
		

				
}
?>



