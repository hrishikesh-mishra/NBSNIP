<?php
/**
 * @version $Id: view.html.php 684 2008-06-16 04:06:04Z snipersister $
 * @package    Easybook
 * @link http://www.easy-joomla.org
 * @license    GNU/GPL
 */

// no direct access

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class EasybookViewEntry extends JView
{

	function display($tpl = null)
	{
	     jimport('joomla.html.pane');
	     global $mainframe;
	     
	     JHTML::_('stylesheet', 'easybook.css', 'administrator/components/com_easybook/css/');
	     
	    $entry        =& $this->get('Data');
	    $isNew        = ($entry->id < 1);
	
	    $text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
	    JToolBarHelper::title(   JText::_( 'Entry' ).': <small><small>[ ' . $text.' ]</small></small>', 'easybook' );
	    JToolBarHelper::save();
	    if ($isNew)  {
	        JToolBarHelper::cancel();
	    } else {
	        // for existing items the button is renamed `close`
	        JToolBarHelper::cancel( 'cancel', 'Close' );
	    }
		
		JHTML::_('behavior.calendar');
		
		
		$config =& JFactory::getConfig();
		$offset = $config->getValue('config.offset');
		
		$date =& JFactory::getDate($entry->gbdate);
		$date->setOffset($offset);
		$entry->gbdate = $date->toFormat();
		
	    $this->assignRef('entry', $entry);
	    parent::display($tpl);
	}

}