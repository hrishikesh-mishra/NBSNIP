<?php

	/* 
		classifieds Tea  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );
	session_start();

	jimport( 'joomla.application.component.view' );


	class classifiedsViewTeaInfo extends JView 
	{
		
		
		function display($tpl = null)
		{
			$tea =& $this->get('Data');
			
			$this->assignRef('tea', $tea);
			parent::display();
		} 
		
		
	}
?>