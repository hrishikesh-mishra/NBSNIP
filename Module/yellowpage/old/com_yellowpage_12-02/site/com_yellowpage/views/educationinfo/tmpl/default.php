<?php 
	/*
	  yellowpage education layout 
	*/

	//direct access not allowed
	
	defined('_JEXEC') or die('Restricted access');
	$row = &$this->education[0];
	$row->params = new JParameter($row->params);

	switch ($row->params->get('education_icons'))
		{
			case 1 :
				$row->params->set('edu_address', 	JText::_('Address').": ");
				$row->params->set('edu_email', 		JText::_('Email').": ");
				$row->params->set('edu_phone', 	JText::_('Telephone').": ");
				$row->params->set('edu_mobile',		JText::_('Mobile').": ");
				break;

			case 2 :
				$row->params->set('edu_address', 	'');
				$row->params->set('edu_email', 		'');
				$row->params->set('edu_phone', 	'');
				$row->params->set('edu_mobile', 	'');
				break;

			default :
				
				$image1 = JHTML::_('image.site', 'con_address.png', 	'/images/M_images/', $row->params->get('icon_location'), 	'/images/M_images/', JText::_('Address').": ");
				$image2 = JHTML::_('image.site', 'emailButton.png', 	'/images/M_images/', $row->params->get('icon_email'), 		'/images/M_images/', JText::_('Email').": ");
				$image3 = JHTML::_('image.site', 'con_tel.png', 		'/images/M_images/', $row->params->get('icon_phone'), 	'/images/M_images/', JText::_('Phone').": ");
				$image4 = JHTML::_('image.site', 'con_mobile.png', 		'/images/M_images/', $row->params->get('icon_mobile'), 	'/images/M_images/', JText::_('Mobile').": ");

				$row->params->set('edu_address', 	$image1);
				$row->params->set('edu_email', 	$image2);
				$row->params->set('edu_phone', 	$image3);
				$row->params->set('edu_mobile', 	$image4);
				break;
		}


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

<form action="index.php" method="post" name="searchForm" id="searchForm" >

<div class="eduinfo" id="eduinfo"></div>
<table width="100%" border="0">
  <tr height="20%">
    <td colspan="3" align="center"><strong>Education YellowPage </strong></td>
  </tr>
  <tr>
    <td colspan="3" align="left"><strong> <?php echo JText::_($row->eduname); ?> </strong></td>
  </tr>
  
  <?php if ( $row->params->get( 'show_category' ) &&  $row->category ) : ?>
  <tr height="20">
    <td width="16%" align="right">Category : </td>
    <td colspan="2" align="left"><?php echo JText::_($row->category); ?>  </td>
  </tr>
  <?php endif; ?>

 <?php if ( $row->params->get( 'show_standard' ) &&  $row->standard ) : ?>
  <tr height="20">
    <td align="right">Standard : </td>
    <td colspan="2" align="left"><?php echo JText::_($row->standard); ?> </td>
  </tr>
  <?php endif; ?>

<?php if ( $row->params->get( 'show_principal' ) &&  $row->principal ) : ?>
  <tr height="20">
    <td align="right">Principal : </td>
    <td colspan="2" align="left"><?php echo JText::_($row->principal); ?> </td>
  </tr>
<?php endif; ?>

<?php if ( $row->params->get( 'show_totalstrength' ) &&  $row->totalstrength ) : ?>
  <tr height="20">
    <td align="right">TotalStrength : </td>
    <td colspan="2" align="left"><?php echo JText::_($row->totalstrength); ?></td>
  </tr>
  <?php endif;?>
  
<?php if ( $row->params->get( 'show_phone' ) &&  $row->phone ) : ?>
<tr height="20">
    <td align="right"><?php echo $row->params->get( 'edu_phone' ); ?> : </td>
    <td colspan="2" align="left"><?php echo JText::_($row->phone); ?></td>
  </tr>
<?php endif; ?>
 

 <?php if ( $row->params->get( 'show_mobile' ) &&  $row->mobile ) : ?>
  <tr height="20">
    <td align="right"><?php echo $row->params->get( 'edu_mobile' ); ?> : </td>
    <td colspan="2" align="left"><?php echo JText::_($row->mobile); ?></td>
  </tr>
<?php endif; ?>

<?php if ( ($row->params->get( 'show_location' ) || $row->params->get( 'show_city' ) ||
	$row->params->get( 'show_state' )) &&  ( $row->location || $row->city || $row->state)) : ?>
<tr><td>&nbsp;</td> </tr>
  <tr>
    <td colspan="3" align="right"><table width="100%" border="0">
      <tr>
        <td width="16%" rowspan="3" align="right" valign="top"><?php echo $row->params->get( 'edu_address' ); ?></td>
	
	 <?php if ( $row->params->get( 'show_location' ) &&  $row->location ) : ?>
        <td width="13%" align="right">Location : </td>
	 <td width="71%" align="left"><?php echo JText::_($row->location); ?></td>
      </tr>
      <?php endif; ?>

       <?php if ( $row->params->get( 'show_city' ) &&  $row->city ) : ?>
      <tr>
        <td align="right">City : </td>
        <td align="left"><?php echo JText::_($row->city); ?></td>
      </tr>
      <?php endif; ?>

       <?php if ( $row->params->get( 'show_state' ) &&  $row->state ) : ?>
      <tr>
        <td align="right">State : </td>
        <td align="left"><?php echo JText::_($row->state) ; ?></td>
      </tr>
      <?php endif;?>
    </table></td>
  </tr>
  <?php endif; ?>

  <tr><td>&nbsp;</td> </tr>

  <?php if ( $row->params->get( 'show_email' ) &&  $row->emailid ) : ?>	
  <tr height="20">
    <td align="right"><?php echo $row->params->get( 'edu_email' ); ?> : </td>
    <td colspan="2" align="left"><?php echo JText::_($row->emailid) ; ?></td>
  </tr>
  <?php endif; ?>

   <?php if ( $row->params->get( 'show_website' ) &&  $row->website ) : ?>
  <tr height="20">
    <td align="right">Web Site :  </td>
    <td colspan="2" align="left"><?php echo JText::_($row->website) ; ?></td>
  </tr>
  <?php endif; ?>  
<tr><td>&nbsp;</td> </tr>
 <?php if ($row->params->get('show_email_form')) : ?>

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
        <td height="24" align="right">CAPTACA</td>
        <td height="24">&nbsp;</td>
      </tr>
      <tr>
        <td height="24" align="right" valign="top">Message : </td>
        <td height="24"><table width="100%" border="0">
          <tr>
            <td height="135"><textarea name="message" rows="15" cols="50"></textarea></td>
          </tr>
        </table></td>
      </tr>
    <tr><td/>
	 <td height="36" align="left" valign="top">
    <p>
      <input type="submit" name="Submit" value="Send"><?php if ($row->params->get('show_email_copy')) : ?>
    Copy Same mail to your Email ID
      <input type="checkbox" name="chkemail" value="checkbox"><?php endif; ?></p>
    </td>
    </tr>
      
    </table></td>
  </tr>
  <?php endif; ?>
</table>

</div>
<div id ="aboutus" width="100%">

<?php if ( $row->params->get( 'show_description' ) &&  $row->description) : ?>
	<?php echo $row->description; ?>
  <?php endif; ?>
  
  </div>
<input type="hidden" name="option" value="com_yellowpage" />
<input type="hidden" name="task" value="submit" />
<input type="hidden" name="id" value="<?php echo $row->id ;?>" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="education" />
</form>