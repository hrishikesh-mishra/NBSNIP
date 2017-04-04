<?php
/**
 * @version		$Id: admin.blastchatc.html.php 2009-01-01 15:24:18Z $
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

class HTML_blastchatc {

	function showBottomLicense() {
?>
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

	function creditsHTML() {
?>
<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminform"">
	<tr>
		<th nowrap width="100%"><span class="sectionname">&nbsp;BlastChat - <?php echo _BC_MENU_CREDITS;?></span></th>
		<th><img height="20px" src="../../components/com_blastchatc/images/gplv3-88x31.png"></img></th>
	</tr>
</table>

<table class="adminlist">
<tr>
	<th class="title">
	<?php echo _BC_USERNAME;?>
	</th>
	<th class="title">
	<?php echo _BC_NAME;?>
	</th>
	<th class="title">
	<?php echo _BC_WEBSITE;?>
	</th>
	<th width="100%" class="title">
	</th>
</tr>
<tr>
<td>dragontje124</td>
<td>Rik</td>
<td><a href="http://www.blastchat.com" target="_blank">www.blastchat.com</td>
<td>BlastChat test leader, responsible for testing client under different CMSs</td>
</tr>
<tr>
<td></td>
<td>Francesco</td>
<td><a href="http://www.joomlatopten.com" target="_blank">www.joomlatopten.com</td>
<td>Special thanks for preparing module draft and for module testing of improved Community Builder profiles connection, avatars, colors</td>
</tr>
</table>
<?php
	}

	function configHTML($website, $option, $lists=null) {
	?>
	<script language="javascript" type="text/javascript">
	<!--
	function submitbutton(pressbutton) {
		var form = document.adminForm;
		if (pressbutton == 'cancel') {
			submitform( pressbutton );
			return;
		}
		submitform( pressbutton );
	}
	//-->
	</script>

<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminform"">
	<tr>
		<th nowrap width="100%"><span class="sectionname">&nbsp;BlastChat - <?php echo _BC_MENU_CONFIG_C;?></span></th>
		<th><img height="20px" src="../../components/com_blastchatc/images/gplv3-88x31.png"></img></th>
	</tr>
</table>

<form action="index2.php" method="POST" name="adminForm">
<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminform">
<tr>
<td nowrap="nowrap"><?php echo _BC_URL; ?></td>
<td><input disabled type="text" name="url" class="inputbox" size="60" value="<?php echo $website->url; ?>"></td>
<td><?php echo _BC_URL_DES; ?></td>
</tr>
<tr>
<td <?php if (!$website->intra_id) echo "style=\"color: red;\"";?> nowrap="nowrap"><?php echo _BC_INTRAID; ?></td>
<td><input type="text" name="intra_id" class="inputbox" size="60" value="<?php echo $website->intra_id; ?>"></td>
<td <?php if (!$website->intra_id) echo "style=\"color: red;\"";?>><?php echo _BC_INTRAID_DES; ?></td>
</tr>
<tr>
<td <?php if (!$website->priv_key) echo "style=\"color: red;\"";?> nowrap="nowrap"><?php echo _BC_PRIVKEY; ?></td>
<td><input type="text" name="priv_key" class="inputbox" size="60" value="<?php echo $website->priv_key; ?>"></td>
<td <?php if (!$website->priv_key) echo "style=\"color: red;\"";?>><?php echo _BC_PRIVKEY_DES; ?></td>
</tr>
<tr>
<td nowrap="nowrap"><?php echo _BC_DETACHED; ?></td>
<td><?php echo $lists['detached'];?></td>
<td><?php echo _BC_DETACHED_DES; ?></td>
</tr>
<tr>
<td nowrap="nowrap"><?php echo _BC_WIDTH; ?></td>
<td><input type="text" name="width" class="inputbox" size="20" value="<?php echo $website->width; ?>"></td>
<td><?php echo _BC_WIDTH_DES; ?></td>
</tr>
<tr>
<td nowrap="nowrap"><?php echo _BC_DWIDTH; ?></td>
<td><input type="text" name="d_width" class="inputbox" size="20" value="<?php echo $website->d_width; ?>"></td>
<td><?php echo _BC_DWIDTH_DES; ?></td>
</tr>
<tr>
<td nowrap="nowrap"><?php echo _BC_HEIGHT; ?></td>
<td><input type="text" name="height" class="inputbox" size="20" value="<?php echo $website->height; ?>"></td>
<td><?php echo _BC_HEIGHT_DES; ?></td>
</tr>
<tr>
<td nowrap="nowrap"><?php echo _BC_DHEIGHT; ?></td>
<td><input type="text" name="d_height" class="inputbox" size="20" value="<?php echo $website->d_height; ?>"></td>
<td><?php echo _BC_DHEIGHT_DES; ?></td>
</tr>
<tr>
<td nowrap="nowrap"><?php echo _BC_FRAMEBORDER; ?></td>
<td><?php echo $lists['frame_border'];?></td>
<td><?php echo _BC_FRAMEBORDER_DES; ?></td>
</tr>
<tr>
<td nowrap="nowrap"><?php echo _BC_MWIDTH; ?></td>
<td><input type="text" name="m_width" class="inputbox" size="20" value="<?php echo $website->m_width; ?>"></td>
<td><?php echo _BC_MWIDTH_DES; ?></td>
</tr>
<tr>
<td nowrap="nowrap"><?php echo _BC_MHEIGHT; ?></td>
<td><input type="text" name="m_height" class="inputbox" size="20" value="<?php echo $website->m_height; ?>"></td>
<td><?php echo _BC_MHEIGHT_DES; ?></td>
</tr>
<tr>
</table>
	<input type="hidden" name="option" value="<?php echo $option; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="id" value="<?php echo $website->id;?>" />
	<input type="hidden" name="boxchecked" value="1" />
	<input type="hidden" name="hidemainmenu" value="0" />
</form>

<?php
	}

	//type - 0 registration, 1 configuration
	function regHTML($website, $type, $task) {
		global $mosConfig_lang, $mainframe;

		$bc_version = bc_getVersion();
		if (!$type) {
			//registration
			$bcItemid = JRequest::getInt('Itemid');

			if (!$website->url) {
				echo "Error 0021 : "._BC_CONTACTWEBMASTER."\n";
				return;
			}

			$request = "https://www.blastchat.com/index2.php"
			."?option=com_bcaccount"
			."&amp;cbctask=register"
			."&amp;url=".$website->url
			."&intraid=".$website->intra_id
			."&amp;lang=".$mosConfig_lang
			."&amp;bcItemid=".$bcItemid
			."&amp;bc_ver=3.0"
			."&amp;prod=".$bc_version->PRODUCT
			."&amp;rel=".$bc_version->RELEASE
			."&amp;dev=".$bc_version->DEV_LEVEL;
		} else {
			//configuration
			$request = "https://www.blastchat.com/index2.php?option=com_bcaccount&cbctask=bcaccount";
		}

		$goingtodetach = JRequest::getInt('d', 2);
		$detached = $mainframe->getUserStateFromRequest( "detached", 'd', 0 );
		$expanded = $mainframe->getUserStateFromRequest( "expanded", 'e', $website->adm_expand );

		$website->adm_expand = $expanded;
		$website->store();
	?>
<script language="JavaScript" type="text/javascript">
<!--
function expand() {
	this.location.href="index2.php?option=com_blastchatc&task=<?php echo $task;?>&e=1";
}

function collapse() {
	this.location.href="index2.php?option=com_blastchatc&task=<?php echo $task;?>&e=0";
}

function detach() {
	this.location.href="index2.php?option=com_blastchatc&task=<?php echo $task;?>&d=1";
}

function undetach() {
	this.location.href="index2.php?option=com_blastchatc&task=<?php echo $task;?>&d=0";
}
//-->
</script>
<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminform"">
	<tr>
			<?php if (!$type) { ?>
				<th nowrap width="100%"><span class="sectionname">&nbsp;BlastChat - <?php echo _BC_MENU_REG;?></span></th>
				<th><img height="20px" src="../../components/com_blastchatc/images/gplv3-88x31.png"></img></th>
			<?php } else { ?>
				<th nowrap width="100%"><span class="sectionname">&nbsp;BlastChat - <?php echo _BC_MENU_CONFIG_S;?></span></th>
			<?php } ?>
	</tr>
</table>

	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminform"">
		<tr>
			<td>
<?php
if ($goingtodetach == 1) {
?>
<div id="errmsg"></div>
<script language="javascript" type="text/javascript">
<!--
var mine = window.open("<?php echo $request;?>","BlastChat","WIDTH=<?php echo $website->d_width;?>, HEIGHT=<?php echo $website->d_height;?>, location=no, menubar=no, status=no, toolbar=no, scrollbars=no, resizable=yes");
if (!mine) {
	var objId = 'errmsg';
	var text = "<?php echo _BC_ERROR_NOPOPUP;?>";
	text = text + "<br>" + '<?php echo sprintf(_BC_OPENUNDETACHED, "<a href=\"".bc_getLiveSite()."/index.php?option=com_blastchatc&d=0\">"._BC_OPENUNDETACHED_HERE."</a>");?>';
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
<?php
} elseif ($goingtodetach == 0 || $detached == 0 || !$type) {
	if ($expanded || !$type) {
?>
<iframe NAME="blastchatc" ID="blastchatc" SRC="<?php echo $request;?>" HEIGHT="480" WIDTH="100%" FRAMEBORDER="0" marginwidth="0" marginheight="0" SCROLLING="AUTO">
</iframe>
<?php
	}
}
?>
<!-- !!! Do not remove, tamper with, obstruct visibility or obstruct readability of following code unless you have received written permission to do so by owner of BlastChat !!! -->
<div align="center" style="width:100%; font-size: 10px; text-align:center; margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px;">Powered by <a href="http://www.blastchat.com" target="_blank" title="BlastChat - free chat for your website">BlastChat</a></div>
			</td>
		</tr>
	</table>
<?php
	}

	function defaultHTML()
	{
		?>
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminform"">
		<tr>
			<th nowrap width="100%"><span class="sectionname">&nbsp;BlastChat</span></th>
		</tr>
	</table>
<?php
	}
}
