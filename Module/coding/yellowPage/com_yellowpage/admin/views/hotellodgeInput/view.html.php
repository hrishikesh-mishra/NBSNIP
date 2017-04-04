<?php

	/* 
		yellowpage Hotel Lodge input view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class yellowpageViewHotelLodgeInput extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$hotellodge		=& $this->get('Data');
		$isNew		= ($medical->id < 1);

		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'YeLLOWPAGE [Hotel/Lodge]' ).': <small><small>[ ' . $text.' ]</small></small>' );
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


		$this->assignRef('hotellodge',		$hotellodge);

		parent::display($tpl);
		}
	}