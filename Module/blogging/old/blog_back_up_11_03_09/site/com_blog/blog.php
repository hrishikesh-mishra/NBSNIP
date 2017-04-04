<?php
	/*
		Blog component
	 */


defined('_JEXEC') or die('Restricted access');

require_once (JPATH_COMPONENT.DS.'controllers'.DS.'blog.php');

// Create the controller
$classname	= 'blogController';
$controller = new $classname();

// Perform the Request task


$controller->execute( JRequest::getVar('task'));

// Redirect if set by the controller
$controller->redirect();

?>

