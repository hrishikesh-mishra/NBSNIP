<?php

	/* 
		Classifieds Category  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewCategory extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'CLASSIFIEDS  [Category Manager]' ), 'generic.png' );
			JToolBarHelper::editListX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
		
			$category =& $this->get('category');
			
			$this->assignRef('category', $category);

			parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('category');
		return $model->getPagination()->getListFooter();
	}
     
}
?>