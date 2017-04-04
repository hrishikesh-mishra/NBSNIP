<?php
defined( '_JEXEC' ) or die( 'Restricted access admin' );


require_once (JPATH_COMPONENT.DS.'controller.php');

if($controller = JRequest::getWord('controller')) {
	$path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';
	if (file_exists($path)) {
		require_once $path;
	} else {
		$controller = '';
	}
}

// Create the controller
$classname	= 'myextensionController'.$controller;
$controller	= new $classname( );




echo "Hello Byte Hacker :" . JRequest::getVar('task');
$controller = new myextensionController();
$controller->execute(JRequest::getVar('task'));

$controller->redirect();
?>