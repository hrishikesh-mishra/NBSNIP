<?php
 
 /* 
	Classifieds Vendor Controller
	
 */


 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class classifiedsControllerVendor extends JController
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
		JRequest::setVar('view','vendorInput');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $modelVendor =& $this->getModel('Vendor');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','vendor');
		 }

		 $this->_flag=0;

		 parent::display();
		 $modelVendor->getPagination();
	 }

	 function save()
	 {

		$data = JRequest::get('POST');
		$data['about'] = JRequest::getVar( 'about', '', 'POST', 'string', JREQUEST_ALLOWRAW );

		
		$model = $this->getModel('vendor');

		if ($model->save($data))
		{
			$message =JText::_('Vendor  Information Saved'); 
		}
		else
		{
			$message= JText::_('Vendor Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=vendor', $message );
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('vendor');
		if ($model->changeVendor($cid,1))
		{
		$message =JText::_('Vendor Information Published '); 
		}
		else
		{
			$message= JText::_('Vendor publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=vendor', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('Vendor');
		if ($model->changeVendor($cid,0))
		{
		$message =JText::_('Vendor unPublished'); 
		}
		else
		{
			$message= JText::_('Vendor publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=vendor', $message );
	}

	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_classifieds&controller=vendor', $msg );
	}
				
}
?>



