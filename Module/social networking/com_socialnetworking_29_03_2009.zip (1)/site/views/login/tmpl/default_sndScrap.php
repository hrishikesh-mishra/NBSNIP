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

var err=new String();

  err = FRMnonBlank("scrap" , "Scrap");
    
   if (document.all || document.getElementById)
   { 
       if (err.length !=0 )
       {
         errid = document.getElementById("errtextsc");
         errid.innerHTML = err;
         return false;
       }
    }
  return true;
}
//-->
//-->
</script>
</style>
<style type="text/css">
  .errtextsc{ color :red; }
</style>
<form name="scrapFrm" id="scrapFrm" method="post" onSubmit="return FRMvalidate();">
<div id="divReadPrf">
  <table width="100%" border="0" cellpadding="4" cellspacing="0">
    <tr>
      <td height="50" colspan="4" align="center" valign="middle"><font color="#990000" size="+2" face="Times New Roman, Times, serif"><strong>Send Scrap </strong></font></td>
    </tr>
   <tr>
	<td colspan="4">
	<div id="errtextsc" name="errtextsc" class="errtextsc">
		<?php if(!empty($this->scMsg))
		{
				echo "<strong>".$this->scMsg."</strong>";
				$this->scMsg="";
		}
		?></div></td>
	</tr>
    <tr>
      <td width="21%" height="23">&nbsp;</td>
      <td width="6%"><font face="Arial, Helvetica, sans-serif"  color="#000099" size="2"><strong>Scrap</strong></font></td>
      <td width="49%"> <input type="checkbox" name="private_scrap" id="private_scrap" value="1">
      <font face="Arial, Helvetica, sans-serif"  color="#000099" size="2"><strong>Private</strong></font></td>
      <td width="24%">&nbsp;</td>
    </tr>
    <tr>
      <td height="23">&nbsp;</td>
      <td colspan="2" rowspan="4" align="left" valign="top"><textarea name="scrap" id="scrap" rows="10" cols="70"  ></textarea></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="23">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="23">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="48">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="23">&nbsp;</td>
      <td><input type="submit" name="Submit" value="Send"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
<input type="hidden" id="option" name="option" value="com_socialnetworking"/>
<input type="hidden" id="recevier" name="recevier" value="<?php echo $this->usrPrfData->userid; ?>"/>
<input type="hidden" id="task" name="task" value="sendScarp"/>
</form>
