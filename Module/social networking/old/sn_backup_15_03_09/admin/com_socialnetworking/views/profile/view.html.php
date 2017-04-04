<?php

	/* 
		socialnetworking Profile html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class socialnetworkingViewProfile extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'SOCIAL NETWORKING  [Profile Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
		
			$profile =& $this->get('Profile');
			
			$this->assignRef('profile', $profile);

			parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('Profile');
		return $model->getPagination()->getListFooter();
	}
     
}
?>