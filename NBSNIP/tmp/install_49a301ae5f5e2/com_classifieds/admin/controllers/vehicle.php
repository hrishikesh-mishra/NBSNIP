<?php
 
 /* 
	Classifieds Vehicle Controller
	
 */


 // direct access not allowed 

defined('_JEXEC') or die ('Ristricted Access ');

 jimport('joomla.application.component.controller');

 class classifiedsControllerVehicle extends JController
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
		JRequest::setVar('view','vehicleInput');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $modelVehicle =& $this->getModel('Vehicle');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','vehicle');
		 }

		 $this->_flag=0;

		 parent::display();
		 $modelVehicle->getPagination();
	 }

	 function save()
	 {

		$data = JRequest::get('POST');
		$data['description'] = JRequest::getVar( 'description', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		$data['cid']=3;

		$params = JRequest::getVar( 'params', array(), 'post', 'array' );
		$model = $this->getModel('Vehicle');

		if ($model->save($data, $params))
		{
			$message =JText::_('Vehicle Information Saved'); 
		}
		else
		{
			$message= JText::_('Vehicle Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=vehicle', $message );
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('vehicle');
		if ($model->changeVehicle($cid,1))
		{
		$message =JText::_('Vehicle Information Published '); 
		}
		else
		{
			$message= JText::_('Vehicle publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=Vehicle', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('Vehicle');
		if ($model->changeVehicle($cid,0))
		{
		$message =JText::_('Vehicle unPublished'); 
		}
		else
		{
			$message= JText::_('Vehicle publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_classifieds&controller=vehicle', $message );
	}
	function remove()
	{
		$model = $this->getModel('Vehicle');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Content Could not be Deleted' );
		} else {
			$msg = JText::_( 'Content(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_classifieds&controller=vehicle', $msg );
	}


	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_classifieds&controller=vehicle', $msg );
	}
				
}
?>



