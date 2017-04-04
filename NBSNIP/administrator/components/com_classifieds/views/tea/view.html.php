<?php

	/* 
		Classifieds Tea  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewTea extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'CLASSIFIEDS  [Tea Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::addNewX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
		
			$tea =& $this->get('Tea');
			
			$this->assignRef('tea', $tea);

			parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('Tea');
		return $model->getPagination()->getListFooter();
	}
     
}
?>