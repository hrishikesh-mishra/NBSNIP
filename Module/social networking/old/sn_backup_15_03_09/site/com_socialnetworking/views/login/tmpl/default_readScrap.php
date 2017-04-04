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
$options =array();
$options[]=JHTML::_('select.option',0,'Public');
$options[]=JHTML::_('select.option',1,'Private');
?>
<div id="divReadPrf">
  <table width="100%" border="0" cellpadding="0" cellspacing="2">
    <tr>
      <td height="50" colspan="3" align="center" valign="middle"><font color="#990000" size="+2" face="Times New Roman, Times, serif"><strong>Scrapbook</strong></font></td>
    </tr>
   
    <tr>
      <td width="18%" height="23">&nbsp;</td>
      <td width="65%">&nbsp;</td>
      <td width="17%">&nbsp;</td>
    </tr>
	<?php 
		
		for($i=0 ,$n =count($this->readScrpData); $i<$n; $i++)
		{
			$row=$this->readScrpData[$i];
			$link=JRoute::_('index.php?option=com_socialNetworking&task=ldPrf&uid='.$row->sender);
			
			if($row->private_scrap)
			{
				if((strtoupper($logUserID)==strtoupper($row->sender)) || (strtoupper($logUserID)==strtoupper($row->recevier)))
				{
					$link=JRoute::_('index.php?option=com_socialNetworking&task=ldPrf&uid='.$row->userid);
					?>
    <tr>
      <td height="23">&nbsp;</td>
      <td><table width="100%" border="1" cellpadding="0" cellspacing="2"	rules="groups" bgcolor="#FEFBDA">
        <tr>
          <td>&nbsp;</td>
          <td width="22%" rowspan="5" align="left" valign="top"><a href="<?php echo $link; ?>"><img src="<?php 
			jimport('joomla.filesystem.file');
			if (($row->image) && (JFile::exists(JPATH_COMPONENT_SITE.DS.'assets'.DS.'photos'.DS.$row->image)))
			{
				echo 'components/com_socialnetworking/assets/photos/'.$row->image;
			}
			else
			{
				echo 'components/com_socialnetworking/assets/photos/default_avatar.jpg';
			}
			?>" height="100" width="150"/></a></td>
          <td>&nbsp;</td>
          <td align="left" valign="middle">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="5%">&nbsp;</td>
          <td width="4%">&nbsp;</td>
          <td width="61%" align="left" valign="middle"><font face="Times New Roman, Times, serif" size="2" color="#9900FF"><strong><?php echo $row->firstname." ".$row->lastname; ?></strong></font></td>
          <td width="8%">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td align="left" valign="middle"><font face="Times New Roman, Times, serif" size="2" color="#9900FF"><strong><?php echo $row->sdate; ?></strong></font></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">&nbsp;</td>
          <td>&nbsp;</td>
          <td align="left" valign="middle">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
				
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
		  <?php 
			if((strtoupper($logUserID)==strtoupper($row->sender)) || (strtoupper($logUserID)==strtoupper($row->recevier)))
			{
			?>
          <td align="right" valign="middle">
		  <form name="delScrpFrm" id="delScrpFrm" method="post" onsubmit="return confirm('Do you really want to delete.'); ">
		  	<input type="submit" id="del" name="del" value="Delete"/>           
			<input type="hidden" id="option" name="option" value="com_socialnetworking" />
			<input type="hidden" id="task" name="task" value="delScrp" />
			<input type="hidden" id="id" name="id" value="<?php echo $row->id; ?>"/>
			<input type="hidden" id="rec" name="rec" value="<?php echo $row->recevier?>"/>
		</form>
		  <form name="cngScrpStatus" id="cngScrpStatus" method="post" >
		  		
           <?php echo JHTML::_('select.genericlist',$options,'privatemsg',null,'value','text',$row->private_scrap); ?><input type="submit" name="Submit" value="Change Status"> 
			<input type="hidden" id="option" name="option" value="com_socialnetworking" />
			<input type="hidden" id="task" name="task" value="chgScrpStatus" />
			<input type="hidden" id="id" name="id" value="<?php echo $row->id; ?>"/>
			<input type="hidden" id="rec" name="rec" value="<?php echo $row->recevier?>"/>
			</form></td>
			<?php
			}
			else
				echo "<td>&nbsp;</td>";
			?>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3" rowspan="2" align="left" valign="top"><?php echo $row->scrap; ?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
      <td>&nbsp;</td>
    </tr>
	<?php
		  }
		}
		else
		{
		?>
		<tr>
      <td height="23">&nbsp;</td>
      <td><table width="100%" border="1" cellpadding="0" cellspacing="2"	rules="groups" bgcolor="#FEFBDA">
        <tr>
          <td>&nbsp;</td>
          <td width="22%" rowspan="5" align="left" valign="top"><a href="<?php echo $link; ?>"><img src="<?php 
			jimport('joomla.filesystem.file');
			if (($row->image) && (JFile::exists(JPATH_COMPONENT_SITE.DS.'assets'.DS.'photos'.DS.$row->image)))
			{
				echo 'components/com_socialnetworking/assets/photos/'.$row->image;
			}
			else
			{
				echo 'components/com_socialnetworking/assets/photos/default_avatar.jpg';
			}
			?>" height="100" width="150"/></a></td>
          <td>&nbsp;</td>
          <td align="left" valign="middle">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="5%">&nbsp;</td>
          <td width="4%">&nbsp;</td>
          <td width="61%" align="left" valign="middle"><font face="Times New Roman, Times, serif" size="2" color="#9900FF"><strong><?php echo $row->firstname." ".$row->lastname; ?></strong></font></td>
          <td width="8%">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td align="left" valign="middle"><font face="Times New Roman, Times, serif" size="2" color="#9900FF"><strong><?php echo $row->sdate; ?></strong></font></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="23">&nbsp;</td>
          <td>&nbsp;</td>
          <td align="left" valign="middle">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
            <?php 
			if((strtoupper($logUserID)==strtoupper($row->sender)) || (strtoupper($logUserID)==strtoupper($row->recevier)))
			{
			?>
          <td align="right" valign="middle">
		  <form name="delScrpFrm" id="delScrpFrm" method="post" >
		  	<input type="submit" id="del" name="del"value="Delete"/>           
			<input type="hidden" id="option" name="option" value="com_socialnetworking" />
			<input type="hidden" id="task" name="task" value="delScrp" />
			<input type="hidden" id="id" name="id" value="<?php echo $row->id; ?>"/>
			<input type="hidden" id="rec" name="rec" value="<?php echo $row->recevier?>"/>
		</form>
           <form name="cngScrpStatus" id="cngScrpStatus" method="post" >		  		
           <?php echo JHTML::_('select.genericlist',$options,'privatemsg',null,'value','text',$row->private_scrap); ?><input type="submit" name="Submit" value="Change Status"> 
			<input type="hidden" id="option" name="option" value="com_socialnetworking" />
			<input type="hidden" id="task" name="task" value="chgScrpStatus" />
			<input type="hidden" id="id" name="id" value="<?php echo $row->id; ?>"/>
			<input type="hidden" id="rec" name="rec" value="<?php echo $row->recevier?>"/>
			</form></td>
			<?php
			}
			else
				echo "<td>&nbsp;</td>";
			?>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3" rowspan="2" align="left" valign="top"><?php echo $row->scrap; ?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
      <td>&nbsp;</td>
    </tr>
	<?php
		}
	?>
			
			
			
	  <tr>
      <td width="18%" height="23">&nbsp;</td>
      <td width="65%">&nbsp;</td>
      <td width="17%">&nbsp;</td>
    </tr>
	<?php
		}
		?>
    <tr>
      <td height="23">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
