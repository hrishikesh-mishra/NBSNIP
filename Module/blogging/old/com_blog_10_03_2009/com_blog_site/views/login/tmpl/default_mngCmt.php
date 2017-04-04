<?php
defined ('_JEXEC') or die('Restricted Access');
$sess= JFactory::getSession();
if (!$sess->get('access','','blog')|| !$sess->get('userid','','blog'))
{
	echo 'Access Forbiden';
	exit();
}

?>

<style type="text/css">
  .errtext{ color :red; }
</style>
<div id="errtext" name="errtext" class="errtext">
<?php if(!empty($this->mngCmtMsg))
{
	echo "<strong>".$this->mngCmtMsg."</strong>";
	$this->mngCmtMsg="";
 }
?></div>

<div id="divmngblg">
  <table width="100%" border="1" cellspacing="0" cellpadding="10">
    <tr>
      <th align="left" valign="middle" scope="col"><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" color="#00CC00"><strong>Manage Comments </strong></font></th>
    </tr>
    
    <tr>
      <td>  <table width="100%" border="1" bordercolor="#727272" cellpadding="0">
    <tr>
      <th width="3%" height="30" align="center" valign="middle" bgcolor="#EAEAEA" scope="col">Sln</th>
      <th width="24%" align="center" valign="middle" bgcolor="#EAEAEA" scope="col">Comment On </th>
      <th width="15%" align="center" valign="middle" bgcolor="#EAEAEA" scope="col">Comment By </th>
      <th width="15%" align="center" valign="middle" bgcolor="#EAEAEA" scope="col">Date</th>
      <th width="13%" align="center" valign="middle" bgcolor="#EAEAEA" scope="col">Status</th>
      <th width="30%" align="center" valign="middle" bgcolor="#EAEAEA" scope="col">Action</th>
    </tr>
	<?php
		
		for($i=0, $n=count($this->cmtData); $i<$n; $i++)
		{
			$row= $this->cmtData[$i];
		
			$rlink=JRoute::_('index.php?option=com_blog&task=mngCmtRd&di='.$row->id,false);
			$elink=JRoute::_('index.php?option=com_blog&task=mngCmtEd&di='.$row->id,false);
			$dlink=JRoute::_('index.php?option=com_blog&task=mngCmtDd&di='.$row->id,false);
			$plink=JRoute::_('index.php?option=com_blog&task=mngCmtPb&di='.$row->id,false);
			$uplink=JRoute::_('index.php?option=com_blog&task=mngCmtUpb&di='.$row->id,false);
			
	?>
    <tr>
      <td height="31" align="center" valign="middle"><?php echo $i +1; ?> </td>
      <td align="center" valign="middle"><?php echo substr($row->topic,0,100); ?></td>
      <td align="center" valign="middle"><?php echo $row->cname; ?></td>
      <td align="center" valign="middle"><?php echo $row->cdate; ?></td>
      <td align="center" valign="middle"><?php 
			if($row->published)
				echo '<font color="#009900"><strong>Published</strong></font>';
			else
				echo '<font color="#FF0000"><strong>Not Published</strong></font>';
			?></td>
      <td align="center" valign="middle"><p><a href="<?php echo $rlink; 
	  ?>" style="text-decoration:none"><strong><font color="#000000">Read&nbsp;</font></strong></a><a href="<?php echo $elink; 
	  ?>" style="text-decoration:none"><strong><font color="#0066FF">Edit&nbsp;</font></strong></a><a href="<?php echo $dlink; 
	  ?>" style="text-decoration:none" onclick="return confirm('Do You Really Want to Delete?');"><strong><font color="#FF0000">Delete&nbsp;</font></strong></a><a href="<?php echo $plink;
	  ?>" style="text-decoration:none"><strong><font color="#00FF0F">Publish&nbsp;</font></strong></a><a href="<?php echo $uplink;
	  ?>" style="text-decoration:none"><strong><font color="#FF0099">Un-Publish&nbsp;</font></strong></a> </p></td>
    </tr>
	<?php } ?>
    <tr>
      <td align="center" valign="middle" bgcolor="#EAEAEA">&nbsp;</td>
      <td align="center" valign="middle" bgcolor="#EAEAEA">&nbsp;</td>
      <td align="center" valign="middle" bgcolor="#EAEAEA">&nbsp;</td>
      <td align="center" valign="middle" bgcolor="#EAEAEA">&nbsp;</td>
      <td align="center" valign="middle" bgcolor="#EAEAEA">&nbsp;</td>
      <td align="center" valign="middle" bgcolor="#EAEAEA">&nbsp;</td>
    </tr>
  </table></td>
    </tr>
 
  </table>
</div>

