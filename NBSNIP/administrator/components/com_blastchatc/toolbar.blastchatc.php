<?php
/**
 * @version		$Id: toolbar.blastchatc.php 2009-01-01 15:24:18Z $
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

// no direct access
defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );

global $task, $mainframe;

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

require_once( JApplicationHelper::getPath( 'toolbar_html' ) );

switch ( $task ) {
	case 'save':
	case 'configc':
		TOOLBAR_BLASTCHATC::_CONFIGC();
		break;
	case 'configs':
		TOOLBAR_BLASTCHATC::_CONFIGS();
		break;
	case 'credits':
		TOOLBAR_BLASTCHATC::_CREDITS();
		break;
	default:
		TOOLBAR_BLASTCHATC::_DEFAULT();
		break;
}
?>