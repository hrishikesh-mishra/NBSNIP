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

if ($controller=='education')
{
 $serchkey = JRequest::getVar('serchkey');
 $category = JRequest::getVar('category');
 $city= JRequest::getVar('city');



 }

 if (!empty($searchkey) or !empty($category) or !empty($city))
 {
	$search=1;
}
else
{
	$search=0;
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
