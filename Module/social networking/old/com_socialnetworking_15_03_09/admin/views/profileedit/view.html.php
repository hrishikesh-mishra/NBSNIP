<?php

	/* 
		
		SocialNetworking Profile edit view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class socialnetworkingViewProfileEdit extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$profile	=& $this->get('Data');
		
		

		
		JToolBarHelper::title(   JText::_( 'SOCIAL NETWORKING [Profile]' ).': <small><small>[ EDIT ]</small></small>' );
		JToolBarHelper::save();
		
		// for existing items the button is renamed `close`
		JToolBarHelper::cancel( 'cancel', 'Close' );
		
		$this->assignRef('profile',$profile);

		parent::display($tpl);
	}
}