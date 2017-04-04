<?php 
	defined('_JEXEC') or die("Restricted Access");
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

 
function FRMvalidate()
{

var err=new String();

  err += FRMnonBlank("sender" , "Sender");
   err += FRMnonBlank("title", "Title");
  err += FRMnonBlank("msg", "msg" );
   
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
<div id="layer1" align="center";  style="background-image: url('components/com_matrimonial/assets/matlog.gif'); layer-background-imageurl url('components/com_matrimonial/assets/matlog.gif');  width:504px; height:70px; border: 1px none #000000"></div>

<form name="msgform" id="msgform" method="post" onsubmit="return FRMvalidate();"  >
<div id="errtext" name="errtext" class="errtext">
<?php if(!empty($this->data['error']))
{
	echo $this->data['error'];
	$this->data['error']="";
 }
?>	</div>

<div id="layer<?php echo $i; ?>" align="left";  style="background-image: url('components/com_matrimonial/assets/mbase.gif'); layer-background-imageurl url('components/com_matrimonial/assets/mbase.gif');   width:500px; height:250px; border: 1px none #000000">
  <table width="100%" border="0">
    <tr>
      <td height="35" colspan="2" align="left" valign="bottom"><font face="Arial, Helvetica, sans-serif" size="4"  color="#CC0000"><strong> 
      Send Message To - <em> <?php echo strtoupper($this->data['userid']); ?></em></strong></font> </td>
    </tr>
    <tr>
      <td width="15%"><font face="Georgia, Times New Roman, Times, serif" size="2"  color="#FF00FF"><strong>Sender </strong></font></td>
      <td width="85%" align="left" valign="top"><input type="text" name="sender" id="sender" size="32" maxlength="50" 
      value="<?php if(!empty($this->data['sender']))
	{
		echo $this->data['sender'];
		$this->data['sender']="";
	}
	?>">	</td>
    </tr>
    <tr>
      <td><font face="Georgia, Times New Roman, Times, serif" size="2"  color="#FF00FF"><strong>Title</strong></font></td>
      <td align="left" valign="top"><input type="text" name="title" id="title" size="32"  maxlength="90" 
      value="<?php if(!empty($this->data['title']))
	{
		echo $this->data['title'];
		$this->data['title']="";
	}
	?>"/></td>
    </tr>
    <tr>
      <td><font face="Georgia, Times New Roman, Times, serif" size="2"  color="#FF00FF"><strong>Message</strong></font></td>
      <td rowspan="3" align="left" valign="top"><textarea name="msg" id="msg" rows="7" cols="45" ><?php if(!empty($this->data['msg']))
	{
		echo $this->data['msg'];
		$this->data['msg']="";
	}
	?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="submit"  value="send"></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
<input type ="hidden" name="option" value="com_matrimonial" >
<input type="hidden" name="task" value="sentmsg" >
<input type="hidden" name="userid" value="<?php echo $this->data['userid']; ?>">
</form>
