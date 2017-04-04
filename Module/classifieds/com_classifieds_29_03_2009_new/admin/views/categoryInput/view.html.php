
<?php

	/* 
		Classifieds Category input view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewCategoryInput extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$category	=& $this->get('Data');
		$text = 'Edit' ;
		JToolBarHelper::title(   JText::_( 'CLASSIFIEDS [Category]' ).': <small><small>[ ' . $text.' ]</small></small>' );
		JToolBarHelper::save();
	
		// for existing items the button is renamed `close`
		JToolBarHelper::cancel( 'cancel', 'Close' );
		$this->assignRef('category',	$category);

		parent::display($tpl);
	}
}