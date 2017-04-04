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

/**
 * Easybook View
 *
 * @package    Easybook
 */
class EasybookViewEasybook extends JView
{
	/**
	 * Easybook view display method
	 * @return void
	 **/
	function display($tpl = null)
    {
        global $mainframe;
               
        JToolBarHelper::title( JText::_( 'Easybook' ), 'easybook' );
        JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
        JToolBarHelper::deleteList();
        JToolBarHelper::editListX();
        JToolBarHelper::addNewX();
        JToolBarHelper::preferences('com_easybook', '500');
		JHTML::_('stylesheet', 'easybook.css', 'administrator/components/com_easybook/css/');
		
        // Get data from the model
        $items =& $this->get( 'Data');
		$pagination = $this->get( 'Pagination' );
		$version =& $this->get( 'Version' );

		switch($version->checkVersion(_EASYBOOK_VERSION)) {
		 case 1:
		  $this->assign( 'version', "<span style='border-bottom: dotted 1px #b9b9b9; padding-right: 5px; padding-left: 5px;'><b>EasyBook "._EASYBOOK_VERSION."</b></span><br /><div style='margin-top: 5px;'><a href='http://www.easy-joomla.org/index.php?option=com_versions&catid=3&myVersion="._EASYBOOK_VERSION."' target='_blank'><img src='".JURI::base()."components/com_easybook/images/shield.gif' border='0' style='vertical-align: text-bottom; padding-right: 5px;'/> <span style='color: #e2ad43;'><b>".JTEXT::_('no updates available')."</b></span></a></div>");
		  break;
		  
		 case -1:
		  $this->assign ('version', "<span style='border-bottom: dotted 1px #b9b9b9; padding-right: 5px; padding-left: 5px;'><b>EasyBook "._EASYBOOK_VERSION."</b></span><br /><div style='margin-top: 5px;'><a href='http://www.easy-joomla.org/index.php?option=com_versions&catid=3&myVersion="._EASYBOOK_VERSION."' target='_blank'><img src='".JURI::base()."components/com_easybook/images/box.gif' border='0' style='vertical-align: text-bottom; padding-right: 5px;'/> <span style='color: #ce763a;'><b>".JTEXT::_('updates available')."</b> EasyBook " . $version->_current . "</span></a></div>");
		  break;
		
		 case -2:
		  $this->assign( 'version', "<span style='border-bottom: dotted 1px #b9b9b9; padding-right: 5px; padding-left: 5px;'><b>EasyBook "._EASYBOOK_VERSION."</b></span><br /><div style='margin-top: 5px;'><a href='http://www.easy-joomla.org/index.php?option=com_versions&catid=3&myVersion="._EASYBOOK_VERSION."' target='_blank'><img src='".JURI::base()."components/com_easybook/images/fail.gif' border='0' style='vertical-align: middle; padding-right: 5px;'/><span style='color: #e34639;'><b>".JTEXT::_('connection failed')."</b></span></a></div>");
		  break;
		}
	
		
		$this->assignRef( 'pagination' , $pagination);
        $this->assignRef( 'items', $items );

        parent::display($tpl);
    }
}
