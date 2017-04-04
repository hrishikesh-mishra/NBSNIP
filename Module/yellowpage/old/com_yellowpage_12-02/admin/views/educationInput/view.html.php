<?php

	/* 
		yellowpage education input view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class yellowpageViewEducationInput extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$education		=& $this->get('Data');
		$isNew		= ($education->id < 1);

		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'YeLLOWPAGE [Education]' ).': <small><small>[ ' . $text.' ]</small></small>' );
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


		$this->assignRef('education',		$education);

		parent::display($tpl);
		}
	}