<?php 
	/* 
		Blog comment edit form layout
	*/
	
	//no direct access	
	defined('_JEXEC') or die('Restricted access'); 
	jimport('joomla.utilities.date');
	$options =array();
	
	for ($i=0, $n=count($this->userid); $i < $n; $i++)	
	{
		$row = $this->userid[$i];
		$options[]= JHTML::_('select.option',$row->userid,$row->userid);
	}
 
 ?>
	<script language="javascript" type="text/javascript">
		
		function submitbutton(pressbutton, section) {
		var form = document.adminForm;
			
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}				

					
			if ( form.cname.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Commenter Name.', true ); ?>" );
			}
			else if ( form.comment.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Comments.', true ); ?>" );
			}
			else
			{
			
				submitform(pressbutton);
			}
			
		}
		</script>
<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col width-70" >
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
					if (empty($this->comment->id))
					{
						echo "<strong> New </strong>" ;
					}
					else
					{
					  echo "<strong>".$this->comment->id ." [Edit]</strong>";
					}
				 ?>
			</td>
		</tr>

		<tr>
			
		<tr>
			<td class="key">
				<label for="blogid">
					<?php echo JText::_( 'Blog-ID' ); ?> :
				</label>
			</td>
			<td >
				<input type="text" class="text_area"  name="blogid" id="blogid" size="10" readonly="readonly" value="<?php echo $this->comment->blogid;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="cname">
					<?php echo JText::_( 'Commenter' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="cname" id="cname" size="32" maxlength="50" 
				value="<?php echo $this->comment->cname; ?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="cdate">
					<?php echo JText::_( 'Date' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="cdate" id="cdate" size="32" readonly="readonly" maxlength="50" 
				value="<?php echo $this->comment->cdate; ?>" /> 
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="addedbyip">
					<?php echo JText::_( 'Added-By-IP' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="addedbyip" id="addedbyip" size="32"  readonly="readonly" maxlength="50" 
				value="<?php echo $this->comment->addedbyip; ?>" /> 
			</td>
		</tr>	
		<tr>
			<td class="key">
				<label for="published">
					<?php echo JText::_( 'Publish' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('select.booleanlist',  'published', '', $this->comment->published ); ?>
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="comment">
					<?php echo JText::_( 'Comment' ); ?> :
				</label>
			</td>

			<td >
				<textarea class="text_area"  name="comment" id="comment" rows="8" 
				cols="60" ><?php echo $this->comment->comment;?></textarea>
			</td>
		</tr>
		
		<tr/>
	</table>
	</fieldset>
</div>

	

<input type="hidden" name="option" value="com_blog" />
<input type="hidden" name="id" value="<?php echo $this->comment->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="comment" />

</form>
