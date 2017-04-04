<?php
 
 /* 
	Matrimonail Profile Controller
	
 */


 // direct access not allowed 

defined('_JEXEC') or die ('Ristricted Access ');

 jimport('joomla.application.component.controller');

 class matrimonialControllerProfile extends JController
 {
		
		var $_flag=0;

	function __construct()
	{
		$this->_flag=0;

		parent::__construct();
		
	}

	function edit()
	 {
		JRequest::setVar('view','profileEdit');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);

		$this->_flag=1;
		$this->display();
	 }

	 function display()
	 {
		 $model =& $this->getModel('profile');

		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','profile');
		 }

		 $this->_flag=0;

		 parent::display();
		 $model->getPagination();
	 }

	 function save()
	 {

		$data = JRequest::get('POST');
		
		
		$model = $this->getModel('profile');

		if ($model->save($data))
		{
			$message =JText::_('User Profile Saved'); 
			if ($_FILES['photo']['size'])
			{
				if (!$this->fileupdload())
				{
					echo "<strong>Error in photo uploading.</strong><br/>";
					
				}
			}
		}
		else
		{
			$message= JText::_('User Profile Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_matrimonial&controller=profile', $message );
	 }

	 function publish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('profile');
		if ($model->changeProfile($cid,1))
		{
		$message =JText::_('User Profile Published '); 
		}
		else
		{
			$message= JText::_('User Profile publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_matrimonial&controller=profile', $message );
	}
	
	function unpublish()
	{
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
		
		$model = $this->getModel('profile');
		if ($model->changeProfile($cid,0))
		{
		$message =JText::_('Profile unPublished'); 
		}
		else
		{
			$message= JText::_('Profile publish Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_matrimonial&controller=profile', $message );
	}
	function remove()
	{
		$model = $this->getModel('Profile');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Content Could not be Deleted' );
		} else {
			$msg = JText::_( 'Content(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_matrimonial&controller=profile', $msg );
	}


	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_matrimonial&controller=profile', $msg );
	}
	function fileupdload()
	{
		$userid= JRequest::getVar('userid');
		
	
		
		 if (!($_FILES['photo']['size']) || ($_FILES['photo']['size'])>150000 ) 
		{
			return false;
		}
		 else 
		 {
			$permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');
			$typeOK = false;

			foreach ($permitted as $type) 
			{
				if ($type == $_FILES['photo']['type']) 
				{
					$typeOK = true;
					break;
				}
			}


			if ($typeOK )
			{
				$name=$_FILES['photo']['name'];
				$lastpos = strrpos($name, '.');
				$ext = substr($name, $lastpos+1, strlen($name)-$lastpos);

				$filename=$userid.".".$ext;
				
				$newname = JPATH_COMPONENT_SITE.DS.'assets'.DS.'photos'.DS.$filename;
				

			
			if (!(move_uploaded_file($_FILES['photo']['tmp_name'], $newname))) 
			{
				return false;
			} else 
			{
				$model = $this->getModel('profile');
				if(!$model->imageupdate($userid,$filename))
				{
					return false;
				}
				else
				{
					return true;
				}
				
			}
			}
			else
			{
				return false;
			}

		}
		

	}			
}
?>



