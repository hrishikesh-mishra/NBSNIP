<?php 
defined ('_JEXEC') or die('Restricted Access');
$sess= JFactory::getSession();
$clientIP=sha1($_SERVER['REMOTE_ADDR']);

if (!$sess->get('access','','sn')|| !$sess->get('userid','','sn') || ($sess->get('clientip','','sn') !=$clientIP))
{
	echo 'Access Forbiden';
	exit();
}

$LogUserID=$sess->get('userid','','sn');
$homelink = JRoute::_('index.php?option=com_socialnetworking&task=hm',false);
$grplink = JRoute::_('index.php?option=com_socialnetworking&task=grp',false);
$editPrflink = JRoute::_('index.php?option=com_socialnetworking&task=edtPrf',false);
$cplink = JRoute::_('index.php?option=com_socialnetworking&task=cp',false);
$searchlink = JRoute::_('index.php?option=com_socialnetworking&task=search',false);
$logoutlink = JRoute::_('index.php?option=com_socialnetworking&task=userlogout',false);
?>

<div id="divusermain">
  <table width="100%" border="0" cellpadding="5" cellspacing="0">
    <tr>
      <td height="67" colspan="6" align="left" valign="middle"><p><font size="+3" color="#FF00FF" face="Arial, Helvetica, sans-serif" ><strong>Welcome User - <?php echo $LogUserID; ?></strong></font></p>
      </td>
    </tr>
	<tr>
	<td colspan="6"><div id="errtext" name="errtext" class="errtext">
		<?php if(!empty($this->urMsg))
		{
			echo '<font color="#FF0000"><strong>'.$this->urMsg.'</strong>';
			$this->urMsg="";
		}
		?></div></td>
	</tr>	
    <tr>
      <td width="15%" height="20" align="center" valign="middle" bgcolor="#E5E5E5"><a href="<?php echo $homelink;?>" style="text-decoration:none"><font face="Geneva, Arial, Helvetica, sans-serif" size="3" color="#006600" ><strong>Home</strong></font></a></td>
	   <td width="14%" align="center" valign="middle" bgcolor="#E5E5E5"><a href="<?php echo $grplink ;?>" style="text-decoration:none"><font face="Geneva, Arial, Helvetica, sans-serif" size="3" color="#006600" ><strong>Group Discussion</strong></font></a></td>
      <td width="19%" align="center" valign="middle" bgcolor="#E5E5E5"><a href="<?php echo $editPrflink;?>" style="text-decoration:none"><font face="Geneva, Arial, Helvetica, sans-serif" size="3" color="#006600" ><strong>Edit-Profile</strong></font></a></td>
      <td width="37%" align="center" valign="middle" bgcolor="#E5E5E5"><a href="<?php echo $cplink;?>" style="text-decoration:none"><font face="Geneva, Arial, Helvetica, sans-serif" size="3" color="#006600" ><strong>Change-Password</strong></font></a></td>
      <td width="14%" align="center" valign="middle" bgcolor="#E5E5E5"><a href="<?php echo $searchlink;?>" style="text-decoration:none"><font face="Geneva, Arial, Helvetica, sans-serif" size="3" color="#006600" ><strong>Search</strong></font></a></td>
      <td width="15%" align="center" valign="middle" bgcolor="#E5E5E5"><a href="<?php echo $logoutlink;?>" style="text-decoration:none"><font face="Geneva, Arial, Helvetica, sans-serif" size="3" color="#FF0000" ><strong>Logout</strong></font></a></td>
    </tr>
  </table>
  <table width="100%" border="0">
    <tr>
		<td  width="100%" height="20">&nbsp;</td>
	</tr>
	</table>	
</div>
