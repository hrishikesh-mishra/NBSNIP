<?php

	/*
		Classifieds contents
	*/
		
defined( '_JEXEC' ) or die( 'Restricted access' );

if($controller = JRequest::getWord('controller')) {
	$path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';
	if (file_exists($path)) {
		require_once $path;
	} else {
		$controller = '';
	}
}

// Create the controller

$classname	= 'developerzoneController'.$controller;
$controller	= new $classname( );


$controller->execute(JRequest::getVar('task'));

$controller->redirect();

?>