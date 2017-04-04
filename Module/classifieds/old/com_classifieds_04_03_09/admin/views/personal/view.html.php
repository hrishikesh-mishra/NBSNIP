<?php

	/* 
		Classifieds Personal  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewPersonal extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'CLASSIFIEDS  [Personal Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::addNewX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
		
			$personal =& $this->get('personal');
			
			$this->assignRef('personal', $personal);

			parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('personal');
		return $model->getPagination()->getListFooter();
	}
     
}
?>