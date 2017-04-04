<?php

	/* 
		matrimonial msg edit view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class matrimonialViewMsgEdit extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$msg		=& $this->get('Data');
		$userid		=& $this->get('Userid');
		$isNew		= ($msg->id < 1);

		$text = $isNew ? JText::_( 'Add' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'MATRIMONIAL [Message]' ).': <small><small>[ ' . $text.' ]</small></small>' );
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


		$this->assignRef('msg',		$msg);
		$this->assignRef('userid',$userid);

		parent::display($tpl);
		}
	}