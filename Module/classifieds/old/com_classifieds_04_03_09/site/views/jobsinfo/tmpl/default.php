<?php 
	/*
	  Classifieds Computer layout 
	*/

	//direct access not allowed
	
	defined('_JEXEC') or die('Restricted access');
	$row = &$this->jobs[0];
	$row->params = new JParameter($row->params);

	switch ($row->params->get('jobs_icons'))
		{
			case 1 :
				$row->params->set('jobs_address', 	JText::_('Address').": ");
				$row->params->set('jobs_email', 		JText::_('Email').": ");
				$row->params->set('jobs_phone', 	JText::_('Telephone').": ");
				$row->params->set('jobs_mobile',		JText::_('Mobile').": ");
				break;

			case 2 :
				$row->params->set('jobs_address', 	'');
				$row->params->set('jobs_email', 		'');
				$row->params->set('jobs_phone', 	'');
				$row->params->set('jobs_mobile', 	'');
				break;

			default :
				
				$image1 = JHTML::_('image.site', 'con_address.png', 	'/images/M_images/', $row->params->get('icon_location'), 	'/images/M_images/', JText::_('Address').": ");
				$image2 = JHTML::_('image.site', 'emailButton.png', 	'/images/M_images/', $row->params->get('icon_email'), 		'/images/M_images/', JText::_('Email').": ");
				$image3 = JHTML::_('image.site', 'con_tel.png', 		'/images/M_images/', $row->params->get('icon_phone'), 	'/images/M_images/', JText::_('Phone').": ");
				$image4 = JHTML::_('image.site', 'con_mobile.png', 		'/images/M_images/', $row->params->get('icon_mobile'), 	'/images/M_images/', JText::_('Mobile').": ");
				

				$row->params->set('jobs_address', 	$image1);
				$row->params->set('jobs_email', 	$image2);
				$row->params->set('jobs_phone', 	$image3);
				$row->params->set('jobs_mobile', 	$image4);
				
				break;
		}


	$flag=true;

	?>


<div class="jobsinfo" id="jobs">
<table width="100%" border="0">
  <tr>
    <td colspan="2" align="center" class="style6"><font face="Verdana, Arial, Helvetica, sans-serif" size="+2" >Jobs Classifieds</font></td>
  </tr>

  <tr>
    <td width="22%" align="right"><strong><?php echo JText::_('Title:  '); ?></strong></td>
    <td width="78%" align="left"><?php echo JText::_($row->title); ?></td>
  </tr>

<?php if ( $row->params->get( 'show_reference' ) &&  $row->reference) : ?>

  <tr>
    <td align="right"><strong><?php echo JText::_('Reference:  '); ?></strong></td>
    <td align="left"><?php echo JText::_($row->reference); ?></td>
  </tr>
<?php endif; ?>

<?php if ( $row->params->get( 'show_jobtype' ) &&  $row->jobtype) : ?>
  <tr>
    <td align="right"><strong><?php echo JText::_('Job-Type:  '); ?></strong></td>
    <td align="left"><?php echo JText::_($row->jobtype); ?></td>
  </tr>
<?php endif; ?>


<?php if ( $row->params->get( 'show_qualification' ) &&  $row->qualification) : ?>
  <tr>
    <td align="right"><strong><?php echo JText::_('Qualification:  '); ?></strong></td>
    <td align="left"><?php echo JText::_($row->qualification); ?></td>
  </tr>
<?php endif; ?>

<?php if ( $row->params->get( 'show_duration' ) &&  $row->duration) : ?>
  <tr>
    <td align="right"><strong><?php echo JText::_('Duration:  '); ?></strong></td>
    <td align="left"><?php echo JText::_($row->duration); ?></td>
  </tr>
<?php endif; ?>

<?php if ( $row->params->get( 'show_howtoapply' ) &&  $row->howtoapply) : ?>
  <tr>
    <td align="right"><strong><?php echo JText::_('How-to-Apply:  ') ?></strong></td>
    <td align="left"><?php echo JText::_('howtoapply'); ?></td>
  </tr>
<?php endif; ?>

<?php if ( ($row->params->get( 'show_joblocation' ) || $row->params->get( 'show_jobcity' ) ||
	$row->params->get( 'show_jobstate' )) &&  ( $row->joblocation || $row->jobcity || $row->jobstate)) : ?>

  <tr>
    <td align="right" valign="top"><strong>Job-<?php echo $row->params->get( 'jobs_address' ); ?></strong></td>
    <td><table width="100%" border="0">

	<?php if ( $row->params->get( 'show_joblocation' ) &&  $row->joblocation) : ?>
      <tr>
        <td width="15%" align="right"><strong><?php echo JText::_('Location: ') ;?></strong></td>
        <td width="85%" align="left"><?php echo JText::_($row->joblocation) ; ?></td>
      </tr>
	<?php endif; ?>

	<?php if ( $row->params->get( 'show_jobcity' ) &&  $row->jobcity) : ?>
      <tr>
        <td align="right"><strong><?php echo JText::_('City: ') ; ?></strong></td>
        <td align="left"><?php echo JText::_($row->jobcity) ; ?></td>
      </tr>
	<?php endif; ?>

	<?php if ( $row->params->get( 'show_jobstate' ) &&  $row->jobstate) : ?>
      <tr>
        <td align="right"><strong><?php echo JText::_('State: '); ?></strong></td>
        <td align="left"><?php echo JText::_($row->jobstate) ; ?></td>
      </tr>
	<?php endif; ?>
    </table></td>
  </tr>
<?php endif; ?>

<?php if ( $row->params->get( 'show_noofopening' ) &&  $row->noofopenings) : ?>
  <tr>
    <td align="right"><strong><?php echo JText::_('No. of Opening: ') ; ?></strong></td>
    <td align="left"><?php echo JText::_($row->noofopenings) ; ?></td>
  </tr>
  <?php endif; ?>


<?php if ( $row->params->get( 'show_compensationrange' ) &&  $row->compensationrange) : ?>
  <tr>
    <td align="right"><strong><?php echo JText::_('Compenstation-Range:') ;?> </strong></td>
    <td align="left"><?php echo JText::_($row->compensationrange); ?></td>
  </tr>
  <?php endif; ?>

<?php if ( $row->params->get( 'show_comname' ) &&  $row->comname) : ?>
  <tr>
    <td align="right"><strong><?php echo JText::_('Company: ' ) ;?></strong></td>
    <td align="left"><?php echo JText::_($row->comname);?></td>
  </tr>
  <?php endif ?>

<?php if ( ($row->params->get( 'show_comlocation' ) || $row->params->get( 'show_comcity' ) ||
	$row->params->get( 'show_comstate' )) &&  ( $row->comlocation || $row->comcity || $row->comstate)) : ?>
 <tr>
    <td align="right" valign="top"><strong>Company-<?php echo $row->params->get( 'jobs_address' ); ?></strong></td>
    <td><table width="100%" border="0">

	<?php if ( $row->params->get( 'show_comlocation' ) &&  $row->comlocation) : ?>
      <tr>
        <td width="15%" align="right"><strong><?php echo JText::_('Location: ') ;?></strong></td>
        <td width="85%" align="left"><?php echo JText::_($row->comlocation) ; ?></td>
      </tr>
	<?php endif; ?>

	<?php if ( $row->params->get( 'show_comcity' ) &&  $row->jobcity) : ?>
      <tr>
        <td align="right"><strong><?php echo JText::_('City: ') ; ?></strong></td>
        <td align="left"><?php echo JText::_($row->comcity) ; ?></td>
      </tr>
	<?php endif; ?>

	<?php if ( $row->params->get( 'show_comstate' ) &&  $row->comstate) : ?>
      <tr>
        <td align="right"><strong><?php echo JText::_('State: '); ?></strong></td>
        <td align="left"><?php echo JText::_($row->comstate) ; ?></td>
      </tr>
	<?php endif; ?>
    </table></td>
  </tr>
<?php endif; ?>


<?php if ( $row->params->get( 'show_comemailid' ) &&  $row->comemailid) : ?>
  <tr>
    <td align="right"><strong>Comany-<?php echo $row->params->get( 'jobs_email' ); ?>:</strong></td>
    <td align="left"><?php echo JHTML::_('email.cloak', $row->comemailid) ; ?></td>
  </tr>
 <?php endif; ?>

<?php if ( $row->params->get( 'show_comwebsite' ) &&  $row->comwebsite) : ?>
  <tr>
    <td align="right"><strong><?php echo JText::_('Company-Website: '); ?></strong></td>
    <td align="left"><?php echo JText::_($row->comwebsite ) ;?></td>
  </tr>
  <?php endif; ?>

<?php if ( $row->params->get( 'show_contactname' ) &&  $row->contactname) : ?>
  <tr>
    <td align="right"><strong><?php echo JText::_('Contact-Person: '); ?></strong></td>
    <td align="left"><?php echo JText::_($row->contactname) ; ?></td>
  </tr>
  <?php endif; ?>

<?php if ( $row->params->get( 'show_contactphone' ) &&  $row->contactphone) : ?>
  <tr>
    <td align="right"><strong>Contact-<?php echo $row->params->get( 'jobs_phone' ); ?>:</strong></td>
    <td align="left"><?php echo JText::_($row->contactphone) ; ?></td>
  </tr>
  <?php endif; ?>

<?php if ( $row->params->get( 'show_contactmobile' ) &&  $row->contactmobile) : ?>
 <tr>
    <td align="right"><strong>Contact-<?php echo $row->params->get( 'jobs_mobile' ); ?>:</strong></td>
    <td align="left"><?php echo JText::_($row->contactmobile) ;?></td>
  </tr>
<?php endif; ?>
 
<?php if ( $row->params->get( 'show_contactemailid' ) &&  $row->contactemailid) : ?>
  <tr>
    <td align="right"><strong>Contact-<?php echo $row->params->get( 'jobs_email' ); ?>:</strong></td>
    <td align="left"><?php echo JHTML::_('email.cloak', $row->contactemailid) ; ?></td>
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

