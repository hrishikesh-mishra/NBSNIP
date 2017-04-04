<?php

	/* 
		Classifieds Vendor input view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewVendorInput extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$vendor		=& $this->get('Data');
		$isNew		= ($vendor->id < 1);

		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'CLSSIFIEDS [Vendor]' ).': <small><small>[ ' . $text.' ]</small></small>' );
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


		$this->assignRef('vendor',		$vendor);

		parent::display($tpl);
		}
	}