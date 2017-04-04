<?php 
	/*
	  yellowpage Hotel-Lodge layout 
	*/

	//direct access not allowed
	
	defined('_JEXEC') or die('Restricted access');
	$row = &$this->hotellodge[0];
	$row->params = new JParameter($row->params);

	switch ($row->params->get('hotellodge_icons'))
		{
			case 1 :
				$row->params->set('hotel_address', 	JText::_('Address').": ");
				$row->params->set('hotel_email', 		JText::_('Email').": ");
				$row->params->set('hotel_phone', 	JText::_('Telephone').": ");
				$row->params->set('hotel_mobile',		JText::_('Mobile').": ");
				break;

			case 2 :
				$row->params->set('hotel_address', 	'');
				$row->params->set('hotel_email', 		'');
				$row->params->set('hotel_phone', 	'');
				$row->params->set('hotel_mobile', 	'');
				break;

			default :
				
				$image1 = JHTML::_('image.site', 'con_address.png', 	'/images/M_images/', $row->params->get('icon_location'), 	'/images/M_images/', JText::_('Address').": ");
				$image2 = JHTML::_('image.site', 'emailButton.png', 	'/images/M_images/', $row->params->get('icon_email'), 		'/images/M_images/', JText::_('Email').": ");
				$image3 = JHTML::_('image.site', 'con_tel.png', 		'/images/M_images/', $row->params->get('icon_phone'), 	'/images/M_images/', JText::_('Phone').": ");
				$image4 = JHTML::_('image.site', 'con_mobile.png', 		'/images/M_images/', $row->params->get('icon_mobile'), 	'/images/M_images/', JText::_('Mobile').": ");
				

				$row->params->set('hotel_address', 	$image1);
				$row->params->set('hotel_email', 	$image2);
				$row->params->set('hotel_phone', 	$image3);
				$row->params->set('hotel_mobile', 	$image4);
				
				break;
		}


	

	?>


<div class="hotelinfo" id="hotelinfo"></div>
<table width="100%" border="0">

  <tr height="20%">
    <td colspan="3" align="center"><strong>Hotel-Lodge YellowPage </strong></td>
  </tr>
  <tr>
    <td colspan="3" align="left"><strong> <?php echo JText::_($row->hotelname); ?> </strong></td>
  </tr>
  
  <?php if ( $row->params->get( 'show_category' ) &&  $row->category ) : ?>
  <tr height="20">
    <td width="16%" align="right">Category : </td>
    <td colspan="2" align="left"><?php echo JText::_($row->category); ?>  </td>
  </tr>
  <?php endif; ?>

 <?php if ( $row->params->get( 'show_speciality' ) &&  $row->speciality ) : ?>
  <tr height="20">
    <td align="right">Speciality : </td>
    <td colspan="2" align="left"><?php echo JText::_($row->speciality); ?> </td>
  </tr>
  <?php endif; ?>

<?php if ( $row->params->get( 'show_phone' ) &&  $row->phone ) : ?>
<tr height="20">
    <td align="right"><?php echo $row->params->get( 'hotel_phone' ); ?> : </td>
    <td colspan="2" align="left"><?php echo JText::_($row->phone); ?></td>
  </tr>
<?php endif; ?>
 

 <?php if ( $row->params->get( 'show_mobile' ) &&  $row->mobile ) : ?>
  <tr height="20">
    <td align="right"><?php echo $row->params->get( 'hotel_mobile' ); ?> : </td>
    <td colspan="2" align="left"><?php echo JText::_($row->mobile); ?></td>
  </tr>
<?php endif; ?>

<?php if ( ($row->params->get( 'show_location' ) || $row->params->get( 'show_city' ) ||
	$row->params->get( 'show_state' )) &&  ( $row->location || $row->city || $row->state)) : ?>
<tr><td>&nbsp;</td> </tr>
  <tr>
    <td colspan="3" align="right"><table width="100%" border="0">
      <tr>
        <td width="16%" rowspan="3" align="right" valign="top"><?php echo $row->params->get( 'hotel_address' ); ?></td>
	
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
    <td align="right"><?php echo $row->params->get( 'hotel_email' ); ?> : </td>
    <td colspan="2" align="left"><?php echo JHTML::_('email.cloak', $row->emailid) ; ?></td>
  </tr>
  <?php endif; ?>

   <?php if ( $row->params->get( 'show_website' ) &&  $row->website ) : ?>
  <tr height="20">
    <td align="right">Web Site :  </td>
    <td colspan="2" align="left"><?php echo JText::_($row->website) ; ?></td>
  </tr>
  <?php endif; ?>  
<tr><td>&nbsp;</td> </tr>
 <?php if ($row->params->get('show_email_form') && ($row->emailid)) : ?>
	
	<?php echo $this->loadTemplate('form'); ?>
	
  <?php endif; ?>
</table>

</div>
<div id ="aboutus" width="100%">

<?php if ( $row->params->get( 'show_description' ) &&  $row->description) : ?>
	<?php echo $row->description; ?>
  <?php endif; ?>
  
  </div>
