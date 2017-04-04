<?php
 
 /* 
	yellow page Hotel and Loge Controller
	
 */


 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class yellowpageControllerHotelLodge extends JController
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
		JRequest::setVar('view','hotellodgeInput');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $modelHotelLodge =& $this->getModel('HotelLodge');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','HotelLodge');
		 }

		 $this->_flag=0;

		 parent::display();
		 $modelHotelLodge->getPagination();
	 }

	 function save()
	 {

		$data = JRequest::get('POST');
		$data['description'] = JRequest::getVar( 'description', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		$data['yid']=3;

		$params = JRequest::getVar( 'params', array(), 'post', 'array' );
		$model = $this->getModel('hotellodge');

		if ($model->save($data, $params))
		{
			$message =JText::_('Hotel Lodge Information Saved'); 
		}
		else
		{
			$message= JText::_('Hotel Lodge Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_yellowpage&controller=hotellodge', $message );
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('hotellodge');
		if ($model->changeHotelLodge($cid,1))
		{
		$message =JText::_('HotelLodge Information Published '); 
		}
		else
		{
			$message= JText::_('Hotel Lodge publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_yellowpage&controller=hotellodge', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('hotellodge');
		if ($model->changeHotelLodge($cid,0))
		{
		$message =JText::_('Hotel Lodge unPublished'); 
		}
		else
		{
			$message= JText::_('Hotel Lodge publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_yellowpage&controller=hotellodge', $message );
	}
	function remove()
	{
		$model = $this->getModel('hotellodge');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Content Could not be Deleted' );
		} else {
			$msg = JText::_( 'Content(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_yellowpage&controller=hotellodge', $msg );
	}


	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_yellowpage&controller=hotellodge', $msg );
	}
				
}
?>



