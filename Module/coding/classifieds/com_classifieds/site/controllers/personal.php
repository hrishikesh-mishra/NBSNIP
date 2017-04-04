<?php
 
 /* 
	Classifieds Personal Controller
	
 */


 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class classifiedsControllerPersonal extends JController
 {
		
		var $_flag=0;
		

	function __construct()
	{
		$this->_flag=0;

		parent::__construct();


		$this->registerTask('info','info');
	}

	
	function info()
	{

		JRequest::setVar('view','personalinfo');
		JRequest::setVar('layout','default');
		$this->_flag=1;
		
		$this->display();

	}
	
	 function display()
	 {
		
		 	
		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','personal');
		 }

		 $this->_flag=0;

		 parent::display();
		
	 }
	 
				
}
?>



