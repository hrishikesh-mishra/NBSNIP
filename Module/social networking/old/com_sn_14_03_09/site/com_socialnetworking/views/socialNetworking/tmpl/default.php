<?php 
 
 defined('_JEXEC') or ('Restricted Access');
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
     err="<strong>The '" + name + "' field cannot be blank.</strong><br />";
  }
}
 return err;
}


function LfFrmValidate()
{

var err=new String();

	err += FRMnonBlank("userid" , "User-ID");
    err += FRMnonBlank("password" , "Password");
	
   
   if (document.all || document.getElementById)
   { 
       if (err.length !=0)
       {
			//alert(err);
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
<?php if(!empty($this->msg))
{
	echo "<strong>".$this->msg."</strong>";
	$this->msg="";
 }
?>	</div>

<div>
  <table width="100%" border="0">
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="21%">&nbsp;</td>
      <td width="65%">&nbsp;</td>
      <td width="11%">&nbsp;</td>
    </tr>
    <tr>
      <td height="31">&nbsp;</td>
      <td rowspan="3"><img src="components/com_socialnetworking/assets/key.gif" ></td>
      <td rowspan="2" align="center" valign="middle"><font face="Verdana, Arial, Helvetica, sans-serif" color="#D8360E" size="+4" ><strong>Welcome</strong></font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
	  <form name="userLoginFrm" id="userLoginFrm" method="post" onSubmit="return LfFrmValidate();"  >
	  <table width="100%" border="0">
        <tr>
          <td colspan="2"><font face="Geneva, Arial, Helvetica, sans-serif" size="3" color="#000099"><strong>Login</strong></font></td>
          </tr>
        <tr>
          <td width="34%"><font size="2"  face="Verdana, Arial, Helvetica, sans-serif" color="#009966"><strong>User</strong></font></td>
          <td width="66%"><input type="text" name="userid" id="userid" size="8" maxlength="50" /></td>
        </tr>
        <tr>
          <td><font size="2"  face="Verdana, Arial, Helvetica, sans-serif" color="#009966"><strong>Password</strong></font></td>
          <td><input type="password" name="password" id="password" size="8" maxlength="50"/></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" id="login" name="login" value="Login"/></td>
          </tr>
      </table>
	  <input type="hidden" id="option" name="option" value="com_socialnetworking" />
	  <input type="hidden" id="task" name="task" value="login"/>
	  </form>
	  </td>
      <td rowspan="3"><img src="components/com_socialnetworking/assets/snbase.gif" height="300" width="100%"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="top"><p><a href="<?php echo JRoute::_('index.php?option=com_socialnetworking&task=frgFrm',false); ?>" style="text-decoration:none"><strong>Forget Password?</strong></a> </p>
      <p><a href="<?php echo JRoute::_('index.php?option=com_socialnetworking&task=usrReg',false); ?>" style="text-decoration:none"><strong>New User? </strong></a></p></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
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
