<?php

	/* 
		classifieds Realstate  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewRealstate extends JView 
	{
		function display($tpl = null)
		{
		
			
		$realstate =& $this->get('realstate');
		
		$this->assignRef('realstate', $realstate);

		parent::display();
	}

	
     
}
?>