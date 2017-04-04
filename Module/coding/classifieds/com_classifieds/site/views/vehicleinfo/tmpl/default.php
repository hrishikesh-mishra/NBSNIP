<?php 
	/*
	  Classifieds Vehicle layout 
	*/

	//direct access not allowed
	
	defined('_JEXEC') or die('Restricted access');
	$row = &$this->vehicle[0];
	$row->params = new JParameter($row->params);

	switch ($row->params->get('vehicle_icons'))
		{
			case 1 :
				$row->params->set('vehicle_address', 	JText::_('Address').": ");
				$row->params->set('vehicle_email', 		JText::_('Email').": ");
				$row->params->set('vehicle_phone', 	JText::_('Telephone').": ");
				$row->params->set('vehicle_mobile',		JText::_('Mobile').": ");
				$row->params->set('vehicle_fax',		JText::_('Fax').": ");

				break;

			case 2 :
				$row->params->set('vehicle_address', 	'');
				$row->params->set('vehicle_email', 		'');
				$row->params->set('vehicle_phone', 	'');
				$row->params->set('vehicle_mobile', 	'');
				$row->params->set('vehicle_fax',		'');
				break;

			default :
				
				$image1 = JHTML::_('image.site', 'con_address.png', 	'/images/M_images/', $row->params->get('icon_location'), 	'/images/M_images/', JText::_('Address').": ");
				$image2 = JHTML::_('image.site', 'emailButton.png', 	'/images/M_images/', $row->params->get('icon_email'), 		'/images/M_images/', JText::_('Email').": ");
				$image3 = JHTML::_('image.site', 'con_tel.png', 		'/images/M_images/', $row->params->get('icon_phone'), 	'/images/M_images/', JText::_('Phone').": ");
				$image4 = JHTML::_('image.site', 'con_mobile.png', 		'/images/M_images/', $row->params->get('icon_mobile'), 	'/images/M_images/', JText::_('Mobile').": ");
				$image5 = JHTML::_('image.site', 'con_fax.png', 		'/images/M_images/', $row->params->get('icon_fax'), 	'/images/M_images/', JText::_('Fax').": ");				

				$row->params->set('vehicle_address', 	$image1);
				$row->params->set('vehicle_email', 	$image2);
				$row->params->set('vehicle_phone', 	$image3);
				$row->params->set('vehicle_mobile', 	$image4);
				$row->params->set('vehicle_fax', 		$image5);
				break;
		}


	$flag=true;

	?>


<div class="vehicleinfo" id="vehicle">
<table width="100%" border="0">
  <tr>
    <td colspan="2" align="center" class="style6"><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" >Vehicle Classifieds</font></td>
  </tr>

  <tr>
    <td width="22%" align="right"><strong><?php echo JText::_('Title:  '); ?></strong></td>
    <td width="78%" align="left"><?php echo JText::_($row->title); ?></td>
  </tr>

<?php if ( $row->params->get( 'show_category' ) &&  $row->category) : ?>

  <tr>
    <td align="right"><strong><?php echo JText::_('Category:  '); ?></strong></td>
    <td align="left"><?php echo JText::_($row->category); ?></td>
  </tr>
<?php endif; ?>

<?php if ( $row->params->get( 'show_company' ) &&  $row->companyname) : ?>
  <tr>
    <td align="right"><strong><?php echo JText::_('Company :  '); ?></strong></td>
    <td align="left"><?php echo JText::_($row->companyname); ?></td>
  </tr>
<?php endif; ?>

<?php if ( $row->params->get( 'show_phone' ) &&  $row->phone) : ?>
  <tr>
    <td align="right"><strong><?php echo $row->params->get( 'vehicle_phone' ); ?>:</strong></td>
    <td align="left"><?php echo JText::_($row->phone) ; ?></td>
  </tr>
  <?php endif; ?>

<?php if ( $row->params->get( 'show_mobile' ) &&  $row->mobile) : ?>
 <tr>
    <td align="right"><strong><?php echo $row->params->get( 'vehicle_mobile' ); ?>:</strong></td>
    <td align="left"><?php echo JText::_($row->mobile) ;?></td>
  </tr>
<?php endif; ?>

<?php if ( $row->params->get( 'show_fax' ) &&  $row->fax) : ?>
 <tr>
    <td align="right"><strong><?php echo $row->params->get( 'vehicle_fax' ); ?>:</strong></td>
    <td align="left"><?php echo JText::_($row->fax) ;?></td>
  </tr>
<?php endif; ?>

<?php if ( ($row->params->get( 'show_location' ) || $row->params->get( 'show_city' ) ||
	$row->params->get( 'show_state' )) &&  ( $row->location || $row->city || $row->state)) : ?>

  <tr>
    <td align="right" valign="top"><strong><?php echo $row->params->get( 'vehicle_address' ); ?></strong></td>
    <td><table width="100%" border="0">

	<?php if ( $row->params->get( 'show_location' ) &&  $row->location) : ?>
      <tr>
        <td width="15%" align="right"><strong><?php echo JText::_('Location: ') ;?></strong></td>
        <td width="85%" align="left"><?php echo JText::_($row->location) ; ?></td>
      </tr>
	<?php endif; ?>

	<?php if ( $row->params->get( 'show_city' ) &&  $row->city) : ?>
      <tr>
        <td align="right"><strong><?php echo JText::_('City: ') ; ?></strong></td>
        <td align="left"><?php echo JText::_($row->city) ; ?></td>
      </tr>
	<?php endif; ?>

	<?php if ( $row->params->get( 'show_state' ) &&  $row->state) : ?>
      <tr>
        <td align="right"><strong><?php echo JText::_('State: '); ?></strong></td>
        <td align="left"><?php echo JText::_($row->state) ; ?></td>
      </tr>
	<?php endif; ?>
    </table></td>
  </tr>
<?php endif; ?>


<?php if ( $row->params->get( 'show_email' ) &&  $row->emailid) : ?>
  <tr>
    <td align="right"><strong><?php echo $row->params->get( 'vehicle_email' ); ?>:</strong></td>
    <td align="left"><?php echo JHTML::_('email.cloak', $row->emailid) ; ?></td>
  </tr>
 <?php endif; ?>

<?php if ( $row->params->get( 'show_website' ) &&  $row->website) : ?>
  <tr>
    <td align="right"><strong><?php echo JText::_('Website: '); ?></strong></td>
    <td align="left"><?php echo JText::_($row->website ) ;?></td>
  </tr>
  <?php endif; ?>
  </table>
</div>
<div id ="aboutus" width="100%">

<?php if ( $row->params->get( 'show_description' ) &&  $row->description) : ?>
   	About:	<?php echo $row->description; ?>
  <?php endif; ?>
  
  </div>
<div>
 <input type="button" value="Back" 
onClick="javascript: history.go(-1)">
</div>

