<?php 
	/*
	  Classifieds Tea layout 
	*/

	//direct access not allowed
	
	defined('_JEXEC') or die('Restricted access');
require_once JPATH_COMPONENT_SITE.'/assets/headerinfo.php';

	?>

<form  method="post" name="searchForm" id="searchForm" >
<div  id="tea">
<table width="100%"  border="1" bordercolor="#00CC00">
  <tr>
    <td width="67%" rowspan="3" valign="center" align="center" bordercolor="#00CC00"><font face="Geneva, Arial, Helvetica, sans-serif" size="4"  color="#660000">Tea Classifieds</font></td>
    <td width="10%" align="right"> SearchKey </td>
    <td width="23%"><input type="text" name="searchkey"  id="searchkey"></td>
  </tr>
  <tr>
    <td align="right">City</td>
    <td><input type="text" name="city" id ="city"></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="Submit" id="submit" value="Search"></td>
  </tr>
  <tr>
    <td  colspan="3"><table width="100%" height="100%" border="0">
      <tr >
        <td width="79%" height="30" align="left" bordercolor="#ECE9D8" bgcolor="#FF99FF"><font color="#006600" > <strong> Tea</strong></font></td>
        <td width="21%" align="right" bordercolor="#ECE9D8" bgcolor="#FF99FF"><font color="#339900"><strong>City </strong></font></td>
    </tr>
      
  
     

<?php
	
	for ($i=0, $n=count($this->tea); $i < $n; $i++)	{
		$row = &$this->tea[$i];
		
		$link 		= JRoute::_( 'index.php?option=com_classifieds&controller=tea&task=info&row='. $row->id );

		if ($flag)
			$bcolor="#FFFFFF";
		else
			$bcolor="#F0F0F0";
		
		$flag=!($flag);
		
		
	
	?>
		<tr class="<?php echo "row$k"; ?>" bgcolor="<?php echo $bcolor ;?>" height="20" >
		
			<td align="left" ><a href="<?php echo $link; ?>"><?php echo $row->title; ?> </a>
			</td>
			
		<td align="right">
			<?php echo $row->city; ?></td>			
		</tr>
		<?php
		$k = 1 - $k;
	}
	?>
 </tr>
    </table></td>
  </tr>
</table>
	
</div>
<input type="hidden" name="option" value="com_classifieds" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="tea" />
</form>
