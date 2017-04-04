<?php

	/* 
		Matrimonail msg view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class matrimonialViewMsg extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'MATRIMONIAL  [Message Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::addNewX();
			JToolBarHelper::publish('publish','Un-Block');
			JToolBarHelper::unpublish('unpublish','Block');
			JToolBarHelper::custom('read','copy','copy','Read-MSG',true,true);
		
			$msg =& $this->get('msg');
			
			$this->assignRef('msg', $msg);

			parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('msg');
		return $model->getPagination()->getListFooter();
	}
     
}
?>