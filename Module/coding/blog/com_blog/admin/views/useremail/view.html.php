<?php

	/* 
		Blog user Email view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class blogViewUserEmail extends JView
	{
	

	function display($tpl = null)
	{
		
	
		JToolBarHelper::title(   JText::_( 'BLOG [User]' ).': <small><small>[ Send Email ]</small></small>' );
		JToolBarHelper::custom('sendmail','send','send_f2','Send-Email',false,false);
		
		JToolBarHelper::cancel( 'cancel', 'Close' );
		
		parent::display($tpl);
	}
	}
	?>