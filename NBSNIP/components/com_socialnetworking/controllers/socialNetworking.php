<?php
 
 /* 
	Social Networking Controller
	
 */

 // direct access not allowed 

defined('_JEXEC') or die ('Ristricted Access ');

 jimport('joomla.application.component.controller');
 //jimport('joomla.utilities.date');

 class socialNetworkingController extends JController
 {
 
	function __construct()
	{

		parent::__construct();
	}

	function display()
	{
		$sess = & JFactory::getSession();
		
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (($sess->get('access','','sn')) && ($sess->get('userid','','sn')) && ($sess->get('clientip','','sn')==$clientIP))
		{
			$this->login();
			return false;
		}
	
	
		$model=$this->getModel('socialNetorking');
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'socialNetworking'.DS.'view.html.php');
		$view = new socialNetworkingViewSocialNetworking();
		$view->display();		
		return true;
	}
	
	function usrReg($uRMsg=null)
	{
		$sess=& JFactory::getSession();
		$sess->set('captcha',null,'sn');
		
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'registration'.DS.'view.html.php');
		$view = new socialNetworkingViewRegistration();
		
		$fileName=$this->random_text(5).'.png';
		$fpath=JPATH_ROOT.DS.'components'.DS.'com_socialnetworking'.DS.'assets'.DS.'captcha'.DS.$fileName;
		$private_key=substr(sha1($this->random_text(6)),0,6);
		$this->make_captcha(true,$private_key,$fpath) ;
		$sess->set('captcha',$private_key,'sn');
		$view->assign('uRMsg',$uRMsg);		
		$view->assign('fileName',$fileName);		
		$view->display('regFrm');		
		
		return true;
	
	}
	
	function make_captcha($noise=true,$private_key,$fpath) 
	{
		$font_file=JPATH_ROOT.DS.'components'.DS.'com_socialnetworking'.DS.'assets'.DS.'Dustismo.ttf';
		
		
		$image = imagecreatetruecolor(120,30);
		$back=ImageColorAllocate($image,intval(rand(224,255)),intval(rand(224,255)),intval(rand(224,255)));
		ImageFilledRectangle($image,0,0,120,30,$back);
		if ($noise)
		{ 
			// rand characters in background with random position, angle, color
			for ($i=0;$i<30;$i++) 
			{
				$size=intval(rand(6,14));
				$angle=intval(rand(0,360));
				$x=intval(rand(10,120-10));
				$y=intval(rand(0,30-5));
				$color=imagecolorallocate($image,intval(rand(160,224)),intval(rand(160,224)),intval(rand(160,224)));
				$text=chr(intval(rand(45,250)));
				ImageTTFText ($image,$size,$angle,$x,$y,$color,$font_file,$text);
			}
		}
		else 
		{ 
			// random grid color
			for ($i=0;$i<120;$i+=10) 
			{
				$color=imagecolorallocate($image,intval(rand(160,224)),intval(rand(160,224)),intval(rand(160,224)));
				imageline($image,$i,0,$i,30,$color);
			}
			for ($i=0;$i<30;$i+=10) {
				$color=imagecolorallocate($image,intval(rand(160,224)),intval(rand(160,224)),intval(rand(160,224)));
				imageline($image,0,$i,120,$i,$color);
			}
		}
		// private text to read
		for ($i=0,$x=5; $i<6;$i++) 
		{
			$r=intval(rand(0,128));
			$g=intval(rand(0,128));
			$b=intval(rand(0,128));
			$color = ImageColorAllocate($image, $r,$g,$b);
			$shadow= ImageColorAllocate($image, $r+128, $g+128, $b+128);
			$size=intval(rand(12,17));
			$angle=intval(rand(-30,30));
			$text=strtoupper(substr($private_key,$i,1));
			ImageTTFText($image,$size,$angle,$x+2,26,$shadow,$font_file,$text);
			ImageTTFText($image,$size,$angle,$x,24,$color,$font_file,$text);
			$x+=$size+2;
		}
		
		imagepng($image, $fpath);
		ImageDestroy($image);
		
		
	}
	
	function random_text($count, $rm_similar = true)
	{
		// create list of characters
		$chars = array_flip(array_merge(range(0, 9), range('A', 'Z')));

		// remove similar looking characters that might cause confusion
		if ($rm_similar)
		{
			unset($chars[0], $chars['O']);
		}

		// generate the string of random text
		for ($i = 0, $text = ''; $i < $count; $i++)
		{
			$text .= array_rand($chars);
		}

		return $text;
	}
	
	function _checkinfo()
	{
		$userid=JRequest::getVar('userid');
		$firstname=JRequest::getVar('firstname');
		$lastname=JRequest::getVar('lastname');
		$password=JRequest::getVar('password');
		$cpassword =JRequest::getVar('cpassword');
		$emailid=JRequest::getVar('emailid');
		$location=JRequest::getVar('location');
		$city=JRequest::getVar('city');
		$state=JRequest::getVar('state');
		$captcha=JRequest::getVar('imgtext');
		
		$msg='';
		$flag=false;
		if (empty($userid) ||strlen(trim($userid))==0)
		{
			$msg.='User-ID is empty <br/ >';
			$flag=true;
		}
		
		if (empty($firstname) || strlen(trim($firstname))==0)
		{
			$msg.='First-Name is empty <br/ >';
			$flag=true;
		}
				
		if (empty($lastname) || strlen(trim($lastname))==0)
		{
			$msg.='Last-Name is empty <br/ >';
			$flag=true;
		}
		if (empty($password) || strlen(trim($password))==0)
		{
			$msg.='Passord is empty <br/ >';
			$flag=true;
		}
		
		if (empty($cpassword) || strlen(trim($cpassword))==0)
		{
			$msg.='Confrim password is empty <br/ >';
			$flag=true;
		}
		
		if ($password != $cpassword)
		{
			$msg.="Both Paswords aren't matches <br/ >";
			$flag=true;
		}
		
		if (strlen(trim($password))<6)
		{
			$msg.="Paswords could not less than 6 character <br/ >";
			$flag=true;
		}
		
		if (empty($emailid) || strlen(trim($emailid))==0)
		{
			$msg .='Email-ID is empty <br/ >';
			$flag=true;
		}
		
		if (empty($location) || strlen(trim($location))==0)
		{
			$msg .='Your Location is empty <br/ >';
			$flag=true;
		}
		
		if (empty($city) || strlen(trim($city))==0)
		{
			$msg .='Your City is empty <br/ >';
			$flag=true;
		}
			
		if (empty($state) || strlen(trim($state))==0)
		{
			$msg .='Your State is empty <br/ >';
			$flag=true;
		}
		
		if (empty($captcha) || strlen(trim($captcha))==0)
		{
			$msg .='Image-Text is empty <br/ >';
			$flag=true;
		}
		
		if ($flag)
		{
		  $this->usrReg($msg);
		  return true;
		}
		
		 $model = $this->getModel('SocialNetworking');

		if (!$model->validemail($emailid))
		{
			$msg .='Email-ID is not valid.<br/ >';
			$flag=true;
		}
		
		if ($model->duplicateemailid($emailid))
		{
			$msg .='This Email-ID is aleady registered.<br/ >';
			$flag=true;
		}

		if ($model->duplicateuserid($userid))
		{
			$msg .='This user is aleady registered.<br/ >';
			$flag=true;
		}
		$sess=& JFactory::getSession();
		$cap=$sess->get('captcha',null,'sn');	
		
		if (strtolower($cap) !=strtolower($captcha))
		{
			$msg .='Invalid Image-Text.<br/ >';
			$flag=true;
		}	
		
		if ($flag)
		{
		  $this->usrReg($msg);
		  return true;
		}

		return false;
	}
	
	function regUserSave()
	{
		if ($this->_checkinfo())
			return false;
			
		
		$sess=& JFactory::getSession();
		$sess->set('captcha',null,'sn');
		
		global $mainframe;
		$userid=JRequest::getVar('userid');
		$firstname=JRequest::getVar('firtname');
		$password=JRequest::getVar('password');
		$emailid=JRequest::getVar('emailid');
		$data = JRequest::get('POST');
		 
		$userinfo=array();
		$userinfo['userid']=$userid;
		$userinfo['password']=$password;
		$userinfo['emailid']=$emailid;
		$userinfo['activation']=sha1($this->random_text(8,false));
		
		
		$model = $this->getModel('socialnetworking');

		if (!$model->saveuser($userinfo))
		{
			$msg .='There is error in savind infomation.<br/>Please retry.<br/ >';
			$this->usrReg($msg);
			$this->registration();
			return false;
		}
		
		if (!$model->saveprofile($data))
		{
			//do nothing;
		}
	
		
		if (!$this->fileupdload($userid))
		{
			$msgphoto="Error in photo uploading.<br/>";
		}
		
		
		$message =JText::_('Your Information Saved.<br/> At your emial-ID an activation Link has been sent.'); 
		$sitename=$mainframe->getCfg('sitename');
		$mailfrom=$mainframe->getCfg('mailfrom');
		$fromname=$mainframe->getCfg('fromname');
		$siteURL=JURI::base();
		$name=$data['firstname'];
		$userid=$data['userid'];
		$password=$data['password'];
		$acode=$userinfo['activation'];
		
		$subject=JText::_('Social-Networking Account Detail for '). $name . " of ". $sitename;
		$subject= html_entity_decode($subject, ENT_QUOTES);

		

		$alink=JRoute::_($siteURL."index.php?option=com_socialnetworking&task=activate&activation=".$acode."&userid=".$userid, false);
		$clink = JRoute::_($siteURL,false);
		$msg ="Hello " . $userid. " .Thank you for registering at ".$sitename. " for Social Networking. Your account is created and must be activated ". 
			" before you can use it. To activate the account click on the following link or copy-paste it in your browser " .
			" <a href='". $alink ."'> " .$alink. "</a>. After activation you may login to the ".$siteURL ." using the ".
			" username and password username : ".$userid . " and password : ". $password ;
		//echo $msg;	
		$msg= html_entity_decode($msg, ENT_QUOTES);
		JUtility::sendMail($mailfrom, $fromname, $emailid, $subject,$msg);

		
		$this->setRedirect(JRoute::_('index.php?option=com_socialnetworking'),$message);
		
	}
	
	function fileupdload($userid)
	{
		
		
		 if (!($_FILES['photo']['size']) || ($_FILES['photo']['size'])>200000 ) 
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
				$model = $this->getModel('socialnetworking');
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
	
	function activate()
	{
		$acode = JRequest::getVar('activation' );
		$userid=JRequest::getVar('userid');
		$model = $this->getModel('socialnetworking');

		if (empty($acode) || empty($userid))
		{
   		   $message="Incomplete information." ;
		}
		else if($model->activate($acode, $userid))
		{
			$message="Your Account Activated " ;
		}
		else
		{
			$message ="Invalid Activation Code. "; 
		}

		$link = JRoute::_('index.php?option=com_socialnetworking', false);
		$this->setRedirect($link, $message);
	}
	
	function frgFrm($fPMsg=null)
	{
	
     	require_once (JPATH_COMPONENT.DS.'views'.DS.'registration'.DS.'view.html.php');
		$view = new socialnetworkingViewRegistration();

		$view->assign('fPMsg', $fPMsg);
		$view->display('frgpwdform');
		return true;
	
	}
	
	function newpwd()
	{
		global $mainframe;
	
		$userid=JRequest::getVar('userid');
		$emailid=JRequest::getVar('emailid');
		$model = $this->getModel('socialnetworking');
		
		if (empty($emailid) || empty($userid))
		{
   
		   $msg="Incomplete information." ;
		   $this->frgFrm($msg);
		   return false;		   
		}
		else if(!$model->validateUseridEmailid($userid, $emailid))
		{
			$msg="Invalid information." ;
			$this->frgFrm($msg);
			return false;	
		}
		else
		{	
			$newpwd= $this->random_text(8,false);
			if ($model->newpassword($userid, $emailid,$newpwd))
			{
				$message="New password has been sent to your email id";

				
				$sitename=$mainframe->getCfg('sitename');
				$mailfrom=$mainframe->getCfg('mailfrom');
				$fromname=$mainframe->getCfg('fromname');
				$siteURL=JURI::base();
			
				$subject=JText::_('New passwor for userid: ' ). $userid . " of ". $sitename;
				$subject= html_entity_decode($subject, ENT_QUOTES);
		
				$msg ="Hello " . $userid. ". Your new password for " .$sitename. " for social networking has been seted. ".
					" User-ID: ". $userid. "   Password: ". $newpwd;
				
				$msg= html_entity_decode($msg, ENT_QUOTES);
				JUtility::sendMail($mailfrom, $fromname, $emailid, $subject,$msg);
			
			}
			else
			{
				$message="Sorry unable to set a new for you. Please retry";
			}	
				
		}
		$link = JRoute::_('index.php?option=com_socialnetworking', false);
		$this->setRedirect($link, $message );
	}
	
	
	function login($urMsg=null,$usrPrf=null,$action=null)
	{
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (($sess->get('access','','sn')) && ($sess->get('userid','','sn')) && ($sess->get('clientip','','sn')==$clientIP))
		{
			$userid=$sess->get('userid','','sn');
			$model = $this->getModel('socialnetworking');
			if(!$usrPrf)
				$usrPrf=$userid;
			
			$logOnUsr=$sess->get('userid',null,'sn');
			//echo "Log on user=" . $logOnUsr. " <br/> userid=".$usrPrf;
			if ( strtoupper($logOnUsr) != strtoupper($usrPrf))
			{	
				//echo "hello";
				$askFrnd=$model->askAsFrnd($logOnUsr, $usrPrf);
			}
			else
			{
				$askFrnd=1;
			}
						
			$usrPrfData= $model->loadUserProfile($usrPrf);
			
			require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
			$view = new socialnetworkingViewLogin();
			
			if ( strtoupper($logOnUsr) == strtoupper($usrPrf))
			{	
				$reqFrndLst=$model->listOfRequetToMeForFriendship($userid);
				$view->assign('reqFrndLst',$reqFrndLst);
			}
				
			$view->assign('usrPrfData', $usrPrfData);
			$view->assign('urMsg', $urMsg);		
			$view->assign('askFrnd', $askFrnd);
			$view->display('usermain');
			$view->display('userprofile');
			
			if ($action)
			{
				switch($action)
				{
					
					case 1:
							$readPrfData=$model->loadProfileDataToRead($usrPrf);
							$view->assign('readPrfData',$readPrfData);
							$view->display('readProfile');
							break;
					case 2:
							$view->display('sndScrap');
							break;
					case 3:
							$readScrpData=$model->loadScrapDataToRead($usrPrf);
							$view->assign('readScrpData',$readScrpData);
							$view->display('readScrap');
							break;
							
					case 4:
							
							$frndLst=$model->loadFriendList($usrPrf);
							$view->assign('frndLst',$frndLst);
							$view->display('friendList');
							break;
				}
			}
			
			
			return true;
		}

		$userid=trim(JRequest::getVar('userid'));
		$password=JRequest::getVar('password');

		
		if(empty($userid) || empty($password))
		{
			$message="Invalid login information";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$model = $this->getModel('socialnetworking');

		if ($model->login($userid, $password))
		{

			if ($model->checkblock($userid))
			{
				$message="Your Account is not activated.<br/> First Activate it.";
				$link = JRoute::_('index.php?option=com_socialnetworking', false);
				$this->setRedirect($link, $message);
				return false;
			}
			else
			{
				$clientIP=sha1($_SERVER['REMOTE_ADDR']);
				
				$sess->set('access',1,'sn');
				$sess->set('clientip',$clientIP,'sn');
				$sess->set('userid',$userid,'sn');
				$model->lastvisit($userid);
				$usrPrf= $model->loadUserProfile($userid);
				
				$reqFrndLst=$model->listOfRequetToMeForFriendship($userid);
				
				require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
				$view = new socialnetworkingViewLogin();
				$view->assign('usrPrfData', $usrPrf);
				$view->assign('reqFrndLst',$reqFrndLst);
							
				$view->display('usermain');
				$view->display('userprofile');
			
				return true;
			}
		}
		else
		{
			$message="Invalid UserID or password.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}

	}
	
	function edtPrf($uEMsg=null)
	{
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','sn');
		
		$model=$this->getModel('socialnetworking');
		$edtUsrData=$model->loadUserProfile($userid);
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');

		$view = new socialnetworkingViewLogin();
		$view->assign('uEMsg', $uEMsg);
		$view->assign('edtUsrData', $edtUsrData);
		$view->display('usermain');
		$view->display('editProfile');
		return true;		
	}
	
	function saveUrgEdit()
	{
		
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','sn');
		
		
		$fname=trim(JRequest::getVar('firstname'));
		$lname=trim(JRequest::getVar('lastname'));
		$location=trim(JRequest::getVar('location'));
		$city=trim(JRequest::getVar('city'));
		$state=trim(JRequest::getVar('state'));
		
		$msg='';
		$flag=false;
		if (empty($fname))
		{
			$msg .='First name is empty.<br/>';
			$flag=true;
		}
		
		if (empty($lname))
		{
			$msg .='Last name is empty.<br/>';
			$flag=true;
		}
		
		if (empty($location))
		{
			$msg .='Location is empty.<br/>';
			$flag=true;
		}
		
		if (empty($city))
		{
			$msg .='City is empty. <br/>';
			$flag=true;
		}
		
		if (empty($state))
		{
			$msg .='State is empty.<br/>';
			$flag=true;
		}
		
		if($flag)
		{
			$this->edtPrf($msg);
			return true;
		}
		
		$data =JRequest::get('POST');
		
		$model = $this->getModel('SocialNetworking');
		$id=$model->loadProfileID($userid);
		
		$data['id']=$id->id;
		$data['userid']=$userid;
		
		if (!$model->saveprofile($data))
		{
			$this->edtPrf('There is problem to save your profile.<br/>Please Try.');
			return true;
		}
		
		if (!$this->fileupdload($userid))
		{
			$msgphoto="Error in photo uploading.<br/>";
		}
		
		$this->login('Your Profile saved. <br/>'.$msgphoto,null);
	}
	
	function hm()
	{
		//user home
		$this->login('',null);
	}
	
	function cp($cpMsg=null)
	{
		//change password Form
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','sn');
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');

		$view = new socialnetworkingViewLogin();
		$view->assign('cpMsg', $cpMsg);
		$view->display('usermain');
		$view->display('chngPwd');
		return true;		
	}
	
	function cngPwd()
	{
		//Change Password Action 
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','sn');
		
		$password= trim(JRequest::getVar('password'));
		$cpassword= trim(JRequest::getVar('cpassword'));
		
		$msg='';
		$flag=false;
		
		if (empty($password))
		{
			$msg .='Password is empty.<br/>';
			$flag=true;
		}
		
		if (empty($cpassword))
		{
			$msg .='Confirm-Password is empty.<br/>';
			$flag=true;
		}
		
		
		if (strlen($password) <6 )
		{
			$msg .='Password length cannot be less than 6 Character.<br/>';
			$flag=true;
		}
		
		if ($password != $cpassword)
		{
			$msg .='Both Password are not matching.<br/>';
			$flag=true;
		}
		
		if($flag)
		{
			$this->cp($msg);
			return false;
		}
		
		$model=$this->getModel('socialnetworking');
		
		if ($model->ChangePassword($password,$userid))
		{
			$this->login('Password Changed.',null);
			return true;
		}
		else
		{
			$this->cp('Unable to Change Password.');
			return false;
		}
		
	}
	
	function search($suMsg=null)
	{
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','sn');
		
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');

		$view = new socialnetworkingViewLogin();
		$view->assign('suMsg', $suMsg);
		$view->display('usermain');
		$view->display('searchUser');
		return true;		
	}
	
	function srcPrf()
	{
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','sn');
		
		$name=trim(JRequest::getVar('name'));
		$city =trim(JRequest::getVar('city'));
		$state=trim(JRequest::getVar('state'));
		
		if (empty($name) && empty($city) && empty($state))
		{
			$this->search('You must provide atleast one criteria.');
			return false;
		}
		
		$model=$this->getModel('socialnetworking');
		
		$searchdata = $model->searchProfile($name,$city,$state);
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');

		$view = new socialnetworkingViewLogin();
		$view->assign('searchdata', $searchdata);
		$view->display('usermain');
		$view->display('prfSearchResult');
		return true;		
		
	}
	
	function ldPrf()
	{
		//load user profile
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		
		$ldUsID=trim(JRequest::getVar('uid'));
		$model=$this->getModel('socialnetworking');
		
		$userFlag=$model->varfiyUser($ldUsID);
		
		if (empty($ldUsID) || !$userFlag)
		{
			$this->login('Profile not found.<br/>',null);
			return false;
		}
		$this->login('',$ldUsID);
		return false;
		
	}
					
	function userlogout()
	{
		$sess = & JFactory::getSession();
		
		$sess->set('access',null,'sn');
		$sess->set('userid',null,'sn');
		$sess->set('clientip',null,'sn');

		
		$message="Logout.";
		$link = JRoute::_('index.php?option=com_socialnetworking', false);
		$this->setRedirect($link, $message);
		return true;
		
	}

	function rdPrf()
	{
		//read user profile information
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		
		$ldUsID=trim(JRequest::getVar('uid'));
		$model=$this->getModel('socialnetworking');
		
		$userFlag=$model->varfiyUser($ldUsID);
		
		if (empty($ldUsID) || !$userFlag)
		{
			$this->login('Profile not found.<br/>',null);
			return false;
		}
		$this->login(null,$ldUsID,1);
		return false;
		
	}
	
	function sndScrp()
	{
		//loadind send scrap layout
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		
		$ldUsID=trim(JRequest::getVar('uid'));
		$model=$this->getModel('socialnetworking');
		
		$userFlag=$model->varfiyUser($ldUsID);
		
		if (empty($ldUsID) || !$userFlag)
		{
			$this->login('Profile not found to send scrap.<br/>',null);
			return false;
		}
		
		$sess = & JFactory::getSession();
		$sess->set('sendscrap',1,'sn');
		
		$this->login(null,$ldUsID,2);
		return false;		
	}
	
	function sendScarp()
	{
		//loadind send scrap layout
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		
		if(!($sess->get('sendscrap','','sn')))
		{
			$this->login(null,$ldUsID,2);
			return false;
		}
		$sender=$sess->get('userid','','sn');
		$recevier=trim(JRequest::getVar('recevier'));
		$model=$this->getModel('socialnetworking');
		
		$userFlag=$model->varfiyUser($recevier);
		
		if (empty($recevier) || !$userFlag)
		{
			$this->login('Profile not found to send scrap.<br/>',null);
			return false;
		}
		
		$scrap=trim(JRequest::getVar('scrap'));
		
		if (empty($scrap))
		{
			$this->login('Your Scrap is empty.<br/>Sending Fail.',$ldUsID,2);
			return false;		
		}
		
		$scrapData=JRequest::get('POST');
		$scrapData['sender']=$sender;
		$dateNow= new JDate();
		$scrapData['sdate']= $dateNow->toMySQL();
		
		if ($model->saveScrap($scrapData))
		{
		
			$senderEmailID=$model->getEmailID($sender);
			$recevierEmailID=$model->getEmailID($recevier);
		
			if($senderEmailID && $recevierEmailID)
			{
				$fname=$model->getFirstName($sender);
				global $mainframe;
				$sitename=$mainframe->getCfg('sitename');
				$mailfrom=$mainframe->getCfg('mailfrom');
				$fromname=$mainframe->getCfg('fromname');
				$siteURL=JURI::base();
				
			
				$subject=JText::_('Your scrapbook is writen by  '). $fname . " of  Social-Networking of ". $sitename;
				$subject= html_entity_decode($subject, ENT_QUOTES);
	
				$msg= html_entity_decode($scrap, ENT_QUOTES);
				JUtility::sendMail($senderEmailID, $fname, $recevierEmailID, $subject,$msg);
			}
			$sess->set('sendscrap',0,'sn');
			$this->login('Successfully your scrap has been sent.',$ldUsID,null);
			return false;		
		}
		else
		{
			$this->login('Unable to Send Scrap.<br/>Please retry.',$ldUsID,2);
			return false;		
		}
		
	}
	
	function rdScrp()
	{
		//loadind  scrap to read
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		
		$ldUsID=trim(JRequest::getVar('uid'));
		$model=$this->getModel('socialnetworking');
		
		$userFlag=$model->varfiyUser($ldUsID);
		
		if (empty($ldUsID) || !$userFlag)
		{
			$this->login('Profile not found to send scrap.<br/>',null);
			return false;
		}
		
		$sess = & JFactory::getSession();	
		
		$this->login(null,$ldUsID,3);
		return false;		
	}
	
	function chgScrpStatus()
	{
		//change scrap status 
		
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		
		$privatemsg=trim(JRequest::getInt('privatemsg'));
		$id=trim(JRequest::getInt('id'));
		$rec=trim(JRequest::getVar('rec'));
		
		
		
		$flag=false;
		$msg='';
		
		if($privatemsg!=0 && $privatemsg!=1)
		{
			$flag=true;
			$msg='Invalid Scrap Action.';
		}

		if(empty($id))
		{
			$flag=true;
			$msg='Invalid Scrap Action.';
		}	
		
		if(empty($rec))
		{
			$flag=true;
			$msg='Invalid Scrap Action.';
		}	
		
		if($flag)
		{
			$this->login($msg,null,null);
			return false;		
		}
		
		$model =$this->getModel('socialNetworking');
		
		if (!$model->chngScrpStatus($id,$privatemsg))
		{
			$this->login('Unable to Change Scrap Status',$rec,3);
			return false;		
		}
		else
		{
			$this->login('Scrap Status SucessFuly changed.',$rec,3);
			return false;		
		}	
		
	}
	
	function delScrp()
	{
		//delete scrap
		
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		
		$id=trim(JRequest::getInt('id'));
		$rec=trim(JRequest::getVar('rec'));
		
		
		
		$flag=false;
		$msg='';
		
		if(empty($id))
		{
			$flag=true;
			$msg='Invalid Scrap Action.';
		}	
		
		if(empty($rec))
		{
			$flag=true;
			$msg='Invalid Scrap Action.';
		}	
		
		if($flag)
		{
			$this->login($msg,null,null);
			return false;		
		}
		
		$model =$this->getModel('socialNetworking');
		
		if (!$model->delScrap($id))
		{
			$this->login('Unable to Delete Scrap.',$rec,3);
			return false;		
		}
		else
		{
			$this->login('Scrap deleted sucessFuly.',$rec,3);
			return false;		
		}
	
	}
	
	function askfrnd()
	{
		// ask for friend-ship
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		
		$uid=trim(JRequest::getVar('uid'));
		$logOnUser=$sess->get('userid',null,'sn');
		
		if (empty($uid))
		{
			$this->login('Asker profile not found.',null,null);
			return false;
		}
				
		$model=$this->getModel('socialNetworking');
		
		if(strtoupper($logOnUser) == strtoupper($uid))
		{
			$this->login('Unable to procced your request.',$uid,1);
			return false;
		}
		
		if($model->askAsFrnd($logOnUser, $userid))
		{
			$this->login('Unable to procced your request.',$uid,1);
			return false;
		}
		
		
		if(!$model->varfiyUser($uid))
		{
			$this->login('Asker profile not found.',null,null);
			return false;
		}
		
				
		if($model->requestForFriendship($logOnUser,$uid))
		{
			$this->login('Your request successfuly send.',$uid,null);
			return true;
		}
		else
		{
			$this->login('Unable to send your request.',$uid,null);
			return false;
		}
	}
	
	function acptFrd()
	{
	
		//accept as friends
		
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		
		$uid=trim(JRequest::getVar('uid'));
		$logOnUser=$sess->get('userid',null,'sn');
		$model = $this->getModel('socialNetworking');
		
		
		if (empty($uid))
		{
			$this->login('Asker profile not found.',null,null);
			return false;
		}
		if(!$model->askAsFrnd($logOnUser, $uid))
		{
			$this->login('Unable to procced your request.',null,null);
			return false;
		}
		
		if (!$model->checkForFrndship($logOnUser,$uid))
		{
			$this->login('This friend is already in you Friend list.',null,null);
			return false;
		}
		
		if(!$model->varfiyUser($uid))
		{
			$this->login('Asker profile not found.',null,null);
			return false;
		}
		
		if ( ($model->addFriend($uid, $logOnUser)) && ($model->addFriend($logOnUser, $uid)) && ($model->updateAskFriend($uid, $logOnUser, 1)))
		{
			$this->Login('Your request successfuly processed.',null,null);
			return true;
		}
		else
		{
			$this->Login('Unable to process your request.',null,null);
			return true;
		}
		
	}
	
	function ntAcptFrd()
	{
		//Not accept as friend
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		
		$uid=trim(JRequest::getVar('uid'));
		$logOnUser=$sess->get('userid',null,'sn');
		$model = $this->getModel('socialNetworking');
		
		
		if (empty($uid))
		{
			$this->login('Asker profile not found.',null,null);
			return false;
		}
		if($model->deleteUsrFor($uid, $logOnUser))
		{
			$this->login('Your request successfuly processed.',null,null);
			return true;
		}
		else
		{
			$this->login('Unable to process your request.',null,null);
			return true;
		}		
	}
	
	function frdLst()
	{
		//load friend-list
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);
		
		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		
		$uid=trim(JRequest::getVar('uid'));
		$model=$this->getModel('socialNetworking');
		if (empty($uid))
		{
			$this->login('Asker profile not found.',null,null);
			return false;
		}
		if(!$model->varfiyUser($uid))
		{
			$this->login('Asker profile not found.',null,null);
			return false;
		}
		else
		{
			$this->login(null,$uid,4);
			return true;
		}
	}
	function grp()
	{
		//group discussion
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		
		
		$userid = $sess -> get('userid',null,'sn');
		
		$model = $this ->getModel('socialNetworking');
		$myGrp = $model->getMyGrp($userid);
		
	
		
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');

		$view = new socialnetworkingViewLogin();
		$view->assign('myGrp', $myGrp);
		$view->display('usermain');
		$view->display('grpDisc');
		$view->display('grpMyGrp');
		return true;		
		
		return false;		
	}
	
	function newGrp()
	{
		// to load layout to create new group discussion 
		
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');

		$view = new socialnetworkingViewLogin();
		$view->display('usermain');
		$view->display('grpDisc');
		$view->display('crtNewGrp');
		return true;		
	}
	function crtGrp()
	{
		// create new group
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid = $sess->get('userid',null,'sn');	
		$grpName= trim(JRequest::getVar('grpName'));
		if (empty($grpName))
		{
			require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
			$view = new socialnetworkingViewLogin();
		
			$view->assign('urMsg','Group Discussion name cannot be empty.');
			$view->display('usermain');
			$view->display('grpDisc');
			$view->display('crtNewGrp');
			return true;		
		}
		
		$model=$this->getModel('socialnetworking');
		
		if ($model->duplicateGrp($grpName))
		{
			require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
			$view = new socialnetworkingViewLogin();

			$view->assign('urMsg','This group already created.Please enter another group.');
			$view->display('usermain');
			$view->display('grpDisc');
			$view->display('crtNewGrp');
			return true;		
		}
		
		$data = array();
		$data['createdby'] = $userid;
		$data['topic'] = $grpName;
		
		if ($model->createGroup($data))
		{
			require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
			$view = new socialnetworkingViewLogin();
			$view->assign('urMsg','Your new group is created.');
			$view->display('usermain');
			$view->display('grpDisc');
			$view->display('crtNewGrp');
			return true;		
		}
		else
		{
			require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
			$view = new socialnetworkingViewLogin();
			$view->assign('urMsg','Sorry, unable to create good.');
			$view->display('usermain');
			$view->display('grpDisc');
			$view->display('crtNewGrp');
			return true;		
		}
		
	}
	
	function myCGrp()
	{
		// load my created group
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid = $sess -> get('userid',null,'sn');
		
		$model = $this ->getModel('socialNetworking');
		$myGrp = $model->getMyGrp($userid);
		
	
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
		$view = new socialnetworkingViewLogin();
		$view->assign('myGrp', $myGrp);
		$view->display('usermain');
		$view->display('grpDisc');
		$view->display('grpMyGrp');
		return true;		
		
	}
	function discDtl($urMsg=null)
	{
		// load  group discussion details
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid = $sess -> get('userid',null,'sn');
		$id = JRequest::getVar('id'); 
		$model= $this->getModel(socialNetworking);
		if(empty($id))
		{
			require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
			$view = new socialnetworkingViewLogin();
			$view->assign('urMsg','Sorry, Invalid topic.');
			$view->display('usermain');
			$view->display('grpDisc');
			return true;		
		}
		else if (!$model->validateTopic($id))
		{
			require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
			$view = new socialnetworkingViewLogin();
			$view->assign('urMsg','Sorry, Invalid topic.');
			$view->display('usermain');
			$view->display('grpDisc');
			return true;		
		}
		

		$grpData = $model->loadGroupData($id);
		$grpTopicDtl = $model ->grpTopicDtl($id);
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
		$view = new socialnetworkingViewLogin();
		$view->assign('grpData',$grpData);
		$view->assign('grpTopicDtl',$grpTopicDtl);
		$view->assign('urMsg',$urMsg);
		$view->display('usermain');
		$view->display('grpDisc');
		$view->display('grpDiscDtl');
		return true;		
		
		
		
	}
	
	function addCmt()
	{
		// to add a new comment on group discussion
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid = $sess -> get('userid',null,'sn');
		$id = JRequest::getVar('gid'); 
		$model= $this->getModel(socialNetworking);
		
		if(empty($id))
		{
			require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
			$view = new socialnetworkingViewLogin();
			$view->assign('urMsg','Sorry, Invalid topic.');
			$view->display('usermain');
			$view->display('grpDisc');
			return true;		
		}
		else if (!$model->validateTopic($id))
		{
			require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
			$view = new socialnetworkingViewLogin();
			$view->assign('urMsg','Sorry, Invalid topic.');
			$view->display('usermain');
			$view->display('grpDisc');
			return true;		
		}
		
		$desc = trim(JRequest::getVar('discussion')); 
		
		if (empty($desc))
		{
			$this->discDtl("Comment cannot be empty.");
			return false;
		}
		if ($model->duplicateOnGroupDisc($desc))
		{
			$this->discDtl("Duplicate comment.");
			return false;
		}
		$data = JRequest::get('POST');
		$data['userid']= $userid;
		if ($model->addCmtOnGroupDisc($data))
		{
			$this->discDtl("Your Comment added.");
			return true;
		}
		else
		{
			$this->discDtl("Unable to add your comment.");
			return false;
		}
		
		
	}
	
	
	function myDisc()
	{
		// load my group where i added comments
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid = $sess -> get('userid',null,'sn');
		
		$model = $this ->getModel('socialNetworking');
		$myComntedGrp = $model->getMyCommentedGroupDisc($userid);
		
	
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
		$view = new socialnetworkingViewLogin();
		$view->assign('myComntedGrp', $myComntedGrp);
		$view->display('usermain');
		$view->display('grpDisc');
		$view->display('grpMyGrpDisc');
		return true;		
		
	}
	function srchGrp($urMsg=null)
	{
		//to load the group search layout
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
		$view = new socialnetworkingViewLogin();
		$view->assign('urMsg',$urMsg);
		$view->display('usermain');		
		$view->display('grpDisc');
		$view->display('grpSearch');
		return true;		
	}
		
	function searchGrp()
	{
		//to   search the groups
		$sess = & JFactory::getSession();
		$clientIP=sha1($_SERVER['REMOTE_ADDR']);

		if (!($sess->get('access','','sn')) || (!$sess->get('userid','','sn')) || ($sess->get('clientip','','sn') !=$clientIP))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_socialnetworking', false);
			$this->setRedirect($link, $message);
			return false;
		}
		
		$skey = trim(JRequest::getVar('searchKey'));
		
		if (empty($skey))
		{
			$this->srchGrp('Search key cannot be empty.');
			return false;
		}
		
		$model = $this->getModel('socialNetworking');
		
		$sresult = $model->searchGroup($skey);
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
		$view = new socialnetworkingViewLogin();
		$view->display('usermain');
		$view->assign('grpSrchResult',$sresult );
		$view->display('grpDisc');
		$view->display('grpSearch');
		$view->display('grpSrchGrpResult');
		return true;		
	}
	
	
}
?>