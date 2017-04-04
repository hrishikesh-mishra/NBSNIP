<?php

	/* 
		classifieds Jobs  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewJobs extends JView 
	{
		function display($tpl = null)
		{
		
			
		$jobs =& $this->get('jobs');
		
		$this->assignRef('jobs', $jobs);

		parent::display();
	}

	
     
}
?>