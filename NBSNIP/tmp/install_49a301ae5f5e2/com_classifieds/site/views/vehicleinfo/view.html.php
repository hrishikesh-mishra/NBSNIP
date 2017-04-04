<?php

	/* 
		classifieds Vehicle  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );
	session_start();

	jimport( 'joomla.application.component.view' );


	class classifiedsViewVehicleInfo extends JView 
	{
		
		
		function display($tpl = null)
		{
			$vehicle =& $this->get('Data');
			
			$this->assignRef('vehicle', $vehicle);
			parent::display();
		} 
		
		
	}
?>