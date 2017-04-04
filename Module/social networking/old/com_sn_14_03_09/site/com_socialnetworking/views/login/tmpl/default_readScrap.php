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
		
		for($i=0 ,$n =count($this->readScrpData); $i<$n; $++)
		{
			$row=$this->readScrpData[$i];
    <tr>
      <td height="23">&nbsp;</td>
      <td><table width="100%" border="0" cellpadding="0" cellspacing="2"	  bgcolor="#FEFBDA">

        <tr>
          <td>&nbsp;</td>
          <td width="22%" rowspan="5" align="left" valign="top">&nbsp;</td>
          <td>&nbsp;</td>
          <td align="left" valign="middle">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="5%">&nbsp;</td>
          <td width="4%">&nbsp;</td>
          <td width="61%" align="left" valign="middle"><font face="Times New Roman, Times, serif" size="2" color="#9900FF"><strong>Name</strong></font></td>
          <td width="8%">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td align="left" valign="middle"><font face="Times New Roman, Times, serif" size="2" color="#9900FF"><strong>date</strong></font></td>
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
          <td align="right" valign="middle"><font face="Times New Roman, Times, serif" size="2" color="#FF0000"><strong>Detele</strong></font> 
            <select name="select">
            </select> 
            <input type="submit" name="Submit" value="Change Status"></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3" rowspan="2" align="left" valign="top">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="23">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
