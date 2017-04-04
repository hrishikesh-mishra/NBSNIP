<?php 
	defined ('_JEXEC') or die("Restricted Access");
	defined ('_JEXEC') or die('Restricted Access');
	$sess= JFactory::getSession();
	if (!$sess->get('access','','blog')|| !$sess->get('userid','','blog'))
	{
		echo 'Access Forbiden';
		exit();
	}
	
	$writelink = JRoute::_('index.php?option=com_blog&task=writeblg',false);
	$mblink = JRoute::_('index.php?option=com_blog&task=mngblg',false);
	$cmtlink = JRoute::_('index.php?option=com_blog&task=cmt',false);
?>
<div id="divdesboard" style="border:thick">
  <table width="100%" border="1" rules="groups" cellpadding="2" cellspacing="2" >
    <tr>
      <td height="54" colspan="6" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" color="#00CC00"><strong>Dashboard</strong></font></td>
    </tr>

    <tr>
      <td height="25" colspan="6" valign="bottom"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#0033FF"><strong>Use these quick links to get started:</strong></font></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="2%">&nbsp;</td>
      <td width="27%"><a href="<?php echo $writelink; ?>" style="text-decoration:none"><font face="Times New Roman, Times, serif" size="3" color="#000000"><strong>
      <li>Write Blog</li></strong></font></a></td>
      <td width="38%" rowspan="8"><table width="100%" border="1" rules="groups" cellpadding="4" cellspacing="0">
          <tr>
            <td colspan="2" bgcolor="#FBFADB"><strong>Summary:</strong></td>
          </tr>
          <tr>
            <td colspan="2" bgcolor="#FBFADB">&nbsp;</td>
          </tr>
          <tr>
            <td width="63%" bgcolor="#FBFADB"><strong>Total Published Blogs </strong></td>
            <td width="37%" bgcolor="#FBFADB"><strong>:<?php echo $this->deskData['ttlpblg'];?></strong></td>
          </tr>
          <tr>
            <td bgcolor="#FBFADB"><strong>Total Unpulished Blogs</strong> </td>
            <td bgcolor="#FBFADB"><strong>:<?php echo $this->deskData['ttlblg']-$this->deskData['ttlpblg'];?></strong></td>
          </tr>
        <tr>
          <td bgcolor="#FBFADB"><strong>Total Blogs </strong></td>
          <td bgcolor="#FBFADB"><strong>:<?php echo $this->deskData['ttlblg'];?></strong></td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#FBFADB">&nbsp;</td>
          </tr>
        <tr>
          <td height="23" bgcolor="#FBFADB"><strong>Total Comment  </strong></td>
          <td height="23" bgcolor="#FBFADB"><strong>:<?php echo $this->deskData['ttlcmt'];?></strong></td>
        </tr>
        <tr>
          <td height="23" colspan="2" bgcolor="#FBFADB">&nbsp;</td>
        </tr>
      </table></td>
      <td width="3%">&nbsp;</td>
      <td width="27%" rowspan="8" align="left" valign="top"><?php 
	  if($this->deskData['image'])
		echo '<input type="image" name="imageField"  src="components/com_blog/assets/photos/'.$this->deskData['image'] .'" height="200" width="240">';
	 ?></td>
      <td width="3%">&nbsp;</td>
    </tr>
	
    <tr>
      <td>&nbsp;</td>
      <td><font face="Times New Roman, Times, serif" size="2"><strong>
        <a href="<?php echo $mblink; ?>" style="text-decoration:none"><font face="Times New Roman, Times, serif" color="#000000" size="3"><li><strong>Review Your Blogs</strong> </li></font></a>
      </strong></font></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><font face="Times New Roman, Times, serif" size="2"><strong>
         <a href="<?php echo $cmtlink; ?>" style="text-decoration:none"><font face="Times New Roman, Times, serif" color="#000000" size="3"><li><strong>Manage Comments</strong></li></font></a>
      </strong></font></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td rowspan="3" align="left" valign="top">The blogging system provides you to create of mangage blogs and also manage comments.</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="25">&nbsp;</td>
      <td><font  face="Geneva, Arial, Helvetica, sans-serif" color="#FF00FF" size="2"><strong>Last Login:<?php echo $this->deskData['lstvstdate'];?></strong></font></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
