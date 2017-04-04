<?php 
	/* 
		blog user edit form layout
	*/
	
	//no direct access	
	defined('_JEXEC') or die('Restricted access'); 

	$editor =& JFactory::getEditor();
 
 ?>

	<script language="javascript" type="text/javascript">
		
		function submitbutton(pressbutton, section) {
			var form = document.adminForm;
			
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}

			
			if ( form.topic.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Topic.', true ); ?>" );
			}		
			else
			{
				<?php	echo $editor->save( 'blog' ) ; ?>
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
					if (empty($this->blog->id))
					{
						echo "<strong> New </strong>" ;
					}
					else
					{
					  echo "<strong>".$this->blog->id ." [Edit]</strong>";
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
				<input class="text_area" type="text" name="userid" id="userid" size="32" readonly="readonly" value="<?php echo $this->blog->userid;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="bdate">
					<?php echo JText::_( 'Blog-Date' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="bdate" id="bdate" size="32" readonly="readonly" value="<?php echo $this->blog->bdate;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="topic">
					<?php echo JText::_( 'Topic' ); ?> :
				</label>
			</td >
			<td>
				<input class="text_area" type="text" name="topic" id="topic" size="32" maxlength="100" value="<?php echo $this->blog->topic;?>" /> 
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="published">
					<?php echo JText::_( 'Published' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('select.booleanlist',  'published', '', $this->blog->published ); ?>
			</td>
		</tr>

		<tr/>

	</table>

	</fieldset>
</div>

<div class="col width-70">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Blog' ); ?></legend>
			<?php	echo $editor->display( 'blog',  htmlspecialchars($this->blog->blog, ENT_QUOTES), '100%', '600', '80', '80', array('pagebreak', 'readmore') ) ; ?>
	</fieldset>
</div>	
	

<input type="hidden" name="option" value="com_blog" />
<input type="hidden" name="id" value="<?php echo $this->blog->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="blog" />

</form>
