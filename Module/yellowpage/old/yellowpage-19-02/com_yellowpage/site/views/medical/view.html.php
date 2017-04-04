<?php

	/* 
		yellowpage medical  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class yellowPageViewMedical extends JView 
	{
		function display($tpl = null)
		{
		
			
		$medical =& $this->get('Medical');
		
		$this->assignRef('medical', $medical);

		parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('medical');
		return $model->getPagination()->getListFooter();
	}
     
}
?>