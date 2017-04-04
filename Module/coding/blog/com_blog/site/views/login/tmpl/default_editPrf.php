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
 
function FRMvalidate()
{

var err=new String();
 
  err += FRMnonBlank("username" , "User-Name");
  err += FRMnonBlank("location" , "Location");
  err += FRMnonBlank("city" , "stat");
  err += FRMnonBlank("state" , "state");
   
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
<?php if(!empty($this->epMsg))
{
	echo "<strong>".$this->epMsg."</strong>";
	$this->epMsg="";
 }
?></div>
<form id="editPrfFrm" name="editPrfFrm" method="post" onsubmit="return FRMvalidate();" enctype="multipart/form-data">
<div id="divEdtPfr">
<table border="1" width="100%">
<tr> <td height="59">
<strong><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" color="#00CC00"><strong>Edit Profile </strong></font></strong>
</td>
</tr>
<tr><td>
  <table width="100%" border="0">   
    <tr>
      <td width="5%" align="left" valign="middle">&nbsp;</td>
      <td width="13%" height="45" align="left" valign="middle"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#6600CC"><strong>User Name </strong></font></td>
      <td width="82%"><input type="text" name="username" id="username" size="25" maxlength="50" 
	  value="<?php echo $this->prf->username;?>"/></td>
    </tr>
    <tr>
      <td align="left" valign="middle">&nbsp;</td>
      <td height="40" align="left" valign="middle"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#6600CC"><strong>Location </strong></font></td>
      <td><input type="text" name="location" id="location" size="25" maxlength="100"
	  value="<?php echo $this->prf->location ;?>"/></td>
    </tr>
    
	 <tr>
	   <td align="left" valign="middle">&nbsp;</td>
	   <td height="39" align="left" valign="middle"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#6600CC"><strong>City </strong></font></td>
      <td><input type="text" name="city" id="city" size="25" maxlength="25"
	  value="<?php echo $this->prf->city;?>"/></td>
    </tr>
	 <tr>
	   <td align="left" valign="middle">&nbsp;</td>
	   <td height="42" align="left" valign="middle"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#6600CC"><strong>State</strong></font></td>
      <td><input type="text" name="state" id="state" size="25" maxlength="25"
	  value="<?php echo $this->prf->state;?>"/></td>
    </tr>
	 <tr>
	   <td align="left" valign="middle">&nbsp;</td>
	   <td height="48" align="left" valign="middle"><strong><font color="#6600CC" size="2" face="Geneva, Arial, Helvetica, sans-serif">Photo</font></strong></td>
      <td><input type="file" name="photo" id="photo"></td>
    </tr>
	<tr>
	   <td>&nbsp;</td>
	   <td />
      <td><input type="submit" value="Save"/></td>
    </tr>
  </table>
  </td></tr></table>
</div>
<input type ="hidden" name="option" value="com_blog" >
<input type="hidden" name="task" value="savePrf" >
</form>