<?php 
	/*
	  yellowpage education layout 
	*/

	//direct access not allowed
	
	defined('_JEXEC') or die('Restricted access');
	$link = JRoute::_( 'index.php?option=com_yellowpage&controller=education&task=add');

	?>

<form action="index.php" method="post" name="searchForm" id="searchForm" >
<div class="education" id="educaiton">
 <table width="100%" border="2">
  <tr>
    <th height="23" colspan="2" align="center" scope="col">Education YellowPage </th>
  </tr>
  <tr>
    <td width="43%" height="114">Education YellowPage provides information regarding the eduational institutional.
 It provides the of various institutes, schools, college, university etc. And also you can add your intitute, 
	schools or college information at this place.<a href="<?php echo $link ; ?> " >Add </a></td>
    <td width="57%" align="left" valign="top"><table width="100%" height="118" border="1">
      <tr>
        <td width="24%" rowspan="4" align="center"> <strong>Search</strong> </td>
        <td width="27%" align="right">Name</td>
        <td width="49%"><input type="text" name="serchkey" id="serchkey"> </td>
      </tr>
      <tr>
        <td align="right">Category</td>
        <td><input type="text" name="category" id="category"></td>
      </tr>
      <tr>
        <td align="right">City</td>
        <td><input type="text" name="city" id ="city"></td>
      </tr>
      <tr>
        <td height="28" colspan="2" align="right"><label>
          <input type="submit" name="Submit" value="Search">
        </label></td>
        </tr>
    </table></td>
  </tr>
  <tr >
 
    <td height="60" colspan="2"><table width="100%" border="0">

      <tr height="30">
        <th width="78%" align="left" bgcolor="#00CCFF" scope="col">Educational YellowPage </th>
        <th width="22%" align="left" bgcolor="#00CCFF" scope="col">Hit(s)</th>
	
      </tr>
      <tr>
       
     

<?php

	for ($i=0, $n=count($this->education); $i < $n; $i++)	{
		$row = &$this->education[$i];
		
		$link 		= JRoute::_( 'index.php?option=com_yellowpage&controller=education&task=info&row='. $row->id );

		if ($flag)
			$bcolor="#FFFFCC";
		else
			$bcolor="#CCCCCC";
		
		$flag=!($flag);
		
		
	
	?>
		<tr class="<?php echo "row$k"; ?>" bgcolor="<?php echo $bcolor ;?>" height="20" >
		
			<td align="left" ><a href="<?php echo $link; ?>"><?php echo $row->eduname; ?> </a>
			</td>
			
		<td align="left">
			<?php echo $row->hits; ?></td>			
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
<input type="hidden" name="option" value="com_yellowpage" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="education" />
</form>
