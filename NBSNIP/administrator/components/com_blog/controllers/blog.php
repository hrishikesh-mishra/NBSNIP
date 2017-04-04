<?php
 
 /* 
	Blog - Blog -Controller
	
 */


 // direct access not allowed 

defined('_JEXEC') or die ('Ristricted Access ');

 jimport('joomla.application.component.controller');

 class blogControllerBlog extends JController
 {
		
		var $_flag=0;

	function __construct()
	{
		$this->_flag=0;

		parent::__construct();
		
	}

	function edit()
	 {
		JRequest::setVar('view','blogEdit');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $model =& $this->getModel('blog');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','blog');
		 }

		 $this->_flag=0;

		 parent::display();
		 $model->getPagination();
	 }

	 function save()
	 {

		$data = JRequest::get('POST');
		$data['blog']=JRequest::getVar( 'blog', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		
	
		
		$model = $this->getModel('blog');

		if ($model->save($data))
		{
			$message =JText::_('User Blog Saved'); 			
		}
		else
		{
			$message= JText::_('User blog Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_blog&controller=blog', $message );
		
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('blog');
		if ($model->changeBlog($cid,1))
		{
		$message =JText::_('User Blog Published '); 
		}
		else
		{
			$message= JText::_('User Blog publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_blog&controller=blog', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('blog');
		if ($model->changeBlog($cid,0))
		{
		$message =JText::_('Blog unPublished'); 
		}
		else
		{
			$message= JText::_('Blog publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_blog&controller=blog', $message );
	}
	function remove()
	{
		$model = $this->getModel('blog');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Content Could not be Deleted' );
		} else {
			$msg = JText::_( 'Content(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_blog&controller=blog', $msg );
	}


	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_blog&controller=blog', $msg );
	}
	
		

				
}
?>



