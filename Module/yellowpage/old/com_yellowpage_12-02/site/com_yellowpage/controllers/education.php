<?php
 
 /* 
	yellow page education Controller
	
 */


 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class yellowpageControllerEducation extends JController
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

		JRequest::setVar('view','educationinfo');
		JRequest::setVar('layout','default');
		$this->_flag=1;
		$this->display();
	}
		
	
	 function display()
	 {
		

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','education');
		 }

		 $this->_flag=0;

		 parent::display();
		
	 }
	 


	 function save()
	 {

		$data = JRequest::get('POST');
		$data['description'] = JRequest::getVar( 'description', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		$data['yid']=1;

		$params = JRequest::getVar( 'params', array(), 'post', 'array' );
		$model = $this->getModel('education');

		if ($model->save($data, $params))
		{
			$message =JText::_('Education Information Saved'); 
		}
		else
		{
			$message= JText::_('Education Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_yellowpage&controller=education', $message );
	 }
	
				
}
?>



