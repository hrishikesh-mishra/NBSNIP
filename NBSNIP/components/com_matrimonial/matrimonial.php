
<?php
	/*
		Matrimonial component
	 */


defined('_JEXEC') or die('Restricted access');

require_once (JPATH_COMPONENT.DS.'controllers'.DS.'matrimonial.php');

// Create the controller
$classname	= 'matrimonialController';
$controller = new $classname();

// Perform the Request task


$controller->execute( JRequest::getVar('task'));

// Redirect if set by the controller
$controller->redirect();

?>

