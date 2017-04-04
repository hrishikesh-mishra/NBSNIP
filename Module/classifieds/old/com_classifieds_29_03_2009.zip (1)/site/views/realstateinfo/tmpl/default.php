<?php 
	/*
	  Classifieds Realstate layout 
	*/

	//direct access not allowed
	
	defined('_JEXEC') or die('Restricted access');
	$row = &$this->realstate[0];
	$row->params = new JParameter($row->params);

	switch ($row->params->get('realstate_icons'))
		{
			case 1 :
				$row->params->set('realstate_address', 	JText::_('Address').": ");
				$row->params->set('realstate_email', 		JText::_('Email').": ");
				$row->params->set('realstate_phone', 	JText::_('Telephone').": ");
				$row->params->set('realstate_mobile',		JText::_('Mobile').": ");
				break;

			case 2 :
				$row->params->set('realstate_address', 	'');
				$row->params->set('realstate_email', 		'');
				$row->params->set('realstate_phone', 	'');
				$row->params->set('realstate_mobile', 	'');
				break;

			default :
				
				$image1 = JHTML::_('image.site', 'con_address.png', 	'/images/M_images/', $row->params->get('icon_location'), 	'/images/M_images/', JText::_('Address').": ");
				$image2 = JHTML::_('image.site', 'emailButton.png', 	'/images/M_images/', $row->params->get('icon_email'), 		'/images/M_images/', JText::_('Email').": ");
				$image3 = JHTML::_('image.site', 'con_tel.png', 		'/images/M_images/', $row->params->get('icon_phone'), 	'/images/M_images/', JText::_('Phone').": ");
				$image4 = JHTML::_('image.site', 'con_mobile.png', 		'/images/M_images/', $row->params->get('icon_mobile'), 	'/images/M_images/', JText::_('Mobile').": ");
				

				$row->params->set('realstate_address', 	$image1);
				$row->params->set('realstate_email', 	$image2);
				$row->params->set('realstate_phone', 	$image3);
				$row->params->set('realstate_mobile', 	$image4);
				
				break;
		}


	$flag=true;

	?>


<div class="realsteinfo" id="realstate">
<table width="100%" border="0"  bgcolor="#F0F0F0">
  <tr >
    <td height="38" colspan="2" align="center"><p class="style2">  <font face="Courier New, Courier, monospace" size="4" > <strong>RealState </strong></font></p>    </td>
  </tr>
  <tr>
    <td width="15%" align="right"><strong>Title:</strong></td>
    <td width="85%" align="left"><?php echo JText::_($row->title); ?></td>
  </tr>

<?php if ( $row->params->get( 'show_company' ) &&  $row->company) : ?>
  <tr>
    <td align="right"><strong>Company:</strong></td>
    <td align="left"><?php echo JText::_($row->company); ?></td>
  </tr>
 <?php endif; ?>

<?php if ( $row->params->get( 'show_phone' ) &&  $row->phone ) : ?>
  <tr>
    <td align="right"><strong><?php echo $row->params->get( 'realstate_phone' ); ?> : </strong></td>
    <td align="left"><?php echo JText::_($row->phone);?></td>
  </tr>
<?php endif; ?>

<?php if ( $row->params->get( 'show_mobile' ) &&  $row->mobile) : ?>
  <tr>
    <td align="right"><strong><?php echo $row->params->get( 'realstate_mobile' ); ?> :</strong></td>
    <td align="left"><?php echo JText::_($row->mobile);?></td>
  </tr>
<?php endif; ?>

<?php if ( ($row->params->get( 'show_location' ) || $row->params->get( 'show_city' ) ||
	$row->params->get( 'show_state' )) &&  ( $row->location || $row->city || $row->state)) : ?>
  <tr>
    <td align="right" valign="top"><strong><?php echo $row->params->get( 'realstate_address' ); ?></strong></td>
    <td><table width="100%" border="0">

	<?php if ( $row->params->get( 'show_location' ) &&  $row->location ) : ?>
      <tr>
        <td width="14%" align="right"><strong>Location:</strong></td>
        <td width="86%" align="left"><?php echo JText::_($row->location);?></td>
      </tr>
	<?php endif; ?>

	<?php if ( $row->params->get( 'show_city' ) &&  $row->city) : ?>
      <tr>
        <td align="right"><strong>City:</strong></td>
        <td align="left"><?php echo JText::_($row->city);?></td>
      </tr>
	<?php endif; ?>
      
	<?php if ( $row->params->get( 'show_state' ) &&  $row->state) : ?>
	<tr>
        <td align="right"><strong>State:</strong></td>
        <td align="left"><?php echo JText::_($row->state);?></td>
      </tr>
	<?php endif; ?>
    </table></td>
  </tr>
<?php endif; ?> 

<?php if ( $row->params->get( 'show_email' ) &&  $row->emailid) : ?>
  <tr>
    <td align="right" valign="top"><strong><?php echo $row->params->get( 'realstate_email' ); ?>:</strong></td>
    <td align="left"><?php echo JHTML::_('email.cloak', $row->emailid) ; ?></td>
  </tr>
<?php endif; ?>

<?php if ( $row->params->get( 'show_website' ) &&  $row->website) : ?>
  <tr>
    <td align="right" valign="top"><strong>WebSite:</strong></td>
    <td align="left"><?php echo JText::_($row->website);?></td>
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

