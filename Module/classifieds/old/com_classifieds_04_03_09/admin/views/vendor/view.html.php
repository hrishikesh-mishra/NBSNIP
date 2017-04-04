<?php

	/* 
		Classifieds Vendor  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewVendor extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'Classifieds  [Vendor Manager]' ), 'generic.png' );
			JToolBarHelper::editListX();
			JToolBarHelper::addNewX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
		
			$vendor =& $this->get('Vendor');
			
			$this->assignRef('vendor', $vendor);

			parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('vendor');
		return $model->getPagination()->getListFooter();
	}
     
}
?>