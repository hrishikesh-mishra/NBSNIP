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
 
  err = FRMnonBlank("topic" , "Topic");
  
   
   if (document.all || document.getElementById)
   { 
       if (err.length !=0)
       {
         errid = document.getElementById("errtext");
         errid.innerHTML = err;
         return false;
       }
    }
	<?php	echo $editor->save( 'blog' ) ; ?>
  return true;
}

-->
</script>
<style type="text/css">
  .errtext{ color :red; }
</style>

<div id="divwriteblg">
<form name="writeblgFrm" id="writeblgFrm" method="post" onsubmit="return FRMvalidate();" >
<div id="errtext" name="errtext" class="errtext">
<?php if(!empty($this->smsg))
{
	echo "<strong>".$this->smsg."</strong>";
	$this->smsg="";
 }
?></div>
  <table width="100%" border="1" rules="groups" cellpadding="1" cellspacing="2">
  
    <tr>
      <td height="53" colspan="2"><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" color="#00CC00"><strong>Write Blog</strong></font></td>
    </tr>
    <tr>
      <td width="20%">&nbsp;</td>
      <td width="80%">&nbsp;</td>
    </tr>
    <tr>
      <td><font face="Courier New, Courier, monospace" size="3" color="#0000CC"><strong>Topic</strong></font></td>
      <td><strong>:</strong> <input type="text" id="topic" name="topic" size="30" maxlength="190" 
	  value="<?php echo $this->sdata->topic; ?>"/></td>
    </tr>
    <tr>
      <td valign="top" align="left"><font face="Courier New, Courier, monospace" size="3" color="#0000CC"><strong>Blog Content</strong></font></td>
      <td><?php	echo $editor->display( 'blog',  htmlspecialchars($this->sdata->blog, ENT_QUOTES), '80%', '400', '80', '80', array('pagebreak', 'readmore') ) ; ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Save"></td>
    </tr>
  </table>
<input type="hidden" name="option" value="com_blog" />
<input type="hidden" name="task" value="saveblg" />
<input type="hidden" name="id" value="<?php echo $this->sdata->id;?>" />

  </form>
</div>
