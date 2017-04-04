<?php defined('_JEXEC') or die('Restricted access'); 
jimport('joomla.html.pane');
        // TODO: allowAllClose should default true in J!1.6, so remove the array when it does.
		$pane = &JPane::getInstance('sliders', array('allowAllClose' => true));
		$file = JPATH_ADMINISTRATOR .'/components/com_myextension/myextension_items.xml';
	$params = new JParameter( $this->foobar->params, $file, 'component' );
	$editor =& JFactory::getEditor();

?>
	<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton, section) {
			var form = document.adminForm;
			
				<?php
				echo $editor->save( 'content' ) ; ?>
				submitform(pressbutton);
			
		}
		</script>

<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col width-45" >
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Details' ); ?></legend>

		<table class="admintable">
		<tr>
			<td width="100" align="right" class="key">
				<label for="content">
					<?php echo JText::_( 'content' ); ?>:
				</label>
			</td>
		</tr>
		<tr>

			<td>
				<?php	echo $editor->display( 'content',  htmlspecialchars($this->foobar->content, ENT_QUOTES), '550', '300', '60', '20', array('pagebreak', 'readmore') ) ; ?>
				<?php /*<input class="text_area" type="text" name="content" id="content" size="32" maxlength="250" value="<?php echo $this->foobar->content;?>" /> */?>
			</td>
		</tr>
		<tr>
		<td> Select a file : </td>
		<td> <input name="upfile" type="file">
		</tr>
	</table>

	</fieldset>
</div>
<div class="col width-50">
			<fieldset class="adminform">
				<legend><?php echo JText::_( 'Parameters' ); ?></legend>

				<?php
					echo $pane->startPane("menu-pane");
					echo $pane->startPanel(JText :: _('Contact Parameters'), "param-page");
					echo $params->render();
					echo $pane->endPanel();
					echo $pane->startPanel(JText :: _('Advanced Parameters'), "param-page");
					echo $params->render('params', 'advanced');
					echo $pane->endPanel();
					echo $pane->startPanel(JText :: _('E-mail Parameters'), "param-page");
					echo $params->render('params', 'email');
					echo $pane->endPanel();
					echo $pane->endPane();
				?></fieldset>
		</div>

<div ></div>


<input type="hidden" name="option" value="com_myextension" />
<input type="hidden" name="id" value="<?php echo $this->foobar->id; ?>" />
<input type="hidden" name="task" value="" />
</form>
