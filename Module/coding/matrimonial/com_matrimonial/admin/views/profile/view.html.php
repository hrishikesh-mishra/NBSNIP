<?php

	/* 
		matrimonail profile html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class matrimonialViewProfile extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'MATRIMONIAL  [Profile Manager]' ), 'generic.png' );
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
		$model =& $this->getModel('profile');
		return $model->getPagination()->getListFooter();
	}
     
}
?>