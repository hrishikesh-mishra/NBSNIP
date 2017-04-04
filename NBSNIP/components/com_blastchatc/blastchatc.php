<?php
/**
 * @version		$Id: blastchatc.php 2009-01-01 15:24:18Z $
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

/**********************************************************************************************************
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
**********************************************************************************************************/

/** ensure this file is being included by a parent file */
defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );

/* disable cache */
$cache = & JFactory::getCache();
$cache->setCaching(false); // make sure it caches

$nowDate = date ( "D, d M Y H:i:s", time() );
JDocument::setMetaData("robots", "noindex, nofollow", true);
JDocument::setMetaData("expires", $nowDate." GMT");
JDocument::setMetaData("cache-control", "no-store, no-cache, must-revalidate");
JDocument::setMetaData("pragma", "no-store");

/* check - server to server communication for public access
*  keepsession - keep user session active with your website
*  signoff - chatter logout/signoff from chat
*  return null (stop precessing this file)
 */

$bc_task = JRequest::getString('bc_task', null);
if ($bc_task) {
	require_once(JPATH_ROOT.DS.'components'.DS.'com_blastchatc'.DS.'api.blastchatc.php');
	switch ($bc_task) {
		case 'updatelist':
			if (file_exists(JPATH_ROOT.DS.'modules'.DS.'mod_blastchatc'.DS.'mod_blastchatc_api.php')) {
				require_once(JPATH_ROOT.DS.'modules'.DS.'mod_blastchatc'.DS.'mod_blastchatc_api.php');
			} else {
				echo "BlastChat module dynamic support not available.";
			}
			bc_sendHeaders();
			$module = null;
			$module = bc_loadModule();
			if ($module) {
				$params = new JParameter( $module->params );
				$output = bc_loadModuleOutput($params, true);
				echo "allowed".$output;
			}
			break;
		case 'keepsession':
			//this is to keep user's session alive with your website
			bc_sendHeaders();
			if (bc_userUpdate()) {
				echo "ok";
			} else {
				echo "fail";
			}
			break;
		case 'check':
			//check access to blastchat client being public
			bc_sendHeaders();
			echo "ok";
			break;
		case 'banner':
			require_once('components/com_blastchatc/banner.blastchatc.php');
			bc_loadBanner();
			break;
		case 'signoff':
			//user signedoff from chat, mark him as logged off
			bc_sendHeaders();
			bc_userSignOff();
			echo "ok";
		break;
	}
	return;
}

require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'class.blastchatc.php');
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

$mosConfig_live_site = bc_getLiveSite();
//strip http or https from this website URL
//if you need this to be something else, adjust bc_getLiveSite function in api.blastchatc.php file
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

$bc_version = bc_getVersion();

$myss = bc_getSessionData();

$detached = JRequest::getInt('d', 2); //overwrite admin backend configuration to open chat as detached or undetached
$bc_task = JRequest::getString('bc_task', null);
$rid = JRequest::getInt('rid', 0);
$rsid = JRequest::getInt('rsid', 0);
$bc_Itemid = JRequest::getString('Itemid', null);

$db =& JFactory::getDBO();

//getBlastChat data of your website from blastchatc table
$website = null;
$website = new josBC_website($db);
$website->loadByURL( $bc_site );
if (!$website->url) {
	$website->loadByURL( $bc_site_other );
	if ($website->url) {
		$bc_site = $bc_site_other;
	}
}
if (!$website || !$website->url || !$website->priv_key) {
	//if there is no information stored for your website in blastchatc table, or some is missing
	echo "Error 0002 : "._BC_CONTACTWEBMASTER."<br>";
	echo "Register your website - ".$bc_site." or ".$bc_site_other;
	return;
}

//get sec_code from blastchatc_users table for this user
$sec_code = '';
$bc_groupid = 0;
if (isset($myss)) {
	bc_userSignIn($myss);
} else {
	echo "Session variable not defined by system, adjust file api.blastchatc.php, function bc_getSessionData().";
	exit;
}

//GMT time for authentication purposes
$time_key = gmdate('Y-m-d H:i:s');

if ($detached == 2) {
	//overwrite not requested, load admin backend configuration for detached feature
	$detached = $website->detached;
}

$cur_template = bc_getCurrentTemplate();

//Create request for connection to blastchat server (iframe source)
$request = "https://www.blastchat.com/index2.php?option=com_blastchat&no_html=1"
."&task=client" //variable for internal blastchat use
."&ctask=enter" //variable for internal blastchat use
."&d=".$detached //
."&url=".$website->url //your website URL, for example yourserver.com or www.yourserver.com or test.yourserver.com/joomla or www.someserver.com/~username
."&intraid=".$website->intra_id//unique identifier that will be used to identify your website
."&userid=".$myss->userid //local userid of the user connecting to blastchat, if 0 user is considered a guest
."&usergid=".$bc_groupid //local user group id of the user connecting to blastchat, if 0 user has no goup assigned (currently only single group support)
."&nick=".urlencode($myss->username) //local username of the user connecting to blastchat, if empty user is considered a guest, urlencode for foreign characters (correction can be done in admin area of blastchat configuration)
."&rid=".$rid //force to go directly into this room id (you can find room id in admin area of blastchat
."&rsid=".$rsid //server id in reference to room id to go to
."&lang=".$backward_lang //backward website language
."&nlang=".$lang->getTag() //local website language (new way)
."&template=".$cur_template //current template name (for Joomla/Mambo users)
."&pub_key=".md5( $time_key.$website->priv_key ) //this will be recreated upon connection on blastchat server side using time_key and blastchat stored priv_key for your website, secutiry feature
."&sec_code=".md5( $time_key.$website->priv_key.$myss->userid ) //this will be recreated upon connection on blastchat server side using time_key and blastchat stored priv_key for your website, secutiry feature
."&time_key=".$time_key //used in public key generation, send for recreation purposes
."&bcItemid=".$bc_Itemid //current value of Itemid
."&bc_ver=3.0" //BlastChat Client version
."&prod=".$bc_version->PRODUCT
."&rel=".$bc_version->RELEASE
."&dev=".$bc_version->DEV_LEVEL
;

JDocument::setTitle("BlastChat @ $website->url");
?>

<?php if ($detached == 1) { ?>
<div id="errmsg"></div>
<script language="javascript" type="text/javascript">
<!--
var mine = window.open("<?php echo $request;?>","BlastChat @ <?php echo $website->url;?>","WIDTH=<?php echo $website->d_width;?>, HEIGHT=<?php echo $website->d_height;?>, location=no, menubar=no, status=no, toolbar=no, scrollbars=no, resizable=yes");
if (!mine) {
	var objId = 'errmsg';
	var text = "<?php echo _BC_ERROR_NOPOPUP;?>";
	text = text + "<br>" + '<?php echo sprintf(_BC_OPENUNDETACHED, "<a href=\"index.php?option=com_blastchatc&d=0\">"._BC_OPENUNDETACHED_HERE."</a>");?>';
	if (document.layers) { //Netscape 4
		myObj = eval('document.' + objId);
		myObj.document.open();
		myObj.document.write(text);
		myObj.document.close();
	} else 	if ((document.all && !document.getElementById) || navigator.userAgent.indexOf("Opera") != -1) { //IE 4 & Opera
		myObj = eval('document.all.' + objId);
		myObj.innerHTML = text;
	} else if (document.getElementById) { //Netscape 6 & IE 5
		myObj = document.getElementById(objId);
		myObj.innerHTML = '';
		myObj.innerHTML = text;
	} else {
		alert('<?php echo _BC_OLDBROWSER;?>');
	}
}
//-->
</script>
<?php } else { ?>
<iframe NAME="blastchatc" ID="blastchatc" SRC="<?php echo $request;?>" HEIGHT="<?php echo $website->height;?>" WIDTH="<?php echo $website->width;?>" FRAMEBORDER="<?php echo $website->frame_border == 1 ? "1" : "0";?>" marginwidth="<?php echo $website->m_width;?>" marginheight="<?php echo $website->m_height;?>" SCROLLING="NO">
</iframe>
<?php } ?>
<!-- !!! Do not remove, tamper with, obstruct visibility or obstruct readability of following code unless you have received written permission to do so by owner of BlastChat !!! -->
<div align="center" style="width:100%; font-size: 10px; text-align:center; margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px;">Powered by <a href="http://www.blastchat.com" target="_blank" title="BlastChat - free chat for your website">BlastChat</a></div>
