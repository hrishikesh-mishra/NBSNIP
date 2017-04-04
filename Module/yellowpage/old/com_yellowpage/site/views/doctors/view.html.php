<?php

	/* 
		yellowpage doctors  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class yellowPageViewDoctors extends JView 
	{
		function display($tpl = null)
		{
		
			
		$doctors =& $this->get('Doctors');
		
		$this->assignRef('doctors', $doctors);

		parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('Doctors');
		return $model->getPagination()->getListFooter();
	}
     
}
?>