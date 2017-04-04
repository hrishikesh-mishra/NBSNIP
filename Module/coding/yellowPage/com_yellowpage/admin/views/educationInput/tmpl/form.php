<?php 
	/* 
		yellowpage education input form layout
	*/
	
	//no direct access	
	defined('_JEXEC') or die('Restricted access'); 

	jimport('joomla.html.pane');
        
	$pane = &JPane::getInstance('sliders', array('allowAllClose' => true));
	$file = JPATH_ADMINISTRATOR .'/components/com_yellowpage/helpers/education_items.xml';
	$params = new JParameter( $this->education->params, $file, 'component' );
	$editor =& JFactory::getEditor();

?>

	<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton, section) {
			var form = document.adminForm;
			
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}

			
			if ( form.eduname.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Education Name.', true ); ?>" );
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
					if (empty($this->education->id))
					{
						echo "<strong> New </strong>" ;
					}
					else
					{
					  echo "<strong>".$this->education->id ." [Edit]</strong>";
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
				<?php echo "<strong>Education</strong>";?>
			</td>
		</tr>


		<tr>
			<td class="key">
				<label for="eduname">
					<?php echo JText::_( 'Education Name' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="eduname" id="eduname" size="32" maxlength="100" value="<?php echo $this->education->eduname;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="category">
					<?php echo JText::_( 'Category' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="category" id="category" size="20" maxlength="25" value="<?php echo $this->education->category;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="standard">
					<?php echo JText::_( 'Standard' ); ?> :
				</label>
			</td >
			<td>
				<input class="text_area" type="text" name="standard" id="standard" size="32" maxlength="250" value="<?php echo $this->education->standard;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="principal">
					<?php echo JText::_( 'Principal' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="principal" id="principal" size="32" maxlength="200" value="<?php echo $this->education->principal;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="totalstrength">
					<?php echo JText::_( 'Total Strength' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="totalstrength" id="totalstrength" size="10" maxlength="7" value="<?php echo $this->education->totalstrength;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="phone">
					<?php echo JText::_( 'Phone' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="phone" id="phone" size="20" maxlength="50" value="<?php echo $this->education->phone;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="mobile">
					<?php echo JText::_( 'Mobile' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="mobile" id="mobile" size="20" maxlength="50" value="<?php echo $this->education->mobile;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="location">
					<?php echo JText::_( 'Location' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="location" id="location" size="32" maxlength="100" value="<?php echo $this->education->location;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="city">
					<?php echo JText::_( 'City' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="city" id="city" size="20" maxlength="25" value="<?php echo $this->education->city;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="state">
					<?php echo JText::_( 'State' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="state" id="state" size="20" maxlength="25" value="<?php echo $this->education->state;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="website">
					<?php echo JText::_( 'WebSite' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="website" id="website" size="32" maxlength="100" value="<?php echo $this->education->website;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="emailid">
					<?php echo JText::_( 'Email ID' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="emailid" id="emailid" size="32" maxlength="100" value="<?php echo $this->education->emailid;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="published">
					<?php echo JText::_( 'Published' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('select.booleanlist',  'published', '', $this->education->published); ?>
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
				echo $pane->startPanel(JText :: _('Education Parameters'), "param-page");
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
			<?php	echo $editor->display( 'description',  htmlspecialchars($this->education->description, ENT_QUOTES), '100%', '600', '80', '80', array('pagebreak', 'readmore') ) ; ?>
	</fieldset>
</div>	
	

<input type="hidden" name="option" value="com_yellowpage" />
<input type="hidden" name="id" value="<?php echo $this->education->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="education" />

</form>
