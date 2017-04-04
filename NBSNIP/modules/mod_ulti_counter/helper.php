<?php
/**
 * Helper class for Ulti Counter module
 * 
 * @package    mod_ulti_counter
 * @subpackage Modules
 * @link http://joomla.linkster.be/
 * @license		GNU/GPL, see LICENSE.php
 * mod_ulti_counter is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */


class modCounterHelper
{

  function getCurrentCounter(&$params) {
     $day = $params->get('day')? $params->get('day') : '01';
     $month = $params->get('month')? $params->get('month') : '01';
     $year = $params->get('year')? $params->get('year') : '2009';
     $hour = $params->get('hour')? $params->get('hour') : '0';
     $minute = $params->get('minute')? $params->get('minute') : '0';
     $second = $params->get('second')? $params->get('second') : '0';
     $offset = $params->get('offset')? $params->get('offset') : '0';
     $format = $params->get('format')? $params->get('format') : '1';
     $counterID = $params->get('moduleID')? $params->get('moduleID') : '0';
     $keepCounting = $params->get( 'keepCounting', 0 );
     $eventTime = mktime($hour, $minute, $second, $month, $day, $year);
     $currentTime = time();

     $counterinseconds = $eventTime - ($currentTime + $offset * 3600);
 
    return $counterinseconds;
  }
}

?>