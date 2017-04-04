<?php 
	/* 
		blog blog edit form layout
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

					
			if ( form.blog.name.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a user Name.', true ); ?>" );
			}
			
			else
			{
			
				submitform(pressbutton);
			}
			
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
				<?php echo "<strong>".$this->blog->id ." [Edit]</strong>"; ?>
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
				<label for="bdate">
					<?php echo JText::_( 'Blog-Date' ); ?> :
				</label>
			</td>
			<td >
				<input type="text" class="text_area"  name="bdate" id="bdate" size="32" maxlength="90" value="<?php echo $this->user->username;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="topic">
					<?php echo JText::_( 'Topic' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="topic" id="topic" size="32" maxlength="100" value="" /> 
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
				<label for="location">
					<?php echo JText::_( 'Location' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="location" id="location" size="32" maxlength="100"  value="<?php echo $this->user->location;?>" /> 
			</td>
		</tr>
			<tr>
			<td class="key">
				<label for="city">
					<?php echo JText::_( 'City' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="city" id="city"  value="<?php echo $this->user->city;?>" /> 
			</td>
		</tr>
			<tr>
			<td class="key">
				<label for="state">
					<?php echo JText::_( 'State' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="state" id="state"  value="<?php echo $this->user->state;?>" /> 
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

	

<input type="hidden" name="option" value="com_blog" />
<input type="hidden" name="id" value="<?php echo $this->user->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="user" />

</form>
