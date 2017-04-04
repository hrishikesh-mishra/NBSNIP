<?php

	/* 
		social-networking Scrap edit view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class socialnetworkingViewScrapEdit extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$scrap		=& $this->get('Data');
		
		$isNew		= ($scrap->id < 1);

		$text = $isNew ? JText::_( 'Add' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'SOCIAL-NETWORKING [Scrap]' ).': <small><small>[ ' . $text.' ]</small></small>' );
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


		$this->assignRef('scrap',		$scrap);
	

		parent::display($tpl);
		}
	}