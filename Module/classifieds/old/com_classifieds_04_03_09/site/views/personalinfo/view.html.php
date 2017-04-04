<?php

	/* 
		classifieds Personal  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );
	session_start();

	jimport( 'joomla.application.component.view' );


	class classifiedsViewPersonalInfo extends JView 
	{
		
		
		function display($tpl = null)
		{
			$personal =& $this->get('Data');
			
			$this->assignRef('personal', $personal);
			parent::display();
		} 
		
		
	}
?>