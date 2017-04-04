<?php

	/* 
		yellowpage Hotel Lodge  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class yellowPageViewHotelLodge extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'YeLLOWPAGE  [Hotel Lodge Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::addNewX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
		
		$hotellodge =& $this->get('HotelLodge');
		
		$this->assignRef('hotellodge', $hotellodge);

		parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('hotellodge');
		return $model->getPagination()->getListFooter();
	}
     
}
?>