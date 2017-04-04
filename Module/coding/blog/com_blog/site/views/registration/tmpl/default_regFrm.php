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
  err += FRMlength("password" , "Password");
  err += FRMnonBlank("location" , "Location");
  err += FRMnonBlank("city" , "City");
  err += FRMnonBlank("state" , "State");
  err += FRMnonBlank("captcha" , "Image-Text");
  err += FRMlength("captcha" , "Image-Text");
  
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


<div id="layer1" align="right";  style="background-image: url('components/com_blog/assets/bbase.gif'); layer-background-imageurl url('components/com_blog/assets/bbase.gif');  width:500px; height:70px; border: 1px none #000000"></div>
<form name="userregfrm" id="userregfrm" method="post"  enctype="multipart/form-data" onsubmit="return FRMvalidate();">
<div id="errtext" name="errtext" class="errtext">
<?php if(!empty($this->msg))
{
	echo "<strong>".$this->msg."</strong>";
	$this->msg="";
 }
?>	</div>
<div id="layer1" align="right";  style="background-image: url('components/com_blog/assets/regbase.gif'); layer-background-imageurl url('components/com_blog/assets/regbase.gif');  width:450px; height:425px; border: 1px none #000000">
  <table width="450" height="425"  border="0">
    <tr>
      <td colspan="3" align="center" valign="middle">
	  <font face="Verdana, Arial, Helvetica, sans-serif" size="+2" color="#CC0099">
	  <strong>User Registration</strong></font></td>
    </tr>
    <tr>
      <td width="20" align="left" valign="top">&nbsp;</td>
      <td width="129" align="left" valign="middle"><font face="Times New Roman, Times, serif" size="2" color="#CC33CC">
	  <strong>User-ID</strong></font></td>
      <td width="279"><strong>:</strong><input type="text" name="userid" id="userid" size="25" maxlength="50"/>*</td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="middle"><font face="Times New Roman, Times, serif" size="2" color="#CC33CC">
	  <strong>User-Name</strong></font></td>
      <td><strong>:</strong><input type="text" name="username" id="username" size="25" maxlength="50"/>*</td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="middle"><font face="Times New Roman, Times, serif" size="2" color="#CC33CC">
	  <strong>Password</strong></font></td>
      <td><strong>:</strong><input type="password" name="password" id="password" size="25" maxlength="50"/>*</td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="middle"><font face="Times New Roman, Times, serif" size="2" color="#CC33CC">
	  <strong>Confirm-Pasword</strong></font></td>
      <td><strong>:</strong><input type="password" name="cpassword" id="cpassword" size="25" maxlength="50">*</td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="middle"><font face="Times New Roman, Times, serif" size="2" color="#CC33CC">
	  <strong>Email-ID</strong></font></td>
      <td><strong>:</strong><input type="text" name="emailid" id="emailid" size="25" maxlength="90"/>*</td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="middle"><font face="Times New Roman, Times, serif" size="2" color="#CC33CC">
	  <strong>Location</strong></font></td>
      <td><strong>:</strong><input type="text" name="location" id="location" size="25" maxlength="90">*</td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="middle"><font face="Times New Roman, Times, serif" size="2" color="#CC33CC">
	  <strong>City</strong></font></td>
      <td><strong>:</strong><input type="text" name="city" id="city" size="20" maxlength="25">*</td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="middle"><font face="Times New Roman, Times, serif" size="2" color="#CC33CC">
	  <strong>State</strong></font></td>
      <td><strong>:</strong><input type="text" name="state" id="state"  size="20" maxlength="25">*</td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="middle"><font face="Times New Roman, Times, serif" size="2" color="#CC33CC">
	  <strong>Phone</strong></font></td>
      <td><strong>:</strong><input type="text" name="phone" id="phone" size="15" maxlength="50"></td>
    </tr>
	<tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Times New Roman, Times, serif" size="2" color="#CC33CC"><strong>Photo</strong></font></td>
      <td><strong>:</strong><input type="file" name="photo" id="photo" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><img src="<?php echo 'components/com_blog/assets/captcha/'.$this->fileName;?>" > </td>
      <td><strong>:</strong><input type="text" name="captcha" id="captcha" size="10" maxlength="6">*</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle">&nbsp;</td>
      <td><input type="submit" name="Submit" value="Register"></td>
    </tr>
  </table>
</div>
<input type ="hidden" name="option" value="com_blog" >
<input type="hidden" name="task" value="userreg" >
</form>
