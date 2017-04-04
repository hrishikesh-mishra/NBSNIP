<?php

	/* 
		classifieds personal  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewPersonal extends JView 
	{
		function display($tpl = null)
		{
		
			
		$personal =& $this->get('Personal');
		
		$this->assignRef('personal', $personal);

		parent::display();
	}

	
     
}
?>