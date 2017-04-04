<?php

	

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class reportViewBlog extends JView 
	{
		function display($tpl = null)
		{
			//$user	=& $this->get('User');
			//$this->assignRef('user',	$user);		
			parent::display($tpl);
		}
		
}
?>