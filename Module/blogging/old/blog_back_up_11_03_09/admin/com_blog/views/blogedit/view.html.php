<?php

	/* 
		
		Blog Blog edit view
	*/

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );

	jimport( 'joomla.application.component.view' );


	class blogViewBlogEdit extends JView
	{
	

	function display($tpl = null)
	{
		
	
		$blog	=& $this->get('Data');
		
		

		
		JToolBarHelper::title(   JText::_( 'BLOG [Blog]' ).': <small><small>[ EDIT ]</small></small>' );
		JToolBarHelper::save();
		
		// for existing items the button is renamed `close`
		JToolBarHelper::cancel( 'cancel', 'Close' );
		
		$this->assignRef('blog',$blog);

		parent::display($tpl);
		}
	}