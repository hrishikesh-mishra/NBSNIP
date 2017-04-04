<?php

	/* 
		Classifieds RealState  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewRealstate extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'CLASSIFIEDS  [RealState Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::addNewX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
		
			$realstate =& $this->get('realstate');
			
			$this->assignRef('realstate', $realstate);

			parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('realstate');
		return $model->getPagination()->getListFooter();
	}
     
}
?>