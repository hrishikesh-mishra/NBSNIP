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
				
		$document	= &JFactory::getDocument();
		$menus		= &JSite::getMenu();
		$params 	= &$mainframe->getParams('com_easybook');
		
		// Set CSS File
		JHTML::_('stylesheet', 'easybook.css', 'components/com_easybook/css/');
		$document->addCustomTag('
		<!--[if IE 6]>
    		<style type="text/css">
    				.easy_align_middle { behavior: url('.JURI::base().'components/com_easybook/scripts/pngbehavior.htc); }
    				.png { behavior: url('.JURI::base().'components/com_easybook/scripts/pngbehavior.htc); }
    		</style>
  		<![endif]-->');
		
		// Get some Data
		$entrys = $this->get( 'Data' );
		$count = $this->get( 'Total' );
		$pagination = $this->get( 'Pagination' );
		
		// Show RSS Feed
		$link	= '&format=feed&limitstart=';
		$attribs = array('type' => 'application/rss+xml', 'title' => 'RSS 2.0');
		$document->addHeadLink(JRoute::_($link.'&type=rss'), 'alternate', 'rel', $attribs);
		$attribs = array('type' => 'application/atom+xml', 'title' => 'Atom 1.0');
		$document->addHeadLink(JRoute::_($link.'&type=atom'), 'alternate', 'rel', $attribs);
		
		// Prepare ACL checks
		$user = & JFactory::getUser();
		$access = new stdClass();
	
		$access->canAdd			= $user->authorize('com_easybook', 'add');
	
		$access->canPublishOwn	= $user->authorize('com_easybook', 'publish', 'content', 'own');
		$access->canRemoveOwn	= $user->authorize('com_easybook', 'remove', 'content', 'own');
		$access->canEditOwn		= $user->authorize('com_easybook', 'edit', 'content', 'own');
	
		$access->canPublish		= $user->authorize('com_easybook', 'publish', 'content', 'all');
		$access->canRemove		= $user->authorize('com_easybook', 'remove', 'content', 'all');
		$access->canEdit		= $user->authorize('com_easybook', 'edit', 'content', 'all');
		$access->canComment		= $user->authorize('com_easybook', 'comment', 'content', 'all');

		// Assign Data to template
		$this->assignRef( 'heading',	$document->getTitle() );
		$this->assignRef( 'entrys',	$entrys );
		$this->assignRef( 'count' , $count);
		$this->assignRef( 'pagination' , $pagination);
		$this->assignRef( 'params', $params);
		$this->assignRef( 'access', $access);
		
		// Add HTML Head Link
		if(method_exists($document, "addHeadLink"))
		{
			$paginationdata = $pagination->getData();
			if($paginationdata->start->link) {$document->addHeadLink($paginationdata->start->link, "first");}
			if($paginationdata->previous->link) {$document->addHeadLink($paginationdata->previous->link, "prev");}
			if($paginationdata->next->link) {$document->addHeadLink($paginationdata->next->link, "next");}
			if($paginationdata->end->link) {$document->addHeadLink($paginationdata->end->link, "last");}
		}
		
		// Display template
		parent::display($tpl);
	}
}
