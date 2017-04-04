<?php
/**
 * @version		$Id: toolbar.blastchatc.html.php 2009-01-01 15:24:18Z $
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

class TOOLBAR_BLASTCHATC {
	/**
	* Draws the menu to edit a user
	*/
	function _CONFIGC() {
		JToolBarHelper::title( JText::_( 'Configuration - Client' ), 'config.png' );
		JToolBarHelper::deleteListX(_BC_DELETEWEBSITE);
		JToolBarHelper::spacer();
		JToolBarHelper::save();
		JToolBarHelper::spacer();
		JToolBarHelper::help( 'blastchatc.config', true );
	}

	function _CONFIGS() {
		JToolBarHelper::title( JText::_( 'Configuration - Server' ), 'config.png' );
		JToolBarHelper::help( 'blastchatc.configs', true );
	}

	function _CREDITS() {
		JToolBarHelper::title( JText::_( 'Credits' ), 'config.png' );
		JToolBarHelper::help( 'blastchatc.credits', true );
	}

	function _DEFAULT() {
		JToolBarHelper::title( JText::_( 'BlastChat Client 3.0' ), 'config.png' );
		JToolBarHelper::help( 'blastchatc', true );
	}
}
?>
