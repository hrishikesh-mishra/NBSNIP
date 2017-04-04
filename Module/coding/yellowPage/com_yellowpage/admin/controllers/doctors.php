<?php
 
 /* 
	yellow page Doctors Controller
	
 */


 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class yellowpageControllerDoctors extends JController
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
		JRequest::setVar('view','doctorsInput');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $modelDoctors =& $this->getModel('Doctors');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','doctors');
		 }

		 $this->_flag=0;

		 parent::display();
		 $modelDoctors->getPagination();
	 }

	 function save()
	 {

		$data = JRequest::get('POST');
		$data['description'] = JRequest::getVar( 'description', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		$data['yid']=5;

		$params = JRequest::getVar( 'params', array(), 'post', 'array' );
		$model = $this->getModel('doctors');

		if ($model->save($data, $params))
		{
			$message =JText::_('Doctors Information Saved'); 
		}
		else
		{
			$message= JText::_('Doctors Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_yellowpage&controller=doctors', $message );
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('doctors');
		if ($model->changeDoctors($cid,1))
		{
		$message =JText::_('Doctors Information Published '); 
		}
		else
		{
			$message= JText::_('Doctors publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_yellowpage&controller=doctors', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('Doctors');
		if ($model->changeDoctors($cid,0))
		{
		$message =JText::_('Doctors unPublished'); 
		}
		else
		{
			$message= JText::_('Doctors publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_yellowpage&controller=Doctors', $message );
	}
	function remove()
	{
		$model = $this->getModel('Doctors');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Content Could not be Deleted' );
		} else {
			$msg = JText::_( 'Content(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_yellowpage&controller=doctors', $msg );
	}


	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_yellowpage&controller=doctors', $msg );
	}
				
}
?>



