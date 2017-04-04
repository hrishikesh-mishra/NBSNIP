<?php
defined ('_JEXEC') or die('Restricted Access');
$sess= JFactory::getSession();
if (!$sess->get('access','','blog')|| !$sess->get('userid','','blog'))
{
	echo 'Access Forbiden';
	exit();
}

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
 
  err += FRMnonBlank("cname" , "Comment By");
  err += FRMnonBlank("comment" , "Comment");
   
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
<?php if(!empty($this->mngCmtEditMsg))
{
	echo "<strong>".$this->mngCmtEditMsg."</strong>";
	$this->mngCmtEditMsg="";
 }
?></div>
<table border="1" width="100%">
<tr>
      <td height="49" colspan="2"><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" color="#00CC00"><strong>Edit Comment</strong></font></td>
</tr>
<tr><td>
<form id="editCmdFrm" name="editCmdFrm" method="post" onsubmit="return FRMvalidate();">

<div id="divEdtCmg">
  <table width="100%" border="0">
    
    <tr>
      <td width="12%" align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#9900CC"><strong>Topic</strong></font></td>
      <td width="88%"><?php echo $this->mngCmtReadData->topic; ?></td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#9900CC"><strong>Date</strong></font></td>
      <td><?php echo $this->mngCmtReadData->cdate; ?></td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#9900CC"><strong>Comment By</strong></font> </td>
      <td><input type="text" name="cname" id="cname" size="32" maxlength="50" value="<?php echo $this->mngCmtReadData->cname; ?>"/></td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#9900CC"><strong>Comment</strong></font></td>
      <td><textarea name="comment" id="comment" rows="10" cols="70"><?php echo $this->mngCmtReadData->comment; ?></textarea></td>
    </tr>
	 <tr>
      <td/>
	  <td><input type="submit" value="Save"/></td>	  
    </tr>
  </table>
</div>
<input type="hidden" name="option" value="com_blog" />
<input type="hidden" name="task" value="saveEditCmt" />
<input type="hidden" name="id" value="<?php echo $this->mngCmtReadData->id;?>" />
</form>
</td></tr>
</table>