<?php
/**
 * Ulti Caounter Module Entry Point
 * 
 * @package    Joomla
 * @subpackage Modules
 * @link http://joomla.linkster.be/
 * @license		GNU/GPL, see LICENSE.php
 * mod_ulti_counter is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */



// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

require_once( dirname(__FILE__).DS.'helper.php' );
$timeleft = modCounterHelper::getCurrentCounter($params);
$format = $params->get('format')? $params->get('format') : '1';
$leading = $params->get('leading')? $params->get('leading') : ' ';
$counterID = $module->id;
$tailing = $params->get('tailing')? $params->get('tailing') : 'left until the event';
$keepCounting = $params->get( 'keepCounting', 0 );
$moduleclass_sfx = $params->get('moduleclass_sfx')? $params->get('moduleclass_sfx') : ''; 
require( JModuleHelper::getLayoutPath( 'mod_ulti_counter' ) );
?>