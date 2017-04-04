<?php
/**
 * @version		$Id: install.blastchatc.php 2009-01-01 15:24:18Z $
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

if (!defined('_BC_BLASTCHAT')) DEFINE("_BC_BLASTCHAT","BlastChat Client");

function com_install() {
	JHTML::_('behavior.mootools');
	JHTMLBehavior::tooltip();

	$lang = & JFactory::getLanguage();
	$backward_lang = $lang->getBackwardLang();

	$db =& JFactory::getDBO();

	// Get the languages file if it exists
	if (file_exists(JPATH_ROOT.DS.'components'.DS.'com_blastchatc'.DS.'languages'.DS.$lang->getTag().'.php')) {
		include_once(JPATH_ROOT.DS.'components'.DS.'com_blastchatc'.DS.'languages'.DS.$lang->getTag().'.php');
	}
	if (file_exists(JPATH_ROOT.DS.'components'.DS.'com_blastchatc'.DS.'languages'.DS.$backward_lang.'.php')) {
		include_once(JPATH_ROOT.DS.'components'.DS.'com_blastchatc'.DS.'languages'.DS.$backward_lang.'.php');
	}
	if (file_exists(JPATH_ROOT.DS.'components'.DS.'com_blastchatc'.DS.'languages'.DS.'english.php')) {
		include_once(JPATH_ROOT.DS.'components'.DS.'com_blastchatc'.DS.'languages'.DS.'english.php');
	}

	@ini_set( "max_execution_time", "60" );
	$db->setQuery( "CREATE TABLE IF NOT EXISTS `#__blastchatc` (
		`id` int(11) NOT NULL auto_increment,
		`url` varchar(100) default NULL,
		`intra_id` varchar(100) default NULL,
		`priv_key` varchar(100) default NULL,
		`detached` binary(1) NOT NULL default 0,
		`adm_expand` binary(1) NOT NULL default 1,
		`width` varchar(6) NOT NULL default '100%',
		`height` varchar(6) NOT NULL default '480',
		`d_width` varchar(6) NOT NULL default '640',
		`d_height` varchar(6) NOT NULL default '480',
		`frame_border` binary(1) NOT NULL default 0,
		`m_width` varchar(6) NOT NULL default '0',
		`m_height` varchar(6) NOT NULL default '0',
		PRIMARY KEY ( `id` ),
		UNIQUE KEY (`url`)
		);
		");
	if (!$db->query()) {
		$result = "Error 0013 : "._BC_CONTACTWEBMASTER."\n<br><br>".$db->stderr(true);
		return $result;
	}

	$query = "SHOW COLUMNS FROM #__blastchatc_users ";
	$db->setQuery ( $query );
	$cols = false;
	$cols = $db->loadRowList();
	if ($cols[0][0] == "userid") {
		$query = "DROP TABLE IF EXISTS `#__blastchatc_users`";
		$db->setQuery ( $query );
		$db->query();
	}

	$db->setQuery( "CREATE TABLE IF NOT EXISTS `#__blastchatc_users` (
		`bc_userid` int(11) default 0,
		`bc_lastEntry` datetime NOT NULL default '0000-00-00 00:00:00',
		`bc_idle` varchar(5) default NULL,
		`bc_rid` INT(11) NOT NULL default 0,
		`bc_rsid` INT(11) NOT NULL default 0,
		`bc_rname` VARCHAR(100) default NULL,
		PRIMARY KEY (`bc_userid`)
		);
		");
	if (!$db->query()) {
		$result = "Error 0014 : "._BC_CONTACTWEBMASTER."\n<br><br>".$db->stderr(true);
		return $result;
	}

	require_once(JPATH_ROOT.DS.'components'.DS.'com_blastchatc'.DS.'api.blastchatc.php');

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

	require_once(JPATH_ROOT.DS.'administrator'.DS.'components'.DS.'com_blastchatc'.DS.'class.blastchatc.php');
	$website = null;
	$website = new josBC_website($db);
	$website->loadByURL( $bc_site );
	if (!$website->url) {
		$website->loadByURL( $bc_site_other );
		if (!$website->url) {
			$website->intra_id = md5( $bc_site.uniqid(microtime(), 1 ) );
			$website->url = $bc_site;
			$website->store();
		}
	}

	//Set up icons for admin area
	$result = null;
	$menu_config = _BC_MENU_CONFIG;
	$menu_config_alt = _BC_BLASTCHAT." - "._BC_MENU_CONFIG;
	$menu_reg = _BC_MENU_REG;
	$menu_reg_alt = _BC_BLASTCHAT." - "._BC_MENU_REG;
	$menu_credits = _BC_MENU_CREDITS;
	$menu_credits_alt = _BC_BLASTCHAT." - "._BC_MENU_CREDITS;
	//$db->setQuery("UPDATE #__components SET admin_menu_img='../components/com_blastchatc/images/config.png', name='$menu_config', admin_menu_alt='$menu_config_alt' WHERE admin_menu_link='option=com_blastchatc&task=config'");
	$db->setQuery("UPDATE #__components SET name='$menu_config', admin_menu_alt='$menu_config_alt' WHERE admin_menu_link='option=com_blastchatc&task=config'");
	if (!$db->query()) {
		$result = "Error 0010 : "._BC_CONTACTWEBMASTER."\n<br><br>".$db->stderr(true);
	} else {
		//$db->setQuery("UPDATE #__components SET admin_menu_img='../components/com_blastchatc/images/credits.png', name='$menu_reg', admin_menu_alt='$menu_reg_alt' WHERE admin_menu_link='option=com_blastchatc&task=register'");
		$db->setQuery("UPDATE #__components SET name='$menu_reg', admin_menu_alt='$menu_reg_alt' WHERE admin_menu_link='option=com_blastchatc&task=register'");
		if (!$db->query()) {
			$result = "Error 0011 : "._BC_CONTACTWEBMASTER."\n<br><br>".$db->stderr(true);
		} else {
			//$db->setQuery("UPDATE #__components SET admin_menu_img='../components/com_blastchatc/images/credits.png', name='$menu_credits', admin_menu_alt='$menu_credits_alt' WHERE admin_menu_link='option=com_blastchatc&task=credits'");
			$db->setQuery("UPDATE #__components SET name='$menu_credits', admin_menu_alt='$menu_credits_alt' WHERE admin_menu_link='option=com_blastchatc&task=credits'");
			if (!$db->query()) {
				$result = "Error 0012 : "._BC_CONTACTWEBMASTER."\n<br><br>".$db->stderr(true);
			} else {
				//needed for module support, field marks which user is inside chat
				$db->setQuery( "ALTER TABLE `#__session` , ADD `bc_lastUpdate` VARCHAR( 14 ) NULL ");
				if (!$db->query()) {
					$result = "Error 0015 : "._BC_CONTACTWEBMASTER."\n<br><br>".$db->stderr(true);
				} else {
	?>
	[&nbsp;<a href="index2.php?option=com_blastchatc&task=register" style="font-size: 12px; font-weight: bold"><?php echo _BC_REGNOW;?>&nbsp;...</a>&nbsp;]
	<br />
<div class="footer" align="center">
	<table border="0" width="99%">
	<tbody>
	<tr>
	<td align="center">
	<div align="center"><a href="http://www.blastchat.com" target="_blank">BlastChat Client 3.0</a>, GNU/GPL License</div>
	<div class="smallgrey" align="center">Copyright (C) 2004-2009 <a href="http://www.blastchat.com" target="_blank">BlastChat</a>. All rights reserved.</div>
	</td>
	</tr>
	</tbody>
	</table>
</div>
<?php
				}
			}
		}
	}
	return $result;
}

?>