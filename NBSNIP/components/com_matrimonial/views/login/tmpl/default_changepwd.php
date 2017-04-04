<?php 
 
defined('_JEXEC') or ('Restricted Access');
$sess= JFactory::getSession();
if (!$sess->get('access','','mat')|| !$sess->get('userid','','mat'))
{
	echo 'Access Forbiden';
	exit();
}
$userid=$sess->get('userid','','mat');
 
 ?>
 <script type="text/javascript">
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
 
function FRMvalidate()
{

var err=new String();

  err += FRMnonBlank("newpwd" , "New Password");
   err += FRMnonBlank("cpwd", "Confirm Password");
  err += FRMmustMatch("newpwd", "New-Password","cpwd", "Confirm-Password" );
   
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
 

<div id="laver2">
<form name="chgpwdfrm" id="chgpwdfrm" method="post" onsubmit="return FRMvalidate();"  >
<div id="errtext" name="errtext" class="errtext">
<?php if(!empty($this->data['error']))
{
	echo $this->data['error'];
	$this->data['error']="";
 }
?></div>
  <table width="70%" border="0">
    <tr>
      <td height="50" colspan="2" align="left" valign="middle"> <font face="Verdana, Arial, Helvetica, sans-serif"  size="+1" color="#0CD00F"> <strong>Chage Password of <em><?php echo strtoupper($userid); ?></em></strong></font></td>
    </tr>
    <tr>
      <td width="19%" height="26"><font face="Geneva, Arial, Helvetica, sans-serif" size="2"  > <strong>New Password</strong></font></td>
      <td width="81%"><strong>:
        <input type="text" name="newpwd" id ="newpwd" size="32" maxlength="50" 
		value="<?php if(!empty($this->data['newpwd']))
		{
			echo $this->data['newpwd'];
			$this->data['newpwd']="";
		}
		?>">
      </strong></td>
    </tr>
    <tr>
      <td height="28"><font face="Geneva, Arial, Helvetica, sans-serif"  size="2"><strong>Confirm Password</strong></font></td>
      <td><strong>:
        <input type="text" name="cpwd" id ="cpwd" size="32" maxlength="50" 
		value="<?php if(!empty($this->data['cpwd']))
		{
			echo $this->data['cpwd'];
			$this->data['cpwd']="";
		}
		?>">
      </strong></td>
    </tr>
    <tr>
      <td><input type="submit" value="Change">
      <input type="reset"  value="Clear"></td>
      <td>&nbsp;</td>
    </tr>
  </table>
<input type ="hidden" name="option" value="com_matrimonial" >
<input type="hidden" name="task" value="chgpwd" >
<input type="hidden" name="userid" value="<?php echo $userid; ?>">
 </form>
</div>
