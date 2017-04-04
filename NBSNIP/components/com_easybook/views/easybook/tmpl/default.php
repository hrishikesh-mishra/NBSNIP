<?php // no direct access
defined('_JEXEC') or die('Restricted access');
//Load Header
echo $this->loadTemplate('header');
//Load Entrys
echo $this->loadTemplate('entrys');
?>
<div><br /><b class='easy_pagination'><?php echo $this->count ?><br/>
<?php
if ($this->count == 1) {echo JText::_('Entry in the Guestbook');} else {
	echo JText::_('Entrys in the Guestbook');}
?></b>
</div>
<?php
//Load Pagenavigation
if($this->pagination->total > $this->pagination->limit)
{
echo $this->pagination->getPagesLinks();
}
//Load Footer
if($this->params->get('show_logo', true)) {
		echo $this->loadTemplate('footer');
}
?>
</div>
</div>