<?php

	/* 
		Classifieds Computer  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewComputer extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'CLASSIFIEDS  [Computer Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::addNewX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
		
			$computer =& $this->get('Computer');
			
			$this->assignRef('computer', $computer);

			parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('computer');
		return $model->getPagination()->getListFooter();
	}
     
}
?>