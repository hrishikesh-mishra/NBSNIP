<?php

	/* 
		Developer-Zone Code-File input view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class developerzoneViewCodeFileInput extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$codefile	=& $this->get('Data');
		$categories	=& $this->get('Categories');
		$isNew	= ($codefile->id < 1);

		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'DEVELOPER-ZONE [Code-File]' ).': <small><small>[ ' . $text.' ]</small></small>' );
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

		$this->assignRef('codefile',	$codefile);
		$this->assignRef('categories',	$categories);
		parent::display($tpl);
		}
	}