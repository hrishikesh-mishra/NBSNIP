<?php

	/* 
		yellowpage Doctors  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class yellowPageViewDoctors extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'YeLLOWPAGE  [Doctors Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::addNewX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
			
		
			$doctors =& $this->get('Doctors');
		
			$this->assignRef('doctors', $doctors);

			parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('doctors');
		return $model->getPagination()->getListFooter();
	}
     
}
?>