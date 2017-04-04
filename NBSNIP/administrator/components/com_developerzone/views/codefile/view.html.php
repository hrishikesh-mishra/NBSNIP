<?php

	/* 
		Developer-Zone Code-File  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class developerzoneViewCodeFile extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'Developer-Zone  [CodeFile-Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::addNewX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
			
		
			$codefile =& $this->get('CodeFile');
				
			$this->assignRef('codefile', $codefile);

			parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('codeFile');
		return $model->getPagination()->getListFooter();
	}
     
}
?>