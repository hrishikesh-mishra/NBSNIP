<?php
defined ('_JEXEC') or die('Restricted Access');
$sess= JFactory::getSession();
if (!$sess->get('access','','blog')|| !$sess->get('userid','','blog'))
{
	echo 'Access Forbiden';
	exit();
}

?>
<div id="divmngblgRead">
  <table width="100%" border="1">
    <tr>
      <th height="54" align="left" valign="middle" scope="col"><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" color="#00CC00"><strong>Read Blogs</strong></font></th>
    </tr>
    
    <tr>
      <td>  <table width="100%" border="0" cellspacing="5" cellpadding="0">

        <tr>
          <td width="13%" align="left" valign="middle"><font face="Times New Roman, Times, serif" size="3" color="#990000"><strong>Topic</strong></font></td>
          <td width="87%" align="left" valign="middle"><strong>:<?php echo $this->mngReadData->topic ; ?></strong></td>
        </tr>
        <tr>
          <td align="left" valign="middle"><font face="Times New Roman, Times, serif" size="3" color="#990000"><strong>Date</strong></font></td>
          <td align="left" valign="middle"><strong>:<?php echo $this->mngReadData->bdate ; ?></strong></td>
        </tr>
        <tr>
          <td align="left" valign="middle"><font face="Times New Roman, Times, serif" size="3" color="#990000"><strong>Blog</strong></font></td>
          <td rowspan="2" align="left" valign="top"><?php echo $this->mngReadData->blog ; ?></td>
        </tr>
        <tr align="left" valign="middle">
          <td>&nbsp;</td>
          </tr>
      </table>    </td>
 
    </tr>
 
  </table>
</div>


