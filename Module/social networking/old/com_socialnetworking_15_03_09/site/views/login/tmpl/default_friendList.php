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
<div id="divUserFrndLst">
  <table width="100%" border="0" cellpadding="4" cellspacing="2">
    <tr>
      <td height="51" colspan="3" align="center" valign="middle"><font face="Courier New, Courier, monospace" size="+3" color="#990033"><strong>Friend-Lists</strong></font></td>
    </tr>
    <tr>
      <td width="33%" height="23">&nbsp;</td>
      <td width="33%">&nbsp;</td>
      <td width="33%">&nbsp;</td>
    </tr>
   
     
	  <?php
		
		for ($i=0, $n=count($this->frndLst); $i<$n; )
		{
		
			echo "<tr>";
			
			for($j=0; $j<3 && $i<$n; $i++, $j++)
			{
				echo "<td>";
			 $row=$this->frndLst[$i];
			 $link=JRoute::_('index.php?option=com_socialNetworking&task=ldPrf&uid='.$row->friend);
		?>
	  <table width="75%" border="1" cellpadding="2" cellspacing="2" bordercolor="#999999" bgcolor="#EBEBEB">
        <tr>
          <td width="4%">&nbsp;</td>
          <td width="93%">&nbsp;</td>
          <td width="3%">&nbsp;</td>
        </tr>
        <tr>
          <td height="112">&nbsp;</td>
          <td align="center" valign="middle"><a href="<?php echo $link; ?>"><img src="<?php 
			jimport('joomla.filesystem.file');
			if (($row->image) && (JFile::exists(JPATH_COMPONENT_SITE.DS.'assets'.DS.'photos'.DS.$row->image)))
			{
				echo 'components/com_socialnetworking/assets/photos/'.$row->image;
			}
			else
			{
				echo 'components/com_socialnetworking/assets/photos/default_avatar.jpg';
			}
			?>" height="150" width="200" ></a></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle"><font color="#006699" face="Arial, Helvetica, sans-serif" size="2"><strong><?php echo $row->firstname.' '.$row->lastname ;?></strong></font></td>
          <td>&nbsp;</td>
        </tr>
        
        <tr>
          <td height="23">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
	  <?php
			echo "</td>";
			}
			echo "</tr>";
		}
	?>
	  
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>