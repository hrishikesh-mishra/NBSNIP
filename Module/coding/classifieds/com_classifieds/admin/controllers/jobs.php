<?php
 
 /* 
	Classifieds Jobs Controller
	
 */


 // direct access not allowed 

defined('_JEXEC') or die ('Ristricted Access ');

 jimport('joomla.application.component.controller');

 class classifiedsControllerJobs extends JController
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
		JRequest::setVar('view','jobsInput');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $modelJobs =& $this->getModel('Jobs');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','Jobs');
		 }

		 $this->_flag=0;

		 parent::display();
		 $modelJobs->getPagination();
	 }

	 function save()
	 {

		$data = JRequest::get('POST');
		$data['description'] = JRequest::getVar( 'description', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		$data['cid']=2;

		$params = JRequest::getVar( 'params', array(), 'post', 'array' );
		$model = $this->getModel('jobs');

		if ($model->save($data, $params))
		{
			$message =JText::_('Jobs Information Saved'); 
		}
		else
		{
			$message= JText::_('Jobs Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=jobs', $message );
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('jobs');
		if ($model->changeJobs($cid,1))
		{
		$message =JText::_('Jobs Information Published '); 
		}
		else
		{
			$message= JText::_('Jobs publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=jobs', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('Jobs');
		if ($model->changeJobs($cid,0))
		{
		$message =JText::_('Jobs unPublished'); 
		}
		else
		{
			$message= JText::_('Jobs publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=jobs', $message );
	}
	function remove()
	{
		$model = $this->getModel('Jobs');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Content Could not be Deleted' );
		} else {
			$msg = JText::_( 'Content(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_classifieds&controller=jobs', $msg );
	}


	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_classifieds&controller=jobs', $msg );
	}
				
}
?>



