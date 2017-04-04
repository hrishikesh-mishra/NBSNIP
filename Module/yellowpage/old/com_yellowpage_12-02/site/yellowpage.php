<?php
	/*
		yellowpage component
	 */


defined('_JEXEC') or die('Restricted access');


//require_once (JPATH_COMPONENT.DS.'controllers'.DS.'c.php');

// Require specific controller if requested

$controller = JRequest::getVar('controller');
$id= JRequest::getVar('yid');

if ($controller=='categories')
{
	if ($id==1)
		$controller='education';
}
else if(empty($controller))
{
	$controller="categories";
}


if($controller) {
	require_once (JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php');
}

if (empty($controller))
	$controller='Categories';

// Create the controller
$classname	= 'yellowpageController'.$controller;
$controller = new $classname();

// Perform the Request task
$controller->execute( JRequest::getVar('task'));

// Redirect if set by the controller
$controller->redirect();

?>
