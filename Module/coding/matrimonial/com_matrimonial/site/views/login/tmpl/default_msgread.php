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
  <table width="550" border="0">
    <tr>
      <td colspan="2"><p>&nbsp;</p>
        <p><font face="Geneva, Arial, Helvetica, sans-serif" size="5" color="#FF00CC"> <strong> Read Message: </strong></font></p></td>
    </tr>
    <tr>
      <td width="15%" align="left" valign="top"><font face="Courier New, Courier, monospace" size="2" color="#0066FF"> <strong> Message-Date</strong></font></td>
      <td width="85%" align="left" valign="top"><strong>:<?php echo $this->rmsg->sdate; ?> </strong></td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Courier New, Courier, monospace" size="2" color="#0066FF"><strong>Sender</strong></font></td>
      <td align="left" valign="top"><strong>:<?php echo $this->rmsg->sender; ?></strong></td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Courier New, Courier, monospace" size="2" color="#0066FF"><strong>Title</strong></font></td>
      <td align="left" valign="top"><strong>:<?php echo $this->rmsg->title; ?></strong></td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Courier New, Courier, monospace" size="2" color="#0066FF"><strong>Message</strong></font></td>
      <td rowspan="2" align="left" valign="top"><strong>:</strong><?php echo $this->rmsg->msg; ?></td>
    </tr>
    <tr align="left" valign="top">
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
