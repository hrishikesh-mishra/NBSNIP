<?php
/**
 * @version $Id: view.html.php 645 2008-03-22 10:57:20Z snipersister $
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
class EasybookViewBadwords extends JView
{
	/**
	 * Easybook view display method
	 * @return void
	 **/
	function display($tpl = null)
    {   
        JToolBarHelper::title( JText::_( 'Easybook' ) ." - ". JText::_( 'Badwordfilter' ), 'easybook' );
        JToolBarHelper::deleteList();
        JToolBarHelper::editListX();
        JToolBarHelper::addNewX();
		JHTML::_('stylesheet', 'easybook.css', 'administrator/components/com_easybook/css/');
		
        // Get data from the model
        $items =& $this->get( 'Data');
		$pagination = $this->get( 'Pagination' );
		
		$this->assignRef( 'pagination' , $pagination);
        $this->assignRef( 'items', $items );

        parent::display($tpl);
    }
}
