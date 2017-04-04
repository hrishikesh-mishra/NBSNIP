<?php
/**
 * @version		$Id: admin.blastchatc.php 2009-01-01 15:24:18Z $
 * @package		BlastChat Client
 * @author 		BlastChat
 * @copyright	Copyright (C) 2004-2009 BlastChat. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @HomePage 	<http://www.blastchat.com>

 * This file is part of BlastChat Client.

 * BlastChat Client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * BlastChat Client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with BlastChat Client.  If not, see <http://www.gnu.org/licenses/>.
 */

/** ensure this file is being included by a parent file */
defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );

/*
define global variables for BlastChat Client
*/
global $task, $option, $mainframe;

// Make sure the user is authorized to view this page
/* not working as expected - removed
$user = & JFactory::getUser();
if (!$user->authorize( 'com_blastchatc', 'manage' )) {
	$mainframe->redirect( 'index.php', JText::_('ALERTNOTAUTH') );
}
*/

/*
Examples of creating link to blastchat client

Load client with parameters defined in admin backend for BlastChat component
http://www.yourwebsite.com/index.php?option=com_blastchatc

Load client with parameters defined in admin backend for BlastChat component, owerwrite detached option
Undetached
http://www.yourwebsite.com/index.php?option=com_blastchatc&d=0
Detached (if user has pop-up windows blocked, he will get option on screen to load chat Undetached
http://www.yourwebsite.com/index.php?option=com_blastchatc&d=1

Load client with parameters defined in admin backend for BlastChat component, but force to go to room with id
http://www.yourwebsite.com/index.php?option=com_blastchatc&rid=123
*/

$lang = & JFactory::getLanguage();
$backward_lang = $lang->getBackwardLang();

// Get the languages file if it exists
if (file_exists(JPATH_ROOT.DS.'components'.DS.'com_blastchatc'.DS.'languages'.DS.$lang->getTag().'.php')) {
	include_once(JPATH_ROOT.DS.'components'.DS.'com_blastchatc'.DS.'languages'.DS.$lang->getTag().'.php');
}
if (file_exists(JPATH_ROOT.DS.'components'.DS.'com_blastchatc'.DS.'languages'.DS.$backward_lang.'.php')) {
	include_once(JPATH_ROOT.DS.'components'.DS.'com_blastchatc'.DS.'languages'.DS.$backward_lang.'.php');
}
if ($backward_lang != 'english' && file_exists(JPATH_ROOT.DS.'components'.DS.'com_blastchatc'.DS.'languages'.DS.'english.php')) {
	include_once(JPATH_ROOT.DS.'components'.DS.'com_blastchatc'.DS.'languages'.DS.'english.php');
}

if (!file_exists(JPATH_ROOT.DS.'components'.DS.'com_blastchatc'.DS.'api.blastchatc.php')) {
	echo "Missing file \"api.blastchatc.php\"";
	return;
}
require_once(JPATH_ROOT.DS.'components'.DS.'com_blastchatc'.DS.'api.blastchatc.php');
require_once('admin.blastchatc.html.php');
require_once('class.blastchatc.php');

$mosConfig_live_site = bc_getLiveSite();

//strip http or https from this website URL, global variable
//if you need this to be something else,assign another value to $mosConfig_live_site (do same for admin.blastchac.php file):
$bc_site = $mosConfig_live_site;
$bc_site = strtolower($bc_site);
$bc_site = str_replace("http://", "", $bc_site);
$bc_site = str_replace("https://", "", $bc_site);

$bc_site_other = "";
if (strpos($bc_site, "www.") === false) {
	$bc_site_other = "www." . $bc_site;
} else {
	$bc_site_other = str_replace("www.", "", $bc_site);
}

$detached = JRequest::getInt('d', 2); //overwrite admin backend configuration to open chat as detached or undetached
$task = JRequest::getString('task', null);
$rid = JRequest::getInt('rid', 0);
$rsid = JRequest::getInt('rsid', 0);
$bc_Itemid = JRequest::getString('Itemid', null);
$id = JRequest::getInt('id', 0);
$cid = JRequest::getVar('cid', array(0));
if (!is_array( $cid )) {
	$cid = array(0);
}

switch ($task) {
	case 'remove':
		bc_removeBC( $id, $option );
		break;
	case 'save':
		bc_saveBC();
		break;
	case 'credits':
		bc_showCredits();
		break;
	case 'configc':
		bc_showConfig($option, $bc_site, $bc_site_other);
		break;
	case 'configs':
		bc_showConfigS($bc_site, $bc_site_other);
		break;
	case 'register':
		$db =& JFactory::getDBO();
		header( "Content-Type: text/html; charset=UTF-8" );
		$website = null;
		$website = new josBC_website($db);
		$website->loadByURL( $bc_site );
		if (!$website->url) {
			$website->loadByURL( $bc_site_other );
			if ($website->url) {
				$bc_site = $bc_site_other;
			}
		}
		if (!$website->url || !$website->intra_id) {
			$website->intra_id = md5( $bc_site.uniqid(microtime(), 1 ) );
			$website->url = $bc_site;
			$website->store();
		}
		HTML_blastchatc::regHTML($website, 0, $task);
		break;
	default:
		HTML_blastchatc::defaultHTML();
		break;
}
HTML_blastchatc::showBottomLicense();

function bc_removeBC( $id ) {
	global $mainframe;

	$db =& JFactory::getDBO();

	if (!$id) {
		echo "<script> alert('Select an item to delete'); window.history.go(-1);</script>\n";
		exit;
	} else {
		$obj = new josBC_website( $db );
		$obj->load( $id );
		// delete room
		$obj->delete( $id );
		$msg = $obj->getError();
	}
	if (!$msg) {
		$msg = _BC_MENU_WEBSITE_DELETE;
	}
	$mainframe->redirect( 'index2.php?option=com_blastchatc&task=configc', $msg );
}

function bc_saveBC() {
	global $mainframe;

	$db =& JFactory::getDBO();

	$row = new josBC_website($db);

	$msg = _BC_MENU_CONFIG_SAVE;
	if (!$row->bind( $_POST )) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	// sanitise fields
	$row->detached		= $row->detached ? 1 : 0;
	$row->frame_border	= $row->frame_border ? 1 : 0;

	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->checkin();

	$mainframe->redirect( 'index2.php?option=com_blastchatc&task=configc', $msg );
}

function bc_showCredits() {
	HTML_blastchatc::creditsHTML();
}

function bc_showConfig($option, $bc_site, $bc_site_other) {
	$db =& JFactory::getDBO();

	$website = null;
	$website = new josBC_website($db);
	$website->loadByURL( $bc_site );

	if (!$website->url) {
		$website->loadByURL( $bc_site_other );
		if ($website->url) {
			$bc_site = $bc_site_other;
		}
	}
	if (!$website->url || !$website->intra_id) {
		$website->intra_id = md5( $bc_site.uniqid(microtime(), 1 ) );
		$website->url = $bc_site;
		$website->store();
	}
	$lists['detached'] 	= JHTML::_('select.booleanlist', 'detached', 'class="inputbox"', intval($website->detached));
	$lists['frame_border'] 	= JHTML::_('select.booleanlist', 'frame_border', 'class="inputbox"', intval($website->frame_border));
	HTML_blastchatc::configHTML($website, $option, $lists);
}

function bc_showConfigS($bc_site, $bc_site_other) {
	$db =& JFactory::getDBO();

	$website = null;
	$website = new josBC_website($db);
	$website->loadByURL( $bc_site );
	if (!$website->url) {
		$website->loadByURL( $bc_site_other );
		if ($website->url) {
			$bc_site = $bc_site_other;
		}
	}
	if (!$website->url || !$website->intra_id) {
		$website->intra_id = md5( $bc_site.uniqid(microtime(), 1 ) );
		$website->url = $bc_site;
		$website->store();
	}
	HTML_blastchatc::regHTML($website, 1, "config");
}
?>
