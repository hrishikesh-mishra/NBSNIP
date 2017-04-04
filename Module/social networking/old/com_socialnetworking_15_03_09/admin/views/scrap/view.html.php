<?php

	/* 
		Social-Networking Scrap view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class socialnetworkingViewScrap extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'SOCIAL-NETWORKING  [Scrap Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
			
		
			$scrap =& $this->get('Scrap');
						
			$this->assignRef('scrap', $scrap);

			parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('scrap');
		return $model->getPagination()->getListFooter();
	}
     
}
?>