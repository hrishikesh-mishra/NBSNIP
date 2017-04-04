<?php
/**
 * @version $Id: captcha.php 420 2007-12-28 15:52:11Z snipersister $
 * @package    Easybook
 * @link http://www.easy-joomla.org
 * @license    GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');


class JElementCaptcha extends JElement
{
	/**
	* Element name
	*
	* @access	protected
	* @var		string
	*/
	var	$_name = 'Captcha';

	function fetchElement($name, $value, &$node, $control_name)
	{
		jimport( 'joomla.filesystem.file' );
		$path = JPATH_SITE.DS.'components'.DS.'com_easycaptcha'.DS.'class.easycaptcha.php';
		
		$options = array ();
		foreach ($node->children() as $option)
		{
			$val	= $option->attributes('value');
			$text	= $option->data();
			$options[] = JHTML::_('select.option', $val, JText::_($text));
		}
		
		if(JFile::exists($path))
		{
			return JHTML::_('select.radiolist', $options, ''.$control_name.'['.$name.']', '', 'value', 'text', $value, $control_name.$name );
		}
		else
		{
			$class = ( $node->attributes('class') ? 'class="'.$node->attributes('class').'"' : 'class="text_area"' );
			return JTEXT::_('Please install EasyCaptcha').'<br /><input type="hidden" name="'.$control_name.'['.$name.']" id="'.$control_name.$name.'" value="0" '.$class.' />';
		}
	}
}
?>