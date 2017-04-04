<?php 
	/*
	  yellowpage Categories layout 
	*/

	//direct access not allowed
	
	defined('_JEXEC') or die('Restricted access'); 
	JHTML::_('behavior.tooltip');
?>

<form action="index.php" method="post" name="adminForm">
<div id="editcell">
	<table class="adminlist" >
	<thead>
		<tr>
			<th width="5">
				<?php echo JText::_( 'ID' ); ?>
			</th>
			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->categories); ?>);" />
			</th>			
			<th>
				<?php echo JText::_( 'Categories Name' ); ?>
			</th>
			<th>
				<?php echo JText::_( 'Published' ); ?>
			</th>
		</tr>
	</thead>
	<?php

	
	for ($i=0, $n=count($this->categories); $i < $n; $i++)	{
		$row = &$this->categories[$i];
		$checked 	= JHTML::_('grid.id',   $i, $row->yid );
		$published = JHTML::_('grid.published',$row, $i);
		?>
		<tr class="<?php echo "row$k"; ?>">
			<td>
				<?php echo $row->yid; ?>
			</td>
			<td>
				<?php echo $checked; ?>
			</td>
			<td>
				<?php echo $row->type; ?>
			</td>
			<td>
				<?php echo $published; ?>
			</td>
			
			
		</tr>
		<?php
		$k = 1 - $k;
	}
	?>
	<tfoot>
			<tr>
					<td colspan="4">
						<?php echo $this->pageIn(); ?>
					</td>
				</tr>
			</tfoot>
</table>
	</div>

<input type="hidden" name="option" value="com_yellowpage" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="categories" />
</form>