<?php

	/* 
		Classifieds Vehicle  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewVehicle extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'CLASSIFIEDS  [Vehicle Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::addNewX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
		
			$vehicle =& $this->get('vehicle');
			
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