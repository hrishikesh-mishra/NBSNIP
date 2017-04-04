<?php
 
 /* 
	Developer Categories Controller
	
 */


 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class developerzoneControllerCategories extends JController
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
		JRequest::setVar('view','CategoriesInput');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $modelCategories =& $this->getModel('Categories');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','Categories');
		 }

		 $this->_flag=0;

		 parent::display();
		 $modelCategories->getPagination();
	 }

	 function save()
	 {
		
		
		$data = JRequest::get('POST');
		$data['about'] = JRequest::getVar( 'about', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		$model = $this->getModel('Categories');

		if ($model->save($data))
		{
			$message =JText::_('Developer-Zone Categories  Information Saved'); 
		}
		else
		{
			$message= JText::_('Developer-Zone Categories Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_developerzone&controller=Categories', $message );
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('Categories');
		if ($model->changeCategories($cid,1))
		{
		$message =JText::_('Developer-Zone Categories Information Published '); 
		}
		else
		{
			$message= JText::_('Developer-Zone Categories publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_developerzone&controller=Categories', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('Categories');
		if ($model->changeCategories($cid,0))
		{
		$message =JText::_('Developer-Zone Categories unPublished'); 
		}
		else
		{
			$message= JText::_('Developer-Zone Categories publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_developerzone&controller=Categories', $message );
	}
	function remove()
	{
		$model = $this->getModel('Categories');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Developer-Zone Categories Could not be Deleted' );
		} else {
			$msg = JText::_( 'Developer-Zone Category Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_developerzone&controller=categories', $msg );
	}

	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_developerzone&controller=Categories', $msg );
	}			
}
?>



