<?php

	/* 
		Developer-Zone Categories  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class developerzoneViewCategories extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'Developer-Zone  [Categories-Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::addNewX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
			
		
			$categories =& $this->get('Categories');
				
			$this->assignRef('categories', $categories);

			parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('categories');
		return $model->getPagination()->getListFooter();
	}
     
}
?>