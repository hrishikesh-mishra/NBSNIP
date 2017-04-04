<?php
/**
 * @version $Id: acl.php 420 2007-12-28 15:52:11Z snipersister $
 * @package    Easybook
 * @link http://www.easy-joomla.org
 * @license    GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');


class JElementACL extends JElement
{
	/**
	* Element name
	*
	* @access	protected
	* @var		string
	*/
	var	$_name = 'ACL';

	function fetchElement($name, $value, &$node, $control_name)
	{
		$acl =& JFactory::getACL();
		$gtree = $acl->get_group_children_tree( null, 'USERS', false );

		$temp = new stdClass();
		$temp->value = '0';
		$temp->text = 'Everybody';
		$temp->disabled = false;
		$gtree = array_merge(array($temp), $gtree);

		return JHTML::_('select.genericlist',   $gtree, $control_name.'['.$name.']', 'id="'.$control_name.$name.'"', 'value', 'text', $value );
	}
}
?>