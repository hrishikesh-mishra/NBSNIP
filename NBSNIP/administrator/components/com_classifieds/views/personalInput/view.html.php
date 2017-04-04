<?php

	/* 
		Classifieds Personal input view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewPersonalInput extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$personal	=& $this->get('Data');
		$vendor	=& $this->get('vendor');
		$isNew	= ($personal->id < 1);

		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'CLASSIFIEDS [Personal]' ).': <small><small>[ ' . $text.' ]</small></small>' );
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


		$this->assignRef('personal',	$personal);
		$this->assignRef('vendor',$vendor);

		parent::display($tpl);
		}
	}