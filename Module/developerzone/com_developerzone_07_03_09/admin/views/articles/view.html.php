<?php

	/* 
		Developer-Zone Articles  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class developerzoneViewArticles extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'Developer-Zone  [Articles-Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::addNewX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
			
		
			$articles =& $this->get('Articles');
				
			$this->assignRef('articles', $articles);

			parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('articles');
		return $model->getPagination()->getListFooter();
	}
     
}
?>