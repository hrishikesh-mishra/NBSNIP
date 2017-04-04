<?php

	/* 
		yellowpage education  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class yellowPageViewEducation extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'YeLLOWPAGE  [Education Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::addNewX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
			
		$education =& $this->get('Education');
		
		$this->assignRef('education', $education);

		parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('Education');
		return $model->getPagination()->getListFooter();
	}
     
}
?>