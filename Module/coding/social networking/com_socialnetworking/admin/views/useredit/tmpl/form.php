<?php 
	/* 
		social-networking  edit form layout
	*/
	
	//no direct access	
	defined('_JEXEC') or die('Restricted access'); 

	jimport('joomla.html.pane');
 
 ?>
	<script language="javascript" type="text/javascript">
		
		function submitbutton(pressbutton, section) {
		var form = document.adminForm;
			
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}				

			submitform(pressbutton);
			
			
		}
		</script>


<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col width-50" >
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
				<?php echo "<strong>".$this->user->id ." [Edit]</strong>"; ?>
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="userid">
					<?php echo JText::_( 'UserID' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="userid" id="user" readonly="readonly" 
				value="<?php echo $this->user->userid;?>" />				
			</td>
		</tr>

		
		<tr>
			<td class="key">
				<label for="password">
					<?php echo JText::_( 'Password' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="password" id="password" size="32" maxlength="100" value="" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="registrationdate">
					<?php echo JText::_( 'Registration-Date' ); ?> :
				</label>
			</td>
			<td >
				<input type="text class="text_area" name="registrationdate" size="25" id="registrationdate" readonly="readonly" value="<?php echo $this->user->registrationdate;?>" />
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="lastvisitdate">
					<?php echo JText::_( 'Last-Visit-Date' ); ?> :
				</label>
			</td>
			<td >
				<input type="text" class="text_area"  class="text_area" size="25" name="lastvisitdate" id="lastvisitdate" readonly="readonly" value="<?php echo $this->user->lastvisitdate;?>"/>
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="emailid">
					<?php echo JText::_( 'Email-ID' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="emailid" id="emailid"  size="25" readonly="readonly" value="<?php echo $this->user->emailid;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="addedat">
					<?php echo JText::_( 'Added-By-IP' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="addedat" id="addedat" readonly="readonly" value="<?php echo $this->user->addedbyip;?>" /> 
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="published">
					<?php echo JText::_( 'Blocked' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('select.booleanlist',  'published', '', $this->user->published ); ?>
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
