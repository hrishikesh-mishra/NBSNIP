<?php
 
 /* 
	yellow page Medical Controller
	
 */


 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class yellowpageControllerMedical extends JController
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
		JRequest::setVar('view','medicalInput');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $modelMedical =& $this->getModel('Medical');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','medical');
		 }

		 $this->_flag=0;

		 parent::display();
		 $modelMedical->getPagination();
	 }

	 function save()
	 {

		$data = JRequest::get('POST');
		$data['description'] = JRequest::getVar( 'description', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		$data['yid']=2;

		$params = JRequest::getVar( 'params', array(), 'post', 'array' );
		$model = $this->getModel('medical');

		if ($model->save($data, $params))
		{
			$message =JText::_('Medical Information Saved'); 
		}
		else
		{
			$message= JText::_('Medical Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_yellowpage&controller=medical', $message );
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('medical');
		if ($model->changeMedical($cid,1))
		{
		$message =JText::_('Medical Information Published '); 
		}
		else
		{
			$message= JText::_('Medical publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_yellowpage&controller=medical', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('Medical');
		if ($model->changeMedical($cid,0))
		{
		$message =JText::_('Medical unPublished'); 
		}
		else
		{
			$message= JText::_('Medical publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_yellowpage&controller=medical', $message );
	}
	function remove()
	{
		$model = $this->getModel('Medical');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Content Could not be Deleted' );
		} else {
			$msg = JText::_( 'Content(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_yellowpage&controller=medical', $msg );
	}


	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_yellowpage&controller=medical', $msg );
	}
				
}
?>



