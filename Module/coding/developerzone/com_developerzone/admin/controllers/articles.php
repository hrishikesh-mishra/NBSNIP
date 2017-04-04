<?php
 
 /* 
	Developer articles Controller
	
 */
 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class developerzoneControllerArticles extends JController
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
		JRequest::setVar('view','articlesInput');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $modelarticles =& $this->getModel('Articles');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','articles');
		 }

		 $this->_flag=0;

		 parent::display();
		 $modelarticles->getPagination();
	 }

	 function save()
	 {
		
		
		$data = JRequest::get('POST');
		$data['article'] = JRequest::getVar( 'article', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		$model = $this->getModel('Articles');

		if ($model->save($data))
		{
			$message =JText::_('Developer-Zone Article  Information Saved'); 
		}
		else
		{
			$message= JText::_('Developer-Zone Articles Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_developerzone&controller=Articles', $message );
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('Articles');
		if ($model->changeArticles($cid,1))
		{
		$message =JText::_('Developer-Zone Article Information Published '); 
		}
		else
		{
			$message= JText::_('Developer-Zone Article publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_developerzone&controller=Articles', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('Articles');
		if ($model->changeArticles($cid,0))
		{
		$message =JText::_('Developer-Zone Articles unPublished'); 
		}
		else
		{
			$message= JText::_('Developer-Zone Articles publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_developerzone&controller=Articles', $message );
	}
	function remove()
	{
		$model = $this->getModel('Articles');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Developer-Zone Articles Could not be Deleted' );
		} else {
			$msg = JText::_( 'Developer-Zone Category Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_developerzone&controller=Articles', $msg );
	}

	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_developerzone&controller=Articles', $msg );
	}			
}
?>



