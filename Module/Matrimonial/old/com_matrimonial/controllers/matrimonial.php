<?php
 
 /* 
	Matrimonial Category Controller
	
 */


 // direct access not allowed 

defined('_JEXEC') or die ('Ristricted Access ');

 jimport('joomla.application.component.controller');

 class matrimonialController extends JController
 {
		
		
	var $msg;
	var $data;
	var $flag=false;
	var $npmsg;
	function __construct()
	{
		

		parent::__construct();
		
		
	}
	function regform()
	{
		require_once (JPATH_COMPONENT.DS.'views'.DS.'registration'.DS.'view.html.php');
		$view = new matrimonialViewRegistration();
		
		if ($this->flag)
		{
			$view->assign('message', $this->msg);
			$view->assign('data', $this->data);
		}
		
		$view->display('regform');
		return true;

		
		
	}
	
	function frgpwd()
	{
		
     		require_once (JPATH_COMPONENT.DS.'views'.DS.'registration'.DS.'view.html.php');
		$view = new matrimonialViewRegistration();

		$view->assign('msg', $this->npmsg);
		$view->display('frgpwdform');
		return true;

	}


	function _checkinfo()
	{
		$userid=JRequest::getVar('userid');
		$username=JRequest::getVar('username');
		$password=JRequest::getVar('password');
		$cpassword = JRequest::getVar('cpassword');
		$emailid=JRequest::getVar('emailid');
		
		$this->data['userid']=$userid;
		$this->data['username']=$username;
		$this->data['password']=$password;
		$this->data['cpassword']=$cpassword;
		$this->data['emailid']=$emailid;

		$this->msg='';
		$this->flag=false;
		if (empty($userid) ||strlen(trim($userid))==0)
		{
			$this->msg.='User-ID is empty <br/ >';
			$this->flag=true;
		}
		
		if (empty($username) || strlen(trim($username))==0)
		{
			$this->msg.='User-Name is empty <br/ >';
			$this->flag=true;
		}
		
		if (empty($password) || strlen(trim($password))==0)
		{
			$this->msg.='Passord is empty <br/ >';
			$this->flag=true;
		}
		
		if (empty($cpassword) || strlen(trim($cpassword))==0)
		{
			$this->msg.='Confrim password is empty <br/ >';
			$this->flag=true;
		}
		
		if ($password != $cpassword)
		{
			$this->msg.="Both Paswords aren't matches <br/ >";
			$this->flag=true;
		}
		
		if (strlen(trim($cpassword))<6)
		{
			$this->msg.="Paswords could not less than 6 character <br/ >";
			$this->flag=true;
		}
		
		if (empty($emailid) || strlen(trim($emailid))==0)
		{
			$this->msg .='Email-ID is empty <br/ >';
			$this->flag=true;
		}

		if ($this->flag)
		{
		  $this->regform();
		  return true;
		}
		
		 $model = $this->getModel('matrimonial');

		if (!$model->validemail($emailid))
		{
			$this->msg .='Email-ID is not valid.<br/ >';
			$this->flag=true;
		}
		
		if ($model->duplicateemailid($emailid))
		{
			$this->msg .='This Email-ID is aleady register valid.<br/ >';
			$this->flag=true;
		}

		if ($model->duplicateuserid($userid))
		{
			$this->msg .='This user is aleady registered.<br/ >';
			$this->flag=true;
		}
		if ($this->flag)
		{
		  $this->regform();
		  return true;
		}

		return false;
	}


	 function userreg()
	{

		$userid=JRequest::getVar('userid');
		$username=JRequest::getVar('username');
		$password=JRequest::getVar('password');
		$cpassword = JRequest::getVar('cpassword');
		$emailid=JRequest::getVar('emailid');
		
		$this->data['userid']=$userid;
		$this->data['username']=$username;
		$this->data['password']=$password;
		$this->data['cpassword']=$cpassword;
		$this->data['emailid']=$emailid;

		if ($this->_checkinfo())
			return false;
		
     		require_once (JPATH_COMPONENT.DS.'views'.DS.'registration'.DS.'view.html.php');
		$view = new matrimonialViewRegistration();
		
		$view->assign('data', $this->data);
		$view->display('profileform');
		return true;
	}


	 function display()
	 {

		 parent::display();
	 }
	

	function saveinfo()
	{
		global $mainframe;
		$userid=JRequest::getVar('userid');
		$username=JRequest::getVar('username');
		$password=JRequest::getVar('password');
		$cpassword = JRequest::getVar('cpassword');
		$emailid=JRequest::getVar('emailid');
		$data = JRequest::get('POST');

		$info['userid'] = $userid;
		$info['username']= $username;
		$info['password']= $password;
		$info['emailid']=$emailid;
		$info['activation'] =sha1($this->_randomText(8));


		if ($this->_checkinfo())
			return false;

		$model = $this->getModel('matrimonial');

		if (!$model->saveuser($info))
		{
			$this->msg .='There is error in savind infomation.<br/>Please retry.<br/ >';
			$this->flag=true;
			$this->regform();
			return false;
		}

		if (!$model->saveprofile($data))
		{
			$this->msg .='There is error in savind infomation.<br/>Please retry.<br/ >';
			$this->flag=true;
			$this->regform();
			return false;
		}
		
		if (!$this->fileupdload())
		{
			$msgphoto="Error in photo uploading.<br/>";
		}
		
			
		$message =JText::_('Your Information Saved'); 
		$sitename=$mainframe->getCfg('sitename');
		$mailfrom=$mainframe->getCfg('mailfrom');
		$fromname=$mainframe->getCfg('fromname');
		$siteURL=JURI::base();
		$name=$data['username'];
		$userid=$data['userid'];
		$password=$data['password'];
		$acode=$info['activation'];
		
		$subject=JText::_('Account Detail for '). $name . " of ". $sitename;
		$subject= html_entity_decode($subject, ENT_QUOTES);

		

		$alink=JRoute::_($siteURL."index.php?option=com_matrimonial&task=activate&activation=".$acode."&userid=".$userid, false);
		$clink = JRoute::_($siteURL,false);
		$msg ="Hello " . $userid. " .Thank you for registering at ".$sitename. ". Your account is created and must be activated ". 
			" before you can use it. To activate the account click on the following link or copy-paste it in your browser " .
			" <a href='". $alink ."'> " .$alink. "</a>. After activation you may login to the ".$siteURL ." using the ".
			" username and password username : ".$userid . " and password : ". $password ;
			
		
		$msg= html_entity_decode($msg, ENT_QUOTES);
		JUtility::sendMail($mailfrom, $fromname, $emailid, $subject,$msg);

		
		$this->setRedirect(JRoute::_('index.php?option=com_matrimonial'),$message);
		}

	function _randomText($length = 8) 
	{
		$txt = '';

		for ($i = 0; $i < $length; $i++) 
		{
		    switch (rand(0,2)) {
			case 0:
				$txt .= rand(0,9);
				break;
			case 1:
				$txt .= chr(rand(65,90));
				break;
			default:
			$txt .= chr(rand(97,122));
			}	
		}

		return $txt;
	}

	function activate()
	{
		$acode = JRequest::getVar('activation' );
		$userid=JRequest::getVar('userid');
		$model = $this->getModel('matrimonial');

		if (empty($acode) || empty($userid))
		{
   
		   $message="Incomplete information." ;

		}
		else if($model->activate($acode, $userid))
		{
			$message="Your Account Activation Code" ;
		}
		else
		{
			$message ="Invalid Activation Code. "; 
		}

		$link = JRoute::_('index.php?option=com_matrimonial', false);
		 $this->setRedirect($link, $message);
	}

	function newpwd()
	{
		global $mainframe;
		$userid=JRequest::getVar('userid');
		$emailid=JRequest::getVar('emailid');
		$model = $this->getModel('matrimonial');
		
		if (empty($emailid) || empty($userid))
		{
   
		   $this->npmsg="Incomplete information." ;
		   $this->frgpwd();
		   return false;		   
		}
		else if(!$model->validateUseridEmailid($userid, $emailid))
		{
			$this->npmsg="Invalid information." ;
			$this->frgpwd();
			return false;	
		}
		else
		{	
			$newpwd= $this->_randomText(8);
			if ($model->newpassword($userid, $emailid,$newpwd))
			{
				$message="New password has been sent to your email id";

				
				$sitename=$mainframe->getCfg('sitename');
				$mailfrom=$mainframe->getCfg('mailfrom');
				$fromname=$mainframe->getCfg('fromname');
				$siteURL=JURI::base();
			
				$subject=JText::_('New passwor for userid: ' ). $userid . " of ". $sitename;
				$subject= html_entity_decode($subject, ENT_QUOTES);
		
				$msg ="Hello " . $userid. ". Your new password for " .$sitename. " has been seted. ".
					" User-ID: ". $userid. "   Password: ". $newpwd;
				
				$msg= html_entity_decode($msg, ENT_QUOTES);
				JUtility::sendMail($mailfrom, $fromname, $emailid, $subject,$msg);
			}
			else
			{
				
				$message="Sorry unable to set a new for you. Please retry";
			}


				
				
		}
		$link = JRoute::_('index.php?option=com_matrimonial', false);
		$this->setRedirect($link, $message );
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
					
				$newname = JPATH_COMPONENT.DS.'assets'.DS.'photos'.DS.$filename;
			
			if (!(move_uploaded_file($_FILES['photo']['tmp_name'], $newname))) 
			{
				return false;
			} else 
			{
				$model = $this->getModel('matrimonial');
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

	function search()
	{
		$gender=JRequest::getVar('gender');
		$community = JRequest::getVar('community');
		$age1 = JRequest::getVar('age1');
		$age2=JRequest::getVar('age2');
		$model = $this->getModel('matrimonial');
		
		$data=$model->searchmatch($gender, $community, $age1 ,$age2);
		
		if (count($data))
		{
		
			require_once (JPATH_COMPONENT.DS.'views'.DS.'search'.DS.'view.html.php');
			$view = new matrimonialViewSearch();
	
			$view->assign('data', $data);
			$view->display('sresult');
			return true;
		}
		
		$message="Your Information not found.";
		$link = JRoute::_('index.php?option=com_matrimonial', false);
		$this->setRedirect($link, $message);
		
	}

	function pinfo()
	{
		$userid=JRequest::getVar('userid');
		
		$model = $this->getModel('matrimonial');
		
		$data=$model->proinfo($userid);
		

		require_once (JPATH_COMPONENT.DS.'views'.DS.'search'.DS.'view.html.php');
		$view = new matrimonialViewSearch();

		$view->assign('data', $data);
		$view->display('pinfo');
		return true;
	}
	
	function pidinfo()
	{
	  $userid=JRequest::getVar('pid');
	
	 $userid=trim($userid);
	  if (empty($userid))
	  {
		$message="Profile-ID is empty.";
		$link = JRoute::_('index.php?option=com_matrimonial', false);
		 $this->setRedirect($link, $message);
		 return false;
	  }

	$model = $this->getModel('matrimonial');
	$data=$model->searchprofile($userid);
	if (count($data))
	{
	
		require_once (JPATH_COMPONENT.DS.'views'.DS.'search'.DS.'view.html.php');
		$view = new matrimonialViewSearch();
	
		$view->assign('data', $data);
		$view->display('sresult');
		return true;
	}
		
	$message="Your Information not found.";
	$link = JRoute::_('index.php?option=com_matrimonial', false);
	$this->setRedirect($link, $message);
	
	}
	
	function sendmsg($data=null)
	{
	
		if (empty($data['userid']))
		{
			$data['userid']=JRequest::getVar('userid');
		}
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'matrimonial'.DS.'view.html.php');
		$view = new matrimonialViewMatrimonial();
	
		$view->assign('data', $data);
		$view->display('msg');
		return true;
	}

	function sentmsg()
	{
	  
	  $userid= trim(JRequest::getVar('userid'));
	  $sender=trim(JRequest::getVar('sender'));
	  $title=trim(JRequest::getVar('title'));
	  $sms=trim(JRequest::getVar('msg'));
	
	  if (empty($userid))
	  {
		$message="Profile ID not found.<br/> Please Retry.";
		$link = JRoute::_('index.php?option=com_matrimonial', false);
		$this->setRedirect($link, $message);	
		return false;

	  }
	$flag=false;
	$msg="";
	  if(empty($sender))
	{
		$msg.="Sender is empty. <br/>";
		$flag=true;
	}
	if (empty($title))
	{
		$msg.="Title is empty. <br/>";
		$flag=true;
	}	
	
	if (empty($sms))
	{
		$msg.="Message is empty. <br/>";
		$flag=true;
	}	
	
	if ($flag)
	{
		$data['error']=$msg;
		$data['userid']=$userid;
		$data['sender']=$sender;
		$data['title']=$title;
		$data['msg']=$sms;
		$this->sendmsg($data);
		return false;
	}

	$model = $this->getModel('matrimonial');
	$data = JRequest::get('POST');
	if (!$model->sendmsg($data))
	{
		$message="Message Send fail.<br/> Please Retry.";
	
	}
	else
	{
		$message="Successfuly your message has been sent";
	}

	
		$link = JRoute::_('index.php?option=com_matrimonial', false);
		$this->setRedirect($link, $message);	
		return false;

	}

	function login()
	{
		$sess = & JFactory::getSession();

		if (($sess->get('access','','mat')) && ($sess->get('userid','','mat')))
		{
			$model = $this->getModel('matrimonial');
			$msg=$model->inbox($sess->get('userid'));
			require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
			$view = new matrimonialViewLogin();
			$view->assign('data', $data);
			$view->assign('msg', $msg);
			$view->display('user');
			$view->display('msg');
			return true;
		}

		$userid=trim(JRequest::getVar('userid'));
		$password=JRequest::getVar('password');

		
		if(empty($userid) || empty($password))
		{
			$message="Invalid login information";
			$link = JRoute::_('index.php?option=com_matrimonial', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$model = $this->getModel('matrimonial');

		if ($model->login($userid, $password))
		{

			if ($model->checkblock($userid))
			{
				$message="Your Account is not activated.<br/> First Activate it.";
				$link = JRoute::_('index.php?option=com_matrimonial', false);
				$this->setRedirect($link, $message);
				return false;
			}
			else
			{
				
				$sess->set('access',1,'mat');
				$sess->set('userid',$userid,'mat');
				$model->lastvisit($userid);
				$msg=$model->inbox($userid);
				require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
				$view = new matrimonialViewLogin();
				$view->assign('data', $data);
				$view->assign('msg', $msg);
				$view->display('user');
				$view->display('msg');
				return true;
			}
		}
		else
		{
			$message="Invalid UserID or password.";
			$link = JRoute::_('index.php?option=com_matrimonial', false);
			$this->setRedirect($link, $message);
			return false;
		}

	}
	function userinbox()
	{
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','mat')) || (!$sess->get('userid','','mat')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_matrimonial', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','mat');

		$model = $this->getModel('matrimonial');

		$msg=$model->inbox($userid);

		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');

		$view = new matrimonialViewLogin();
		$view->assign('msg', $msg);
		$view->display('user');
		$view->display('msg');
		return true;
	}

	function userlogout()
	{
		$sess = & JFactory::getSession();
		
		$sess->set('access',null,'mat');
		$sess->set('userid',null,'mat');

		
		$message="Logout.";
		$link = JRoute::_('index.php?option=com_matrimonial', false);
		$this->setRedirect($link, $message);
		return true;
		
	}

	function readmsg()
	{
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','mat')) || (!$sess->get('userid','','mat')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_matrimonial', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','mat');
		$id=JRequest::getVar('mid');

		$model = $this->getModel('matrimonial');

		$rmsg=$model->readmsg($id,$userid);

		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');

		$view = new matrimonialViewLogin();
		$view->display('user');
		$view->assign('rmsg', $rmsg);
		
		$view->display('msgread');
		return true;
	}
	function delmsg()
	{

		$sess = & JFactory::getSession();
		if (!($sess->get('access','','mat')) || (!$sess->get('userid','','mat')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_matrimonial', false);
			$this->setRedirect($link, $message);
			return false;
		}
		
		$userid=$sess->get('userid','','mat');
		$id=JRequest::getVar('mid');
		
		$model = $this->getModel('matrimonial');

		$model->delmsg($id,$userid);

		$this->userinbox();
	}
	
	function chgpwd()
	{
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','mat')) || (!$sess->get('userid','','mat')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_matrimonial', false);
			$this->setRedirect($link, $message);
			return false;
		}
		
		$userid=$sess->get('userid','','mat');
		$newpwd=trim(JRequest::getVar('newpwd'));
		$cpwd=(JRequest::getVar('cpwd'));
		$msg='';
		$flag=false;
		if (empty($newpwd))
		{
			$cmsg .='New Password is empty.<br/>';
			$flag=true;
		}
		
		if(empty($cpwd))
		{	
			$cmsg .='Confirm Password is empty.<br/>';
			$flag=true;
		}
		if (strlen(trim($cpwd))<6)
		{
			$cmsg.="Paswords could not less than 6 character <br/ >";
			$flag=true;
		}
				
		if ($newpwd != $cpwd)
		{
			$cmsg .='Both password are not matches<br/>';
			$flag=true;			
		}
		
		if ($flag)
		{
			require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
			$data=JRequest::getVar('POST');
			$data['error']=$cmsg;
			
			$view = new matrimonialViewLogin();
			$view->assign('data',$data);
			$view->display('user');
			$view->display('changepwd');
			return true;
		}
		
		$model = $this->getModel('matrimonial');

		if(!$model->chgpwd($newpwd,$userid))
		{
			$message="Unable to change password.";
			$link = JRoute::_('index.php?option=com_matrimonial', false);
			$this->setRedirect($link, $message);
			return false;
		}
		else
		{
			require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
			
			$data['error']="<strong>Your Password is Changed.</strong>";
			$view = new matrimonialViewLogin();
			$view->assign('data',$data);
			$view->display('user');
			$view->display('changepwd');
			return true;
		}
		
		$link = JRoute::_('index.php?option=com_matrimonial', false);
		$this->setRedirect($link, $message);
		
		return false;		
		
	}
		
		
	
	function chgpwdform()
	{
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','mat')) || (!$sess->get('userid','','mat')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_matrimonial', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','mat');

		$model = $this->getModel('matrimonial');


		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');

		$view = new matrimonialViewLogin();
		$view->display('user');
		$view->display('changepwd');
		return true;
	}
	
	function editpform()
	{
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','mat')) || (!$sess->get('userid','','mat')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_matrimonial', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','mat');
		
		$model = $this->getModel('matrimonial');
		$data=$model->getinfo($userid);
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');

		$view = new matrimonialViewLogin();
		$view->display('user');
		$view->assign('data',$data);
		$view->display('editprofile');
		return true;
	}
	
	function editprf()
	{
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','mat')) || (!$sess->get('userid','','mat')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_matrimonial', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','mat');
		
		$model = $this->getModel('matrimonial');
		
		$userid2= JRequest::getVar('userid');
		$info=$model->getID($userid);
		if (($userid2 != $userid) || !$info->id)
		{
			
			$this->userlogout();
			return false;
		}
		
		$data= JRequest::get('POST');
		$data['id']=$info->id;
		$data['image']=$info->image;
		
		
		if (!$model->saveprofile($data))
		{
			echo "<strong>Error in saving profile. </strong><br/>";
			$this->editpform();
			return false;
		}
		
	
		if ($_FILES['photo']['size'])
		{
			if (!$this->fileupdload())
			{
				echo "<strong>Error in photo uploading.</strong><br/>";
				$this->editpform();
				return false;
			}
		}
		
		 echo "<strong>Your Profile Infomation is saved.</strong><br/>";
		 $this->editpform();
		 return true;
		 
	}
	
	function segpartner ()
	{
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','mat')) || (!$sess->get('userid','','mat')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_matrimonial', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','mat');

		$model = $this->getModel('matrimonial');

		$sdata=$model->segpartner($userid);
		$scriteria=$model->partenerCriteria($userid);

		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');

		$view = new matrimonialViewLogin();
		$view->assign('sdata', $sdata);
		$view->assign('scriteria',$scriteria);
		$view->display('user');
		$view->display('spartner');
		return true;
	}

	
}
?>	