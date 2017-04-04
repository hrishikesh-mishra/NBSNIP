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
<script type="text/javascript" language="javascript">
<!--
function FRMnonBlank(el, name)
{
 var err = new String();
if (document.all || document.getElementById)
{
  elid= document.getElementById(el);
  if(elid.value == "")
  {
     err="The '" + name + "' field cannot be blank.<br />";
  }
}
 return err;
}

function FRMvalidate()
{

var err=new String();

  err = FRMnonBlank("grpName" , "Group Discussion name");
  
  
   if (document.all || document.getElementById)
   { 
       if (err.length !=0)
       {
         errid = document.getElementById("errtext");
         errid.innerHTML = err;
         return false;
       }
    }
  return true;
}

//-->
</script>
<form name="grpDisc" id="grpDisc" method="post" onsubmit="return FRMvalidate(); ">
<div id="divCreateGroup">
  <table width="100%" border="0">
    <tr>
      <td width="14%" height="41">&nbsp;</td>
      <td colspan="2" align="center" valign="middle" bgcolor="#EDC7F1"><font face="Arial, Helvetica, sans-serif" size="3" color="#FF0000"><strong>Create New Group Discussion </strong></font></td>
      <td width="15%">&nbsp;</td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td width="22%"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#1021ED"><strong>Group Discusion Name:</strong></font></td>
      <td width="49%"><input type="text" name="grpName" id="grpName" maxlength="250"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="23">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Create New Group"></td>
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
<input type="hidden" id="task" name="task" value="crtGrp"/>
</form>