<?php 
	/*
	  Classifieds Category layout 
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
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->category); ?>);" />
			</th>			
			<th>
				<?php echo JText::_( 'Category Title' ); ?>
			</th>
			<th>
				<?php echo JText::_('About'); ?>
			</th>

			<th>
				<?php echo JText::_( 'Published' ); ?>
			</th>
			
			
		</tr>
	</thead>
	<?php

	
	for ($i=0, $n=count($this->category); $i < $n; $i++)	{
		$row = &$this->category[$i];
		$checked 	= JHTML::_('grid.id',   $i, $row->cid );
		$link 		= JRoute::_( 'index.php?option=com_classifieds&controller=category&task=edit&cid[]='. $row->cid );
		$published = JHTML::_('grid.published',$row, $i);
		?>
		<tr class="<?php echo "row$k"; ?>">
			<td>
				<?php echo $row->cid; ?>
			</td>
			<td>
				<?php echo $checked; ?>
			</td>
			<td>
				<span class="editlinktip hasTip" title="<?php echo JText::_( 'Edit Category' );?>::<?php echo $row->type; ?>">
				<a href="<?php echo $link; ?>"><?php echo $row->type; ?></a>
			</td>
			<td>
				<?php echo substr($row->description,0,50) ; ?>
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
					<td colspan="8">
						<?php echo $this->pageIn(); ?>
					</td>
				</tr>
			</tfoot>
</table>
	</div>

<input type="hidden" name="option" value="com_classifieds" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="category" />
</form>