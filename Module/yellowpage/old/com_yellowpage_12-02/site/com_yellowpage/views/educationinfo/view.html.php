<?php

	/* 
		yellowpage education  html view 
	*/

	//direct access not allowed	
	defined( '_JEXEC' ) or die( 'Restricted access view' );

	jimport( 'joomla.application.component.view' );


	class yellowPageViewEducationInfo extends JView 
	{
		function display($tpl = null)
		{
			$education =& $this->get('Data');
			JHTML::_('behavior.formvalidation');

			$this->assignRef('education', $education);
			parent::display();
		}     
	}
?>