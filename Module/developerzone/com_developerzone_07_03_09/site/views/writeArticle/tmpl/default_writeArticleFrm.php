<?php 
 
 defined('_JEXEC') or ('Restricted Access');
 $options =array();

	for ($i=0, $n=count($this->cat); $i < $n; $i++)	
	{
		$row = $this->cat[$i];
		$options[]= JHTML::_('select.option',$row->id,$row->category);
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
	
	err += FRMnonBlank("title" , "Title");
	err += FRMnonBlank("category" , "Category");
	err += FRMnonBlank("author" , "Author");
	err += FRMnonBlank("article" , "Article");
	
   
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

<div layer="0">
  <table width="750" border="0">
    <tr>
      <td colspan="2"><table border="0" cellspacing="0" cellpadding="0" > 
<tr>
<td><IMG height="80" src="components/com_developerzone/assets/devbase/devbase_01.gif" width="380" border="0"></td>
<td><IMG height=80 src="components/com_developerzone/assets/devbase/devbase_02.gif" width="54" border="0" usemap=#map><MAP name="Map"><AREA shape=Rect coords=0,0,54,80 href="<?php echo JRoute::_('index.php?option=com_developerzone'); ?>"></MAP></td>
<td><IMG height=80 src="components/com_developerzone/assets/devbase/devbase_03.gif" width="98" border="0" usemap=#map1><MAP name="Map1"><AREA shape=Rect coords=0,0,98,80 href="<?php echo JRoute::_('index.php?option=com_developerzone&task=dwnlodfrm'); ?>"></MAP></td>
<td><IMG height=80 src="components/com_developerzone/assets/devbase/devbase_04.gif" width=62 border=0 usemap=#map2><MAP name="Map2"><AREA shape=Rect coords=0,0,62,80 href="<?php echo JRoute::_('index.php?option=com_developerzone&task=readArtclFrm'); ?>"></MAP></td>
<td><IMG height=80 src="components/com_developerzone/assets/devbase/devbase_05.gif" width=59 border=0 usemap=#map3><MAP name="Map3"><AREA shape=Rect coords=0,0,59,80 href="<?php echo JRoute::_('index.php?option=com_developerzone&task=codeSubmitFrm'); ?>"></MAP></td>
<td><IMG height=80 src="components/com_developerzone/assets/devbase/devbase_06.gif" width=11 border=0></td>
<td><IMG height=80 src="components/com_developerzone/assets/devbase/devbase_07.gif" width=55 border=0 usemap=#map4><MAP name="Map4"><AREA shape=Rect coords=0,0,55,80 href="<?php echo JRoute::_('index.php?option=com_developerzone&task=writArtFrm'); ?>"></MAP></td>
<td><IMG height=80 src="components/com_developerzone/assets/devbase/devbase_08.gif" width=37 border=0></td>
</tr>
</table></td>
    </tr>
	<form name="submitcodfrm" id="submitcodfrm" method="post" onSubmit="return FRMvalidate();" enctype="multipart/form-data" >
    <tr>     
	<td  height="100" colspan="2"> 
	 <font face="Geneva, Arial, Helvetica, sans-serif" size="5" color="#0033FF"><strong>WRITE ARTICLE</strong></font>
	  <div id="errtext" name="errtext" class="errtext"><?php 
	
	if(!empty($this->msg))
	{
		echo '<strong>'.$this->msg.'</strong>';
		$this->msg="";
	}
	?>	</div>

	 </td>
    </tr>
	 <tr><td align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#9900CC"><strong>Title</strong></font></td> 
	   <td><input type="text" id="title" name="title" size="32" maxsize="90"/></td>
    </tr>
	 <tr><td align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#9900CC"><strong>Category</strong></font></td> 
	   <td><?php echo JHTML::_('select.genericlist',$options,'category',null,'value','text',$row = $this->cat[0]->category); ?></td>
    </tr>	
	 <tr>
	   <td align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#9900CC"><strong>Author</strong></font></td> 
	   <td><input type="text" id="author" name="author" size="32" maxsize="50"/></td>
    </tr>	
	 <tr><td align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#9900CC"><strong>About-Code</strong></font></td> 
	   <td><textarea id="article" name="article" rows="10" cols="60"></textarea></td>
    </tr>
	<tr><td>&nbsp;</td><td align="left" valign="top"><input type="submit" value="Submit-Code"></td>
	</tr>
<input type="hidden" name="option" value="com_developerzone" />
<input type="hidden" name="task" value="submitArticle" />
</form>
  </table>  
</div>
