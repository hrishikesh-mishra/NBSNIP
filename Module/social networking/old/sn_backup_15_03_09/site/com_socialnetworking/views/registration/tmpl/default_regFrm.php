<?php 
	
	defined('_JEXEC') or die ('Restricted Access');
	jimport('joomla.utilities.date');
 $dateNow= new JDate();
 $dateNow=$dateNow->toFormat('%Y-%m-%d');	
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
  err += FRMnonBlank("firstname", "First-Name");
  err += FRMnonBlank("lastname", "Last-Name");
  err += FRMnonBlank("password", "Password" );
  err += FRMnonBlank("cpassword", "Confirm Password");
  err += FRMnonBlank("emailid" , "Email-ID");
  err += FRMcheckEmail("emailid" , "Email-ID");
  err += FRMlength("password" , "Password");
  err += FRMnonBlank("location" , "Location");
  err += FRMnonBlank("city" , "City");
  err += FRMnonBlank("state" , "State");
  err += FRMnonBlank("imgtext" , "Image-Text");
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

<form name="userRegFrm" id="userRegFrm" method="post"  enctype="multipart/form-data" onsubmit="return FRMvalidate();" >
<div id="divusrreg">
  <table width="100%" border="0">
    <tr>
      <td height="56" colspan="4" align="center" valign="middle"><font size="+2" face="Georgia, Times New Roman, Times, serif" color="#15A5B0"><strong>User-Registration</strong></font></td>
    </tr>
	<tr>
	<td colspan="4">
	<div id="errtext" name="errtext" class="errtext">
		<?php if(!empty($this->uRMsg))
		{
				echo "<strong>".$this->uRMsg."</strong>";
				$this->uRMsg="";
		}
		?>	</div></td>
	</tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><font face="Courier New, Courier, monospace" color="#0033CC" size="3" ><strong>User Information</strong></font> </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><hr color="#A70AA3"/></td>
	  <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="5%">&nbsp;</td>
      <td width="17%" align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>User-ID</strong></font></td>
      <td width="75%" align="left" valign="middle"><input type="text" name="userid" id="userid" size="25" maxlength="50"></td>
      <td width="3%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>Password</strong></font></td>
      <td align="left" valign="middle"><input type="password" name="password" id="password" size="25" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>Confirm-Password</strong></font></td>
      <td align="left" valign="middle"><input type="password" name="cpassword" id="cpassword" size="25" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>Email-ID</strong></font></td>
      <td align="left" valign="middle"><input type="text" name="emailid" id="emailid" size="25" maxlength="200"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><img src="<?php echo 'components/com_socialnetworking/assets/captcha/'.$this->fileName; ?>"></td>
      <td align="left" valign="middle"><input type="text" name="imgtext" id="imgtext" size="10" maxlength="6"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="left" valign="middle"><hr color="#A70AA3"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="left" valign="middle"><font face="Courier New, Courier, monospace" color="#0033CC" size="3" ><strong>Personal Information</strong></font> </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="left" valign="middle"><hr color="#A70AA3"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>First-Name</strong></font></td>
      <td align="left" valign="middle"><input type="text" name="firstname" id="firstname" size="25" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>Last-Name</strong></font></td>
      <td align="left" valign="middle"><input type="text" name="lastname" id="lastname" size="25" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>Sex</strong></font></td>
      <td align="left" valign="middle"><select id="sex" name="sex"><option value="Male" selected="selected">Male</option><option value="Female">Female</option></select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>Date-of-Birth</strong></font> </td>
      <td align="left" valign="middle"><?php echo JHTML::_('calendar',$dateNow,'dob','dob','%Y-%m-%d','readonly=readonly size=10'); ?><br/><strong>(YYYY-MM-DD)<strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="left" valign="middle"><hr color="#A70AA3"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="left" valign="middle"><font face="Courier New, Courier, monospace" color="#0033CC" size="3" ><strong>Educational Information</strong></font> </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="left" valign="middle"><hr color="#A70AA3"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>High-School</strong></font></td>
      <td align="left" valign="middle"><input type="text" name="highschool" id="highschool" size="25" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>College</strong></font></td>
      <td align="left" valign="middle"><input type="text" name="college" id="college" size="25" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>University</strong></font></td>
      <td align="left" valign="middle"><input type="text" name="university" id="university" size="25" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>Specific-Degree</strong></font></td>
      <td align="left" valign="middle"><input type="text" name="specificdegree" id="specificdegree" size="25" maxlength="100"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="left" valign="middle"><hr color="#A70AA3"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="left" valign="middle"><font face="Courier New, Courier, monospace" color="#0033CC" size="3" ><strong>Professional-Information</strong></font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="left" valign="middle"><hr color="#A70AA3"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>Job-Title</strong></font></td>
      <td align="left" valign="middle"><input type="text" name="jobtitle" id="jobtitle" size="25" maxlength="100"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>Profession</strong></font></td>
      <td align="left" valign="middle"><input type="text" name="profession" id="profession" size="25" maxlength="100"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>Company/Organisation</strong></font></td>
      <td align="left" valign="middle"><input type="text" name="company" id="company" size="25" maxlength="100"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="left" valign="middle"><hr color="#A70AA3"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="left" valign="middle"><font face="Courier New, Courier, monospace" color="#0033CC" size="3" ><strong>Contact-Information</strong></font> </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="left" valign="middle"><hr color="#A70AA3"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>Location</strong></font></td>
      <td align="left" valign="middle"><input type="text" name="location" id="location" size="25" maxlength="100"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>City</strong></font></td>
      <td align="left" valign="middle"><input type="text" name="city" id="city" size="25" maxlength="25"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>State</strong></font></td>
      <td align="left" valign="middle"><input type="text" name="state" id="state" size="25" maxlength="25"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>Postal-Code</strong></font></td>
      <td align="left" valign="middle"><input type="text" name="postalcode" id="postalcode" size="10" maxlength="8"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>Phone</strong></font></td>
      <td align="left" valign="middle"><input type="text" name="phone" id="phone" size="25" maxlength="25"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>Mobile</strong></font></td>
      <td align="left" valign="middle"><input type="text" name="mobile" id="mobile" size="25" maxlength="25"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="left" valign="middle"><hr color="#A70AA3"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="left" valign="middle"><font face="Courier New, Courier, monospace" color="#0033CC" size="3" ><strong>About-YourSelf</strong></font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="left" valign="middle">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>Career-Skill</strong></font></td>
      <td align="left" valign="middle"><input type="text" name="careerskill" id="careerskill" size="32" maxlength="200"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>Career-Interest</strong></font></td>
      <td align="left" valign="middle"><input type="text" name="careerinterest" id="careerinterest" size="32" maxlength="200"></td>
      <td>&nbsp;</td>
    </tr>
	<tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>Photo</strong></font></td>
      <td align="left" valign="middle"><input type="file" name="photo" id="photo" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" color="#9900FF" size="2" ><strong>About-Yourself</strong></font></td>
      <td rowspan="2" align="left" valign="top"><textarea name="aboutyourself" id="aboutyourself" rows="5" cols="50"></textarea></td>
      <td>&nbsp;</td>
    </tr>
	
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><hr color="#A70AA3"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><table width="100%" border="0">
        <tr>
          <td width="5%">&nbsp;</td>
          <td width="14%"><input type="submit" name="Submit" value="Submit"></td>
          <td width="16%"><input name="Button" type="button" value="Back" onClick="javascript: history.go(-1)"></td>
          <td width="65%">&nbsp;</td>
        </tr>
      </table></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><hr color="#A70AA3"/></td>
    </tr>
  </table>
</div>
 <input type="hidden" name="option" id="option" value="com_socialnetworking" />
 <input type="hidden" name="task" id="task" value="regUserSave" />
</form>