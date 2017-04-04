<?php 
	/*
	  Matrimonail user layout 
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
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->user); ?>);" />
			</th>			
			<th>
				<?php echo JText::_( 'User-ID' ); ?>
			</th>
			<th>
				<?php echo JText::_('User-Name'); ?>
			</th>

			<th>
				<?php echo JText::_('Registration Date'); ?>
			</th>
			<th>
				<?php echo JText::_('Last Visited'); ?>
			</th>

			<th>
				<?php echo JText::_( 'Block' ); ?>
			</th>
			
			<th>
				<?php echo JText::_( 'Email-ID' ); ?>
			</th>
			
			<th>
				<?php echo JText::_( 'Added At' ); ?>
			</th>
			
		</tr>
	</thead>
	<?php

	for ($i=0, $n=count($this->user); $i < $n; $i++)	{
		$row = &$this->user[$i];
		$checked 	= JHTML::_('grid.id',   $i, $row->id );
		$link 		= JRoute::_( 'index.php?option=com_matrimonial&controller=user&task=edit&cid[]='. $row->id );
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
				<span class="editlinktip hasTip" title="<?php echo JText::_( 'Edit User' );?>::<?php echo $row->userid; ?>">
				<a href="<?php echo $link; ?>"><?php echo $row->userid; ?></a>
			</td>
			<td>
				<?php echo $row->username; ?>
			</td>

			<td>
				<?php echo $row->registrationdate; ?>
			</td>	
			<td>
				<?php echo $row->lastvisitdate; ?>
			</td>				
			<td>
				<?php echo $published; ?>
			</td>
			
			<td>
				<?php echo $row->emailid; ?>
			</td>
			<td>
				<?php echo $row->addedat; ?>
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
<input type="hidden" name="controller" value="user" />
</form>