<?php 
	/*
	  Developer-Zone Code-File layout 
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
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->codefile); ?>);" />
			</th>			
			<th>
				<?php echo JText::_( 'Title' ); ?>
			</th>
			<th>
				<?php echo JText::_('Category'); ?>
			</th>
			<th>
				<?php echo JText::_('Creation-Date'); ?>
			</th>					
			<th>
				<?php echo JText::_('Added-By'); ?>
			</th>		
			<th>
				<?php echo JText::_( 'Published' ); ?>
			</th>
			
			
		</tr>
	</thead>
	<?php

	
	for ($i=0, $n=count($this->codefile); $i < $n; $i++)	{
		$row = &$this->codefile[$i];
		$checked 	= JHTML::_('grid.id',   $i, $row->id );
		$link 		= JRoute::_( 'index.php?option=com_developerzone&controller=codefile&task=edit&cid[]='. $row->id );
		$published = JHTML::_('grid.published',$row, $i);
		?>
		
		<tr class="<?php echo "row$k"; ?>" >
		
			<td>
				<?php echo $row->id; ?>
			</td>
			<td>
				<?php echo $checked; ?>
			</td>
			
			<td>
				<span class="editlinktip hasTip" title="<?php echo JText::_( 'Edit Code-File' );?>::<?php echo substr($row->title,0,25).'...'; ?>">
				<a href="<?php echo $link; ?>"><?php echo substr($row->title,0,50).'...'; ?></a>
			</td>
			<td>
				<?php echo $row->category; ?></font>
			</td>
			<td>
				<?php echo $row->creationdate; ?>
			</td>
			<td>		
				<?php 
				if (($row->addedby !='server') && !$row->published)
					echo '<font color="#FF0000"><strong>'.$row->addedby.'</strong></font>';
				else 
					echo $row->addedby ;?>
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

<input type="hidden" name="option" value="com_developerzone" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="codeFile" />
</form>