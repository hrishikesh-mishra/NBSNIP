<?php
 
 /* 
	Blog Comment Controller
	
 */


 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class blogControllerComment extends JController
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
		JRequest::setVar('view','commentEdit');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $model =& $this->getModel('Comment');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','Comment');
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
		
		$model = $this->getModel('comment');

		if ($model->save($data))
		{
			$message =JText::_('Message  Information Saved'); 
		}
		else
		{
			$message= JText::_('Message Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_blog&controller=comment', $message );
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('comment');
		if ($model->changeComment($cid,1))
		{
		$message =JText::_('Message Information Published '); 
		}
		else
		{
			$message= JText::_('Message publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_blog&controller=comment', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('comment');
		if ($model->changeComment($cid,0))
		{
		$message =JText::_('Message unPublished'); 
		}
		else
		{
			$message= JText::_('Message publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_blog&controller=comment', $message );
	}
	
	function remove()
	{
		$model = $this->getModel('comment');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Content Could not be Deleted' );
		} else {
			$msg = JText::_( 'Content(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_blog&controller=comment', $msg );
	}

	function cancel()
	{
		$comment = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_blog&controller=comment', $msg );
	}
	
	
				
}
?>



