<?php 
	/*
	  Classifieds Realstate layout 
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
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->realstate); ?>);" />
			</th>			
			<th>
				<?php echo JText::_( 'RealState Name' ); ?>
			</th>
			<th>
				<?php echo JText::_('Compay Name'); ?>
			</th>

			<th>
				<?php echo JText::_('City'); ?>
			</th>
			<th>
				<?php echo JText::_('Vendor-ID'); ?>
			</th>

			<th>
				<?php echo JText::_( 'Published' ); ?>
			</th>
			
			
		</tr>
	</thead>
	<?php

	
	for ($i=0, $n=count($this->realstate); $i < $n; $i++)	{
		$row = &$this->realstate[$i];
		$checked 	= JHTML::_('grid.id',   $i, $row->id );
		$link 		= JRoute::_( 'index.php?option=com_classifieds&controller=realstate&task=edit&cid[]='. $row->id );
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
				<span class="editlinktip hasTip" title="<?php echo JText::_( 'Edit RealState' );?>::<?php echo $row->title; ?>">
				<a href="<?php echo $link; ?>"><?php echo $row->title; ?></a>
			</td>
			<td>
				<?php echo $row->company; ?>
			</td>

			<td>
				<?php echo $row->city; ?>
			</td>	
			<td>
				<?php echo $row->vid; ?>
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
<input type="hidden" name="controller" value="realstate" />
</form>