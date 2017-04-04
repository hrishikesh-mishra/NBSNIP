<?php

	/* 
		yellowpage Club input view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class yellowpageViewClubInput extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$club		=& $this->get('Data');
		$isNew		= ($club->id < 1);

		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'YeLLOWPAGE [Club]' ).': <small><small>[ ' . $text.' ]</small></small>' );
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


		$this->assignRef('club',		$club);

		parent::display($tpl);
		}
	}