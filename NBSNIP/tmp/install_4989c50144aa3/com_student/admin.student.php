<?php


// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/*
 * Make sure the user is authorized to view this page
 */


require_once( JApplicationHelper::getPath( 'admin_html' ) );
// Set the table directory

//JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_student'.DS.'tables');

$task	= JRequest::getCmd('task');
$id 	= JRequest::getVar('id', 0, 'get', 'int');
$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
JArrayHelper::toInteger($cid, array(0));

switch ($task)
{
	case 'add' :
		editStudent(false );
		break;
	case 'edit':
		editStudent(true);
		break;

	case 'apply':
	case 'save':
	case 'save2new':
	case 'save2copy':
		saveStudent( $task );
		break;

	case 'remove':
		removeStudent( $cid );
		break;

	case 'publish':
		changeStudent( $cid, 1 );
		break;

	case 'unpublish':
		changeStudent( $cid, 0 );
		break;

	case 'orderup':
		orderStudent( $cid[0], -1 );
		break;

	case 'orderdown':
		orderStudent( $cid[0], 1 );
		break;

	case 'accesspublic':
		changeAccess( $cid[0], 0 );
		break;

	case 'accessregistered':
		changeAccess( $cid[0], 1 );
		break;

	case 'accessspecial':
		changeAccess( $cid[0], 2 );
		break;

	case 'saveorder':
		saveOrder( $cid );
		break;

	case 'cancel':
		cancelStudent();
		break;

	default:
		showStudent( $option );
		break;
}

/**
* List the records
* @param string The current GET/POST option
*/
function showStudent( $option )
{
	global $mainframe;

	$db					=& JFactory::getDBO();

	$limit		= $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
	$limitstart	= $mainframe->getUserStateFromRequest($option.'.limitstart', 'limitstart', 0, 'int');


	

	// get the total number of records
	$query = 'SELECT COUNT(*)'
	. ' FROM #__contact_details '
	;

	$db->setQuery( $query );
	$total = $db->loadResult();

	jimport('joomla.html.pagination');
	$pageNav = new JPagination( $total, $limitstart, $limit );

	// get the subset (based on limits) of required records
	$query = 'SELECT * '
	. ' FROM #__contact_details  '
	;

	$db->setQuery( $query, $pageNav->limitstart, $pageNav->limit );
	$rows = $db->loadObjectList();

	// build list of categories
	$javascript = 'onchange="document.adminForm.submit();"';

	
	HTML_student::showstudent( $rows, $pageNav );
}

/**
* Creates a new or edits and existing user record
* @param int The id of the record, 0 if a new entry
* @param string The current GET/POST option
*/
function editStudent($edit )
{
	$db		=& JFactory::getDBO();
	$user 	=& JFactory::getUser();

	$cid 	= JRequest::getVar('cid', array(0), '', 'array');
	$option = JRequest::getCmd('option');

	JArrayHelper::toInteger($cid, array(0));

	$row =& JTable::getInstance('student', 'Table');

	// load the row from the db table
	if($edit)

	$row->load( $cid[0] );


	


	// get params definitions
	
	

	HTML_contact::editstudent( $row);
}

/**
* Saves the record from an edit form submit
* @param string The current GET/POST option
*/
function saveStudent( $task )
{
	global $mainframe;

	// Check for request forgeries
	JRequest::checkToken() or jexit( 'Invalid Token' );

	// Initialize variables
	$db		=& JFactory::getDBO();
	$row	=& JTable::getInstance('student', 'Table');
	$post = JRequest::get( 'post' );

	
	
	if (!$row->bind( $post )) {
		JError::raiseError(500, $row->getError() );
	}
	// save params
	
	
	
	// save to a copy, reset the primary key
	if ($task == 'save2copy') {
		$row->id = 0;
	}

	// pre-save checks
	if (!$row->check()) {
		JError::raiseError(500, $row->getError() );
	}

	// if new item, order last in appropriate group
	

	// save the changes
	if (!$row->store()) {
		JError::raiseError(500, $row->getError() );
	}
	$row->checkin();
	
	

	switch ($task)
	{
		case 'apply':
		case 'save2copy':
			$msg	= JText::sprintf( 'Changes to X saved', JText::_('Student') );
			$link	= 'index.php?option=com_student&task=edit&cid[]='. $row->id .'';
			break;

		case 'save2new':
			$msg	= JText::sprintf( 'Changes to X saved', JText::_('Student') );
			$link	= 'index.php?option=com_student&task=edit';
			break;

		case 'save':
		default:
			$msg	= JText::_( 'Student info saved' );
			$link	= 'index.php?option=com_student';
			break;
	}

	$mainframe->redirect( $link, $msg );
}

/**
* Removes records
* @param array An array of id keys to remove
* @param string The current GET/POST option
*/
function removeStudent( &$cid )
{
	global $mainframe;

	// Check for request forgeries
	JRequest::checkToken() or jexit( 'Invalid Token' );

	// Initialize variables
	$db =& JFactory::getDBO();
	JArrayHelper::toInteger($cid);

	if (count( $cid )) {
		$cids = implode( ',', $cid );
		$query = 'DELETE FROM #__student'
		. ' WHERE id IN ( '. $cids .' )'
		;
		$db->setQuery( $query );
		if (!$db->query()) {
			echo "<script> alert('".$db->getErrorMsg(true)."'); window.history.go(-1); </script>\n";
		}
	}

	$mainframe->redirect( "index.php?option=com_student" );
}

/**
* Changes the state of one or more content pages
* @param array An array of unique category id numbers
* @param integer 0 if unpublishing, 1 if publishing
* @param string The current option
*/
function changeStudent( $cid=null, $state=0 )
{
	global $mainframe;

	// Check for request forgeries
	JRequest::checkToken() or jexit( 'Invalid Token' );

	// Initialize variables
	$db 	=& JFactory::getDBO();
	$user 	=& JFactory::getUser();
	JArrayHelper::toInteger($cid);

	if (count( $cid ) < 1) {
		$action = $state ? 'publish' : 'unpublish';
		JError::raiseError(500, JText::_( 'Select an item to' .$action, true ) );
	}

	$cids = implode( ',', $cid );

	$query = 'UPDATE #__student'
	. ' SET published = ' . (int) $state
	. ' WHERE id IN ( '. $cids .' )'
	. ' AND ( checked_out = 0 OR ( checked_out = '. (int) $user->get('id') .' ) )'
	;
	$db->setQuery( $query );
	if (!$db->query()) {
		JError::raiseError(500, $db->getErrorMsg() );
	}

	if (count( $cid ) == 1) {
		$row =& JTable::getInstance('contact', 'Table');
		$row->checkin( intval( $cid[0] ) );
	}

	$mainframe->redirect( 'index.php?option=com_student' );
}

/** JJC
* Moves the order of a record
* @param integer The increment to reorder by
*/
function orderStudent( $uid, $inc )
{
	global $mainframe;

	// Check for request forgeries
	JRequest::checkToken() or jexit( 'Invalid Token' );

	// Initialize variables
	$db =& JFactory::getDBO();

	$row =& JTable::getInstance('student', 'Table');
	$row->load( $uid );
	$row->move( $inc, 'catid = '. (int) $row->catid .' AND published != 0' );

	$mainframe->redirect( 'index.php?option=com_student' );
}

/** PT
* Cancels editing and checks in the record
*/
function cancelStudent()
{
	global $mainframe;

	// Check for request forgeries
	JRequest::checkToken() or jexit( 'Invalid Token' );

	// Initialize variables
	$db =& JFactory::getDBO();
	$row =& JTable::getInstance('contact', 'Table');
	$row->bind( JRequest::get( 'post' ));
	$row->checkin();

	$mainframe->redirect('index.php?option=com_student');
}

/**
* changes the access level of a record
* @param integer The increment to reorder by
*/
function changeAccess( $id, $access  )
{
	global $mainframe;

	// Check for request forgeries
	JRequest::checkToken() or jexit( 'Invalid Token' );

	// Initialize variables
	$db =& JFactory::getDBO();

	$row =& JTable::getInstance('student', 'Table');
	$row->load( $id );
	$row->access = $access;

	if ( !$row->check() ) {
		return $row->getError();
	}
	if ( !$row->store() ) {
		return $row->getError();
	}

	$mainframe->redirect( 'index.php?option=com_student' );
}

function saveOrder( &$cid )
{
	global $mainframe;

	// Check for request forgeries
	JRequest::checkToken() or jexit( 'Invalid Token' );

	// Initialize variables
	$db			=& JFactory::getDBO();
	$total		= count( $cid );
	$order 		= JRequest::getVar( 'order', array(0), 'post', 'array' );
	JArrayHelper::toInteger($order, array(0));

	$row =& JTable::getInstance('contact', 'Table');
	$groupings = array();

	// update ordering values
	for( $i=0; $i < $total; $i++ ) {
		$row->load( (int) $cid[$i] );
		// track categories
		$groupings[] = $row->catid;

		if ($row->ordering != $order[$i]) {
			$row->ordering = $order[$i];
			if (!$row->store()) {
				JError::raiseError(500, $db->getErrorMsg() );
			}
		}
	}

	// execute updateOrder for each parent group
	$groupings = array_unique( $groupings );
	foreach ($groupings as $group){
		$row->reorder('catid = '.(int) $group);
	}

	$msg 	= 'New ordering saved';
	$mainframe->redirect( 'index.php?option=com_student', $msg );
}
