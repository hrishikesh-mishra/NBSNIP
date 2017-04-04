<?php

	/* 
		Developer-Zone Article input view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class developerzoneViewArticlesInput extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$articles	=& $this->get('Data');
		$categories	=& $this->get('Categories');
		$isNew	= ($article->id < 1);

		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'DEVELOPER-ZONE [Article]' ).': <small><small>[ ' . $text.' ]</small></small>' );
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

		$this->assignRef('articles',	$articles);
		$this->assignRef('categories',	$categories);
		parent::display($tpl);
	}
}