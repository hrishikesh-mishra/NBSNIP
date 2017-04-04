<?php

	/* 
		yellowpage Categories  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class yellowPageViewCategories extends JView 
	{
		function display($tpl = null)
		{

			JToolBarHelper::title(   JText::_( 'YeLLOWPAGE  [Categories Manager]' ), 'generic.png' );
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
		
			$categories =& $this->get('Categories');
		
			$this->assignRef('categories', $categories);

			parent::display($tpl);
		}

	function pageIn()
	{
		$model =& $this->getModel('categories');
		return $model->getPagination()->getListFooter();
	}
     
}
?>