<?php
 
 /* 
	Blog Category Controller
	
 */

 // direct access not allowed 

defined('_JEXEC') or die ('Ristricted Access ');

 jimport('joomla.application.component.controller');

 class blogController extends JController
 {
	var $msg;
	var $flag;
	var $npmsg;
	var $mMsg;
		
	function __construct()
	{
		$this->msg='';
		$this->flag=false;
		$this->npmsg='';
		$this->mMsg='';
		parent::__construct();
	}

	function display($msg=null)
	{
	
		require_once (JPATH_COMPONENT.DS.'views'.DS.'blog'.DS.'view.html.php');
		$view = new blogViewBlog();	
		$view->assign('msg',$this->mMsg);		
		$view->display();
		return true;
	}
	 
	function registration()
	{
		$sess=& JFactory::getSession();
		$sess->set('captcha',null,'blog');
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'registration'.DS.'view.html.php');
		$view = new blogViewRegistration();
				
		$fileName=$this->random_text(5).'.png';
		
		$fpath=JPATH_ROOT.DS.'components'.DS.'com_blog'.DS.'assets'.DS.'captcha'.DS.$fileName;
		$private_key=substr(sha1($this->random_text(6)),0,6);
		$sess->set('captcha',$private_key,'blog');
		$this->make_captcha(true,$private_key,$fpath);
		$view->assign('fileName',$fileName);
		
		if ($this->flag)
			$view->assign('msg',$this->msg);
		
		$view->display("regfrm");
		$this->msg='';
		return true;
	}
	function userreg()
	{
		$this->_removeCaptchaFile();
		if ($this->_checkinfo())
			return false;
			
		
		$sess=& JFactory::getSession();
		$sess->set('captcha',null,'blog');
		
		global $mainframe;
		$userid=JRequest::getVar('userid');
		$username=JRequest::getVar('username');
		$password=JRequest::getVar('password');
		$emailid=JRequest::getVar('emailid');
		$data = JRequest::get('POST');
		$data['activation'] =sha1($this->random_text(8,false));




		$model = $this->getModel('blog');

		if (!$model->saveuser($data,true))
		{
			$this->msg .='There is error in savind infomation.<br/>Please retry.<br/ >';
			$this->flag=true;
			$this->registration();
			return false;
		}

	
		
		if (!$this->fileupdload($userid))
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
		$acode=$data['activation'];
		
		$subject=JText::_('Blogging Account Detail for '). $name . " of ". $sitename;
		$subject= html_entity_decode($subject, ENT_QUOTES);

		

		$alink=JRoute::_($siteURL."index.php?option=com_blog&task=activate&activation=".$acode."&userid=".$userid, false);
		$clink = JRoute::_($siteURL,false);
		$msg ="Hello " . $userid. " .Thank you for registering at ".$sitename. " for Blogging System. Your account is created and must be activated ". 
			" before you can use it. To activate the account click on the following link or copy-paste it in your browser " .
			" <a href='". $alink ."'> " .$alink. "</a>. After activation you may login to the ".$siteURL ." using the ".
			" username and password username : ".$userid . " and password : ". $password ;
		echo $msg;	
		$msg= html_entity_decode($msg, ENT_QUOTES);
		JUtility::sendMail($mailfrom, $fromname, $emailid, $subject,$msg);

		
		$this->setRedirect(JRoute::_('index.php?option=com_blog'),$message);
		
	}
	function activate()
	{
		$acode = JRequest::getVar('activation' );
		$userid=JRequest::getVar('userid');
		$model = $this->getModel('blog');

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

		$link = JRoute::_('index.php?option=com_blog', false);
		 $this->setRedirect($link, $message);
	}
	
	function _removeCaptchaFile()
	{
		
		jimport('joomla.filesystem.folder');
		jimport('joomla.filesystem.file');
			
		$fpath=JPATH_ROOT.DS.'components'.DS.'com_blog'.DS.'assets'.DS.'captcha';
		if (JFolder::exists($fpath))
		{
			$files=JFolder::files($fpath);
			
			for($i=0, $n=count($files); $i<$n; $i++)
			{
				$pathToFile=$fpath.DS.$files[$i];
				
				if (JFile::exists($pathToFile))
				{
					if(JFile::delete($pathToFile))
					{}
					
				}
					
			}
		}
		
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
				$model = $this->getModel('blog');
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
	
	
	function _checkinfo()
	{
		$userid=JRequest::getVar('userid');
		$username=JRequest::getVar('username');
		$password=JRequest::getVar('password');
		$cpassword =JRequest::getVar('cpassword');
		$emailid=JRequest::getVar('emailid');
		$location=JRequest::getVar('location');
		$city=JRequest::getVar('city');
		$state=JRequest::getVar('state');
		$captcha=JRequest::getVar('captcha');
		
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
		
		if (empty($location) || strlen(trim($location))==0)
		{
			$this->msg .='Your Location is empty <br/ >';
			$this->flag=true;
		}
		
		if (empty($city) || strlen(trim($city))==0)
		{
			$this->msg .='Your City is empty <br/ >';
			$this->flag=true;
		}
			
		if (empty($state) || strlen(trim($state))==0)
		{
			$this->msg .='Your State is empty <br/ >';
			$this->flag=true;
		}
		
		if (empty($captcha) || strlen(trim($captcha))==0)
		{
			$this->msg .='Image-Text is empty <br/ >';
			$this->flag=true;
		}
		
		if ($this->flag)
		{
		  $this->registration();
		  return true;
		}
		
		 $model = $this->getModel('blog');

		if (!$model->validemail($emailid))
		{
			$this->msg .='Email-ID is not valid.<br/ >';
			$this->flag=true;
		}
		
		if ($model->duplicateemailid($emailid))
		{
			$this->msg .='This Email-ID is aleady registered.<br/ >';
			$this->flag=true;
		}

		if ($model->duplicateuserid($userid))
		{
			$this->msg .='This user is aleady registered.<br/ >';
			$this->flag=true;
		}
		$sess=& JFactory::getSession();
		$cap=$sess->get('captcha',null,'blog');	
		
		if (strtolower($cap) !=strtolower($captcha))
		{
			$this->msg .='Invalid Image-Text.<br/ >';
			$this->flag=true;
		}	
		
		if ($this->flag)
		{
		  $this->registration();
		  return true;
		}

		return false;
	}
		
	function make_captcha($noise=true,$private_key,$fpath) 
	{
		$font_file=JPATH_ROOT.DS.'components'.DS.'com_blog'.DS.'assets'.DS.'Dustismo.ttf';
		
		
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
	
	function frgFrm()
	{
	
     	require_once (JPATH_COMPONENT.DS.'views'.DS.'registration'.DS.'view.html.php');
		$view = new blogViewRegistration();

		$view->assign('msg', $this->npmsg);
		$view->display('frgpwdform');
		return true;
	
	}
	
	function newpwd()
	{
		global $mainframe;
	
		$userid=JRequest::getVar('userid');
		$emailid=JRequest::getVar('emailid');
		$model = $this->getModel('blog');
		
		if (empty($emailid) || empty($userid))
		{
   
		   $this->npmsg="Incomplete information." ;
		   $this->frgFrm();
		   return false;		   
		}
		else if(!$model->validateUseridEmailid($userid, $emailid))
		{
			$this->npmsg="Invalid information." ;
			$this->frgFrm();
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
		
				$msg ="Hello " . $userid. ". Your new password for " .$sitename. " for bloging system has been seted. ".
					" User-ID: ". $userid. "   Password: ". $newpwd;
				
				$msg= html_entity_decode($msg, ENT_QUOTES);
				JUtility::sendMail($mailfrom, $fromname, $emailid, $subject,$msg);
			
			}
			else
			{
				$message="Sorry unable to set a new for you. Please retry";
			}	
				
		}
		$link = JRoute::_('index.php?option=com_blog', false);
		$this->setRedirect($link, $message );
	}
	
	function login()
	{
		$sess = & JFactory::getSession();

		if (($sess->get('access','','blog')) && ($sess->get('userid','','blog')))
		{
			$userid=$sess->get('userid','','blog');
			$model = $this->getModel('blog');
			$deskData= $model->blogDeskData($userid);
			
			require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
			$view = new blogViewLogin();
			$view->assign('data', $data);
			$view->assign('deskData', $deskData);
			
			$view->display('user');
			$view->display('deskboard');
			
			return true;
		}

		$userid=trim(JRequest::getVar('userid'));
		$password=JRequest::getVar('password');

		
		if(empty($userid) || empty($password))
		{
			$message="Invalid login information";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$model = $this->getModel('blog');

		if ($model->login($userid, $password))
		{

			if ($model->checkblock($userid))
			{
				$message="Your Account is not activated.<br/> First Activate it.";
				$link = JRoute::_('index.php?option=com_blog', false);
				$this->setRedirect($link, $message);
				return false;
			}
			else
			{
				
				$sess->set('access',1,'blog');
				$sess->set('userid',$userid,'blog');
				$model->lastvisit($userid);
				$deskData= $model->blogDeskData($userid);
		
				require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
				$view = new blogViewLogin();
				$view->assign('deskData', $deskData);
							
				$view->display('user');
				$view->display('deskboard');
			
				return true;
			}
		}
		else
		{
			$message="Invalid UserID or password.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}

	}
	
	function writeblg($smsg=null,$sdata=null)
	{
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','blog')) || (!$sess->get('userid','','blog')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','blog');

		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');

		$view = new blogViewLogin();
		$view->assign('smsg', $smsg);
		$view->assign('sdata', $sdata);
		$view->display('user');
		$view->display('writeblg');
		return true;
	}
	
	function saveblg()
	{
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','blog')) || (!$sess->get('userid','','blog')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','blog');
		$topic = trim(JRequest::getVar('topic'));
		$blog=JRequest::getVar( 'blog', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		
		
		if (empty($topic))
		{
			$data->topic=$topic;
			$data->blog=$blog;
			$smsg ="Topic is empty.";
			$this->writeblg($smsg,$data);
			return false;
		}	
			
		$model =$this->getModel('blog');
		$data=JRequest::get('POST');
		$data['blog'] = JRequest::getVar( 'blog', '', 'POST', 'string', JREQUEST_ALLOWRAW );
		$data['userid']=$userid;
		if ($model->saveBlog($data)) 
			$smsg="Blog Saved.";
		else
			$smsg ="Unable to save blog";
		
		$this->writeblg($smsg);
		
		return true;
	}
	function dskbrd()
	{
		$this->login();
	}	
	
	function mngblg($mngMsg=null)
	{
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','blog')) || (!$sess->get('userid','','blog')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','blog');
		$model=$this->getModel('blog');
		$mngData=$model->getBlogs($userid);
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');

		$view = new blogViewLogin();
		$view->assign("mngData",$mngData);
		$view->assign("mngMsg",$mngMsg);
		$view->display('user');
		$view->display('mnsblg');
		return true;
	}
	
	function mngblgRd()
	{
		//user blog read
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','blog')) || (!$sess->get('userid','','blog')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','blog');
		$id=trim(JRequest::getVar('di'));
		if (empty($id))
		{
			$this->mngblg("Data not Found."); 
			return false;
		
		}
			
		$model=$this->getModel('blog');
		$mngReadData=$model->getBlogsToRead($userid,$id);
		if (!count($mngReadData))
		{
			$this->mngblg("Data not Found."); 
			return false;
		}
		
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');

		$view = new blogViewLogin();
		$view->assign("mngReadData",$mngReadData);
		$view->display('user');
		$view->display('mnsblgRead');
		return true;
		
	}
	
	function mngblgEd()
	{
		//user blog edit
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','blog')) || (!$sess->get('userid','','blog')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','blog');
		$id=trim(JRequest::getVar('di'));
		if (empty($id))
		{
			$this->mngblg("Data not Found."); 
			return false;
		
		}
			
		$model=$this->getModel('blog');
		$mngReadData=$model->getBlogsToRead($userid,$id);
		if (!count($mngReadData))
		{
			$this->mngblg("Data not Found."); 
			return false;
		}
		else
		{
			$this->writeblg(null,$mngReadData);
			return true;
		}
	}
	
	function mngblgDd()
	{
		//user blog delete
		
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','blog')) || (!$sess->get('userid','','blog')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','blog');
		$id=trim(JRequest::getVar('di'));
		if (empty($id))
		{
			$this->mngblg("Data not Found."); 
			return false;
		
		}
			
		$model=$this->getModel('blog');
		
		if ($model->deleteBlog($userid,$id))
		{
			$this->mngblg("Data is delete."); 
			return false;
		}
		else
		{
			$this->mngblg("Unable to data is delete."); 
			return true;
		}
		
	}
	
	function mngblgPb()
	{
		//user blog Publish
		
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','blog')) || (!$sess->get('userid','','blog')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','blog');
		$id=trim(JRequest::getVar('di'));
		if (empty($id))
		{
			$this->mngblg("Data not Found."); 
			return false;
		
		}
			
		$model=$this->getModel('blog');
		
		if ($model->publishBlog($userid,$id,1))
		{
			$this->mngblg("Blog is Published."); 
			return false;
		}
		else
		{
			$this->mngblg("Unable  to Publish blog."); 
			return true;
		}
	}
	
	function mngblgUpb()
	{
		//user blog UnPublish
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','blog')) || (!$sess->get('userid','','blog')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','blog');
		$id=trim(JRequest::getVar('di'));
		if (empty($id))
		{
			$this->mngblg("Data not Found."); 
			return false;
		
		}
			
		$model=$this->getModel('blog');
		
		if ($model->publishBlog($userid,$id,0))
		{
			$this->mngblg("Blog is Un-Published."); 
			return false;
		}
		else
		{
			$this->mngblg("Unable to Un-Publish blog."); 
			return true;
		}
	}
	
	function cmt($mngCmtMsg=null)
	{
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','blog')) || (!$sess->get('userid','','blog')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','blog');
		$model=$this->getModel('blog');
		$cmtData=$model->getComnt($userid);
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');

		$view = new blogViewLogin();
		$view->assign("cmtData",$cmtData);
		$view->assign("mngCmtMsg",$mngCmtMsg);
		$view->display('user');
		$view->display('mngCmt');
		return true;
	}
	
	function mngCmtRd()
	{
		
		//read user Comments
		
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','blog')) || (!$sess->get('userid','','blog')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','blog');
		$id=trim(JRequest::getVar('di'));
		if (empty($id))
		{
			$this->cmt("Data not Found."); 
			return false;
		
		}
			
		$model=$this->getModel('blog');
		$mngCmtReadData=$model->getCmtToRead($userid,$id);
		if (!count($mngCmtReadData))
		{
			$this->cmt("Data not Found."); 
			return false;
		}
		
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');

		$view = new blogViewLogin();
		$view->assign("mngCmtReadData",$mngCmtReadData);
		$view->display('user');
		$view->display('mngCmtRead');
		return true;
		
	}	
	
	function mngCmtEd($mngCmtEditMsg=null)
	{
		//edit user Comments
		
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','blog')) || (!$sess->get('userid','','blog')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','blog');
		$id=trim(JRequest::getVar('di'));
		if (empty($id))
		{
			$this->cmt("Data not Found."); 
			return false;
		
		}
			
		$model=$this->getModel('blog');
		$mngCmtReadData=$model->getCmtToRead($userid,$id);
		if (!count($mngCmtReadData))
		{
			$this->cmt("Data not Found."); 
			return false;
		}
		else
		{
			
			require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
			
			$view = new blogViewLogin();
			$view->assign("mngCmtReadData",$mngCmtReadData);
			$view->assign("mngCmtEditMsg",$mngCmtEditMsg);
			$view->display('user');
			$view->display('msgCmtEdit');
			
			return true;
		}
	}
	function saveEditCmt()
	{
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','blog')) || (!$sess->get('userid','','blog')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','blog');
		$id=trim(JRequest::getVar('di'));
		if (empty($id))
		{
			$this->cmt("Data not Found."); 
			return false;
		
		}
		
		
		$cname=trim(JRequest::getVar('cname'));
		$comment=trim(JRequest::getVar('comment'));
		$msg='';
		$flag=false;
		if (empty($cname))
		{
			$msg .='Comment by cannot be empty.<br/>';
			$flag=true;
		}
		
		if (empty($comment))
		{
			$msg .='Comment  cannot be empty.<br/>';
			$flag=true;
		}
		
		if ($flag)
		{
			$this->mngCmtEd($msg);
			return false;
		}
			
		
		$model=$this->getModel('blog');
		$data=JRequest::get('POST');
		
		
		if($model->SaveEditCmt($data))
		{
			$this->mngCmtEd('Your Data is saved');
			return true;
		}
		else
		{
			$this->mngCmtEd('Unable to save your data');
			return true;
		}
	
	}
	
	function mngCmtDd()
	{
		//Delete user Comments
		
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','blog')) || (!$sess->get('userid','','blog')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','blog');
		$id=trim(JRequest::getVar('di'));
		if (empty($id))
		{
			$this->cmt("Data not Found."); 
			return false;
		
		}
			
		$model=$this->getModel('blog');
		
		if ($model->deleteCmt($userid,$id))
		{
			$this->cmt("Data is delete."); 
			return false;
		}
		else
		{
			$this->cmt("Unable to data is delete."); 
			return true;
		}
	}
	
	function mngCmtPb()
	{
		//Publish user Comments
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','blog')) || (!$sess->get('userid','','blog')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','blog');
		$id=trim(JRequest::getVar('di'));
		if (empty($id))
		{
			$this->cmt("Data not Found."); 
			return false;
		
		}
			
		$model=$this->getModel('blog');
		
		if ($model->publishCmt($userid,$id,1))
		{
			$this->cmt("Comment is Published."); 
			return false;
		}
		else
		{
			$this->cmt("Unable  to Publish Comment."); 
			return true;
		}
	}
	
	function mngCmtUpb()
	{
		//UnPublish User Comments
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','blog')) || (!$sess->get('userid','','blog')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','blog');
		$id=trim(JRequest::getVar('di'));
		if (empty($id))
		{
			$this->cmt("Data not Found."); 
			return false;
		
		}
			
		$model=$this->getModel('blog');
		
		if ($model->publishCmt($userid,$id,0))
		{
			$this->cmt("Comment is Un-Published."); 
			return false;
		}
		else
		{
			$this->cmt("Unable  to Un-Publish Comment."); 
			return true;
		}
	}
	
	function cp($cpMsg=null)
	{
		//change user password
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','blog')) || (!$sess->get('userid','','blog')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','blog');
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
			
		$view = new blogViewLogin();
		$view->assign("cpMsg",$cpMsg);
		
		$view->display('user');
		$view->display('cngpwd');
			
		return true;
	}	
	
	function chgPwd()
	{
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','blog')) || (!$sess->get('userid','','blog')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','blog');
		
		$password=trim(JRequest::getVar('password'));		
		$cpassword=trim(JRequest::getVar('cpassword'));
		
		$msg='';
		$flag='';
		if (empty($password))
		{
			$msg .='Password is empty.<br/>';
			$flag=true;
		}
		
		if(empty($cpassword))
		{
			$msg .='Confirm-Password is empty.<br/>';
			$flag=true;
		}
		
		if ($password!=$cpassword)
		{
			$msg .='Both passwords are not matching.<br/>';
			$flag=true;
		}
		
		if ($flag)
		{
			$this->cp($msg);
			return false;
		}
		
		$model = $this->getModel('blog');
		
		if ($model->ChangePassword($password,$userid))
		{
			$this->cp('Password Changed.');
			return true;
		}		
		else
		{
			$this->cp('Unable to Change password');
			return false;
		}
		
	}
	
	function eprfl($epMsg=null)
	{
		//edit user profile
		
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','blog')) || (!$sess->get('userid','','blog')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','blog');
		$model = $this->getModel('blog');
		$prf=$model->loadUserProfile($userid);
		
		if(!count($prf))
		{
			$this->login();
			return false;
		}
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'login'.DS.'view.html.php');
			
		$view = new blogViewLogin();
		$view->assign("epMsg",$epMsg);
		$view->assign("prf",$prf);
		
		$view->display('user');
		$view->display('editPrf');
			
		return true;
	}
	
	function savePrf()
	{
		$sess = & JFactory::getSession();
		if (!($sess->get('access','','blog')) || (!$sess->get('userid','','blog')))
		{
			$message="Your session expired.";
			$link = JRoute::_('index.php?option=com_blog', false);
			$this->setRedirect($link, $message);
			return false;
		}
		$userid=$sess->get('userid','','blog');
		
		$username=JRequest::getVar('username');
		$location=JRequest::getVar('location');
		$city=JRequest::getVar('city');
		$state=JRequest::getVar('state');
		
		
		$msg='';
		$flag=false;
			
		if (empty($username) || strlen(trim($username))==0)
		{
			$msg.='User-Name is empty <br/ >';
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
		
		if($flag)
		{
			$this->eprfl($msg);
			return false;
		}
		
		$model= $this->getModel('blog');
		$id=$model->getUserID($userid);
		
		if (!count($id))
		{
			$this->eprfl('Invalid User');
			return false;
		}
		
		$data=JRequest::get('POST');
		$data['id']=$id->id;
		$data['published'] =1;
		
		$model = $this->getModel('blog');
	
		if (!$model->saveuser($data,false))
		{	
			$this->eprfl('Unable to process Save.');
			return false;
		}

	
		
		if ($_FILES['photo'] && !$this->fileupdload($userid))
		{
			$this->eprfl('Unable to update your photo.');
			return false;
		}
		
		$this->eprfl('Your information saved.');
		return false;
	
	}
	function userlogout()
	{
		$sess = & JFactory::getSession();
		
		$sess->set('access',null,'blog');
		$sess->set('userid',null,'blog');

		
		$message="Logout.";
		$link = JRoute::_('index.php?option=com_blog', false);
		$this->setRedirect($link, $message);
		return true;
		
	}
}
?>	