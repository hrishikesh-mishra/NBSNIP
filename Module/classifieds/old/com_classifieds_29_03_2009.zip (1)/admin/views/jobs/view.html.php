<?php

	/* 
		Classifieds Jobs  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewJobs extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'CLASSIFIEDS  [Jobs Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::addNewX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
		
			$jobs =& $this->get('jobs');
			
			$this->assignRef('jobs', $jobs);

			parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('jobs');
		return $model->getPagination()->getListFooter();
	}
     
}
?>