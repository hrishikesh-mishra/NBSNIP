<?php 
	/*
	  blog Blog edit layout 
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
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->blog); ?>);" />
			</th>			
			<th>
				<?php echo JText::_( 'User-ID' ); ?>
			</th>
			<th>
				<?php echo JText::_('Topic'); ?>
			</th>
			<th>
				<?php echo JText::_('Blog-Date'); ?>
			</th>
			
			<th>
				<?php echo JText::_( 'Published' ); ?>
			</th>
			
			<th>
				<?php echo JText::_('AddedBy IP'); ?>
			</th>
			
			
		</tr>
	</thead>
	<?php


	for ($i=0, $n=count($this->blog); $i < $n; $i++)	{
		$row = &$this->blog[$i];
		$checked 	= JHTML::_('grid.id',   $i, $row->id );
		$link 		= JRoute::_( 'index.php?option=com_blog&controller=blog&task=edit&cid[]='. $row->id );
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
				<?php echo $row->username; ?>
			</td>

			<td>
				<span class="editlinktip hasTip" title="<?php echo JText::_( 'Edit Blog' );?>::<?php echo $row->topic; ?>">
				<a href="<?php echo $link; ?>"><?php echo $row->topic; ?></a>
			</td>
			<td>
				<?php echo $row->bdate; ?>
			</td>
			<td>
				<?php echo $published; ?>
			</td>
			<td>
				<?php echo $row->addedbyip; ?>
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

<input type="hidden" name="option" value="com_blog" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="blog" />
</form>