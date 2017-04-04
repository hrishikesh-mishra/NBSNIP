<?php

	/* 
		classifieds Computer  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );
	session_start();

	jimport( 'joomla.application.component.view' );


	class classifiedsViewComputerInfo extends JView 
	{
		
		
		function display($tpl = null)
		{
			$computer =& $this->get('Data');
			
			$this->assignRef('computer', $computer);
			parent::display();
		} 
		
		
	}
?>