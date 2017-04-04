<?php
/**
 * @version $Id: menu.php 420 2007-12-28 15:52:11Z snipersister $
 * @package    Easybook
 * @link http://www.easy-joomla.org
 * @license    GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Component Helper
jimport('joomla.application.component.helper');

class EasybookHelperMenu
{
	function getName() {
		
		$component =& JComponentHelper::getComponent('com_easybook');

		$menus	= &JApplication::getMenu('site', array());
		$items	= $menus->getItems('componentid', $component->id);
		$match = null;

		foreach($items as $item)
		{
			if ((@$item->query['view'] == 'easybook')) {
				$match = $item->name;
				break;
			}
		}
		
		return $match;		
	}

}
?>
