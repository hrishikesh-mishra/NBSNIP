<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
 # Javascript for SmilieInsert and Form Check
?>
<div id="easybook">
<h2 class="componentheading"><?php echo $this->heading ?></h2>
<a class="view" href="<?php echo JRoute::_('index.php?option=com_easybook'); ?>">
<strong><?php echo JText::_( 'Read Guestbook'); ?>
<?php echo JHTML::_('image', 'components/com_easybook/images/book.png', JText::_('Read Guestbook').":", 'height="16" border="0" width="16" class="png" style="vertical-align: middle;"'); ?></strong></a>
<br />
<br />
<script type="text/javascript">
	function x () {
    	return;
	}
 
 	function gb_smilie(thesmile) {
   		document.gbookForm.gbtext.value += " "+thesmile+" ";
    	document.gbookForm.gbtext.focus();
  	}
  	
	<?php if ($this->params->get('support_bbcode', false)) { ?>
    function DoPrompt(action) {
      	var revisedMessage;
      	var currentMessage = document.gbookForm.gbtext.value;
      	<?php if ($this->params->get('support_link', false)) { ?>
      	if (action == "url") {
      		var thisURL = prompt("<?php echo JTEXT::_('Enter the URL here'); ?>", "http://");
      		var thisTitle = prompt("<?php echo JTEXT::_('Enter the web page title'); ?>", "<?php echo JTEXT::_('web page title'); ?>");
      		var urlBBCode = "[URL="+thisURL+"]"+thisTitle+"[/URL]";
      		revisedMessage = currentMessage+urlBBCode;
        	document.gbookForm.gbtext.value=revisedMessage;
        	document.gbookForm.gbtext.focus();
        	return;
    	}
    	<?php } ?>
    	<?php if ($this->params->get('support_mail', true)) { ?>
      	if (action == "email") {
      		var thisEmail = prompt("<?php echo JTEXT::_('Enter the e-mail address'); ?>", "");
      		var emailBBCode = "[EMAIL]"+thisEmail+"[/EMAIL]";
      		revisedMessage = currentMessage+emailBBCode;
      		document.gbookForm.gbtext.value=revisedMessage;
      		document.gbookForm.gbtext.focus();
      		return;
      	}
      	<?php } ?>
      	if (action == "bold") {
   			var thisBold = prompt("<?php echo JTEXT::_('Enter the text which should appear bold'); ?>", "");
		    var boldBBCode = "[B]"+thisBold+"[/B]";
		    revisedMessage = currentMessage+boldBBCode;
		    document.gbookForm.gbtext.value=revisedMessage;
		    document.gbookForm.gbtext.focus();
		    return;
   		}
  		if (action == "italic") {
		    var thisItal = prompt("<?php echo JTEXT::_('Enter the text which should appear italic'); ?>", "");
		    var italBBCode = "[I]"+thisItal+"[/I]";
		    revisedMessage = currentMessage+italBBCode;
		    document.gbookForm.gbtext.value=revisedMessage;
		    document.gbookForm.gbtext.focus();
			return;
		}
      	if (action == "underline") {
	      	var thisUndl = prompt("<?php echo JTEXT::_('Enter the text which should be underlined'); ?>", "");
	      	var undlBBCode = "[U]"+thisUndl+"[/U]";
	      	revisedMessage = currentMessage+undlBBCode;
	     	document.gbookForm.gbtext.value=revisedMessage;
	     	document.gbookForm.gbtext.focus();
	     	return;
     	}
      	if (action == "quote") {
		    var quoteBBCode = "[QUOTE]  [/QUOTE]";
		    revisedMessage = currentMessage+quoteBBCode;
		    document.gbookForm.gbtext.value=revisedMessage;
		    document.gbookForm.gbtext.focus();
		    return;
      	}
      	if (action == "code") {
	      	var codeBBCode = "[CODE]  [/CODE]";
	      	revisedMessage = currentMessage+codeBBCode;
	      	document.gbookForm.gbtext.value=revisedMessage;
	      	document.gbookForm.gbtext.focus();
	      	return;
     	}
      	if (action == "listopen") {
	      	var liststartBBCode = "[LIST]";
	      	revisedMessage = currentMessage+liststartBBCode;
	      	document.gbookForm.gbtext.value=revisedMessage;
	     	document.gbookForm.gbtext.focus();
	      	return;
      	}
      	if (action == "listclose") {
	      	var listendBBCode = "[/LIST]";
	      	revisedMessage = currentMessage+listendBBCode;
	      	document.gbookForm.gbtext.value=revisedMessage;
	      	document.gbookForm.gbtext.focus();
	      	return;
      	}
      	if (action == "listitem") {
	      	var thisItem = prompt("<?php echo JTEXT::_('Enter the new list element. A group of list itmes must always be surrounded by an open-list and a close-list element'); ?>", "");
	      	var itemBBCode = "[*]"+thisItem;
	      	revisedMessage = currentMessage+itemBBCode;
	      	document.gbookForm.gbtext.value=revisedMessage;
	      	document.gbookForm.gbtext.focus();
	      	return;
      	}
      	<?php if ($this->params->get('support_pic', false)) { ?>
      	if (action == "image") {
	      	var thisImage = prompt("_<?php echo JTEXT::_('Enter the URL of the picture you want to show'); ?>", "http://");
	      	var imageBBCode = "[IMG]"+thisImage+"[/IMG]";
	      	revisedMessage = currentMessage+imageBBCode;
	      	if(thisImage || (typeof(thisImage) == 'string' && thisImage.length))
	      		document.gbookForm.gbtext.value=revisedMessage;
	      	document.gbookForm.gbtext.focus();
	      	return;
      	}
      	<?php } ?>
      }
 <?php } ?>
</script>
<form name='gbookForm' action='<?php JRoute::_('index.php'); ?>' target='_top' method='post'>
    <input type='hidden' name='option' value='com_easybook' />
    <input type='hidden' name='task' value='save' />
    <input type='hidden' name='controller' value='entry' />
	<?php if($this->entry->id){ ?>
	<input type='hidden' name='id' value='<?php echo $this->entry->id; ?>' />
	<?php } ?>
    <table align='center' width='90%' cellpadding='0' cellspacing='4' border='0' >
    
	<?php if($this->params->get('enable_log', true)) { ?>
	<tr>
		<td width='130'><?php echo JTEXT::_('IP address'); ?><span class='small'>*</span></td>
		<td><input type='text' name='gbiip' style='width:245px;' class='inputbox' value='<?php echo $this->entry->ip; ?>' disabled='disabled' /></td>
	</tr>
	<?php } ?>
	
	<tr>
		<td width='130'><?php echo JTEXT::_('Name'); ?><span class='small'>*</span></td>
		<td><input type='text' name='gbname' style='width:245px;' class='inputbox' value='<?php echo $this->entry->gbname; ?>' /></td>
	</tr>
	
	<?php if($this->params->get('show_mail', true) OR $this->params->get('require_mail', true)) { ?>
		<tr>
			<td width='130'><?php echo JTEXT::_('E-mail'); ?><?php if($this->params->get('require_mail', true)){echo "<span class='small'>*</span>"; } ?></td>
			<td><input type='text' name='gbmail' style='width:245px;' class='inputbox' value='<?php echo $this->entry->gbmail; ?>' /></td>
		</tr>
		
		<?php if(!$this->entry->id){ ?>
		<tr>
			<td width='130'><?php echo JTEXT::_('Show e-mail in public'); ?></td>
			<td><input type='checkbox' name='gbmailshow' class='inputbox' value='1' /></td>
		</tr>
		<?php } ?>
	<?php } 
	if($this->params->get('show_home', true)) { ?>
	<tr>
		<td width='130'><?php echo JTEXT::_('Homepage'); ?></td>
		<td><input type='text' name='gbpage' style='width:245px;' class='inputbox' value='<?php echo $this->entry->gbpage; ?>' /></td>
	</tr>
	<?php } 
	?>
  	<tr>
  		<td width='130'><?php echo JTEXT::_('Location'); ?></td>
  		<td><input type='text' name='gbloca' style='width:245px;' class='inputbox' value='<?php echo $this->entry->gbloca; ?>' /></td>
  	</tr>
    <?php if($this->params->get('show_icq', true)) { ?>
    <tr>
    	<td width='130'><?php echo JTEXT::_('ICQ number'); ?></td>
    	<td><input type='text' name='gbicq' style='width:245px;' class='inputbox' value='<?php echo $this->entry->gbicq; ?>' /></td>
    </tr>
    <?php } 
	if($this->params->get('show_aim', true)) { ?>
    <tr>
    	<td width='130'><?php echo JTEXT::_('AIM nickname'); ?></td>
    	<td><input type='text' name='gbaim' style='width:245px;' class='inputbox' value='<?php echo $this->entry->gbaim; ?>' /></td>
    </tr>
    <?php } 
	if($this->params->get('show_msn', true)) { ?>
    <tr>
    	<td width='130'><?php echo JTEXT::_('MSN messenger'); ?></td>
    	<td><input type='text' name='gbmsn' style='width:245px;' class='inputbox' value='<?php echo $this->entry->gbmsn; ?>' /></td>
    </tr>
    <?php } 
	if($this->params->get('show_yah', true)) { ?>
    <tr>
    	<td width='130'><?php echo JTEXT::_('Yahoo messenger'); ?></td>
    	<td><input type='text' name='gbyah' style='width:245px;' class='inputbox' value='<?php echo $this->entry->gbyah; ?>'/></td>
    </tr>
    <?php } 
	if($this->params->get('show_skype', true)) { ?>
    <tr>
    	<td width='130'><?php echo JTEXT::_('Skype nickname'); ?></td>
    	<td><input type='text' name='gbskype' style='width:245px;' class='inputbox' value='<?php echo $this->entry->gbskype ?>' /></td>
    </tr>
	<?php } 
	if($this->params->get('show_rating', true)){
	?>
	<tr>
		<td width='130'><?php echo JTEXT::_('Website rating'); ?></td>
      	<td>
      		<select style='width:130px;' class='inputbox' size='1' name='gbvote'>
	 			<option value='0'><? echo JTEXT::_('Please rate'); ?></option>
	 			<?php
      			for ($i=1; $i<=$this->params->get('rating_max', 5); $i++) {
        			echo "<option>$i</option>";
     			}
     			?>
      		</select> (<?php echo $this->params->get('rating_max', 5) ." - ". JTEXT::_('Best rating').", 1 - ". JTEXT::_('Worst rating'); ?>)
      	</td>
     </tr>
    <?php
    } else {
      echo "<input type='hidden' name='gbvote' value='0' />";
    }
	?>

  <?php	
  # Switch for BB Code support
    if ($this->params->get('support_bbcode', false)) {
   	  ?>
      <tr>
      	<td width='130'></td>
      	<td>
      	<?php
      		if ($this->params->get('support_link', false)) {
      	?>
      	<a href='javascript:%x()' onclick='DoPrompt("url");'>
      		<img src='<?php echo $this->baseurl ?>/components/com_easybook/images/world_link.png' hspace='3' border='0' alt='' title='<?php echo JTEXT::_('Web address'); ?>' height='16' width='16' />
      	</a>
      	<?php
   			}
      		if ($this->params->get('support_mail', true)) {
   	 	 ?>
      	<a href='javascript:%x()' onclick='DoPrompt("email");'>
      		<img src='<?php echo $this->baseurl ?>/components/com_easybook/images/email_link.png' hspace='3' border='0' alt='' title='<?php echo JTEXT::_('E-mail address'); ?>' height='16' width='16' />
      	</a>
      	<?php
      		}
      		if ($this->params->get('support_pic', false)) {
      	?>
      	<a href='javascript:%x()' onclick='DoPrompt("image");'>
      		<img src='<?php echo $this->baseurl ?>/components/com_easybook/images/picture_link.png' hspace='3' border='0' alt='' title='<?php echo JTEXT::_('Shows image from an url'); ?>' height='16' width='16' />
      	</a>
      	<?php
      		}
      	?>
      	<a href='javascript:%x()' onclick='DoPrompt("bold");'>
      		<img src='<?php echo $this->baseurl ?>/components/com_easybook/images/text_bold.png' hspace='3' border='0' alt='Bold' title='<?php echo JTEXT::_('Bold'); ?>' height='16' width='16' />
      	</a>
      	<a href='javascript:%x()' onclick='DoPrompt("italic");'>
      		<img src='<?php echo $this->baseurl ?>/components/com_easybook/images/text_italic.png' hspace='3' border='0' alt='Italic' title='<?php echo JTEXT::_('Italic'); ?>' height='16' width='16' />
      	</a>
      	<a href='javascript:%x()' onclick='DoPrompt("underline");'>
      		<img src='<?php echo $this->baseurl ?>/components/com_easybook/images/text_underline.png' hspace='3' border='0' alt='Underline' title='<?php echo JTEXT::_('Underline'); ?>' height='16' width='16' />
      	</a>
      	</td>
      </tr>
  	  <?php  
    }
  ?>
   		<tr>
   			<td width='130' valign='top'><?php echo JTEXT::_('Guestbook entry'); ?><span class='small'>*</span>
   			<br />
   			<br />
   			<?php
 			 # Switch for Smilie Support
   			 if ($this->params->get('support_smilie', true)) {
    			  $count=1;
    			  $smiley = EasybookHelperSmilie::getSmilies();
			      foreach ($smiley as $i=>$sm) {
			        echo "<a href=\"javascript:gb_smilie('$i')\" title='$i'>". JHTML::_('image', 'components/com_easybook/images/smilies/'.$sm, $sm, 'border="0"' )."</a> ";
			        if ($count%4==0) echo "<br />";
			        $count++;
			      }
			    }
			  ?>
   		 	</td>
    		<td valign='top'><textarea style='width:245px;' rows='8' cols='50' name='gbtext' class='inputbox'><?php echo $this->entry->gbtext; ?></textarea></td>
    	</tr>
    	<?php
    	if($this->params->get('enable_captcha', false))
    	{ ?>
    	<tr>
    		<td colspan="2">
    			<table>
    				<tr>
            <td width="130">
              <?php echo $this->captcha->getReloadCode(); ?>
    					<input type="hidden" value="<?php echo $this->captcha->getCaptchaId() ?>" name="captcha_id"/><?php echo JTEXT::_('Enter Code'); ?>:<span class="small">*</span></td>
    					<td><input type="text" title="<?php echo JTEXT::_('Enter Code'); ?>" class="inputbox" style="width: 60px; vertical-align: middle;" maxlength="5" name="gbcode"/></td>
    					<td rowspan="2"><img width="178" height="50" border="0" id="code" style="vertical-align: top;" alt="<?php echo $this->captcha->getAltText(); ?>" title="<?php echo $this->captcha->getAltText(); ?>" src="<?php echo $this->captcha->getImageUrl(); ?>"/></td>
    				</tr>
    				<tr>
    					<td><?php echo JTEXT::_('Reload Code'); ?>:</td>
    					<td><?php echo $this->captcha->getReloadButton("code"); ?></td>
    				</tr>
    			</table>
    		</td>
    	</tr>
    	<?php }
    	?>
    	<tr>
    		<td width='130'><input type='submit' name='send' value='<?php echo JTEXT::_('Submit entry'); ?>' class='button' /></td>
    		<td align='right'><input type='reset' value='<?php echo JTEXT::_('Reset form'); ?>' name='reset' class='button' /></td>
    	</tr>
    </table>
    </form>
    <center><span class='small'>* <?php echo JTEXT::_('Required field'); ?></span></center>
</div>