<?php 
 
 defined('_JEXEC') or ('Restricted Access');
$sess= JFactory::getSession();
if (!$sess->get('access','','mat')|| !$sess->get('userid','','mat'))
{
	echo 'Access Forbiden';
	exit();
}
$userid=$sess->get('userid','','mat');
?>
<div>
  <table width="100%" border="0">
    <tr>
      <td height="45" colspan="3" align="left" valign="middle"><font face="Times New Roman, Times, serif" size="+2" color="#FF00FF"><strong>Your Criteria for Partner: </strong></font></td>
    </tr>
    <tr>
      <td width="14%" align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#669900" ><strong>Height Between</strong></font> </td>
      <td width="85%" align="left" valign="top"><strong>:<?php 
	  echo $this->scriteria->lfheight1. 'cm and '.$this->scriteria->lfheight2.'cm'; ?></strong></td>
      <td width="1%" align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#669900" ><strong>Age Between </strong></font></td>
      <td align="left" valign="top"><strong>:<?php 
	  echo $this->scriteria->lfage1. 'cm and '.$this->scriteria->lfage2.'cm'; ?></strong></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#669900" ><strong>Community</strong></font></td>
      <td align="left" valign="top"><strong>:<?php 
	  echo $this->scriteria->lfcommunity; ?></strong></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#669900" ><strong>Mother-Tongue</strong></font></td>
      <td align="left" valign="top"><strong>:<?php 
	  echo $this->scriteria->lfmothertongue; ?></strong></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#669900" ><strong>HMarital-Status</strong></font></td>
      <td align="left" valign="top"><strong>:<?php 
	  echo $this->scriteria->lfmstatus; ?></strong></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#669900" ><strong>Complexion</strong></font></td>
      <td align="left" valign="top"><strong>:<?php 
	  echo $this->scriteria->lfcomplexion; ?></strong></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#669900" ><strong>Profession</strong></font></td>
      <td align="left" valign="top"><strong>:<?php 
	  echo $this->scriteria->lfprofession; ?></strong></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
	<?php if ($this->scriteria->lfotherrequirement) :?>
    <tr>
      <td align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#669900" ><strong>Other-Requirement</strong></font></td>
      <td rowspan="2" align="left" valign="top"><em><?php 
	  echo $this->scriteria->lfotherrequirement; ?></em></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
	<?php endif;?>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="left" valign="top"><font face="Arial, Helvetica, sans-serif" size="2">
	  <strong><em>As per your criteria we have <?php echo count($this->sdata) ; ?> member(s):</em></strong></font></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="center" valign="top">
	  <?php
	for ($i=0, $n=count($this->sdata); $i < $n; $i++)	
	{
		$row = $this->sdata[$i];
		$link= JRoute::_('index.php?option=com_matrimonial&task=pinfo&userid='.$row->userid, false);
		$linkmsg=JRoute::_('index.php?option=com_matrimonial&task=sendmsg&userid='.$row->userid, false);
		
		
	?>

	<div id="layer<?php echo $i; ?>" align="left";  style="background-image: url('components/com_matrimonial/assets/sfbase.gif'); layer-background-imageurl url('components/com_matrimonial/assets/sfbase.gif');   width:400px; height:180px; border: 1px none #000000">
	 <table width="400px" height="180" border="0">
    <tr>
      <td width="6%">&nbsp;</td>
      <td width="28%">&nbsp;</td>
      <td width="4%">&nbsp;</td>
      <td width="58%">&nbsp;</td>
      <td width="2%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td rowspan="6"><input type="image" name="imageField" 
      src="components/com_matrimonial/assets/photos/<?php
		if($row->image)
		    echo $row->image; 
		else
		    echo 'blnkphotogif.gif';	
		?>" height="120" width="118"></td>
      <td>&nbsp;</td>
      <td><font face="Arial, Helvetica, sans-serif" size="2" color="#333333">Profile-id:
	  <strong><em><?php echo $row->userid; ?></em></strong></font> </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><font face="Arial, Helvetica, sans-serif" size="2" color="#333333">Name:
	  <strong><em><?php echo $row->username; ?></em></strong></font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><font face="Arial, Helvetica, sans-serif" size="2" color="#333333">Height:
	  <strong><em><?php echo $row->height; ?>cm</em></Strong></font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><font face="Arial, Helvetica, sans-serif" size="2" color="#333333">Age:
	  <strong><em><?php echo $row->age; ?>Years</em></strong></font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><font face="Arial, Helvetica, sans-serif" size="2" color="#333333">Community:
	  <strong><em><?php echo $row->community; ?></em></strong></font> </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><font face="Arial, Helvetica, sans-serif" size="2" color="#333333">M-Status:
	  <strong><em><?php echo $row->mstatus; ?></em></strong></font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><a href='<?php echo $linkmsg; ?>'><em>Post Message.</em></a></td>
      <td></td>
      <td><a href='<?php echo $link; ?>'><em>View</a></em></a></td>
      <td></td>
    </tr>
	
	
  </table>
	</div>
	  
	  <?php
	   }
	   ?>
	  
	  
	  
	  </td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
  </table>
</div>
