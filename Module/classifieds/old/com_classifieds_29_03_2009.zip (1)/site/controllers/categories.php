<?php
 
 /* 
	yellow page Categories Controller
	
 */


 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class classifiedsControllerCategories extends JController
 {
		

	function __construct()
	{

		parent::__construct();
	}


	 function display()
	 {
		 
		$modelcategories =& $this->getModel('categories');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','categories');
		 }

		 $this->_flag=0;

		 parent::display();
		 $modelcategories->getPagination();
	 }

	
				
}
?>



