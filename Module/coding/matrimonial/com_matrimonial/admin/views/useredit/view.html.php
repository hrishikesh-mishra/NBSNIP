<?php

	/* 
		Matrimonial user edit view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class matrimonialViewUserEdit extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$user	=& $this->get('Data');
		
		JToolBarHelper::title(   JText::_( 'MATRIMONIAL [User]' ).': <small><small>[ Edit ]</small></small>' );
		JToolBarHelper::save();
		
		JToolBarHelper::cancel( 'cancel', 'Close' );
		

		$this->assignRef('user',	$user);
		parent::display($tpl);
		}
	}
	?>