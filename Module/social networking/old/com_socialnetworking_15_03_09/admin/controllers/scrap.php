<?php
 
 /* 
	Social Networking Scrap Controller
	
 */


 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class socialnetworkingControllerScrap extends JController
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
		JRequest::setVar('view','scrapEdit');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $model =& $this->getModel('Scrap');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','scrap');
		 }

		 $this->_flag=0;

		 parent::display();
		 $model->getPagination();
	 }

	 function save()
	 {

		$data = JRequest::get('POST');		
		
		$model = $this->getModel('Scrap');

		if ($model->save($data))
		{
			$message =JText::_('Scrap Information Saved'); 
		}
		else
		{
			$message= JText::_('Scrap Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_socialnetworking&controller=scrap', $message );
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('Scrap');
		if ($model->changeScrap($cid,1))
		{
		$message =JText::_('Scrap Information Published '); 
		}
		else
		{
			$message= JText::_('Scrap publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_socialnetworking&controller=scrap', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('scrap');
		if ($model->changeScrap($cid,0))
		{
		$message =JText::_('Scrap unPublished'); 
		}
		else
		{
			$message= JText::_('Scrap publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_socialnetworking&controller=scrap', $message );
	}
	
	function remove()
	{
		$model = $this->getModel('scrap');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Content Could not be Deleted' );
		} else {
			$msg = JText::_( 'Content(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_socialnetworking&controller=scrap', $msg );
	}

	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_socialnetworking&controller=scrap', $msg );
	}
	
	
				
}
?>



