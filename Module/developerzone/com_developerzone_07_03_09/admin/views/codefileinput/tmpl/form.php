<?php 
	/* 
		Developer-Zone Code-File input form layout
	*/
	
	//no direct access	
	defined('_JEXEC') or die('Restricted access'); 
	   
	$editor =& JFactory::getEditor();	

	
	$options =array();
	
	for ($i=0, $n=count($this->categories); $i < $n; $i++)	
	{
		$row = $this->categories[$i];
		$options[]= JHTML::_('select.option',$row->id,$row->id.'::'.$row->category);
	}	
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
				alert( "<?php echo JText::_( 'You must provide Categories.', true ); ?>" );
			}
			if ( form.title.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Title.', true ); ?>" );
			}
			else
			{
				<?php	echo $editor->save( 'description' ) ; ?>
				submitform(pressbutton);
			}
			
		}
		</script>


<form  action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
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
					if (empty($this->codefile->id))
					{
						echo "<strong> New </strong>" ;
					}
					else
					{
					  echo "<strong>".$this->codefile->id ." [Edit]</strong>";
					}
				 ?>
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="title">
					<?php echo JText::_( 'Title' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text
				" name="title" id="title" size="32" maxlength="90" value="<?php echo $this->codefile->title;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
			<label for="category">
				<?php echo JText::_( 'Categories ' ); ?> :
			</label>
			</td>
			
			<td>	
				<?php echo JHTML::_('select.genericlist',$options,'category',null,'value','text',$this->codefile->category); ?>	
			
			</td>			
		</tr>
		
		<tr>
			<td class="key">
			<label for="cfile">
				<?php echo JText::_( 'Code-File ' ); ?> :
			</label>
			</td>   
			<td>
          <input type="file" name="cfile" id="cfile" >
			</td>
		</tr>
		<tr>
			<td class="key">
			<label for="extfile">
				<?php echo JText::_( 'Existing File: ' ); ?> :
			</label>
			</td>   
			<td>
				<input type="text" id ="extfile" name="extfile" size="50" readonly="readonly" 
				value="<?php echo $this->codefile->codefile?>"/>
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="published">
					<?php echo JText::_( 'Publish' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('select.booleanlist',  'published', '', $this->codefile->published ); ?>
			</td>
		</tr>
	
			
		<tr/>
	</table>
	</fieldset>
</div>
<div class="col width-70">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'about' ); ?></legend>
			<?php	echo $editor->display( 'description',  htmlspecialchars($this->codefile->description, ENT_QUOTES), '100%', '600', '80', '80', array('pagebreak', 'readmore') ) ; ?>
	</fieldset>
</div>	
	

<input type="hidden" name="option" value="com_developerzone" />
<input type="hidden" name="id" value="<?php echo $this->codefile->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="codefile" />
</form>
