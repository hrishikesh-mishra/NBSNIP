<?php
defined( '_JEXEC' ) or die( 'Restricted access Controller' );
jimport ('joomla.application.component.controller');

class myextensionController extends JController
{

	var $_flag=0;

	function __construct()
	{
		$this->_flag=0;
		parent::__construct();
		$this->registerTask( 'add','edit' );


	}
	function edit()
	{
		JRequest::setVar( 'view', 'foobarinput' );
		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar('hidemainmenu', 1);
		$this->_flag=1;
		$this->display();
	}
	function display()
	{
		$modelFoobar =& $this->getModel('Foobar');
		$modelFoobar->hit();
				
				
		if ($this->_flag==0)
		{
			JRequest::setVar( 'view', 'foobar' );
		}
		$this->_flag=0;
		
		parent::display();
		$modelFoobar->getPagination();


	}



	function save()
	{
		$data = JRequest::get('POST');
		$data['content'] = JRequest::getVar( 'content', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		$FilePa= JRequest::getVar( 'upfile', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		?>
	<script language="javascript" type="text/javascript">
		alert("<?php $filePa; ?>");
	</script>
<?php


		$params = JRequest::getVar( 'params', array(), 'post', 'array' );
		$model = $this->getModel('Foobar');
		echo  "In the Save Method <br><br>";
		if ($model->save($data, $params))
		{
			$message =JText::_('Foobar Saved'); 
		}
		else
		{
			$message= JText::_('Foobar Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_myextension', $message );

	}

	function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('Foobar');
		if ($model->changeFoobar($cid,1))
		{
		$message =JText::_('Foobar Published '); 
		}
		else
		{
			$message= JText::_('Foobar publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_myextension', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('Foobar');
		if ($model->changeFoobar($cid,0))
		{
		$message =JText::_('Foobar unPublished '); 
		}
		else
		{
			$message= JText::_('Foobar publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_myextension', $message );
	}
	function remove()
	{
		$model = $this->getModel('foobar');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Content Could not be Deleted' );
		} else {
			$msg = JText::_( 'Content(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_myextension', $msg );
	}

	/**
	 * cancel editing a record
	 * @return void
	 */
	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_myextension', $msg );
	}



				
}
?>