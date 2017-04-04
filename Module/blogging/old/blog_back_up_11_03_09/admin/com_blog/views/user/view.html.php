<?php

	/* 
		Blog User view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class blogViewUser extends JView 
	{
		function display($tpl = null)
		{
		
			JToolBarHelper::title(   JText::_( 'BLOG  [User Manager]' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::publish();
			JToolBarHelper::unpublish();
			JToolBarHelper::custom('mail','send','send_f2','Email',true,true);
		
			$user =& $this->get('user');
			
			$this->assignRef('user', $user);

			parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('user');
		return $model->getPagination()->getListFooter();
	}
     
}
?>