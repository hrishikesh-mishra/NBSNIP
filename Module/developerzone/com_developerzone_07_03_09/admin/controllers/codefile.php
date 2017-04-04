<?php
 
 /* 
	Developer-Zone CodeFile Controller
	
 */


 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class developerzoneControllerCodeFile extends JController
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
		JRequest::setVar('view','codeFileInput');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $modelCodeFile =& $this->getModel('CodeFile');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','CodeFile');
		 }

		 $this->_flag=0;

		 parent::display();
		 $modelCodeFile->getPagination();
	 }

	 function save()
	 {
	 
		$data = JRequest::get('POST');
		$data['description'] = JRequest::getVar( 'description', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		
		$model = $this->getModel('CodeFile');

		if ($model->save($data))
		{
			$message =JText::_('Developer-Zone Code-File  Information Saved'); 
		}
		else
		{
			$message= JText::_('Developer-Zone Code-File Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_developerzone&controller=codeFile', $message );
		
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('CodeFile');
		if ($model->changeCodeFile($cid,1))
		{
		$message =JText::_('Developer-Zone Code-File Information Published '); 
		}
		else
		{
			$message= JText::_('Developer-Zone Code-File publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_developerzone&controller=codeFile', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('CodeFile');
		if ($model->changeCodeFile($cid,0))
		{
		$message =JText::_('Developer-Zone Code-File unPublished'); 
		}
		else
		{
			$message= JText::_('Developer-Zone Code-File publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_developerzone&controller=codeFile', $message );
	}
	function remove()
	{
		$model = $this->getModel('CodeFile');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Developer-Zone Code-File Could not be Deleted' );
		} else {
			$msg = JText::_( 'Developer-Zone Category Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_developerzone&controller=codeFile', $msg );
	}
	
	

	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_developerzone&controller=codeFile', $msg );
	}			
}
?>



