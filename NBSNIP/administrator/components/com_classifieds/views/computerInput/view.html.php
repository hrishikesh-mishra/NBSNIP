<?php

	/* 
		Classifieds Computer input view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewComputerInput extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$computer	=& $this->get('Data');
		$vendor	=& $this->get('vendor');
		$isNew	= ($computer->id < 1);

		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'CLASSIFIEDS [Computer]' ).': <small><small>[ ' . $text.' ]</small></small>' );
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


		$this->assignRef('computer',	$computer);
		$this->assignRef('vendor',$vendor);

		parent::display($tpl);
		}
	}