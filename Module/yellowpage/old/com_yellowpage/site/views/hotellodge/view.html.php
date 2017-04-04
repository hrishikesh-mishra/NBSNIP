<?php

	/* 
		yellowpage Hotel Lodge  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class yellowPageViewHotelLodge extends JView 
	{
		function display($tpl = null)
		{
		
			
		$hotellodge =& $this->get('HotelLodge');
		
		$this->assignRef('hotellodge', $hotellodge);

		parent::display();
	}

	function pageIn()
	{
		$model =& $this->getModel('HotelLodge');
		return $model->getPagination()->getListFooter();
	}
     
}
?>