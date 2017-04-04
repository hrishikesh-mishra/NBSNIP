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

<script language="javascript" type="text/javascript">
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

var errName=new String();
var errCity=new String();
var errState=new String();

  errName = FRMnonBlank("name" , "Name");
  errCity = FRMnonBlank("city", "City");
  errState = FRMnonBlank("state" , "State");
    
   if (document.all || document.getElementById)
   { 
       if (errName.length !=0 && errCity !=0 && errState !=0 )
       {
         errid = document.getElementById("errtextsu");
         errid.innerHTML = 'At least on criteria must be mention.';
         return false;
       }
    }
  return true;
}
//-->
</script>
</style>
<style type="text/css">
  .errtextsu{ color :red; }
</style>

<form name="SearchUserFrm" id="SearchUserFrm" method="post" onsubmit="return FRMvalidate();">
<div id="DivuserSearch">
  <table width="100%" border="0">
    <tr>
      <td height="63" colspan="3" align="center" valign="middle"><strong><font color="#990000" size="+2" face="Verdana, Arial, Helvetica, sans-serif">Seach Profile </font></strong></td>
    </tr>
	<tr>
	<td colspan="3">
	<div id="errtextsu" name="errtextsu" class="errtextsu">
		<?php if(!empty($this->suMsg))
		{
				echo "<strong>".$this->suMsg."</strong>";
				$this->suMsg="";
		}
		?></div></td>
	</tr>
    <tr>
      <td width="41%">&nbsp;</td>
      <td width="14%" height="23"><font size="2" face="Courier New, Courier, monospace" color="#006600"><strong>Name:</strong></font></td>
      <td width="45%"><input type="text" name="name" id="name" size="25" maxlength="50"></td>
    </tr>
    <tr>
      <td height="23">&nbsp;</td>
      <td><font size="2" face="Courier New, Courier, monospace" color="#006600"><strong>City:</strong></font></td>
      <td><input type="text" name="city" id ="city" size="25" maxlength="25"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong><font color="#006600" size="2" face="Courier New, Courier, monospace">State:</font></strong></td>
      <td><input type="text" name="state" id="state" size="25" maxlength="25"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Search"></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
<input type="hidden" id="option" name="option" value="com_socialnetworking" />
<input type="hidden" id="task" name="task" value="srcPrf" />
</form>