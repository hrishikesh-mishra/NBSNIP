<?php
/**
* @version $Id: mod_contactus.php 5203 2006-09-27 02:45:14Z Danr $
* @package Joomla
* @copyright Copyright (C) 2007 Dan Rahmel. All rights reserved.
* @license GNU/GPL, see LICENSE.php 
* This module displays the public contact information.
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<div style="border: 1px solid black; padding: 5px;">
<h3>Contact Us</h3>
<?php
     $publiccat = $params->get('publiccat', 0);
     
     $db          =& JFactory::getDBO();
     $query = "SELECT *" .
                    "\n FROM jos_contact_details" .
                    "\n WHERE id = " .
                    intval($publiccat); 
     $db->setQuery($query);
     $contacts = $db->loadObjectList();
     if(count($contacts)) {
          foreach ($contacts as $contact) {
               echo JText::_( '<p><strong>' . $contact->name .
                        ', </strong>'); 
               echo JText::_( '<small>' . $contact->con_position .
                        ', </small>'); 
               echo JText::_( '<small>' . $contact->telephone .
                        ', </small>'); 
               echo JText::_( '<small>' . $contact->email_to .
                        '</small></p>'); 
          }
     } else {
          echo JText::_( '<p>Email help@mycom.com</p>');
     }

?>
</div>
