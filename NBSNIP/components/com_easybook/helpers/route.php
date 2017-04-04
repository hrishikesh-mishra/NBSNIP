<?php
/**
 * @version $Id: route.php 420 2007-12-28 15:52:11Z snipersister $
 * @package    Easybook
 * @link http://www.easy-joomla.org
 * @license    GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Component Helper
jimport('joomla.application.component.helper');

class EasybookHelperRoute
{
	function getEasybookRoute($id) {
		
		//Create the link
		$link = 'index.php?option=com_easybook&view=easybook';
		$link .= '&Itemid=' . EasybookHelperRoute::_findItem();
		$link .= '#gbentry_'.$id;
		
		return $link;		
	}

	function _findItem()
	{
		$component =& JComponentHelper::getComponent('com_easybook');

		$menus	= &JApplication::getMenu('site', array());
		$items	= $menus->getItems('componentid', $component->id);
		$match = null;

		foreach($items as $item)
		{
			if ((@$item->query['view'] == 'easybook')) {
				$match = $item->id;
				break;
			}
		}
		
		return $match;
	}
}
?>
