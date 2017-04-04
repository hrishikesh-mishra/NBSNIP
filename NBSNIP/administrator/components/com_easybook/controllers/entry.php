<?php
/**
 * @version $Id: entry.php 640 2008-03-18 09:23:58Z snipersister $
 * @package    Easybook
 * @link http://www.easy-joomla.org
 * @license    GNU/GPL
 */

// no direct access

defined( '_JEXEC' ) or die( 'Restricted access' );


/**
 * Easybook Component Controller
 *
 * @package    Easybook
 */
class EasybookControllerEntry extends JController
{

	var $_access = null;

	/**
	 * constructor (registers additional tasks to methods)
	 * @return void
	 */
	function __construct()
	{
    	parent::__construct();

    	// Register Extra tasks
    	$this->registerTask( 'add'  ,     'edit' );
	}

	function edit()
	{
	    JRequest::setVar( 'view', 'entry' );
	    JRequest::setVar( 'layout', 'form'  );
	    JRequest::setVar('hidemainmenu', 1);
	
	    parent::display();
	}

	/**
	 * save a record (and redirect to main page)
	 * @return void
	 */
	function save()
	{
		JRequest::checkToken() or jexit( 'Invalid Token' );
		$model = $this->getModel( 'entry' );
	
		if ($model->store()) {
        	$msg = JText::_( 'Entry Saved' );
  			$type = 'message';
	    } else {
	        $msg = JText::_( 'Error Saving Entry' );
	        $type = 'error';
	    }
			
		$this->setRedirect( 'index.php?option=com_easybook', $msg, $type );
	}

	/**
	 * remove record
	 * @return void
	 */
	function remove()
	{
		JRequest::checkToken() or jexit( 'Invalid Token' );
		//Load model and delete entry - redirect afterwards
		$model = $this->getModel( 'entry' );
		if(!$model->delete()) {
			$msg = JText::_( 'Error: Entry could not be deleted' );
			$type = 'error';
		} else {
			$msg = JText::_( 'Entry Deleted' );
			$type = 'message';
		}
		$this->setRedirect( JRoute::_( 'index.php?option=com_easybook', false ), $msg, $type );
	}
	
	
	function cancel()
	{
	    $msg = JText::_( 'Operation Cancelled' );
	    $this->setRedirect( 'index.php?option=com_easybook', $msg, 'notice' );
	}
	
	function publish() {
		JRequest::checkToken() or jexit( 'Invalid Token' );
		$model = $this->getModel( 'entry' );
		if($model->publish(1)) {
			$msg = JText::_( 'Entry published' );
			$type = 'message';
		}
		else
		{
			$msg = JText::_( 'Error: Could not change publish status' )." - " .$model->getError();
			$type = 'error';
		}
		$this->setRedirect( JRoute::_( 'index.php?option=com_easybook', false ), $msg, $type );
	}
 	
 	function unpublish() {
		JRequest::checkToken() or jexit( 'Invalid Token' );
		$model = $this->getModel( 'entry' );
		if($model->publish(0)) {
			$msg = JText::_( 'Entry unpublished' );
			$type = 'message';
		}
		else
		{
			$msg = JText::_( 'Error: Could not change publish status' )." - " .$model->getError();
			$type = 'error';
		}
		$this->setRedirect( JRoute::_( 'index.php?option=com_easybook', false ), $msg, $type );
	}

}
?>
