<?
	
	/*
	*	Email Form	
	*/

	defined('_JEXEC') or die('Restricted access');
	session_start();
	$script = '<!--
		function validateForm( frm ) {
			var valid = document.formvalidator.isValid(frm);
			if (valid == false) {
				// do field validation
				if (frm.emailid.invalid) {
					alert( "' . JText::_( 'Please enter a valid e-mail address.', true ) . '" );
				} else if (frm.message.invalid) {
					alert( "' . JText::_( 'CONTACT_FORM_NC', true ) . '" );
				}
				return false;
			} else {
				frm.submit();
			}
		}
		// -->';
	$document =& JFactory::getDocument();
	$document->addScriptDeclaration($script);

	if(isset($this->error))
	{
		 echo $this->error; 
	}
	?>

<form action="index.php" method="post" name="emailForm" id="emailForm" class="form-validate">

  <tr colspan ="2">  
	<td> <p><strong>Send Mail to Us : </strong></p> </td>
  </tr>
  <tr>
    <td height="404" colspan="2" align="left"><table width="100%" border="0">

      <tr>
        <td width="22%" align="right">Your Name :  </td>
        <td width="78%"><input type="text" name="sendername" /></td>
      </tr>
      <tr>
        <td align="right">Your Email-ID :  </td>
        <td><input type="text" name="emailid" class="inputbox required validate-email" /></td>
      </tr>
      <tr>
        <td height="23" align="right">Message Subject :  </td>
        <td><input type="text" name="msgsubject"></td>
      </tr>
      <tr>
        <td height="24" align="right"><?php echo $this->club[0]->image ; ?>
<br /></td>
        <td height="24"><input type="text" name="scode" value="" class="inputbox required"/> </td>
      </tr>
      <tr>
        <td height="24" align="right" valign="top">Message : </td>
        <td height="24"><table width="100%" border="0">
          <tr>
            <td height="135"><textarea name="message" rows="15" cols="50" class="inputbox required"></textarea></td>
          </tr>
        </table></td>
      </tr>
    <tr><td/>
	 <td height="36" align="left" valign="top">
    <p>
      <button class="button validate" type="submit"><?php echo JText::_('Send'); ?></button>
	<?php if ($this->club[0]->params->get('show_email_copy')) : ?>
    Copy Same mail to your Email ID
      <input type="checkbox" name="chkemail" value="checkbox"><?php endif; ?></p>
    </td>
    </tr>
      
    </table></td>
  </tr>

<input type="hidden" name="option" value="com_yellowpage" />
<input type="hidden" name="task" value="submit" />
<input type="hidden" name="id" value="<?php echo $this->club[0]->id ;?>" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="club" />
</form>