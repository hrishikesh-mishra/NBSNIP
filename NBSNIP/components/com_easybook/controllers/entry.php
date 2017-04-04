<?php
/**
 * @version $Id: entry.php 684 2008-06-16 04:06:04Z snipersister $
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
	}

	function _add_edit()
	{
		JRequest::setVar( 'view', 'entry' );
		JRequest::setVar( 'layout', 'form' );
		parent::display();
	}

	function add()
	{
		$this->_add_edit();
	}

	function edit()
	{
		$this->_add_edit();
	}

	/**
	 * save a record (and redirect to main page)
	 * @return void
	 */
	function save()
	{
		global $mainframe;
 		$uri  =  JFactory::getURI();
		$mail =& JFactory::getMailer();
		$db   =& JFactory::getDBO();
		$params =& $mainframe->getParams();			
		
		//ACL stuff
		$user = & JFactory::getUser();
		$canAdd = $user->authorize( 'com_easybook', 'add' );
		$canEdit= $user->authorize( 'com_easybook', 'edit', 'content', 'all' );
		
		//get mail addresses of all super administrators
		$query = 'SELECT email' .
				' FROM #__users' .
				' WHERE LOWER( usertype ) = "super administrator" AND sendEmail = 1';
		$db->setQuery( $query );
		$admins = $db->loadResultArray();
		
		//get entry id from request
		$temp = JRequest::get( 'post' );
		$id = $temp['id'];
		$name = $temp['gbname'];
		$text = $temp['gbtext'];
		
		if((!$id && $canAdd) || ($id && $canEdit))
		{
			$model = $this->getModel( 'entry' );
	
			if ($model->store()) {
				//Set redirection options
				if($params->get('default_published', true))
				{
					$msg = JText::_( 'Entry Saved' );
					$type = 'message';
				}
				else
				{
					$msg = JText::_( 'Entry saved but has to be approved');
					$type = 'notice';
				}
				$link = JRoute::_( 'index.php?option=com_easybook&view=easybook', false );
				
				//Send information-mail to administrators
				if(!$id AND $params->get('send_mail', true))
				{
					$mail->setSubject( JTEXT::_( 'New Guestbookentry' ) );
					$mail->setBody( JTEXT::sprintf( 'A new guestbookentry has been written', $uri->base(), $name, $text ) );
					$mail->addBCC( $admins );
					$mail->Send();
				}
			} else {
				$msg = JText::_( 'Error: Please validate your inputs' );
				$link = JRoute::_( 'index.php?option=com_easybook&controller=entry&task=add&retry=true', false );
				$type = 'notice';
			}
			$this->setRedirect( $link, $msg, $type );
		} else {
			JError::raiseError( 403, JText::_( 'ALERTNOTAUTH' ) );
		}
	}

	/**
	 * comment record
	 * @return void
	 */
	function comment()
	{
		// Prepare comment form
		JRequest::setVar( 'view', 'entry' );
		JRequest::setVar( 'layout', 'commentform' );
		JRequest::setVar( 'hidemainmenu', 1 );
		parent::display();
	}

	/**
	 * remove record
	 * @return void
	 */
	function remove()
	{
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

	function publish() {
		$model = $this->getModel( 'entry' );
		switch($model->publish()) {
			case -1: $msg = JText::_( 'Error: Could not change publish status' );
					 $type = 'error';
					 break;
			case 0: $msg = JText::_( 'Entry unpublished' );
					$type = 'message';
					break;
			case 1: $msg = JText::_( 'Entry published' );
					$type = 'message';
					break;
		}
		$this->setRedirect( JRoute::_( 'index.php?option=com_easybook', false ), $msg, $type );
	}
 
	/**
	 * save a comment
         * @return void
	*/
	function savecomment() {
		$model = $this->getModel( 'entry' );
		if(!$model->savecomment()) {
		      $msg = JText::_( 'Error: Could not save comment' );
		      $type = 'error';
		} else {
		      $msg = JText::_( 'Comment saved' );
		      $type = 'message';
		}
		$this->setRedirect( JRoute::_( 'index.php?option=com_easybook', false ), $msg, $type );
	}
}
?>
