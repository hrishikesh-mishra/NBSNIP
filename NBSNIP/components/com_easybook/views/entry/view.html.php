<?php
/**
 * @version $Id: view.html.php 666 2008-06-11 17:36:27Z snipersister $
 * @package    Easybook
 * @link http://www.easy-joomla.org
 * @license    GNU/GPL
 */

// no direct access

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class EasybookViewEntry extends JView
{
	/**
	 * Hellos view display method
	 * @return void
	 **/
	function display($tpl = null)
	{
		global $mainframe, $Itemid;
		$document	= &JFactory::getDocument();
		$menus		= &JSite::getMenu();
		$params 	= &$mainframe->getParams('com_easybook');
		$task		= JRequest::getVar( 'task' );
		
		// Set CSS File
		JHTML::_('stylesheet', 'easybook.css', 'components/com_easybook/css/');
		$document->addCustomTag('
		<!--[if IE 6]>
    		<style type="text/css">
    				.easy_align_middle { behavior: url('.JURI::base().'components/com_easybook/scripts/pngbehavior.htc); }
    				.png { behavior: url('.JURI::base().'components/com_easybook/scripts/pngbehavior.htc); }
    		</style>
  		<![endif]-->');
  		
		// Get data from the model
		$entry		= & $this->get( 'Data');
		
		// Get Captcha
		$captcha 	= &	$this->get( 'Captcha');
		
		// Set IP
		$entry->ip 	= getenv('REMOTE_ADDR');
		
		// Set the document page title
		$menu    = $menus->getActive();
		switch($task)
		{
			case 'add':
				$document->setTitle($heading = $menu->name." - ".JTEXT::_('Sign Guestbook'));
				break;
			case 'edit':
				$document->setTitle($heading = $menu->name." - ".JTEXT::_('Edit Entry'));
				break;
			case 'comment':
				$document->setTitle($heading = $menu->name." - ".JTEXT::_('Edit Comment'));
				break;
		}
		
		$heading = $document->getTitle();
		
		$this->assignRef( 'heading',	$heading );
		if($captcha )
		{
			$this->assignRef( 'captcha', $captcha);
		}
		$this->assignRef( 'entry',	$entry);
		$this->assignRef( 'params', 	$params);
		parent::display($tpl);
	}
}
