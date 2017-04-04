<?php 
	/* 
		yellowpage Doctors input form layout
	*/
	
	//no direct access	
	defined('_JEXEC') or die('Restricted access'); 

	jimport('joomla.html.pane');
        
	$pane = &JPane::getInstance('sliders', array('allowAllClose' => true));
	$file = JPATH_ADMINISTRATOR .'/components/com_yellowpage/helpers/doctors_items.xml';
	$params = new JParameter( $this->doctors->params, $file, 'component' );
	$editor =& JFactory::getEditor();

?>

	<script language="javascript" type="text/javascript">
		
		function submitbutton(pressbutton, section) {
			var form = document.adminForm;
			
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}

			
			if ( form.docname.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Doctors Name.', true ); ?>" );
			}
			else if ( form.specialist.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide  Specialist info of Doctor.', true ); ?>" );
			}

			else
			{
				<?php	echo $editor->save( 'description' ) ; ?>
				submitform(pressbutton);
			}
			
		}
		</script>


<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col width-45" >
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
					if (empty($this->doctors->id))
					{
						echo "<strong> New </strong>" ;
					}
					else
					{
					  echo "<strong>".$this->doctors->id ." [Edit]</strong>";
					}
				 ?>
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="type">
					<?php echo JText::_( 'Type' ); ?> :
				</label>
			</td>
			<td >
				<?php echo "<strong>Doctors</strong>";?>
			</td>
		</tr>


		<tr>
			<td class="key">
				<label for="docname">
					<?php echo JText::_( 'Doctor Name' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="docname" id="docname" size="32" maxlength="100" value="<?php echo $this->doctors->docname;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="specialist">
					<?php echo JText::_( 'Specialist' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="specialist" id="specialist" size="32" maxlength="150" value="<?php echo $this->doctors->specialist;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="areaofoperations">
					<?php echo JText::_( 'Area of Operation ' ); ?> :
				</label>
			</td >
			<td>
				<input class="text_area" type="text" name="areaofoperations" id="areaofoperations" size="32" maxlength="200" value="<?php echo $this->doctors->areaofoperations;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="parmanentclinic">
					<?php echo JText::_( 'Parmanent Clinic' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="parmanentclinic" id="parmanentclinic" size="32" maxlength="200" value="<?php echo $this->doctors->parmanentclinic;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="phone">
					<?php echo JText::_( 'Phone' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="phone" id="phone" size="20" maxlength="50" value="<?php echo $this->doctors->phone;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="mobile">
					<?php echo JText::_( 'Mobile' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="mobile" id="mobile" size="20" maxlength="50" value="<?php echo $this->doctors->mobile;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="location">
					<?php echo JText::_( 'Location' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="location" id="location" size="32" maxlength="100" value="<?php echo $this->doctors->location;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="city">
					<?php echo JText::_( 'City' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="city" id="city" size="20" maxlength="25" value="<?php echo $this->doctors->city;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="state">
					<?php echo JText::_( 'State' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="state" id="state" size="20" maxlength="25" value="<?php echo $this->doctors->state;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="website">
					<?php echo JText::_( 'WebSite' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="website" id="website" size="32" maxlength="100" value="<?php echo $this->doctors->website;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="emailid">
					<?php echo JText::_( 'Email ID' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="emailid" id="emailid" size="32" maxlength="100" value="<?php echo $this->doctors->emailid;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="published">
					<?php echo JText::_( 'Published' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('select.booleanlist',  'published', '', $this->doctors->published ); ?>
			</td>
		</tr>

		<tr/>

	</table>

	</fieldset>
</div>
<div class="col width-50">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Parameters' ); ?></legend>
			<?php
				echo $pane->startPane("menu-pane");
				echo $pane->startPanel(JText :: _('Doctors Parameters'), "param-page");
				echo $params->render();
				echo $pane->endPanel();
				echo $pane->startPanel(JText :: _('Advanced Parameters'), "param-page");
				echo $params->render('params', 'advanced');
				echo $pane->endPanel();
				echo $pane->startPanel(JText :: _('E-mail Parameters'), "param-page");
				echo $params->render('params', 'email');
				echo $pane->endPanel();
				echo $pane->endPane();
			?></fieldset>
</div>

<div class="col width-70">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Description' ); ?></legend>
			<?php	echo $editor->display( 'description',  htmlspecialchars($this->doctors->description, ENT_QUOTES), '100%', '600', '80', '80', array('pagebreak', 'readmore') ) ; ?>
	</fieldset>
</div>	
	

<input type="hidden" name="option" value="com_yellowpage" />
<input type="hidden" name="id" value="<?php echo $this->doctors->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="doctors" />

</form>
