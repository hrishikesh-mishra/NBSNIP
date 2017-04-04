<?php 
defined ('_JEXEC') or die('Restricted Access');
$sess= JFactory::getSession();
$clientIP=sha1($_SERVER['REMOTE_ADDR']);

if (!$sess->get('access','','sn')|| !$sess->get('userid','','sn') || ($sess->get('clientip','','sn') !=$clientIP))
{
	echo 'Access Forbiden';
	exit();
}

$logUserID=$sess->get('userid','','sn');

$readlink = JRoute::_('index.php?option=com_socialnetworking&task=rdPrf&uid='.$this->usrPrfData->userid,false);
$askfrndlink = JRoute::_('index.php?option=com_socialnetworking&task=askfrnd&uid='.$this->usrPrfData->userid,false);
$sndScrplink = JRoute::_('index.php?option=com_socialnetworking&task=sndScrp&uid='.$this->usrPrfData->userid,false);
$rdScrplink = JRoute::_('index.php?option=com_socialnetworking&task=rdScrp&uid='.$this->usrPrfData->userid,false);
$frdLstlink = JRoute::_('index.php?option=com_socialnetworking&task=frdLst&uid='.$this->usrPrfData->userid,false);

?>
<div id="divUsrPrf">
  <table width="100%" border="0">
    <tr>
      <td height="38" colspan="4"><font face="Arial, Helvetica, sans-serif" size="+2"  color="#9EA30C"><strong> Profile of <?php echo $this->usrPrfData->firstname.' '.$this->usrPrfData->lastname; ?> </strong></font> </td>
    </tr>
    <tr>
      <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td align="center" valign="middle" bgcolor="#EFEFEF"><a href="<?php echo $readlink; ?>" style="text-decoration:none"><font face="Times New Roman, Times, serif" size="3"  color="#7A307A"><strong>Read-Profile</strong></font></a></td>
          <?php 
			if (strtolower($this->usrPrfData->userid) != (strtolower($logUserID)))
			{
			 echo '<td align="center" valign="middle"  bgcolor="#EFEFEF"><a href="<?php echo $askfrndlink; ?>" style="text-decoration:none"><font face="Times New Roman, Times, serif" size="3"  color="#7A307A"><strong>Ask-for-Friend </strong></font></a></td>';
			}
		?>
          <td align="center" valign="middle" height="25" bgcolor="#EFEFEF"><a href="<?php echo $sndScrplink; ?>" style="text-decoration:none"><font face="Times New Roman, Times, serif" size="3"  color="#7A307A"><strong>Send-Scrap </strong></font></a></td>
          <td align="center" valign="middle" bgcolor="#EFEFEF"><a href="<?php echo $rdScrplink; ?>" style="text-decoration:none"><font face="Times New Roman, Times, serif" size="3"  color="#7A307A"><strong>Read-Scrap</strong></font></a></td>
          <td align="center" valign="middle" bgcolor="#EFEFEF"><a href="<?php echo $frdLstlink ; ?>" style="text-decoration:none"><font face="Times New Roman, Times, serif" size="3"  color="#7A307A"><strong>Friends-List</strong></font></a></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td width="1%">&nbsp;</td>
      <td width="32%" align="right" valign="top"><img src="<?php 
			jimport('joomla.filesystem.file');
			if (($this->usrPrfData->image) && (JFile::exists(JPATH_COMPONENT_SITE.DS.'assets'.DS.'photos'.DS.$this->usrPrfData->image)))
			{
				echo 'components/com_socialnetworking/assets/photos/'.$this->usrPrfData->image;
			}
			else
			{
				echo 'components/com_socialnetworking/assets/photos/default_avatar.jpg';
			}
			?>" height="150" width="200" ></td>
      <td width="64%" align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"  color="#478582" ><strong><?php echo $this->usrPrfData->aboutyourself; ?> </strong></font></td>
      <td width="3%">&nbsp;</td>
    </tr>
  </table>
</div>
