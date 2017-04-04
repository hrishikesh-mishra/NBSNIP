<?php

	/* 
		Blog Comment edit view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class blogViewCommentEdit extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$comment		=& $this->get('Data');
		
		$isNew		= ($comment->id < 1);

		$text = $isNew ? JText::_( 'Add' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'BLOG [Comment]' ).': <small><small>[ ' . $text.' ]</small></small>' );
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


		$this->assignRef('comment',		$comment);
	

		parent::display($tpl);
		}
	}