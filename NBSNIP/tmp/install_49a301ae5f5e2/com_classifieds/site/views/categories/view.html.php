<?php

	/* 
		classifieds Categories  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class classifiedsViewCategories extends JView 
	{
		function display($tpl = null)
		{

			$categories =& $this->get('Categories');
		
			$this->assignRef('categories', $categories);

			parent::display($tpl);
		}

	function pageIn()
	{
		$model =& $this->getModel('Categories');
		return $model->getPagination()->getListFooter();
	}
     
}
?>