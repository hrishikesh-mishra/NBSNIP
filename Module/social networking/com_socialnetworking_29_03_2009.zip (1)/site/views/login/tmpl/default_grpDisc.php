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
$newGrplink = JRoute::_('index.php?option=com_socialnetworking&task=newGrp',false);
$myCreatedGrouplink = JRoute::_('index.php?option=com_socialnetworking&task=myCGrp',false);
$myDisclink = JRoute::_('index.php?option=com_socialnetworking&task=myDisc',false);
$srchGrplink = JRoute::_('index.php?option=com_socialnetworking&task=srchGrp',false);
?>

<div id="divGroup">
  <p><font size="+2" color="#AF4F41" face="Times New Roman, Times, serif"><strong>Group Discussion</strong></font></p>
  <table width="100%" border="0" cellspacing="0" >
    <tr>
      <td width="25%" height ="25" align="center" valign="middle" bordercolor="#FF8000" bgcolor="#FBC6FA"><a href="<?php echo $newGrplink ; ?>" style="text-decoration:none"><font size="2" color="#3366FF" face="Verdana, Arial, Helvetica, sans-serif"><strong>Create New Group</strong></font></a></td>
      <td width="25%" align="center" valign="middle" bordercolor="#FF8000" bgcolor="#FBC6FA"><a href="<?php echo $myCreatedGrouplink ; ?>" style="text-decoration:none"><font size="2" color="#3366FF" face="Verdana, Arial, Helvetica, sans-serif"><strong>My Created Groups</strong></font></a></td>
      <td width="25%" align="center" valign="middle" bordercolor="#FF8000" bgcolor="#FBC6FA"><a href="<?php echo $myDisclink ; ?>" style="text-decoration:none"><font size="2" color="#3366FF" face="Verdana, Arial, Helvetica, sans-serif"><strong>My Group Discussions</strong></font></a></td>
      <td width="25%" align="center" valign="middle" bordercolor="#FF8000" bgcolor="#FBC6FA"><a href="<?php echo $srchGrplink ; ?>" style="text-decoration:none"><font size="2" color="#3366FF" face="Verdana, Arial, Helvetica, sans-serif"><strong>Search Group</strong></font></a></td>
    </tr>
  </table>
</div>
