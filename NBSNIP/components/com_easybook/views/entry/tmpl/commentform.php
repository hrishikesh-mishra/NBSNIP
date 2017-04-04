<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<div id="easybook">
<h2 class="componentheading"><?php echo $this->heading ?></h2>
<a class="view" href="<?php echo JRoute::_('index.php?option=com_easybook'); ?>">
<strong><?php echo JText::_( 'Read Guestbook'); ?>
<?php echo JHTML::_('image', 'components/com_easybook/images/book.png', JText::_('Read Guestbook').":", 'height="16" border="0" width="16" class="png" style="vertical-align: middle;"'); ?></strong></a>
<br />
<br />
<script type="text/javascript">
 	function gb_smilie(thesmile) {
	    document.gbookForm.gbcomment.value += " "+thesmile+" ";
	    document.gbookForm.gbcomment.focus();
  	}
</script>
<form name='gbookForm' action='<?php JRoute::_('index.php'); ?>' target='_top' method='post'>
	<input type='hidden' name='option' value='com_easybook' />
	<input type="hidden" name='task' value='savecomment'/>
	<input type='hidden' name='controller' value='entry' />
	<input type='hidden' name='id' value='<?php echo $this->entry->id; ?>' />

	<table align='center' width='90%' cellpadding='0' cellspacing='4' border='0' >
   		<tr>
   			<td width='130' valign='top'><?php echo JTEXT::_('ADMIN COMMENT'); ?>
   			<br />
   			<br />
   			<?php
 			 # Switch for Smilie Support
   			 if ($this->params->get('support_smilie', true)) {
    			  $count=1;
    			  $smiley = EasybookHelperSmilie::getSmilies();
			      foreach ($smiley as $i=>$sm) {
			        echo "<a href=\"javascript:gb_smilie('$i')\" title='$i'>". JHTML::_('image', 'components/com_easybook/images/smilies/'.$sm, $sm )."</a> ";
			        if ($count%4==0) echo "<br />";
			        $count++;
			      }
			    }
			  ?>
   		 	</td>
    		<td valign='top'><textarea style='width:245px;' rows='8' cols='50' name='gbcomment' class='inputbox'><?php echo $this->entry->gbcomment; ?></textarea></td>
    	</tr>
		<tr>
    		<td width='130'><input type='submit' name='send' value='<?php echo JTEXT::_('Submit entry'); ?>' class='button' /></td>
    		<td align='right'><input type='reset' value='<?php echo JTEXT::_('Reset form'); ?>' name='reset' class='button' /></td>
    	</tr>
	</table>
</form>
</div>
