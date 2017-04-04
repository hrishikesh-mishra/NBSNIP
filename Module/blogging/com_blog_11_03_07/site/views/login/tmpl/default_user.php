<?php 
defined ('_JEXEC') or die('Restricted Access');
$sess= JFactory::getSession();
if (!$sess->get('access','','blog')|| !$sess->get('userid','','blog'))
{
	echo 'Access Forbiden';
	exit();
}

$userid=$sess->get('userid','','blog');
$dskbrdlink = JRoute::_('index.php?option=com_blog&task=dskbrd',false);
$writelink = JRoute::_('index.php?option=com_blog&task=writeblg',false);
$mblink = JRoute::_('index.php?option=com_blog&task=mngblg',false);
$cmtlink = JRoute::_('index.php?option=com_blog&task=cmt',false);
$cplink = JRoute::_('index.php?option=com_blog&task=cp',false);
$eplink = JRoute::_('index.php?option=com_blog&task=eprfl',false);
$logoutlink = JRoute::_('index.php?option=com_blog&task=userlogout',false);

?>
 <div id="layer1" align="right";  style="background-image: url('components/com_blog/assets/bbase.gif'); layer-background-imageurl url('components/com_blog/assets/bbase.gif');  width:500px; height:70px; border: 1px none #000000"></div>
 <font face="Arial, Helvetica, sans-serif" size="+2" color="#FF00FF"><strong>Welcome--<?php echo strtoupper($userid); ?></strong></font>
<div id="divuserheader">
  <table width="100%" border="0" rules="groups" cellpadding="0" cellspacing="0">
    <tr>
      <td height="31" align="center" valign="middle" bgcolor="#EBEBEB"><a href="<?php echo $dskbrdlink; ?>" style="text-decoration:none"><font color="#000000"><strong>Deskboard</strong></font></a></td>
      <td align="center" valign="middle" bgcolor="#EBEBEB"><a href="<?php echo $writelink; ?>" style="text-decoration:none"><font color="#000000"><strong>Write</strong></font></a></td>
      <td align="center" valign="middle" bgcolor="#EBEBEB"><a href="<?php echo $mblink; ?>" style="text-decoration:none"><font color="#000000"><strong>Manage Blogs </strong></font></a></td>
      <td align="center" valign="middle" bgcolor="#EBEBEB"><a href="<?php echo $cmtlink; ?>" style="text-decoration:none"><font color="#000000"><strong>Comments</strong></font></a></td>
      <td align="center" valign="middle" bgcolor="#EBEBEB"><a href="<?php echo $cplink; ?>" style="text-decoration:none"><font color="#000000"><strong>Change Password </strong></font></a></td>
      <td align="center" valign="middle" bgcolor="#EBEBEB"><a href="<?php echo $eplink; ?>" style="text-decoration:none"><font color="#000000"><strong>Edit Profile</strong></font></a></td>
      <td align="center" valign="middle" bgcolor="#EBEBEB"><a href="<?php echo $logoutlink; ?>" style="text-decoration:none"><Font color="#FF0000"><strong>Logout</strong></Font></a></td>
    </tr>
  </table> 
</div>
