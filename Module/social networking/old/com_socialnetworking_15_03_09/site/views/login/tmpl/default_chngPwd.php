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
<script language="javascript">
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

function FRMmustMatch(el1, name1, el2, name2)
{
 var err= new String();

if (document.all || document.getElementById)
{
  elid1= document.getElementById(el1);
  elid2= document.getElementById(el2);
 if (elid1.value != elid2.value)
  {
   err="The values of '" + name1 + "' and '" + name2 +"' ";
   err += "do not match <br />";
  }
}

return err;
}

function FRMlength(el, name)
{
 var err= new String();

if (document.all || document.getElementById)
{
  elid= document.getElementById(el);
if (elid.value.length <6)
  {
   err="The length of '" + name + "' could not be less than 6.<br />";
   
  }
}
return err;
}
 
function FRMvalidate()
{

var err=new String();

  err += FRMnonBlank("password" , "Password");
  err += FRMnonBlank("cpassword", "Confirm-Password");
  err += FRMlength("password" , "Password");
  err += FRMmustMatch("password" , "Password", "cpassword" , "Confirm-Password");
   
   if (document.all || document.getElementById)
   { 
       if (err.length !=0)
       {
         errid = document.getElementById("errtextcp");
         errid.innerHTML = err;
         return false;
       }
    }
  return true;
}
//-->
</script>
</style>
<style type="text/css">
  .errtextcp{ color :red; }
</style>
<form name="cpFrm" id="cpFrm" method="post" onsubmit="return FRMvalidate();">
<div id="DivuserCP">
  <table width="100%" border="0">
  
    <tr>
      <td height="63" colspan="3"><font color="#990000" size="+2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Change Password</strong></font></td>
    </tr>
	<tr>
	<td colspan="3">
	<div id="errtextcp" name="errtextcp" class="errtextcp">
		<?php if(!empty($this->cpMsg))
		{
				echo "<strong>".$this->cpMsg."</strong>";
				$this->cpMsg="";
		}
		?>	</div></td>
	</tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="17%" height="23"><font size="2" face="Times New Roman, Times, serif" color="#000099"><strong>Password</strong></font></td>
      <td width="80%"><input type="password" name="password" id="password" size="25" maxlength="50"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><font size="2" face="Times New Roman, Times, serif" color="#000099"><strong>Confirm-Password:</strong></font></td>
      <td><input type="password" name="cpassword" id="cpassword" size="25" maxlength="50"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Change Password"></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
<input type="hidden" id="option" name="option" value="com_socialnetworking"/>
<input type="hidden" id="task" name="task" value="cngPwd"/>
</form>