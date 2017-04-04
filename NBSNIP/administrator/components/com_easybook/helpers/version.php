<?php
/**
 * @version $Id: content.php 420 2007-12-28 15:52:11Z snipersister $
 * @package    Easybook
 * @link http://www.easy-joomla.org
 * @license    GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport( 'joomla.application.component.helper' );

class EasybookHelperVersion extends JObject {
	var $_current;
	
	function __construct()
	{
		$this->_loadVersion();
	}
	
	function _loadVersion()
	{
		require_once( JPATH_COMPONENT.DS.'libraries'.DS.'httpclient.class.php' );
		$client = new HttpClient('www.easy-joomla.org');
		
			if (!$client->get('/components/com_versions/directinfo.php?catid=3')) {
				$this->setError($client->getError());
				return false;
			}
		
		$this->_current = $client->getContent();
		return true;
	}
	
	function checkVersion($version)
	{
		if($version == $this->_current)
		{
			return 1;
		}
		elseif($this->getErrors())
		{
			return -2;
		}
		else
		{
			return -1;
		}
		
	}
	
	function getVersion()
	{
		return $this->_current;
	}
	
}
?>
