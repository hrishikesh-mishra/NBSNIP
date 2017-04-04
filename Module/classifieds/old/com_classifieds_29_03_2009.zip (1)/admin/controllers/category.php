<?php
 
 /* 
	Classifieds Category Controller
	
 */


 // direct access not allowed 

defined('_JEXEC') or die ('Ristricted Access ');

 jimport('joomla.application.component.controller');

 class classifiedsControllerCategory extends JController
 {
		
		var $_flag=0;

	function __construct()
	{
		$this->_flag=0;

		parent::__construct();
		
	}

	function edit()
	 {
		JRequest::setVar('view','categoryInput');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $modelCategory =& $this->getModel('Category');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','category');
		 }

		 $this->_flag=0;

		 parent::display();
		 $modelCategory->getPagination();
	 }

	 function save()
	 {

		$data = JRequest::get('POST');
		$data['description'] = JRequest::getVar( 'description', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		

		$model = $this->getModel('category');

		if ($model->save($data))
		{
			$message =JText::_('Category Information Saved'); 
		}
		else
		{
			$message= JText::_('Category Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=category', $message );
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('category');
		if ($model->changeCategory($cid,1))
		{
		$message =JText::_('Category Information Published '); 
		}
		else
		{
			$message= JText::_('Category publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=category', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('Category');
		if ($model->changeCategory($cid,0))
		{
		$message =JText::_('Category unPublished'); 
		}
		else
		{
			$message= JText::_('Category publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=category', $message );
	}
	
	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_classifieds&controller=category', $msg );
	}
				
}
?>



