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
		
	function __construct()
	{
		$this->msg='';
		$this->flag=false;
		parent::__construct();
	}

	function display($msg=null)
	{
	
		require_once (JPATH_COMPONENT.DS.'views'.DS.'blog'.DS.'view.html.php');
		$view = new blogViewBlog();		
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

		if (!$model->saveuser($data))
		{
			$this->msg .='There is error in savind infomation.<br/>Please retry.<br/ >';
			$this->flag=true;
			$this->registration();
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
	
	function fileupdload()
	{
		$userid= JRequest::getVar('userid');
		
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
	
	}

	
}
?>	