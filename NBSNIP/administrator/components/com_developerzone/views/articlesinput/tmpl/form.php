<?php 
	/* 
		Developer-Zone Article input form layout
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
				alert( "<?php echo JText::_( 'You must provide a Title.', true ); ?>" );
			}
			else
			{
				<?php	echo $editor->save( 'article' ) ; ?>
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
					if (empty($this->articles->id))
					{
						echo "<strong> New </strong>" ;
					}
					else
					{
					  echo "<strong>".$this->articles->id ." [Edit]</strong>";
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
			<td>
				<input class="text_area" type="text" name="title" id="title" size="32" maxlength="90" value="<?php echo $this->articles->title;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
			<label for="category">
				<?php echo JText::_( 'Categories ' ); ?> :
			</label>
			</td>
			
			<td>	
				<?php echo JHTML::_('select.genericlist',$options,'category',null,'value','text',$this->articles->category); ?>	
			
			</td>			
		</tr>
		
		<tr>
			<td class="key">
				<label for="published">
					<?php echo JText::_( 'Published' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('select.booleanlist',  'published', '', $this->articles->published ); ?>
			</td>
		</tr>
			
		
		
		<tr/>
	</table>
	</fieldset>
</div>

<div class="col width-70">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Article' ); ?></legend>
			<?php	echo $editor->display( 'article',  htmlspecialchars($this->articles->article, ENT_QUOTES), '100%', '600', '80', '80', array('pagebreak', 'readmore') ) ; ?>
	</fieldset>
</div>	
	

<input type="hidden" name="option" value="com_developerzone" />
<input type="hidden" name="id" value="<?php echo $this->articles->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="Articles" />

</form>
