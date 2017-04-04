<?php

	/* 
		yellowpage vehicle  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class yellowPageViewVehicle extends JView 
	{
		function display($tpl = null)
		{
		
			
		$vehicle =& $this->get('Vehicle');
		
		$this->assignRef('vehicle', $vehicle);

		parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('Vehicle');
		return $model->getPagination()->getListFooter();
	}
     
}
?>