<?php

	/* 
		classifieds RealState  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );
	session_start();

	jimport( 'joomla.application.component.view' );


	class classifiedsViewRealstateInfo extends JView 
	{
		
		
		function display($tpl = null)
		{
			$realstate =& $this->get('Data');
			
			$this->assignRef('realstate', $realstate);
			parent::display();
		} 
		
		
	}
?>