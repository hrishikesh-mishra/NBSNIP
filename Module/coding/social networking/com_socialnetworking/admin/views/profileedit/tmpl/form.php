<?php 
	/* 
		Social Networking user edit form layout
	*/
	
	//no direct access	
	defined('_JEXEC') or die('Restricted access'); 
	
	$options =array();
	$options[]=JHTML::_('select.option','Male','Male');
	$options[]=JHTML::_('select.option','Female','Female');
	
 
 ?>

	<script language="javascript" type="text/javascript">
		
		function submitbutton(pressbutton, section) {
			var form = document.adminForm;
			
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}

			
			if ( form.firstname.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide First Name.', true ); ?>" );
			}
			else if ( form.lastname.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide Last Name.', true ); ?>" );
			}
			else if ( form.location.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide Location.', true ); ?>" );
			}
			else if ( form.city.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide city.', true ); ?>" );
			}
			else if ( form.state.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide State.', true ); ?>" );
			}
			else
			{
			
				submitform(pressbutton);
			}
			
		}
		</script>


<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col width-75" >
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
					if (empty($this->profile->id))
					{
						echo "<strong> New </strong>" ;
					}
					else
					{
					  echo "<strong>".$this->profile->id ." [Edit]</strong>";
					}
				 ?>
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="userid">
					<?php echo JText::_( 'User-ID' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="userid" id="userid" size="32" readonly="readonly" value="<?php echo $this->profile->userid;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="firstname">
					<?php echo JText::_( 'First-Name' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="firstname" id="firstname" size="32"  maxlength="50" value="<?php echo $this->profile->firstname;?>" /> 
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="lastname">
					<?php echo JText::_( 'Last-Name' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="lastname" id="lastname" size="32"  maxlength="50" value="<?php echo $this->profile->lastname;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="sex">
					<?php echo JText::_( 'Sex' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('select.genericlist',$options,'sex',null,'value','text',$this->profile->sex); ?>
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="dob">
					<?php echo JText::_( 'Date-of-Birth' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('calendar',$this->profile->dob,'dob','dob','%Y-%m-%d','readonly=readonly size=15'); ?>
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="highschool">
					<?php echo JText::_( 'High-School' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="highschool" id="highschool" size="32"  maxlength="50" value="<?php echo $this->profile->highschool;?>" /> 
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="college">
					<?php echo JText::_( 'College' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="college" id="college" size="32"  maxlength="50" value="<?php echo $this->profile->college;?>" /> 
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="university">
					<?php echo JText::_( 'University' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="university" id="university" size="32"  maxlength="50" value="<?php echo $this->profile->university;?>" /> 
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="specificdegree">
					<?php echo JText::_( 'Specific-Degree' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="specificdegree" id="specificdegree" size="32"  maxlength="50" value="<?php echo $this->profile->specificdegree;?>" /> 
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="jobtitle">
					<?php echo JText::_( 'Job-Title' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="jobtitle" id="jobtitle" size="32"  maxlength="50" value="<?php echo $this->profile->jobtitle;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="profession">
					<?php echo JText::_( 'Profession' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="profession" id="profession" size="32"  maxlength="50" value="<?php echo $this->profile->profession;?>" /> 
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="company">
					<?php echo JText::_( 'company' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="company" id="company" size="32"  maxlength="50" value="<?php echo $this->profile->company;?>" /> 
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="location">
					<?php echo JText::_( 'Location' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="location" id="location" size="32"  maxlength="50" value="<?php echo $this->profile->location;?>" /> 
			</td>
		</tr>
		
		
		<tr>
			<td class="key">
				<label for="city">
					<?php echo JText::_( 'City' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="city" id="city" size="32"  maxlength="50" value="<?php echo $this->profile->city;?>" /> 
			</td>
		</tr>
	
		<tr>
			<td class="key">
				<label for="state">
					<?php echo JText::_( 'State' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="state" id="state" size="32"  maxlength="50" value="<?php echo $this->profile->state;?>" /> 
			</td>
		</tr>
				
		<tr>
			<td class="key">
				<label for="postalcode">
					<?php echo JText::_( 'Postal-Code' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="postalcode" id="postalcode" size="10"  maxlength="6" value="<?php echo $this->profile->postalcode;?>" /> 
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="phone">
					<?php echo JText::_( 'Phone' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="phone" id="phone" size="25"  maxlength="25" value="<?php echo $this->profile->phone;?>" /> 
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="mobile">
					<?php echo JText::_( 'mobile' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="mobile" id="mobile" size="25"  maxlength="25" value="<?php echo $this->profile->mobile;?>" /> 
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="careerinterest">
					<?php echo JText::_( 'Career-Interest' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="careerinterest" id="careerinterest" size="32"  maxlength="200" value="<?php echo $this->profile->careerinterest;?>" /> 
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="careerskill">
					<?php echo JText::_( 'Career-Skill' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="careerskill" id="careerskill" size="32"  maxlength="200" value="<?php echo $this->profile->careerskill;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="aboutyourself">
					<?php echo JText::_( 'About Yourself' ); ?> :
				</label>
			</td>
			<td >
				<textarea name="aboutyourself" id="aboutyourself" rows="5" cols="50"><?php echo $this->profile->aboutyourself ;?></textarea> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="published">
					<?php echo JText::_( 'Published' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('select.booleanlist',  'published', '', $this->profile->published ); ?>
			</td>
		</tr>
		
		<tr/>

	</table>

	</fieldset>
</div>
<input type="hidden" name="option" value="com_socialnetworking" />
<input type="hidden" name="id" value="<?php echo $this->profile->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="profile" />

</form>
