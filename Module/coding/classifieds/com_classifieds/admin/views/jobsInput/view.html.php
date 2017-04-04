<?php

	/* 
		Classifieds Jobs input view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewJobsInput extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$jobs	=& $this->get('Data');
		$vendor	=& $this->get('vendor');
		$isNew	= ($jobs->id < 1);

		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'CLASSIFIEDS [Jobs]' ).': <small><small>[ ' . $text.' ]</small></small>' );
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


		$this->assignRef('jobs',	$jobs);
		$this->assignRef('vendor',$vendor);

		parent::display($tpl);
		}
	}