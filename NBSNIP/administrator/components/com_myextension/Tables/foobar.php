<?php
defined( '_JEXEC' ) or die( 'Restricted access table' );
class  TableFoobar extends JTable
{
	var $id = null;
	var $content = null;
	var $checked_out = null;
	var $checked_out_time = null;
	var $params = null;
	var $ordering = null;
	var $hits = null;


	function __construct(&$db)
	{
		parent::__construct('#__myextension_foobars', 'id', $db);
	}

	function check ()
	{

		if (!$this->content)
		{
			$this->setError (JText::_('Your Foobar must contain some content '));
			return false;
		}
		return true;
	}
	function setParams($paramsString="" )
	{
		$this->params=$paramsString;
	}





}
?>