<?php 

defined('_JEXEC') or die('Restircted Access');
?>
<script language="javascript">
<!--

function FRMcheckEmail(el,name)
{
 var err = new  String();
  var filter =/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  
if (document.all || document.getElementById)
{
  elid= document.getElementById(el);
  if (!filter.test(elid.value))
 {
   err="The '" + name +"' field must be a valid email address <br />";
}
}
return err;
}

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

  err += FRMnonBlank("userid" , "User-ID");
   err += FRMnonBlank("username", "User Name");
  err += FRMnonBlank("password", "Password" );
  err += FRMnonBlank("cpassword", "Confirm Password");
  err += FRMnonBlank("emailid" , "Email-ID");
  err += FRMcheckEmail("emailid" , "Email-ID");
  err += FRMlength("password" , "password");
  err += FRMmustMatch("password" , "Password", "cpassword" , "Confirm-Password");
   
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

<form name="userregis" id="userregis" method="post"  onsubmit="return FRMvalidate();" >

<table width="600" height="250"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td>
<div id="layer1" align="center";  style="background-image: url('components/com_matrimonial/assets/matlog.gif'); layer-background-imageurl url('components/com_matrimonial/assets/matlog.gif');  width:504px; height:70px; border: 1px none #000000"></div>
</td>
</tr>
<tr>
<td>
 <div id="errtext" name="errtext" class="errtext">
<?php if(!empty($this->message))
{
	echo $this->message;
	$this->message="";
 }
?>	</div>
</td></tr>
<tr><td>

<div id="layer2" align="center";  style="background-image: url('components/com_matrimonial/assets/space.gif'); layer-background-imageurl url('components/com_matrimonial/assets/space.gif');  width:574px; height:15px; border: 1px none #000000"></div>
</td></tr>
<tr><td>
<div id="layer1" align="center";  style="background-image: url('components/com_matrimonial/assets/regback.gif'); layer-background-imageurl url('components/com_matrimonial/assets/regback.gif');  width:350px; height:220px; border: 1px none #000000">
<table width="100%" border="0">
  <tr>
    <td colspan="2"><p><font face="Geneva, Arial, Helvetica, sans-serif" size="5" color="#00CC33"> <strong>Matrimonial User Registration</strong></font></p>
    <p><font face="Verdana, Arial, Helvetica, sans-serif" size="3" color="#FF0033"><strong><em>Account Information:</em></strong></font></p></td>
  </tr>
  <tr>
    <td width="19%" height="23" align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FF66CC"><strong>User ID </strong></font></td>
    <td width="81%" align="left" valign="top"><strong>:
      <input type="text" name="userid" id ="userid" size="32" maxlength="100" value="<?php 
	if (!empty($this->data['userid']))
	{
		echo $this->data['userid'];
		$this->data['userid']='';
	}
     ?>" />
    </strong></td>
  </tr>
  <tr>
    <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FF66CC"><strong>Name</strong></font></td>
    <td align="left" valign="top"><strong>:
      <input type="text" name="username" id ="username" size="32" maxlength="100" value="<?php 
	if (!empty($this->data['username']))
	{
		echo $this->data['username'];
		$this->data['username']='';
	}
     ?>" >
    </strong></td>
  </tr>
  <tr>
    <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FF66CC"><strong>Password</strong></font></td>
    <td align="left" valign="top"><strong>:
      <input type="password" name="password" id="password" size="32" maxlength="100" value="<?php 
	if (!empty($this->data['password']))
	{
		echo $this->data['password'];
		$this->data['password']='';
	}
     ?>" >
    </strong></td>
  </tr>
  <tr>
    <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FF66CC"><strong>Confirm Password</strong></font></td>
    <td align="left" valign="top"><strong>:
      <input type="password" name="cpassword" id ="cpassword" size="32" manlength="100" value="<?php 
	if (!empty($this->data['cpassword']))
	{
		echo $this->data['cpassword'];
		$this->data['cpassword']='';
	}
     ?>" >
    </strong></td>
  </tr>
  <tr>
    <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FF66CC"><strong>EMail-ID</strong></font></td>
    <td align="left" valign="top"><strong>:
      <input type="text" name="emailid" id ="emailid" size="32" maxlength="200" value="<?php 
	if (!empty($this->data['emailid']))
	{
		echo $this->data['emailid'];
		$this->data['emailid']='';
	}
     ?>" >
    </strong></td>
  </tr>
  <tr>
    <td height="35" colspan="2" align="left" valign="top"><table width="32%" height="31" border="0">
      <tr>
        <td align="center"><input type="submit"  value="Submit"></td>
       </tr>

    </table></td>
  </tr>
</table>
</div>
</td></tr></table>
<input type ="hidden" name="option" value="com_matrimonial" >
<input type="hidden" name="task" value="userreg" >
</form>


