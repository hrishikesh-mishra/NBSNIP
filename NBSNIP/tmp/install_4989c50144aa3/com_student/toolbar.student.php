<?php


// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

require_once( JApplicationHelper::getPath( 'toolbar_html' ) );

switch ($task)
{
	case 'add'  :
		TOOLBAR_student::_EDIT(false);
		break;
	case 'edit' :
		TOOLBAR_student::_EDIT(true);
		break;

	default:
		TOOLBAR_student::_DEFAULT();
		break;
}