<?php
	/*
		Social Networkingcomponent
	 */


defined('_JEXEC') or die('Restricted access');

require_once (JPATH_COMPONENT.DS.'controllers'.DS.'socialnetworking.php');

// Create the controller
$classname	= 'socialNetworkingController';
$controller = new $classname();

// Perform the Request task


$controller->execute( JRequest::getVar('task'));

// Redirect if set by the controller
$controller->redirect();

?>

