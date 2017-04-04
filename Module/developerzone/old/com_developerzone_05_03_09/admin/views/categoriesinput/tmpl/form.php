<?php 
	/* 
		Developer-Zone Categories input form layout
	*/
	
	//no direct access	
	defined('_JEXEC') or die('Restricted access'); 

	jimport('joomla.html.pane');
    
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
			if ( form.category.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Categories Name.', true ); ?>" );
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
					if (empty($this->categories->id))
					{
						echo "<strong> New </strong>" ;
					}
					else
					{
					  echo "<strong>".$this->categories->id ." [Edit]</strong>";
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
				<?php echo "<strong>Categories</strong>";?>
			</td>
		</tr>


		<tr>
			<td class="key">
				<label for="title">
					<?php echo JText::_( 'Category-Name' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="category" id="category" size="32" maxlength="50" value="<?php echo $this->categories->category;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="image">
					 <?php echo JText::_('Image');?> </td>
					<td>			
					
				<?php  echo JHTML::_('list.images',  'image', $this->categories->image ); ?>
			
			</td>
				</label>
			</td>
			<tr>
			<td class="key">
				<label for="published">
					<?php echo JText::_( 'Published' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('select.booleanlist',  'published', '', $this->categories->published ); ?>
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
		<legend><?php echo JText::_( 'about' ); ?></legend>
			<?php	echo $editor->display( 'about',  htmlspecialchars($this->categories->about, ENT_QUOTES), '100%', '600', '80', '80', array('pagebreak', 'readmore') ) ; ?>
	</fieldset>
</div>	
	

<input type="hidden" name="option" value="com_developerzone" />
<input type="hidden" name="id" value="<?php echo $this->categories->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="categories" />

</form>
