<?php

	/* 
		yellowpage Vehicle input view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class yellowpageViewVehicleInput extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$vehicle		=& $this->get('Data');
		$isNew		= ($vehicle->id < 1);

		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'YeLLOWPAGE [Vehicle]' ).': <small><small>[ ' . $text.' ]</small></small>' );
		JToolBarHelper::save();
		if ($isNew) 
		{
			JToolBarHelper::cancel();
		} 
		else 
		{
			// for existing items the button is renamed `close`
			JToolBarHelper::cancel( 'cancel', 'Close' );
		}


		$this->assignRef('vehicle',		$vehicle);

		parent::display($tpl);
		}
	}