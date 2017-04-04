<?php 
defined ('_JEXEC') or die('Restricted Access');
?>
<script language="javascript" >
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

function FRMvalidate()
{
	var err=new String();
	err += FRMnonBlank("userid" , "User-ID");
	err += FRMcheckEmail("emailid" , "Email-ID");
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
  td { padding: 5px; }
</style>
<div id="layer1" align="center";  style="background-image: url('components/com_blog/assets/bbase.gif'); layer-background-imageurl url('components/com_blog/assets/bbase.gif');  width:500px; height:70px; border: 1px none #000000"></div>
<form name="frgpwd" id="frgpwd" method="post" onsubmit="return FRMvalidate();">

<div id="frgpwddiv">
  <table width="40%" height="113" border="0" cellspacing="0" cellpadding="0">
  	<tr>
  <td colspan="2">
  <div id="errtext" name="errtext" class="errtext">
<?php 
	if (!empty($this->msg))
	{
		echo $this->msg;
		$this->msg='';
	}
?>
</div>
  </td>
  </tr>
    <tr>
      <td width="24%" height="35"><strong>User-ID</strong></td>
      <td width="76%"><input type="text" name="userid" id="userid" size="25" maxlength="50"></td>
    </tr>
    <tr>
      <td height="36"><strong>Email-ID</strong></td>
      <td><input type="text" name="emailid" id="emailid" size="25" maxlength="150"></td>
    </tr>
    <tr>
      <td height="32" ><input type="submit" name="Submit" value="Submit"></td>
	<td> <input type="button" value="Back" onClick="javascript: history.go(-1)"></td>

    </tr>
  </table>  


</div>
<input type ="hidden" name="option" value="com_blog" >
<input type="hidden" name="task" value="newpwd" >
</form>