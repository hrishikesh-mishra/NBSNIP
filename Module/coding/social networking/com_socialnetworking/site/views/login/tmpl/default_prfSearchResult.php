<?php
defined ('_JEXEC') or die('Restricted Access');
$sess= JFactory::getSession();
$clientIP=sha1($_SERVER['REMOTE_ADDR']);

if (!$sess->get('access','','sn')|| !$sess->get('userid','','sn') || ($sess->get('clientip','','sn') !=$clientIP))
{
	echo 'Access Forbiden';
	exit();
}
?>
<div id="DivuserSearch">
  <table width="100%" border="0">
    <tr>
      <td height="63" colspan="3" align="center" valign="middle"><strong><font color="#990000" size="+2" face="Verdana, Arial, Helvetica, sans-serif">Seach Result </font></strong></td>
    </tr>
    <tr>
      <td height="23" colspan="3"><font face="Times New Roman, Times, serif" size="2" color="#333333"><strong><?php echo ' ['.count($this->searchdata).']'; ?> Search Result Found.</strong></font></td>
    </tr>
  
	  <?php
	  
		for($i=0, $n=count($this->searchdata); $i <$n; $i++)
		{
			$row=$this->searchdata[$i];
			$link=JRoute::_('index.php?option=com_socialNetworking&task=ldPrf&uid='.$row->userid);
			
	?>	
	   <tr>
      <td width="21%" height="209">&nbsp;</td>
      <td width="59%">
	  <table width="100%" height="203" border="0" cellspacing="0" cellpadding="5" bgcolor="#E9E9E9">
        <tr>
          <td colspan="5">&nbsp;</td>
          </tr>
        <tr>
          <td width="3%">&nbsp;</td>
          <td width="28%" rowspan="5" align="left" valign="top"><a href="<?php echo $link; ?>"><img src="<?php 
			jimport('joomla.filesystem.file');
			if (($row->image) && (JFile::exists(JPATH_COMPONENT_SITE.DS.'assets'.DS.'photos'.DS.$row->image)))
			{
				echo 'components/com_socialnetworking/assets/photos/'.$row->image;
			}
			else
			{
				echo 'components/com_socialnetworking/assets/photos/default_avatar.jpg';
			}
			?>" height="150" width="150" /></a></td>
          <td width="3%">&nbsp;</td>
          <td width="62%" align="left" valign="middle"><font color="#D3130E" face="Times New Roman, Times, serif" size="3"><strong><?php echo $row->firstname.', '.$row->lastname; ?></strong></font></td>
          <td width="4%">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td align="left" valign="middle"><font color="#330099" face="Arial, Helvetica, sans-serif" size="2"><strong>City:: <?php echo $row->city; ?></strong></font></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td align="left" valign="middle"><font color="#330099" face="Arial, Helvetica, sans-serif" size="2"><strong>State:: <?php echo $row->state; ?></strong></font></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td align="left" valign="middle"><font color="#330099" face="Arial, Helvetica, sans-serif" size="2"><strong>Sex::<?php echo $row->sex; ?></strong></font></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
          </tr>
      </table>
	  </td>
      <td width="20%">&nbsp;</td>
    </tr>
	  <?php
		}
		?>
    <tr>
      <td height="23" colspan="3">&nbsp;</td>
    </tr>
  </table>
</div>