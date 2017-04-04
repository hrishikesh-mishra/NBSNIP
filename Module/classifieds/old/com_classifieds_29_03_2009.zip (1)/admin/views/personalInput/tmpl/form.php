<?php 
	/* 
		Classifieds Personal input form layout
	*/
	
	//no direct access	
	defined('_JEXEC') or die('Restricted access'); 

	jimport('joomla.html.pane');
      $pane = &JPane::getInstance('sliders', array('allowAllClose' => true));
	$file = JPATH_ADMINISTRATOR .'/components/com_classifieds/helpers/personal_items.xml';
	$params = new JParameter( $this->personal->params, $file, 'component' );
	$editor =& JFactory::getEditor();	
	$options =array();
	
	for ($i=0, $n=count($this->vendor); $i < $n; $i++)	
	{
		$row = $this->vendor[$i];
		$options[]= JHTML::_('select.option',$row->id,$row->id.':-:'.$row->name);
	}

?>
	<script language="javascript" type="text/javascript">
		
		function submitbutton(pressbutton, section) {
		var form = document.adminForm;
			
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}
			
			var sdate = new Date(form.regstartdate.value);
			var edate = new Date(form.regenddate.value);
			
			var datediff= edate.getTime() -sdate.getTime();
				

			if (datediff< 0 )
			{
				alert( "<?php echo JText::_( 'You must Invalid dates.', true ); ?>" );	
			}
					
			else if ( form.title.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Title.', true ); ?>" );
			}
			else if ( form.vid.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Vendor ID.', true ); ?>" );
			}
			else if ( form.emailid.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Email-ID.', true ); ?>" );
			}
			else
			{
				<?php	echo $editor->save( 'description' ) ; ?>
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
				<?php 
					if (empty($this->personal->id))
					{
						echo "<strong> New </strong>" ;
					}
					else
					{
					  echo "<strong>".$this->presonal->id ." [Edit]</strong>";
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
				<?php echo "<strong>Personal</strong>";?>
			</td>
		</tr>


		<tr>
			<td class="key">
				<label for="title">
					<?php echo JText::_( 'Title' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="title" id="title" size="32" maxlength="100" value="<?php echo $this->personal->title;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="requirement">
					<?php echo JText::_( 'Requirement' ); ?> :
				</label>
			</td>
			<td >
				<textarea class="text_area" name="requirement" id="requirement" rows="5" cols="40" maxlength="240"><?php echo $this->personal->requirement;?></textarea> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="contactperson">
					<?php echo JText::_( 'Contact Person' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="contactperson" id="contactperson" size="20" maxlength="50" value="<?php echo $this->personal->contactperson;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="phone">
					<?php echo JText::_( 'Phone' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="phone" id="phone" size="20" maxlength="50" value="<?php echo $this->personal->phone;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="mobile">
					<?php echo JText::_( 'Mobile' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="mobile" id="mobile" size="20" maxlength="50" value="<?php echo $this->personal->mobile;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="fax">
					<?php echo JText::_( 'Fax' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="fax" id="fax" size="20" maxlength="50" value="<?php echo $this->personal->fax;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="location">
					<?php echo JText::_( 'Location' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="location" id="location" size="32" maxlength="100" value="<?php echo $this->personal->location;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="city">
					<?php echo JText::_( 'City' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="city" id="city" size="20" maxlength="25" value="<?php echo $this->personal->city;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="state">
					<?php echo JText::_( 'State' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="state" id="state" size="20" maxlength="25" value="<?php echo $this->personal->state;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="emailid">
					<?php echo JText::_( 'Email ID' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="emailid" id="emailid" size="32" maxlength="100" value="<?php echo $this->personal->emailid;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="website">
					<?php echo JText::_( 'WebSite' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="website" id="website" size="32" maxlength="100" value="<?php echo $this->personal->website;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="regstartdate">
					<?php echo JText::_( 'Reg. Start Date (yyy/mm/dd)' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('calendar',$this->personal->regstartdate ,'regstartdate','regstartdate','%Y/%m/%d'); ?>				
			</td>

		</tr>
		<tr>
			<td class="key">
				<label for="regEnddate">
					<?php echo JText::_( 'Reg. Start Date (yyy/mm/dd)' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('calendar',$this->personal->regenddate ,'regenddate','regenddate','%Y/%m/%d'); ?>				
			</td>

		</tr>

		<tr>
			<td class="key">
				<label for="published">
					<?php echo JText::_( 'Published' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('select.booleanlist',  'published', '', $this->presonal->published ); ?>
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="vid">
					<?php echo JText::_( 'Vendor-ID' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('select.genericlist',$options,'vid',null,'value','text',$this->personal->vid); ?>				
			</td>
		</tr>
		


		<tr/>
	</table>
	</fieldset>
</div>
<div class="col width-40">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Parameters' ); ?></legend>
			<?php
				echo $pane->startPane("menu-pane");
				echo $pane->startPanel(JText :: _('Personal Parameters'), "param-page");
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
			<?php	echo $editor->display( 'description',  htmlspecialchars($this->personal->description, ENT_QUOTES), '100%', '600', '80', '80', array('pagebreak', 'readmore') ) ; ?>
	</fieldset>
</div>	
	

<input type="hidden" name="option" value="com_classifieds" />
<input type="hidden" name="id" value="<?php echo $this->personal->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="personal" />

</form>
