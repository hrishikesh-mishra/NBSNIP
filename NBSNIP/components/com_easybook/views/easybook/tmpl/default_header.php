<?php // no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div id="easybook">
<h2 class="componentheading"><?php echo $this->heading ?></h2>
<div style='padding-top: 10px;'>
<?php
if($this->access->canAdd){
	echo "<a class=\"sign\" href='".JRoute::_('index.php?option=com_easybook&controller=entry&task=add')."'>";
	echo "<b>".JText::_( 'Sign Guestbook');
	echo JHTML::_('image', 'components/com_easybook/images/new.png', JText::_('Sign Guestbook').":", 'height="16" border="0" width="16" class="png" style="vertical-align: middle;"') ."</b></a>";
}

?>
<?php if($this->params->get('show_introtext')) { ?>
<br />
	<div class='easy_intro'>
		<?php echo $this->params->get('introtext'); ?>
	</div>
<?php } ?>
<br />
<br />

