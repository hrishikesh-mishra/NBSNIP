<?php 
 
 defined('_JEXEC') or ('Restricted Access');
 jimport('joomla.utilities.date');
 $dateNow= new JDate();
 $dateNow=$dateNow->toFormat('%Y-%m-%d');	
	

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

function sotFrmValidate()
{
	var err=new String();

	err = FRMnonBlank("txtsOnTopic" , "Search on Topic");
	
   
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

function sodFrmValidate()
{
	var err=new String();

	err = FRMnonBlank("searchDate" , "Search Date");
	
   
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

function sobFrmValidate()
{
	var err=new String();

	err = FRMnonBlank("txtBlogOfBlogger" , "Search on Blog of Bloger");
	
   
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

<div layer="0">
  <table width="750" border="0">
  <tr><td>
  	  <div id="layer1" align="right";  style="background-image: url('components/com_blog/assets/bbase.gif'); layer-background-imageurl url('components/com_blog/assets/bbase.gif');  width:500px; height:70px; border: 1px none #000000">
</div></td></tr>
<tr><td>
<div id="errtext" name="errtext" class="errtext">
<?php if(!empty($this->msg))
{
	echo "<strong>".$this->msg."</strong>";
	$this->msg="";
 }
?>	</div></td></tr>
    <tr>
      <td width="700" height="180"><table border="0" cellspacing="0" cellpadding="0" > 
<tr>
<td width="16" height="180"><div id="layer2" align="right";  style="background-image: url('components/com_blog/assets/frmbase_01.gif'); layer-background-imageurl url('components/com_blog/assets/frmbase_01.gif');  width:16px; height:180px; border: 1px none #000000"></div></td>
<td width="348" height="180"><div id="layer3" align="right";  style="background-image: url('components/com_blog/assets/frmbase_02.gif'); layer-background-imageurl url('components/com_blog/assets/frmbase_02.gif');  width:348px; height:180px; border: 1px none #000000">
<table border="0" cellspacing="0" cellpadding="1">
<tr><td height="10"/></tr>
<tr><td colspan="2"><font face="Geneva, Arial, Helvetica, sans-serif" size="3" color="#CC0000"><strong>Search:</strong></font></tr>
<tr><td><font face="Courier New, Courier, monospace" size="2" color="#408080" ><strong>Search Blogs of Bloggers:</strong></font></td>
<td>
<form name="searchBlogofBloggerFrm" id="searchBlogofBloggerFrm" method="post" onsubmit="return sobFrmValidate(); " >
<input type="text" size="15" maxlength="50" id="txtBlogOfBlogger" name="txtBlogOfBlogger" />
<input type ="hidden" name="option" value="com_blog" >
<input type="hidden" name="task" value="searchBloger" />
</form>
</td></tr>
<tr><td><font face="Courier New, Courier, monospace" size="2" color="#408080" ><strong>Search Blogs on Topic:</strong></font></td>
<td>
<form name="searchbytopicfrm" id="searchbytopicfrm" method="post" onsubmit="return sotFrmValidate(); " >
<input type="text" size="15" maxlength="50" id="txtsOnTopic" name="txtsOnTopic" />
<input type ="hidden" name="option" value="com_blog" >
<input type="hidden" name="task" value="searchOnTopic" />
</form>
</td></tr>
<form name="searchbytopicfrm" id="searchbytopicfrm" method="post" onsubmit="return sodFrmValidate(); " >
<tr><td><font face="Courier New, Courier, monospace" size="2" color="#408080" ><strong>Read Blogs On Date:</strong></font></td>
<td><?php echo JHTML::_('calendar',$dateNow,'searchDate','searchDate','%Y-%m-%d','readonly=readonly size=10'); ?><br/>(YYYY-MM-DD)</td></tr>
<tr><td colspan="2" align="right"><input type="submit" value="Read"/></td></tr>
<input type ="hidden" name="option" value="com_blog" >
<input type="hidden" name="task" value="searchByDate" />
</form>
</table>


</div></td>
<td width="189" height="180"><div id="layer4" align="right";  style="background-image: url('components/com_blog/assets/frmbase_03.gif'); layer-background-imageurl url('components/com_blog/assets/frmbase_03.gif');  width:189px; height:180px; border: 1px none #000000"><table width="189" cellpadding="5"  border="0" height="150">
<tr><td  valign="bottom" align="center"><a href="<?php echo JRoute::_("index.php?option=com_blog&task=registration");?>" style="text-decoration:none"><font face="Arial, Helvetica, sans-serif" size="+2" color="#FF00FF">
<strong>Registration</strong></font></a></td>
</tr></table></div></td>
<td width="134" height="180"><div id="layer5" align="right";  style="background-image: url('components/com_blog/assets/frmbase_04.gif'); layer-background-imageurl url('components/com_blog/assets/frmbase_04.gif');  width:134px; height:180px; border: 1px none #000000">
<table border="0" width="134" cellspacing="0" cellpadding="0">
<tr><td height="20"></td></tr>
<form id="loginfrm" name="loginfrm" method="post" onSubmit="return LfFrmValidate();">
<tr><td colspan="2"><font face="Geneva, Arial, Helvetica, sans-serif" size="3" color="#CC0000"><strong>Login:</strong></font></tr>
<tr><td><font face="Courier New, Courier, monospace" size="2" color="#06ACA4" ><strong>UserID:</strong></font></td>
<td align="left"><input type="text" id="userid" name="userid" size="7" maxlength="50"/></td></tr>
<tr><td><font face="Courier New, Courier, monospace" size="2" color="#06ACA4" ><strong>SCode:</strong></font></td>
<td align="left"><input type="password" id="password" name="password" size="7" maxlength="50"/></td></tr>
<tr><td colspan="2" align="right"><input type="submit" id="login" name="login" value="Login"/></td></tr>
<input type ="hidden" name="option" value="com_blog" >
<input type="hidden" name="task" value="login" >
</form>
<tr><td colspan="2"><a href="<?php echo JRoute::_("index.php?option=com_blog&task=frgFrm");?>" style="text-decoration:none"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#8000FF" ><strong><em>Forget Password?</em></strong></font></a></td>
</table>
</div></td>
<td width="13" height="180"><div id="layer6" align="right";  style="background-image: url('components/com_blog/assets/frmbase_05.gif'); layer-background-imageurl url('components/com_blog/assets/frmbase_05.gif');  width:13px; height:180px; border: 1px none #000000"></div></td>
</tr>
</table></td>
    </tr>	
  </table>  
</div>
