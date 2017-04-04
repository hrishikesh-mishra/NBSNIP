<?php 
	/* 
		yellowpage Club input form layout
	*/
	
	//no direct access	
	defined('_JEXEC') or die('Restricted access'); 

	jimport('joomla.html.pane');
        
	$pane = &JPane::getInstance('sliders', array('allowAllClose' => true));
	$file = JPATH_ADMINISTRATOR .'/components/com_yellowpage/helpers/club_items.xml';
	$params = new JParameter( $this->club->params, $file, 'component' );
	$editor =& JFactory::getEditor();

	

?>

	<script language="javascript" type="text/javascript">
		
		function submitbutton(pressbutton, section) {
			var form = document.adminForm;
						
			
			
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}
			
					
			if ( form.clubname.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Club Name.', true ); ?>" );
			}
			else if ( form.secretaryname.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Secretary Name.', true ); ?>" );
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
					if (empty($this->club->id))
					{
						echo "<strong> New </strong>" ;
					}
					else
					{
					  echo "<strong>".$this->club->id ." [Edit]</strong>";
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
				<?php echo "<strong>Club</strong>";?>
			</td>
		</tr>


		<tr>
			<td class="key">
				<label for="clubname">
					<?php echo JText::_( 'Club Name' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="clubname" id="clubname" size="32" maxlength="50" value="<?php echo $this->club->clubname;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="Secretaryname">
					<?php echo JText::_( 'Secretary Name' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="secretaryname" id="secretaryname" size="20" maxlength="50" value="<?php echo $this->club->secretaryname;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="history">
					<?php echo JText::_( 'History of Club' ); ?> :
				</label>
			</td >
			<td>
				<input class="text_area" type="text" name="history" id="history" size="32" maxlength="200" value="<?php echo $this->club->history;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="sportactivity">
					<?php echo JText::_( 'Sport Activity' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="sportactivity" id="sportactivity" size="32" maxlength="200" value="<?php echo $this->club->sportactivity;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="secretaryword">
					<?php echo JText::_( "Secretary Word's" ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="secretaryword" id="secretaryword" size="32" maxlength="200" value="<?php echo $this->club->secretaryword;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="phone">
					<?php echo JText::_( 'Phone' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="phone" id="phone" size="20" maxlength="50" value="<?php echo $this->club->phone;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="mobile">
					<?php echo JText::_( 'Mobile' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="mobile" id="mobile" size="20" maxlength="50" value="<?php echo $this->club->mobile;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="location">
					<?php echo JText::_( 'Location' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="location" id="location" size="32" maxlength="100" value="<?php echo $this->club->location;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="city">
					<?php echo JText::_( 'City' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="city" id="city" size="20" maxlength="25" value="<?php echo $this->club->city;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="state">
					<?php echo JText::_( 'State' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="state" id="state" size="20" maxlength="25" value="<?php echo $this->club->state;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="website">
					<?php echo JText::_( 'WebSite' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="website" id="website" size="32" maxlength="100" value="<?php echo $this->club->website;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="emailid">
					<?php echo JText::_( 'Email ID' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="emailid" id="emailid" size="32" maxlength="100" value="<?php echo $this->club->emailid;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="published">
					<?php echo JText::_( 'Published' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('select.booleanlist',  'published', '', $this->vendor->published ); ?>
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
				echo $pane->startPanel(JText :: _('Club Parameters'), "param-page");
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
			<?php	echo $editor->display( 'description',  htmlspecialchars($this->club->description, ENT_QUOTES), '100%', '600', '80', '80', array('pagebreak', 'readmore') ) ; ?>
	</fieldset>
</div>	
	

<input type="hidden" name="option" value="com_yellowpage" />
<input type="hidden" name="id" value="<?php echo $this->club->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="club" />

</form>
