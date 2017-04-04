<?php // no direct access
defined('_JEXEC') or die('Restricted access');
global $mainframe;
foreach ($this->entrys as $entry)
{
?>
<div class="easy_frame" style=" <?php if (!$entry->published) echo "background-color: #fffefd; border: #ffb39b solid 1px;";  ?> ">
<div class="easy_top" style=" <?php if (!$entry->published) echo "background-color: #FFE7D7;"; ?> ">
<div class="easy_top_left">
<b class="easy_big"><a name="gbentry_<?php echo $entry->id; ?>"><?php echo $entry->gbname ?></a></b>
<b class="easy_small">&nbsp;&nbsp;&nbsp;
<?php
	if ($entry->published) echo JHTML::_('date', $entry->gbdate, "%d %B %Y %H:%M"). " | " .$entry->gbloca;
	if (!$entry->published) echo " | </b><b class='easy_small_red'>". JText::_( 'Entry offline');
?>
</b></div>
<div class="easy_top_right">
			
<?php
	//Voting
	if ($this->params->get('show_rating', true) AND $entry->gbvote !== "0") {
		for($start=1;$start<=$this->params->get('rating_max', 5);$start++) {
			$ratimg = $entry->gbvote>=$start ? 'sun.png' : 'clouds.png';
			echo JHTML::_('image', 'components/com_easybook/images/'.$ratimg, JText::_('Rating'), 'border="0" class="easy_align_middle"');
			}
		}

	//Adminfunktionen
	$acl = $this->access;
	if($acl->canEdit || $acl->canRemove || $acl->canComment || $acl->canPublish) {echo "&nbsp;&nbsp;|&nbsp;&nbsp;";}
	if($acl->canEdit){echo "<a href='".JRoute::_('index.php?option=com_easybook&controller=entry&task=edit&cid='.(int)$entry->id)."'>".JHTML::_('image', 'components/com_easybook/images/edit.png', JText::_('Edit Entry'), 'class="easy_align_middle" border="0"')."</a>&nbsp;&nbsp;\n";}
	if($acl->canRemove){echo "<a href='".JRoute::_('index.php?option=com_easybook&controller=entry&task=remove&cid='.(int)$entry->id)."'>".JHTML::_('image', 'components/com_easybook/images/delete.png', JText::_('Delete Entry'), 'class="easy_align_middle" border="0"')."</a>&nbsp;&nbsp;\n";}
	if($acl->canComment) {
		if ($entry->gbcomment<>"") {
			echo "<a href='".JRoute::_('index.php?option=com_easybook&controller=entry&task=comment&cid='.(int)$entry->id)."'>".JHTML::_('image', 'components/com_easybook/images/comment_edit.png', JText::_('Edit Comment'), 'class="easy_align_middle" border="0"')."</a>&nbsp;&nbsp;\n";
		}
		else {
			echo "<a href='".JRoute::_('index.php?option=com_easybook&controller=entry&task=comment&cid='.(int)$entry->id)."'>".JHTML::_('image', 'components/com_easybook/images/comment.png', JText::_('Edit Comment'), 'class="easy_align_middle" border="0"')."</a>&nbsp;&nbsp;\n";
		}
	}
	if($acl->canPublish) {
		if ($entry->published == 0) {
			echo "<a href=\"".JRoute::_('index.php?option=com_easybook&controller=entry&task=publish&cid='.(int)$entry->id)."\">".JHTML::_('image', 'components/com_easybook/images/offline.png', JText::_('Publish Entry'), 'class="easy_align_middle" border="0"')."</a>\n";
		}
		else {
			echo "<a href=\"".JRoute::_('index.php?option=com_easybook&controller=entry&task=publish&cid='.(int)$entry->id)."\">".JHTML::_('image', 'components/com_easybook/images/online.png', JText::_('Unpublish Entry'), 'class="easy_align_middle" border="0"')."</a>\n";
		}
	}
?>
</div>
<div style="clear: both;"></div>
</div>
<?php if (($entry->gbmail<>"" AND $this->params->get('show_mail', true) AND $entry->gbmailshow)
OR ($entry->gbpage<>"" AND $this->params->get('show_home', true))
OR ($entry->gbicq<>"" AND $this->params->get('show_icq', true))
OR ($entry->gbaim<>"" AND $this->params->get('show_aim', true))
OR ($entry->gbmsn<>"" AND $this->params->get('show_msn', true))
OR ($entry->gbyah<>"" AND $this->params->get('show_yah', true))
OR ($entry->gbskype<>"" AND $this->params->get('show_skype', true))
) { ?>
<div class='easy_contact'>		
<?php

//Display contact details if available
//EMail
if ($entry->gbmail<>"" AND $this->params->get('show_mail', true) AND $entry->gbmailshow)
{
$image = JHTML::_('image', 'components/com_easybook/images/email.png', '', 'height="16" width="16" class="png" hspace="3" border="0"');
echo JHTML::_('email.cloak', $entry->gbmail, true, $image, false);
}

//Homepage
if ($entry->gbpage<>"" AND $this->params->get('show_home', true)) {
if (substr($entry->gbpage,0,7)!="http://") $entry->gbpage="http://$entry->gbpage";
echo "<a href=\"$entry->gbpage\" target=\"_blank\">".JHTML::_('image', 'components/com_easybook/images/world.png', $entry->gbpage, 'height="16" width="16" class="png" hspace="3" border="0"')."</a>";
}

//ICQ
if ($entry->gbicq<>"" AND $this->params->get('show_icq', true)) echo "<a href=\"mailto:$entry->gbicq@pager.icq.com\">".JHTML::_('image', 'components/com_easybook/images/im-icq.png', $entry->gbicq, 'title="'.$entry->gbicq.'" border="0" height="16" width="16" class="png" hspace="3"')."</a>";

//AIM
if ($entry->gbaim<>"" AND $this->params->get('show_aim', true)) echo "<a href=\"aim:goim?screenname=$entry->gbaim\">".JHTML::_('image', 'components/com_easybook/images/im-aim.png', $entry->gbaim, 'title="'.$entry->gbaim.'" border="0" height="16" width="16" class="png" hspace="3"')."</a>";

//MSN
if ($entry->gbmsn<>"" AND $this->params->get('show_msn', true)) echo JHTML::_('image', 'components/com_easybook/images/im-msn.png', $entry->gbmsn, 'title="'.$entry->gbmsn.'" border="0" height="16" width="16" class="png" hspace="3"');

//Yahoo
if ($entry->gbyah<>"" AND $this->params->get('show_yah', true)) echo "<a href='ymsgr:sendIM?$entry->gbyah'>".JHTML::_('image', 'components/com_easybook/images/im-yahoo.png', $entry->gbyah, 'title="'.$entry->gbyah.'" border="0" height="16" width="16" class="png" hspace="3"')."</a>";

//Skype
if ($entry->gbskype<>"" AND $this->params->get('show_skype', true)) echo "<a href='skype:" . $entry->gbskype . "?call'>".JHTML::_('image', 'components/com_easybook/images/im-skype.png', $entry->gbskype, 'title="'.$entry->gbskype.'" border="0" height="16" width="16" class="png" hspace="3"')."</a>";
?>
</div>
<?php } ?>

<div class="easy_content">
<?php echo EasybookHelperContent::parse($entry->gbtext) ?></div>
<?php if($entry->gbcomment){ ?>
<div class="easy_admincomment">
<?php echo JHTML::_('image', 'components/com_easybook/images/admin.png', JText::_('Admin Comment:'), 'class="easy_align_middle" style="padding-bottom: 2px;"'); ?>
<b><?php echo JText::_( 'Admin Comment'); ?>:</b>
<br />
<?php echo EasybookHelperContent::parse($entry->gbcomment) ?>
</div><?php } ?>

</div><p class="clr"></p>
<?php } ?>
