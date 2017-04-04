<?php
/**
 * @version $Id: view.html.php 420 2007-12-28 15:52:11Z snipersister $
 * @package    Easybook
 * @link http://www.easy-joomla.org
 * @license    GNU/GPL
 */

// no direct access

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class EasybookViewBadword extends JView
{

	function display($tpl = null)
	{
	     JHTML::_('stylesheet', 'easybook.css', 'administrator/components/com_easybook/css/');
	     
	    $word        =& $this->get('Data');
	    $isNew        = ($word->id < 1);
	
	    $text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
	    JToolBarHelper::title(   JText::_( 'Badword' ).': <small><small>[ ' . $text.' ]</small></small>', 'easybook' );
	    JToolBarHelper::save();
	    if ($isNew)  {
	        JToolBarHelper::cancel();
	    } else {
	        // for existing items the button is renamed `close`
	        JToolBarHelper::cancel( 'cancel', 'Close' );
	    }
		
	    $this->assignRef('badword', $word);
	    parent::display($tpl);
	}

}