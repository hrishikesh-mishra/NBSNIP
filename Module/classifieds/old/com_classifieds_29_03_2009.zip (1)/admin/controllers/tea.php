<?php
 
 /* 
	Classifieds Tea Controller
	
 */


 // direct access not allowed 

defined('_JEXEC') or die ('Ristricted Access ');

 jimport('joomla.application.component.controller');

 class classifiedsControllerTea extends JController
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
		JRequest::setVar('view','TeaInput');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $modelTea =& $this->getModel('Tea');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','Tea');
		 }

		 $this->_flag=0;

		 parent::display();
		 $modelTea->getPagination();
	 }

	 function save()
	 {

		$data = JRequest::get('POST');
		$data['description'] = JRequest::getVar( 'description', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		$data['cid']=3;

		$params = JRequest::getVar( 'params', array(), 'post', 'array' );
		$model = $this->getModel('Tea');

		if ($model->save($data, $params))
		{
			$message =JText::_('Tea Information Saved'); 
		}
		else
		{
			$message= JText::_('Tea Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=tea', $message );
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('Tea');
		if ($model->changeTea($cid,1))
		{
		$message =JText::_('Tea Information Published '); 
		}
		else
		{
			$message= JText::_('Tea publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=tea', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('Tea');
		if ($model->changeTea($cid,0))
		{
		$message =JText::_('Tea unPublished'); 
		}
		else
		{
			$message= JText::_('Tea publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=tea', $message );
	}
	function remove()
	{
		$model = $this->getModel('Tea');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Content Could not be Deleted' );
		} else {
			$msg = JText::_( 'Content(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_classifieds&controller=Tea', $msg );
	}


	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_classifieds&controller=Tea', $msg );
	}
				
}
?>



