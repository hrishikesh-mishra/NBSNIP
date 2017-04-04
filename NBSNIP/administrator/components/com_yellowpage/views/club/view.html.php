<?php

	/* 
		yellowpage Club  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class yellowPageViewClub extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'YeLLOWPAGE  [Club Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::addNewX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
		
			$club =& $this->get('Club');
			
			$this->assignRef('club', $club);

			parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('club');
		return $model->getPagination()->getListFooter();
	}
     
}
?>