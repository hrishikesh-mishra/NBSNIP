<?php 
	/*
	  yellowpage club layout 
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
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->club); ?>);" />
			</th>			
			<th>
				<?php echo JText::_( 'Club Name' ); ?>
			</th>
			<th>
				<?php echo JText::_('Secretary Name'); ?>
			</th>

			<th>
				<?php echo JText::_('City'); ?>
			</th>
			<th>
				<?php echo JText::_('Added By'); ?>
			</th>

			<th>
				<?php echo JText::_( 'Published' ); ?>
			</th>
			
			
		</tr>
	</thead>
	<?php

	
	for ($i=0, $n=count($this->club); $i < $n; $i++)	{
		$row = &$this->club[$i];
		$checked 	= JHTML::_('grid.id',   $i, $row->id );
		$link 		= JRoute::_( 'index.php?option=com_yellowpage&controller=club&task=edit&cid[]='. $row->id );
		$published = JHTML::_('grid.published',$row, $i);
		?>
		<tr class="<?php echo "row$k"; ?>">
			<td>
				<?php echo $row->id; ?>
			</td>
			<td>
				<?php echo $checked; ?>
			</td>
			<td>
				<span class="editlinktip hasTip" title="<?php echo JText::_( 'Edit Club' );?>::<?php echo $row->clubname; ?>">
				<a href="<?php echo $link; ?>"><?php echo $row->clubname; ?></a>
			</td>
			<td>
				<?php echo $row->secretaryname; ?>
			</td>

			<td>
				<?php echo $row->city; ?>
			</td>	
			<td>
				<?php echo $row->addedby; ?>
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

<input type="hidden" name="option" value="com_yellowpage" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="club" />
</form>