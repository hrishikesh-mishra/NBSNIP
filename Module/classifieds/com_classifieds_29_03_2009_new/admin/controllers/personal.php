<?php
 
 /* 
	Classifieds Personal Controller
	
 */


 // direct access not allowed 

defined('_JEXEC') or die ('Ristricted Access ');

 jimport('joomla.application.component.controller');

 class classifiedsControllerPersonal extends JController
 {
		
		var $_flag=0;

	function __construct()
	{
		$this->_flag=0;

		parent::__construct();
		$this->registerTask('add','edit');
	}

	function edit()
	 {
		JRequest::setVar('view','personalInput');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $modelPersonal =& $this->getModel('Personal');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','personal');
		 }

		 $this->_flag=0;

		 parent::display();
		 $modelPersonal->getPagination();
	 }

	 function save()
	 {

		$data = JRequest::get('POST');
		$data['description'] = JRequest::getVar( 'description', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		$data['cid']=5;

		$params = JRequest::getVar( 'params', array(), 'post', 'array' );
		$model = $this->getModel('personal');

		if ($model->save($data, $params))
		{
			$message =JText::_('Personal Information Saved'); 
		}
		else
		{
			$message= JText::_('Personal Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=personal', $message );
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('personal');
		if ($model->changePersonal($cid,1))
		{
		$message =JText::_('Personal Information Published '); 
		}
		else
		{
			$message= JText::_('Personal publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=personal', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('Personal');
		if ($model->changePersonal($cid,0))
		{
		$message =JText::_('Personal unPublished'); 
		}
		else
		{
			$message= JText::_('Personal publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=personal', $message );
	}
	function remove()
	{
		$model = $this->getModel('Personal');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Content Could not be Deleted' );
		} else {
			$msg = JText::_( 'Content(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_classifieds&controller=personal', $msg );
	}


	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_classifieds&controller=personal', $msg );
	}
				
}
?>



