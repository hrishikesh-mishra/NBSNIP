<?php 
	/* 
		social-networking Scrap edit form layout
	*/
	
	//no direct access	
	defined('_JEXEC') or die('Restricted access'); 
	
 ?>
	<script language="javascript" type="text/javascript">
		
		function submitbutton(pressbutton, section) {
		var form = document.adminForm;
			
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}				

					
			if ( form.scrap.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide Scrap.', true ); ?>" );
			}
			else
			{
			
				submitform(pressbutton);
			}
			
		}
		</script>
<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col width-70" >
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Details' ); ?></legend>

		<table class="admintable">
		<tr/>
		<tr>
			<td class="key">
				<label for="id">
					<?php echo JText::_( 'ID' ); ?> :
				</label>
			</td>
				<td >
				<?php 
					if (empty($this->scrap->id))
					{
						echo "<strong> New </strong>" ;
					}
					else
					{
					  echo "<strong>".$this->scrap->id ." [Edit]</strong>";
					}
				 ?>
			</td>
		</tr>

		<tr>
			
		<tr>
			<td class="key">
				<label for="sender">
					<?php echo JText::_( 'Sender' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="sender" id="sender" readonly="readonly" size="32" maxlength="50" 
				value="<?php echo $this->scrap->sender; ?>" /> 
			</td>
		</tr>
				
		<tr>
			<td class="key">
				<label for="recevier">
					<?php echo JText::_( 'Recevier' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="recevier" id="recevier" readonly="readonly" size="32" maxlength="50" 
				value="<?php echo $this->scrap->recevier; ?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="sdate">
					<?php echo JText::_( 'Date' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="cdate" id="cdate" size="32" readonly="readonly" maxlength="50" 
				value="<?php echo $this->scrap->sdate; ?>" /> 
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="published">
					<?php echo JText::_( 'Publish' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('select.booleanlist',  'published', '', $this->scrap->published ); ?>
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="scrap">
					<?php echo JText::_( 'Scrap' ); ?> :
				</label>
			</td>

			<td >
				<textarea class="text_area"  name="scrap" id="scrap" rows="8" 
				cols="60" ><?php echo $this->scrap->scrap;?></textarea>
			</td>
		</tr>
		
		<tr/>
	</table>
	</fieldset>
</div>

	

<input type="hidden" name="option" value="com_socialnetworking" />
<input type="hidden" name="id" value="<?php echo $this->scrap->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="scrap" />

</form>
