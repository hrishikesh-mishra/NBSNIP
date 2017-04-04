<?php 
	/*
	  Matrimonail profile edit layout 
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
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->profile); ?>);" />
			</th>			
			<th>
				<?php echo JText::_( 'User-ID' ); ?>
			</th>
			<th>
				<?php echo JText::_('Gender'); ?>
			</th>
			<th>
				<?php echo JText::_('Marital-Status'); ?>
			</th>
			<th>
				<?php echo JText::_('Age'); ?>
			</th>
			<th>
				<?php echo JText::_('Height'); ?>
			</th>

			<th>
				<?php echo JText::_( 'City' ); ?>
			</th>
			
			<th>
				<?php echo JText::_( 'Published' ); ?>
			</th>
			
		</tr>
	</thead>
	<?php


	for ($i=0, $n=count($this->profile); $i < $n; $i++)	{
		$row = &$this->profile[$i];
		$checked 	= JHTML::_('grid.id',   $i, $row->id );
		$link 		= JRoute::_( 'index.php?option=com_matrimonial&controller=profile&task=edit&cid[]='. $row->id );
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
				<span class="editlinktip hasTip" title="<?php echo JText::_( 'Edit Profile' );?>::<?php echo $row->userid; ?>">
				<a href="<?php echo $link; ?>"><?php echo $row->userid; ?></a>
			</td>
			<td>
				<?php echo $row->gender; ?>
			</td>

			<td>
				<?php echo $row->mstatus; ?>
			</td>	
			<td>
				<?php echo $row->age; ?>
			</td>	
			<td>
				<?php echo $row->height; ?>
			</td>	
			<td>
				<?php echo $row->city; ?>
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
					<td colspan="9">
						<?php echo $this->pageIn(); ?>
					</td>
				</tr>
			</tfoot>
</table>
	</div>

<input type="hidden" name="option" value="com_matrimonial" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="profile" />
</form>