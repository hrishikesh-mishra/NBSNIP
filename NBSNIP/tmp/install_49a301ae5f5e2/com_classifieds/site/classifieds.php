<?php
	/*
		Classifieds component
	 */


defined('_JEXEC') or die('Restricted access');




$controller = JRequest::getVar('controller');
$id= JRequest::getVar('cid');

if ($controller=='categories')
{
	switch($id)
	{
		case 1:
			$controller='realstate';
			break;
		case 2:
			$controller='jobs';
			break;
		case 3:
			$controller='computer';
			break;
		case 4:
			$controller='vehicle';
			break;
		case 5:
			$controller='personal';
			break;

		
	}
}
else if(empty($controller))
{
	$controller="categories";
}

if($controller) {
	require_once (JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php');
}

if (empty($controller))
{
	$controller='Categories';
}


// Create the controller
$classname	= 'classifiedsController'.$controller;
$controller = new $classname();

// Perform the Request task


$controller->execute( JRequest::getVar('task'));

// Redirect if set by the controller
$controller->redirect();

?>
