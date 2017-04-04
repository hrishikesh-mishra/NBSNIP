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

  err = FRMnonBlank("category" , "Category");
   
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
    <tr>     
	<td width="50%" height="100"> 
	 <font face="Geneva, Arial, Helvetica, sans-serif" size="5" color="#0033FF"><strong>Article Manger</strong></font>
	  <div id="errtext" name="errtext" class="errtext">
	<?php if(!empty($this->msg))
	{
		echo $this->msg;
		$this->msg="";
	}
	?>	</div>

	 </td>
	 
      <td width="50%"align="right" valign="top">
	  <div id="layer1" align="right";  style="background-image: url('components/com_developerzone/assets/devbase/sbase.gif'); layer-background-imageurl url('components/com_developerzone/assets/devbase/sbase.gif');  width:200px; height:70px; border: 1px none #000000">
	  <form method="post" id="searchArtcle" name="searhArtcle" onsubmit="return FRMvalidate();">
        <table  border="0">
		    <tr colspan="">
            <td><input type="text" name="searchkey" id="searchkey" size="20"></td></tr>
			<tr>
            <td colspan="2">
			<?php echo JHTML::_('select.genericlist',$options,'category',null,'value','text',$row = $this->cat[0]->category); ?>			</td>		
            </td></tr>
			<tr>		
            <td align="left"><input type="submit" value="Search"></td>
            </tr>
        </table>
	<input type ="hidden" name="option" value="com_developerzone" >
	<input type="hidden" name="task" value="artclsearch" >
	</form>
      </div></td>      
    </tr>
    <tr>
      <td height="35"   align="center" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td   align="center" valign="top"></td>
    </tr>
  </table>  
</div>
