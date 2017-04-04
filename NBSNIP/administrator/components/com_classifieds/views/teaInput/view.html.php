<?php

	/* 
		Classifieds Tea input view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewTeaInput extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$tea	=& $this->get('Data');
		$vendor	=& $this->get('vendor');
		$isNew	= ($tea->id < 1);

		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'CLASSIFIEDS [Tea]' ).': <small><small>[ ' . $text.' ]</small></small>' );
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


		$this->assignRef('tea',	$tea);
		$this->assignRef('vendor',$vendor);

		parent::display($tpl);
		}
	}