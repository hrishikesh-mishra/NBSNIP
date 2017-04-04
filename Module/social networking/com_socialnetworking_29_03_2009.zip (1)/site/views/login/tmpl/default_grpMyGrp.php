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
<div id="divgrp">
  <table width="100%" border="0" cellpadding = "1"  cellspacing="1">
    <tr>
      <td width="12%" height="45">&nbsp;</td>
      <td colspan="2" align="center" valign="middle" bgcolor="#DFF4FF"><font color="#990000" size="+2" face="Times New Roman, Times, serif"  ><strong>My Created Group Discussion </strong></font></td>
      <td width="14%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" ><?php
	
		if (count ($this->myGrp))
		{
		?>
		<table width="100%" border="0" cellspacing="0">
		<?php 
			$n = count ($this->myGrp); 
			$k=0; 
			$counter= $n/4;
			for ($i=0 ; $i <= $counter; $i++)
			{
				echo "<tr>";
				for ($j=0; $j<4 ; $j++)
				{
					if ($k < $n)
					{
						$link =JRoute::_('index.php?option=com_socialnetworking&task=discDtl&id='.$this->myGrp[$k]->id,false);
						echo '<td bgcolor="#EAEAEA" height="20" width = "25%" align="center" valign="middle"><a href="'.$link.'" style="text-decoration:none"><strong>'. $this->myGrp[$k]->topic. '</strong></a></td>'; 
						$k++;
					}
					else
						echo '<td bgcolor="#EAEAEA" height="20"  width = "25%"  align="center" valign="middle">&nbsp;</td>';
				}
				echo "</td>";
			}
			?>
			
        </table>
		<?php  }?>
		</td>
      <td>&nbsp;</td>
    </tr>
   
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
