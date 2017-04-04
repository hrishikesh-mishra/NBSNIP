<?php
/**
 * @version $Id: view.html.php 482 2008-01-21 11:14:35Z snipersister $
 * @package    Easybook
 * @link http://www.easy-joomla.org
 * @license    GNU/GPL
 */

// no direct access

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

/**
 * Easybook View
 *
 * @package    Easybook
 */
class EasybookViewAbout extends JView
{
	/**
	 * Easybook view display method
	 * @return void
	 **/
	function display($tpl = null)
    {        
        JToolBarHelper::title( JText::_( 'Easybook' ), 'easybook' );
		JHTML::_('stylesheet', 'easybook.css', 'administrator/components/com_easybook/css/');
		
        parent::display($tpl);
    }
}
