<?php

	/* 
		Classifieds RealState input view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewRealStateInput extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$realstate	=& $this->get('Data');
		$vendor	=& $this->get('vendor');
		$isNew	= ($realstate->id < 1);

		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'CLASSIFIEDS [RealState]' ).': <small><small>[ ' . $text.' ]</small></small>' );
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


		$this->assignRef('realstate',	$realstate);
		$this->assignRef('vendor',$vendor);

		parent::display($tpl);
		}
	}