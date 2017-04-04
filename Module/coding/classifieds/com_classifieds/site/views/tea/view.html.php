<?php

	/* 
		classifieds Tea  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewTea extends JView 
	{
		function display($tpl = null)
		{
		
			
		$tea =& $this->get('Tea');
		
		$this->assignRef('tea', $tea);

		parent::display();
	}

	
     
}
?>