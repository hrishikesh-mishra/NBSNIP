<?php 
	/* 
		yellowpage Vehicle input form layout
	*/
	
	//no direct access	
	defined('_JEXEC') or die('Restricted access'); 

	jimport('joomla.html.pane');
        
	$pane = &JPane::getInstance('sliders', array('allowAllClose' => true));
	$file = JPATH_ADMINISTRATOR .'/components/com_yellowpage/helpers/vehicle_items.xml';
	$params = new JParameter( $this->vehicle->params, $file, 'component' );
	$editor =& JFactory::getEditor();

?>

	<script language="javascript" type="text/javascript">
		
		function submitbutton(pressbutton, section) {
			var form = document.adminForm;
			
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}

			
			if ( form.orgname.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Vehicle Organisation Name.', true ); ?>" );
			}
			else if ( form.category.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Category.', true ); ?>" );
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
					if (empty($this->vehicle->id))
					{
						echo "<strong> New </strong>" ;
					}
					else
					{
					  echo "<strong>".$this->vehicle->id ." [Edit]</strong>";
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
				<?php echo "<strong>Vehicle</strong>";?>
			</td>
		</tr>


		<tr>
			<td class="key">
				<label for="orgname">
					<?php echo JText::_( 'Vehicle Organisation Name' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="orgname" id="orgname" size="32" maxlength="50" value="<?php echo $this->vehicle->orgname;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="category">
					<?php echo JText::_( 'Category' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="category" id="category" size="20" maxlength="50" value="<?php echo $this->vehicle->category;?>" /> 
			</td>
		</tr>
		<td class="key">
				<label for="owner">
					<?php echo JText::_( 'Owner/Contact Person' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="owner" id="owner" size="20" maxlength="50" value="<?php echo $this->vehicle->owner;?>" /> 
			</td>
		</tr>


		<tr>
			<td class="key">
				<label for="branch">
					<?php echo JText::_( 'Branch (if any)' ); ?> :
				</label>
			</td >
			<td>
				<input class="text_area" type="text" name="branch" id="branch" size="32" maxlength="50" value="<?php echo $this->vehicle->branch;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="products">
					<?php echo JText::_( 'Products' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="products" id="products" size="32" maxlength="200" value="<?php echo $this->vehicle->products;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="facility">
					<?php echo JText::_( 'Facilities to Customers' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="facility" id="facility" size="32" maxlength="250" value="<?php echo $this->vehicle->facility;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="shopkeeperword">
					<?php echo JText::_( "Shopkeeper Word's" ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="shopkeeperword" id="shopkeeperword" size="32" maxlength="200" value="<?php echo $this->vehicle->shopkeeperword;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="phone">
					<?php echo JText::_( 'Phone' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="phone" id="phone" size="20" maxlength="50" value="<?php echo $this->vehicle->phone;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="mobile">
					<?php echo JText::_( 'Mobile' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="mobile" id="mobile" size="20" maxlength="50" value="<?php echo $this->vehicle->mobile;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="location">
					<?php echo JText::_( 'Location' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="location" id="location" size="32" maxlength="100" value="<?php echo $this->vehicle->location;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="city">
					<?php echo JText::_( 'City' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="city" id="city" size="20" maxlength="25" value="<?php echo $this->vehicle->city;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="state">
					<?php echo JText::_( 'State' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="state" id="state" size="20" maxlength="25" value="<?php echo $this->vehicle->state;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="website">
					<?php echo JText::_( 'WebSite' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="website" id="website" size="32" maxlength="100" value="<?php echo $this->vehicle->website;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="emailid">
					<?php echo JText::_( 'Email ID' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="emailid" id="emailid" size="32" maxlength="100" value="<?php echo $this->vehicle->emailid;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="published">
					<?php echo JText::_( 'Published' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('select.booleanlist',  'published', '', $this->vehicle->published ); ?>
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
				echo $pane->startPanel(JText :: _('Vehicle Parameters'), "param-page");
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
			<?php	echo $editor->display( 'description',  htmlspecialchars($this->vehicle->description, ENT_QUOTES), '100%', '600', '80', '80', array('pagebreak', 'readmore') ) ; ?>
	</fieldset>
</div>	
	

<input type="hidden" name="option" value="com_yellowpage" />
<input type="hidden" name="id" value="<?php echo $this->vehicle->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="vehicle" />

</form>
