<?php
/**
 * @version $Id: view.html.php 420 2007-12-28 15:52:11Z snipersister $
 * @package    Easybook
 * @link http://www.easy-joomla.org
 * @license    GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view');

class EasybookViewEasybook extends JView
{
	function display($tpl = null)
	{
		global $mainframe;

		$document =& JFactory::getDocument();

		$document->link = JRoute::_('index.php?option=com_easybook&view=easybook');

		JRequest::setVar('limit', $mainframe->getCfg('feed_limit'));

		// Get some data from the model
		$items		=& $this->get( 'Data' );

		foreach ( $items as $item )
		{
			// strip html from feed item title
			$title = $this->escape( $item->gbname );
			$title = html_entity_decode( $title );

			// url link to article
			$link = JRoute::_('index.php?option=com_easybook&view=easybook#gbentry_'.$item->id);

			// strip html from feed item description text
			$description = $item->gbtext;
			$date = ( $item->gbdate ? date( 'r', strtotime($item->gbdate) ) : '' );

			// load individual item creator class
			$feeditem = new JFeedItem();
			$feeditem->title 		= $title;
			$feeditem->link 		= $link;
			$feeditem->description 	= $description;
			$feeditem->date			= $date;
			$feeditem->category   	= 'Guestbook';

			// loads item info into rss array
			$document->addItem( $feeditem );
		}
	}
}
?>
