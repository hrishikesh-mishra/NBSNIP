<?php

	/* 
		Developer-Zone Categories input view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class developerzoneViewCategoriesInput extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$categories	=& $this->get('Data');
		$isNew	= ($categories->id < 1);

		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'DEVELOPER-ZONE [Categories]' ).': <small><small>[ ' . $text.' ]</small></small>' );
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

		$this->assignRef('categories',	$categories);
		parent::display($tpl);
		}
	}