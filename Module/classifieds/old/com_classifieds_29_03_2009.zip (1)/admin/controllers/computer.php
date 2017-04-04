<?php
 
 /* 
	Classifieds Computer Controller
	
 */


 // direct access not allowed 

defined('_JEXEC') or die ('Ristricted Access ');

 jimport('joomla.application.component.controller');

 class classifiedsControllerComputer extends JController
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
		JRequest::setVar('view','computerInput');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $modelComputer =& $this->getModel('Computer');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','computer');
		 }

		 $this->_flag=0;

		 parent::display();
		 $modelComputer->getPagination();
	 }

	 function save()
	 {

		$data = JRequest::get('POST');
		$data['description'] = JRequest::getVar( 'description', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		$data['cid']=4;

		$params = JRequest::getVar( 'params', array(), 'post', 'array' );
		$model = $this->getModel('Computer');

		if ($model->save($data, $params))
		{
			$message =JText::_('Computer Information Saved'); 
		}
		else
		{
			$message= JText::_('Computer Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=computer', $message );
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('computer');
		if ($model->changeComputer($cid,1))
		{
		$message =JText::_('Computer Information Published '); 
		}
		else
		{
			$message= JText::_('Computer publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=computer', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('Computer');
		if ($model->changeComputer($cid,0))
		{
		$message =JText::_('Computer unPublished'); 
		}
		else
		{
			$message= JText::_('Computer publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=computer', $message );
	}
	function remove()
	{
		$model = $this->getModel('Computer');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Content Could not be Deleted' );
		} else {
			$msg = JText::_( 'Content(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_classifieds&controller=computer', $msg );
	}


	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_classifieds&controller=computer', $msg );
	}
				
}
?>



