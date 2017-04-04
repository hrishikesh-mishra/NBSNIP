<?php 

defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.application.component.controller');


class nbsnipControllerHome extends JController
{
  
	function __construct()
	{
		parent::__construct();
	}
	function display()
	{
		$this->_checkVisitor();
		parent::display();
	}
	
	function _checkVisitor()
	{
		$sess = & JFactory::getSession();
		$cIP =$_SERVER['REMOTE_ADDR'];
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','nbsnip')) ||  ! ($sess->get('clientip','','nbsnip')==$clientIP))
		{
			$model=$this->getModel('Home');
			$model->addVisitor($cIP);
			$sess->set('access',1,'nbsnip');
			
			$sess->set('clientip',$clientIP, 'nbsnip');
		}
		else 
			return true;
	}
}