<?php

	/* 
		classifieds vehicle  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewVehicle extends JView 
	{
		function display($tpl = null)
		{
		
			
		$vehicle =& $this->get('Vehicle');
		
		$this->assignRef('vehicle', $vehicle);

		parent::display();
	}

	
     
}
?>