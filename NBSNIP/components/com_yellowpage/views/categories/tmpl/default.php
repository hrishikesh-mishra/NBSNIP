<?php 
	/*
	  yellowpage Categories layout 
	*/

	//direct access not allowed
	
	defined('_JEXEC') or die('Restricted access'); 

?>

<div>

		<h3><center>YellowPage </center></h3>
		<br><br><hr>

<form action="index.php" method="post" name="adminForm" id="adminForm">

<div id="editcell">
	<table >

	<?php

	
	for ($i=0, $n=count($this->categories); $i < $n; $i++)
	{
		$row = &$this->categories[$i];
		$link = JRoute::_("index.php?option=com_yellowpage&controller=categories&yid=".$row->yid);
	?>
		<tr>
		<td>
			<li><a href="<?php echo $link; ?>"><?php echo $row->type; ?> </a></li>
		</td>
		</tr>
		<tr>	
		<td>
			<?php echo substr($row->description,0,150)." ...." ;?>
		</td>	</tr><tr/><tr/>			
		<?php		
	}
	?>
	<tfoot>	
		<tr>
			<td colspan="1"><hr>
				<?php echo $this->pageIn(); ?><hr>
			</td>
		</tr>
	</tfoot>
</table>
	</div>
</div>
<input type="hidden" name="option" value="com_yellowpage" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="categories" />
</form>