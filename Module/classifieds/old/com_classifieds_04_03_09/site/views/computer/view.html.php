<?php

	/* 
		classifieds Computer  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewComputer extends JView 
	{
		function display($tpl = null)
		{
		
			
		$computer =& $this->get('computer');
		
		$this->assignRef('computer', $computer);

		parent::display();
	}

	
     
}
?>