<?php

	/* 
		classifieds Jobs  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );
	session_start();

	jimport( 'joomla.application.component.view' );


	class classifiedsViewJobsInfo extends JView 
	{
		
		
		function display($tpl = null)
		{
			$jobs =& $this->get('Data');
			
			$this->assignRef('jobs', $jobs);
			parent::display();
		} 
		
		
	}
?>