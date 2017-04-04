<?php

	/* 
		yellowpage Medical  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class yellowPageViewMedical extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'YeLLOWPAGE  [Medical Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::addNewX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
			
		
		//$item1 ='index.php?option=com_myextension&task=add';
		//$item2 ='index.php?option=com_myextension&task=edit';

		
		//JSubMenuHelper::addEntry(JText::_('Add'), $item1, false);
		//JSubMenuHelper::addEntry(JText::_('Edit'), $item2, false);

		
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