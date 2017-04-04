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
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td width="7%" height="44" bgcolor="#FBE2FE">&nbsp;</td>
      <td colspan="2" align="center" valign="top" bgcolor="#B5EABD"><font face="Times New Roman, Times, serif" size="+2" color="#C932BA"><strong>Discussion on </strong></font>
      <br/><font size="2" color="#000099"><strong><?php echo $this->grpTopicDtl->topic; ?></strong></font>      </td>
      <td width="7%" bgcolor="#FBE2FE">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FBE2FE">&nbsp;</td>
      <td width="20%" align="left" valign="top" bgcolor="#FBF7AE"><font face="Arial, Helvetica, sans-serif" size="2" color="#006600"><strong>Create by </strong></font></td>
      <td width="66%" align="left" valign="top" bgcolor="#FBF7AE"><font face="Arial, Helvetica, sans-serif" size="2" color="#800040"><strong> <?php echo $this->grpTopicDtl->firstname. ' ' .$this->grpTopicDtl->lastname; ?>
      <p><?php echo $this->grpTopicDtl->creationdate; ?></p></strong></font></td>
      <td bgcolor="#FBE2FE">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FBE2FE">&nbsp;</td>
      <td colspan="2" bgcolor="#FBE2FE"><hr color="#0000FF"/></td>
      <td bgcolor="#FBE2FE">&nbsp;</td>
    </tr>
    <tr>
      <td height="42" bgcolor="#FBE2FE">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#C6FBF9"><font face="Arial, Helvetica, sans-serif" size="2" color="#006600"><strong>Add Your Comment </strong></font></td>
	  <form name="frmCmnt" id="frmCmnt" method="post"> 
      <td bgcolor="#C6FBF9"><p>
        <textarea name="discussion" id="discussion" rows="10" cols="65"></textarea>
      </p>
      <p>
        <input type="submit" name="Submit" value="ADD">
</p></td>
	<input type="hidden" id="option" name="opiton" value="socialnetworking"/>
	<input type="hidden" id="task" name="task" value="addCmt" />
	<input type="hidden" id="gid" name="gid" value="<?php echo  $this->grpTopicDtl->id; ?>" />
	</form>
	
      <td bgcolor="#FBE2FE">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FBE2FE">&nbsp;</td>
      <td colspan="2" bgcolor="#FBE2FE"><hr color="#0000FF"/></td>
      <td bgcolor="#FBE2FE">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FBE2FE">&nbsp;</td>
      <td colspan="2" bgcolor="#DFE3F9"><font face="Arial, Helvetica, sans-serif" size="2" color="#006600"><strong>[<?php 
			if (count($this->grpData))
				echo count($this->grpData);
			else
				echo "0";
			?>] Comments Found. </strong></font></td>
      <td bgcolor="#FBE2FE">&nbsp;</td>
    </tr>
	<tr><td  bgcolor="#FBE2FE" colspan="4">&nbsp;</td>
    </tr>
	<?php 
		if (count($this->grpData))
		{
			for ($i=0, $n=count($this->grpData); $i <$n; $i++)
			{
				$row = $this->grpData[$i];
				
	?>
    <tr>
	  <td bgcolor="#FBE2FE">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#ECC6C4"><font face="Arial, Helvetica, sans-serif" size="2" color="#006600"><strong><?php echo "By : ".$row->firstname." " .$row->lastname. "<br/>".$row->adate ; ?></strong></font></td>
      <td align="left" valign="top" bgcolor="#ECC6C4"><font face="Times New Roman, Times, serif" size="2" color="#000000"><?php echo $row->discussion; ?></font></td>
      <td bgcolor="#FBE2FE">&nbsp;</td>
	</tr>
	<tr><td  bgcolor="#FBE2FE" colspan="4">&nbsp;</td>
    </tr>
	<?php } } ?>
    
    <tr>
      <td bgcolor="#FBE2FE">&nbsp;</td>
      <td colspan="2" bgcolor="#FBE2FE"><hr color="#0000FF"/></td>
      <td bgcolor="#FBE2FE">&nbsp;</td>
    </tr>
  </table>
</div>
