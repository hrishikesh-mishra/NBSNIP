<?php
defined ('_JEXEC') or die('Restricted Access');
$sess= JFactory::getSession();
if (!$sess->get('access','','blog')|| !$sess->get('userid','','blog'))
{
	echo 'Access Forbiden';
	exit();
}
$editor =& JFactory::getEditor();
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
  err += FRMnonBlank("cpassword" , "Confirm-Password");
  err += FRMmustMatch("password" , "Password" , "cpassword" , "Confirm-Password");
   err += FRMlength("password" , "Password");
  
  
   
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

-->
</script>
<style type="text/css">
  .errtext{ color :red; }
</style>
<div id="errtext" name="errtext" class="errtext">
<?php if(!empty($this->cpMsg))
{
	echo "<strong>".$this->cpMsg."</strong>";
	$this->cpMsg="";
 }
?></div>
<form id="cngPwdFrm" name="cngPwdFrm" method="post" onsubmit="return FRMvalidate(); ">
<div id="divCngPwd">
<table border="1" width="100%">
<tr> <td height="59">
<strong><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" color="#00CC00"><strong>Change Password </strong></font></strong>
</td>
</tr>
<tr><td>
  <table width="100%" border="0">   
    <tr>
      <td width="13%" height="32" align="left" valign="middle"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#6699FF"><strong>New Password </strong></font></td>
      <td width="87%"><input type="password" name="password" id="password" size="25" maxlength="50"></td>
    </tr>
    <tr>
      <td height="34" align="left" valign="middle"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#6699FF"><strong>Confirm Password </strong></font></td>
      <td><input type="password" name="cpassword" id="cpassword" size="25" maxlength="50"></td>
    </tr>
    <tr>
      <td height="32" align="left" valign="middle">&nbsp;</td>
      <td><input type="submit" name="Submit" value="Change Password"></td>
    </tr>
  </table>
  </td></tr></table>
</div>
<input type ="hidden" name="option" value="com_blog" >
<input type="hidden" name="task" value="chgPwd" >
</form>
