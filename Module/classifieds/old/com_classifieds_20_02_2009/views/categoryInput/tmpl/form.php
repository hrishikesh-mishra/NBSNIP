<?php 
	/* 
		Classifieds Category input form layout
	*/
	
	//no direct access	
	defined('_JEXEC') or die('Restricted access'); 
     
	$editor =& JFactory::getEditor();	

?>
	<script language="javascript" type="text/javascript">
		
		function submitbutton(pressbutton, section) {
		var form = document.adminForm;
			
			if (pressbutton == 'cancel') 
			{
				submitform( pressbutton );
				return;
			}
			
			<?php	echo $editor->save( 'description' ) ; ?>
			submitform(pressbutton);
			
			
		}
		</script>


<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col width-70">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Description' ); ?></legend>
			<?php	echo $editor->display( 'description',  htmlspecialchars($this->category->description, ENT_QUOTES), '100%', '600', '80', '80', array('pagebreak', 'readmore') ) ; ?>
	</fieldset>
</div>	
	

<input type="hidden" name="option" value="com_classifieds" />
<input type="hidden" name="id" value="<?php echo $this->category->cid; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="category" />

</form>
