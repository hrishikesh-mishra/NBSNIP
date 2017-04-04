<?php

	/* 
		yellowpage club  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class yellowPageViewClub extends JView 
	{
		function display($tpl = null)
		{
		
			
		$club =& $this->get('Club');
		
		$this->assignRef('club', $club);

		parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('Club');
		return $model->getPagination()->getListFooter();
	}
     
}
?>