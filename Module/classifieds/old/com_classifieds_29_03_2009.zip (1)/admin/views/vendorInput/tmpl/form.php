<?php 
	/* 
		Classifieds Vendor input form layout
	*/
	
	//no direct access	
	defined('_JEXEC') or die('Restricted access'); 

	
      $editor =& JFactory::getEditor();
	$cparams = JComponentHelper::getParams ('com_media');
	

?>

	<script language="javascript" type="text/javascript">
		
		function submitbutton(pressbutton, section) {
			var form = document.adminForm;
	
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}
			
					
			if ( form.name.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Vendor Name.', true ); ?>" );
			}
	
			else
			{
				<?php	echo $editor->save( 'about' ) ; ?>
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
					if (empty($this->vendor->id))
					{
						echo "<strong> New </strong>" ;
					}
					else
					{
					  echo "<strong>".$this->vendor->id ." [Edit]</strong>";
					}
				 ?>
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="name">
					<?php echo JText::_( 'Vendor Name' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="name" id="name" size="32" maxlength="50" value="<?php echo $this->vendor->name;?>" /> 
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="phone">
					<?php echo JText::_( 'Phone' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="phone" id="phone" size="20" maxlength="50" value="<?php echo $this->vendor->phone;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="mobile">
					<?php echo JText::_( 'Mobile' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="mobile" id="mobile" size="20" maxlength="50" value="<?php echo $this->vendor->mobile;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="location">
					<?php echo JText::_( 'Location' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="location" id="location" size="32" maxlength="100" value="<?php echo $this->vendor->location;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="city">
					<?php echo JText::_( 'City' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="city" id="city" size="20" maxlength="25" value="<?php echo $this->vendor->city;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="state">
					<?php echo JText::_( 'State' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="state" id="state" size="20" maxlength="25" value="<?php echo $this->vendor->state;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="website">
					<?php echo JText::_( 'WebSite' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="website" id="website" size="32" maxlength="100" value="<?php echo $this->vendor->website;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="emailid">
					<?php echo JText::_( 'Email ID' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="emailid" id="emailid" size="32" maxlength="100" value="<?php echo $this->vendor->emailid;?>" /> 
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
		<tr>
			<td class="key">
				<label for="image">
					<?php echo JText::_( 'Image' ); ?> :
				</label>
			</td>
			<td >
				<?php  echo JHTML::_('list.images',  'image', $this->vendor->image ); ?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<script language="javascript" type="text/javascript">
					if (document.forms.adminForm.image.options.value!='')
					{
						jsimg='../<?echo $cparams->get('image_path'); ?>/' + getSelectedValue( 'adminForm', 'image' );
					} else 
					{
						jsimg='../images/M_images/blank.png';
					}
						document.write('<img src=' + jsimg + ' name="imagelib" width="100" height="100" border="2" alt="<?php echo JText::_( 'Preview' ); ?>" />');
				</script>
			</td>
		</tr>		

		<tr/>

	</table>

	</fieldset>
</div>

<div class="col width-70">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'About' ); ?></legend>
			<?php	echo $editor->display( 'about',  htmlspecialchars($this->vendor->description, ENT_QUOTES), '100%', '600', '80', '80', array('pagebreak', 'readmore') ) ; ?>
	</fieldset>
</div>	
	

<input type="hidden" name="option" value="com_classifieds" />
<input type="hidden" name="id" value="<?php echo $this->vendor->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="vendor" />
</form>
