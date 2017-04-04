<?php

	/* 
		Blog Blog html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class blogViewBlog extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'BLOG  [Blog Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
		
			$blog =& $this->get('Blog');
			
			$this->assignRef('blog', $blog);

			parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('blog');
		return $model->getPagination()->getListFooter();
	}
     
}
?>