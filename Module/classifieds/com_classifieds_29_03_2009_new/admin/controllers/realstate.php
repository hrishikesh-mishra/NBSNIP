<?php
 
 /* 
	Classifieds RealState Controller
	
 */


 // direct access not allowed 

defined('_JEXEC') or die ('Ristricted Access ');

 jimport('joomla.application.component.controller');

 class classifiedsControllerRealstate extends JController
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
		JRequest::setVar('view','realstateInput');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $modelRealstate =& $this->getModel('Realstate');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','realstate');
		 }

		 $this->_flag=0;

		 parent::display();
		 $modelRealstate->getPagination();
	 }

	 function save()
	 {

		$data = JRequest::get('POST');
		$data['description'] = JRequest::getVar( 'description', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		$data['cid']=1;

		$params = JRequest::getVar( 'params', array(), 'post', 'array' );
		$model = $this->getModel('realstate');

		if ($model->save($data, $params))
		{
			$message =JText::_('RealState Information Saved'); 
		}
		else
		{
			$message= JText::_('RealState Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=realstate', $message );
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('realstate');
		if ($model->changeRealstate($cid,1))
		{
		$message =JText::_('RealState Information Published '); 
		}
		else
		{
			$message= JText::_('RealState publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=realstate', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('Realstate');
		if ($model->changeRealstate($cid,0))
		{
		$message =JText::_('RealState unPublished'); 
		}
		else
		{
			$message= JText::_('RealState publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=realstate', $message );
	}
	function remove()
	{
		$model = $this->getModel('Realstate');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Content Could not be Deleted' );
		} else {
			$msg = JText::_( 'Content(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_classifieds&controller=realstate', $msg );
	}


	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_classifieds&controller=realstate', $msg );
	}
				
}
?>



