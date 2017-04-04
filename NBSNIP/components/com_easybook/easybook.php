<?php
/**
 * @version $Id: easybook.php 666 2008-06-11 17:36:27Z snipersister $
 * @package    Easybook
 * @link http://www.easy-joomla.org
 * @license    GNU/GPL
 */

// no direct access

defined( '_JEXEC' ) or die( 'Restricted access' );
define('_EASYBOOK_VERSION', '2.0.0rc4');

// Require the base controller

require_once( JPATH_COMPONENT.DS.'controller.php' );
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'content.php' );
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'smilie.php' );

$maj_ver = split('\.', PHP_VERSION);
if($maj_ver[0] < 5) {
	require_once(JPATH_COMPONENT.DS.'acl-php4.php');
} else {
	require_once(JPATH_COMPONENT.DS.'acl.php');
}

// Require specific controller if requested
if($controller = JRequest::getWord('controller')) {
    $path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';
    if (file_exists($path)) {
        require_once $path;
    } else {
        $controller = '';
    }
}

// Create the controller
$classname    = 'EasybookController'.$controller;
$controller   = new $classname( );

$controller->setAccessControl('com_easybook');

// Perform the Request task
$controller->execute( JRequest::getVar( 'task' ) );

// Redirect if set by the controller
$controller->redirect();

?>