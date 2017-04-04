<?php

	/* 
		Matrimonail Comment view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class blogViewComment extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'BLOG  [Comment Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
			
		
			$comment =& $this->get('comment');
			
			$this->assignRef('comment', $comment);

			parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('comment');
		return $model->getPagination()->getListFooter();
	}
     
}
?>