<?php
 
 /* 
	Matrimonail Message Controller
	
 */


 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class matrimonialControllerMsg extends JController
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
		JRequest::setVar('view','msgEdit');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $model =& $this->getModel('msg');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','msg');
		 }

		 $this->_flag=0;

		 parent::display();
		 $model->getPagination();
	 }

	 function save()
	 {

		$data = JRequest::get('POST');
		
		if (!$data[ipaddress])
			$data['ipaddress']='server';
		
		$model = $this->getModel('msg');

		if ($model->save($data))
		{
			$message =JText::_('Message  Information Saved'); 
		}
		else
		{
			$message= JText::_('Message Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_matrimonial&controller=msg', $message );
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('msg');
		if ($model->changeMsg($cid,1))
		{
		$message =JText::_('Message Information Published '); 
		}
		else
		{
			$message= JText::_('Message publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_matrimonial&controller=msg', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('msg');
		if ($model->changeMsg($cid,0))
		{
		$message =JText::_('Message unPublished'); 
		}
		else
		{
			$message= JText::_('Message publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_matrimonial&controller=msg', $message );
	}

	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_matrimonial&controller=msg', $msg );
	}
	
	function read()
	{
		$model = $this->getModel('msgedit');
		$msg= $model->getData();
		
		if (count($msg))
		{	
			require_once (JPATH_COMPONENT.DS.'views'.DS.'msgread'.DS.'view.html.php');
			$view = new matrimonialViewMsgRead();
	
			$view->assign('msg', $msg);
			$view->display('msg');
			return true;
		}
		
		$message="First Select the Message.";
		$link = JRoute::_('index.php?option=com_matrimonial&controller=msg', false);
		$this->setRedirect($link, $message);
		
	}
				
}
?>



