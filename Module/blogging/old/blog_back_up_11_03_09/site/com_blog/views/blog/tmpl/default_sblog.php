<?php 

 defined('_JEXEC') or die('Redirect Access');
 //print_r($this->bDData
 ?>
 <style type="text/css">
  .errtext{ color :red; }
</style>

<div id="errtext" name="errtext" class="errtext">
<?php if(!empty($this->bmsg))
{
	echo "<strong>".$this->bmsg."</strong>";
	$this->bmsg="";
 }
?></div>

<div id="divblg">
  <table width="100%" height="120" border="1" cellpadding="10" cellspacing="5">
    <tr>
      <td height="83" colspan="2" align="center" bgcolor="#F9F9F9"><font size="+4" color="#663300"
	   face="Georgia, Times New Roman, Times, serif"><strong>Blogs</strong></font></td>
    </tr>
	<?php 
	
		for($i=0, $n =count($this->bDData); $i<$n; $i++)
		{
			$link1=JRoute::_('index.php?option=com_blog&task=minf&di='.$this->bDData[$i]->id,false);
			?>
	
    <tr>
      <td width="51%" height="77" align="left" valign="top"><table width="100%" height="175" border="0" cellpadding="0" cellspacing="1" bgcolor="#F2F2F2">
        <tr>
          <td height="32" colspan="2"><font size="4" face="Verdana, Arial, Helvetica, sans-serif" color="#000099"><strong>Blogs</strong></font></td>
          </tr>
        <tr>
          <td width="23%" height="23" align="left" valign="middle"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#009966"><strong>Topic</strong></font></td>
          <td width="77%" align="left" valign="middle"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#333366"><strong>:<?php echo $this->bDData[$i]->topic; ?></strong></font></td>
        </tr>
        <tr>
          <td height="25" align="left" valign="middle">&nbsp;</td>
          <td align="left" valign="middle"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#333366"><strong>[<?php echo $this->bDData[$i]->bdate ;?>]</strong></font></td>
        </tr>
        <tr>
          <td height="23" align="left" valign="middle"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#009966"><strong>By</strong></font></td>
          <td align="left" valign="middle"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#333366"><strong>:<?php echo $this->bDData[$i]->userid; ?></strong></font></td>
        </tr>
        <tr>
          <td height="44" align="left" valign="top">&nbsp;</td>
          <td align="left" valign="top"><?php 
		  				echo substr($this->bDData[$i]->blog,0,100)." ...    "; 
			?><a href="<?php echo $link1; ?>" style="text-decoration:none"><strong><font color=="#FF00FF">View Full</font></strong></a></td>
        </tr>
      </table></td>
	  <?php
			$i++;
			$link2=JRoute::_('index.php?option=com_blog&task=minf&di='.$this->bDData[$i]->id,false);
		if ($i <$n)
		{
		?>
      <td width="49%"><table width="100%" height="174" border="0" cellpadding="0" cellspacing="1" bgcolor="#F2F2F2">
        <tr>
          <td height="32" colspan="2"><font size="4" face="Verdana, Arial, Helvetica, sans-serif" color="#000099"><strong>Blogs</strong></font></td>
        </tr>
        <tr>
          <td width="23%" height="23" align="left" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#009966"><strong>Topic</strong></font></td>
          <td width="77%" align="left" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#333366"><strong>:<?php echo $this->bDData[$i]->topic; ?></strong></font></td>
        </tr>
        <tr>
          <td height="24" align="left" valign="top">&nbsp;</td>
          <td align="left" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#333366"><strong>[<?php echo $this->bDData[$i]->bdate; ?>]</strong></font></td>
        </tr>
        <tr>
          <td height="23" align="left" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#009966"><strong>By</strong></font></td>
          <td align="left" valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#333366"><strong>:<?php echo $this->bDData[$i]->userid; ?></strong></font></td>
        </tr>
        <tr>
          <td height="44" align="left" valign="top">&nbsp;</td>
          <td align="left" valign="top"><?php 
			echo substr($this->bDData[$i]->blog,0,100) ." ...   " ; 
			?><a href="<?php echo $link2; ?>" style="text-decoration:none"><strong><font color=="#FF00FF">View Full</font></strong></a></td>
        </tr>
      </table></td>
	  <?php 
		}
			echo "</tr>";
	}
	?>		
  </table>
</div>
