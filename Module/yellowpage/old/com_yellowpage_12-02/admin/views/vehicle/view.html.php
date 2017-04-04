<?php

	/* 
		yellowpage Vehicle  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class yellowPageViewVehicle extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'YeLLOWPAGE  [Vehicle Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::addNewX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
			
		
			$vehicle =& $this->get('Vehicle');
			$this->assignRef('vehicle', $vehicle);
			parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('vehicle');
		return $model->getPagination()->getListFooter();
	}
     
}
?>