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
<form name="searchGrp" id="searchGrp" method="post">
<div id="divgrpsrch">
  <table width="100%" border="0">
    <tr>
      <td width="16%" height="43">&nbsp;</td>
      <td colspan="2" align="center" valign="middle" bgcolor="#FCE2F1"><font size="+2" color="#0000CC" face="Times New Roman, Times, serif"><strong>Search Group </strong></font> </td>
      <td width="13%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="13%" align="left" valign="top"><font size="2" color="#006600" face="Times New Roman, Times, serif"><strong>Search Key</strong></font> </td>
      <td width="58%"><input type="text" name="searchKey" id="searchKey" maxlength="200"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Search"></td>
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

<input type="hidden" id="option" name="opiton" value="socialnetworking"/>
<input type="hidden" id="task" name="task" value="searchGrp" />
</form>