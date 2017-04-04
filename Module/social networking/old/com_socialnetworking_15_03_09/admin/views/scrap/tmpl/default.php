<?php 
	/*
	  social-networking scrap layout 
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
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->scrap); ?>);" />
			</th>			
			<th>
				<?php echo JText::_('Sender'); ?>
			</th>
			<th>
				<?php echo JText::_( 'Receiver' ); ?>
			</th>
			<th>
				<?php echo JText::_( 'Scrap' ); ?>
			</th>
			<th>
				<?php echo JText::_('Date'); ?>
			</th>
			<th>
				<?php echo JText::_( 'Published' ); ?>
			</th>
			
		</tr>
	</thead>
	<?php

	for ($i=0, $n=count($this->scrap); $i < $n; $i++)	{
		$row = &$this->scrap[$i];
		$checked 	= JHTML::_('grid.id',   $i, $row->id );
		$link 		= JRoute::_( 'index.php?option=com_socialnetworking&controller=scrap&task=edit&cid[]='. $row->id );
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
				<span class="editlinktip hasTip" 
				title="<?php echo JText::_( 'Edit Message' );?>::<?php echo substr($row->sender,0,20).'...'; ?>">
				<a href="<?php echo $link; ?>"><?php echo substr($row->sender,0,30).'...'; ?></a>
			</td>
			<td>
				<?php echo $row->recevier; ?>
			</td>

			<td>
				<?php echo substr($row->scrap,0,30) .' ...'; ?>
			</td>	
			<td>
				<?php echo $row->sdate; ?>
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
<input type="hidden" name="option" value="com_socialnetworking" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="scrap" />
</form>