<?php 
	/* 
		social networking user email send layout
	*/
	
	//no direct access	
	defined('_JEXEC') or die('Restricted access'); 

	jimport('joomla.html.pane');
 
 ?>
	<script language="javascript" type="text/javascript">
	<!--
		function submitbutton(pressbutton) {
		var form = document.adminForm;
			
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}				

					
			
			if (form.subject.value=="")
			{
				alert( "<?php echo JText::_( 'You must provide a subject.', true ); ?>" );
			}
			else if (form.body.value=="")
			{
				alert( "<?php echo JText::_( 'You must provide a message.', true ); ?>" );
			}			
			else
			{
			
				submitform(pressbutton);
			}
			
		}
		-->
		</script>


<form action="index.php" method="post" name="adminForm" id="adminForm" >
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
				<?php echo "<strong>".$this->data->id ." </strong>"; ?>
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="userid">
					<?php echo JText::_( 'UserID' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="userid" id="user" size="32" readonly="readonly" 
				value="<?php echo $this->data->userid;?>" />				
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="emailid">
					<?php echo JText::_( 'Email-ID' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="emailid" id="emailid" size="32" readonly="readonly" value="<?php echo $this->data->emailid;?>" /> 
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="subject">
					<?php echo JText::_( 'Subject' ); ?> :
				</label>
			</td>
			<td >
				<input type="text" class="text_box" name="subject" id="subject"  size="32" maxlength="100"  />
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="body">
					<?php echo JText::_( 'Message' ); ?> :
				</label>
			</td>
			<td >
				<textarea class="text_area"  name="body" id="body"  rows="10" cols="50" /></textarea>
			</td>
		</tr>
		
		<tr/>
	</table>
	</fieldset>
</div>



<input type="hidden" name="option" value="com_socialnetworking" />
<input type="hidden" name="id" value="<?php echo $this->user->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="user" />

</form>
