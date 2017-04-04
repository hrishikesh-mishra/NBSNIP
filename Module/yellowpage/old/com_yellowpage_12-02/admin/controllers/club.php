<?php
 
 /* 
	yellow page Club Controller
	
 */


 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class yellowpageControllerClub extends JController
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
		JRequest::setVar('view','clubInput');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $modelClub =& $this->getModel('Club');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','club');
		 }

		 $this->_flag=0;

		 parent::display();
		 $modelClub->getPagination();
	 }

	 function save()
	 {

		$data = JRequest::get('POST');
		$data['description'] = JRequest::getVar( 'description', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		$data['yid']=4;

		$params = JRequest::getVar( 'params', array(), 'post', 'array' );
		$model = $this->getModel('club');

		if ($model->save($data, $params))
		{
			$message =JText::_('Club Information Saved'); 
		}
		else
		{
			$message= JText::_('Club Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_yellowpage&controller=club', $message );
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('club');
		if ($model->changeClub($cid,1))
		{
		$message =JText::_('Club Information Published '); 
		}
		else
		{
			$message= JText::_('Club publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_yellowpage&controller=club', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('Club');
		if ($model->changeClub($cid,0))
		{
		$message =JText::_('Club unPublished'); 
		}
		else
		{
			$message= JText::_('Club publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_yellowpage&controller=Club', $message );
	}
	function remove()
	{
		$model = $this->getModel('Club');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Content Could not be Deleted' );
		} else {
			$msg = JText::_( 'Content(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_yellowpage&controller=club', $msg );
	}


	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_yellowpage&controller=club', $msg );
	}
				
}
?>



