<?php
	/*
		yellowpage component
	 */


defined('_JEXEC') or die('Restricted access');




$controller = JRequest::getVar('controller');
$id= JRequest::getVar('yid');

 $search=0;

if ($controller=='categories')
{
	switch($id)
	{
		case 1:
			$controller='education';
			break;
		case 2:
			$controller='medical';
			break;
		case 3:
			$controller='hotellodge';
			break;
		case 4:
			$controller='club';
			break;
		case 5:
			$controller='doctors';
			break;
		case 6:
			$controller='vehicle';
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
$classname	= 'yellowpageController'.$controller;
$controller = new $classname();

// Perform the Request task


$controller->execute( JRequest::getVar('task'));

// Redirect if set by the controller
$controller->redirect();

?>
