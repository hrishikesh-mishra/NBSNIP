<?php
 
 /* 
	yellow page Categories Controller
	
 */


 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class yellowpageControllerCategories extends JController
 {
		

	function __construct()
	{

		parent::__construct();
	}


	 function display()
	 {
		 
		$modelcategories =& $this->getModel('Categories');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','categories');
		 }

		 $this->_flag=0;

		 parent::display();
		 $modelcategories->getPagination();
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('categories');
		if ($model->changeCategories($cid,1))
		{
		$message =JText::_('Categories Information Published '); 
		}
		else
		{
			$message= JText::_('Categories publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_yellowpage&controller=categories', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('categories');
		if ($model->changeCategories($cid,0))
		{
		$message =JText::_('Categories unPublished'); 
		}
		else
		{
			$message= JText::_('Categories publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_yellowpage&controller=categories', $message );
	}
				
}
?>



