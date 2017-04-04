<?php 

defined('_JEXEC') or die( 'Restricted access' );
  session_start();
jimport('joomla.application.component.controller');
jimport ('joomla.mail.helper');
jimport('joomla.utilities.date');


class lgControllerLogin extends JController
{
  
  function __construct()
  {
	parent::__construct();
  }
function display()
{
	parent::display();
}

   function newuser() 
  {	
		JRequest::setVar('view','login');
		JRequest::setVar('layout','form');

		$this->_flag=1;
		$this->display();
   }

 function forgetpwd()
   {
     JRequest::setVar('view','login');
     JRequest::setVar('layout','newpwdform');
     $this->display();
    }
	
function newpassword()
{
  $userid=JRequest::getVar('userid');
  $emailid=JRequest::getVar('emailid');
   $model = $this->getModel('login');
 $_SESSION['captcha']="good";
  ?>
<script language="javascript">
 alert("<?php echo  $_SESSION['captcha'] ; ?>");
</script>
<?php

  if (!$model->varifyInfo($userid, $emailid))
   {
   $message ="Invalid informaiton . "; 
   }
   else
   {
	$newpwd= $this->_randomText(8);
	echo $newpwd;
;     if ($model->newpassword($userid, sha1($newpwd)))
           $message="Your new password is send to your emailid " ;
     else
		  $message=" Error in creating new password" ;
  }


// $link = JRoute::_('index.php?option=com_lg&task=forgetpwd', false);
 //$this->setRedirect($link, $message);
   
}

function activate()
{

 $acode = JRequest::getVar('activation' );
 $userid=JRequest::getVar('userid');
 $model = $this->getModel('login');

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

 $link = JRoute::_('index.php?option=com_lg&task=login', false);
 $this->setRedirect($link, $message);
   }

 function register()
 { 
 global $mainframe;
  $pwd1 = JRequest::getVar("password" );
  $pwd2 = JRequest::getVar("cpassword");
  $emailid = JRequest::getVar("emailid");
  $userid = JRequest::getVar("userid");
  $username = JRequest::getVar("username");
  

 if (empty ($pwd1) or empty($pwd2) or empty($emailid) or empty($userid) or empty($username)  ) 
  { 
    $msg="Please Provide the Complete information. ";
    $link = JRoute::_('index.php?option=com_lg&task=newuser', false);
   $this->setRedirect($link, $msg);
   return false;
   }

   if ($pwd1 != $pwd2 )
   {
    $msg="Both Password are not matching " ;
    $link = JRoute::_('index.php?option=com_lg&task=newuser', false);
    $this->setRedirect($link, $msg);
     return false;
    }
  
   if (!JMailHelper::isEmailAddress($emailid))
  {
	
	$msg="Please provide a valid EmailID " ;
	$link = JRoute::_('index.php?option=com_lg&task=newuser', false);
	$this->setRedirect($link,$msg);
	return false;

  }

   $model = $this->getModel('login');
  
  if ($model->getDuplicateUser($userid))
   {
   	$msg="Duplicate UserID found" ;
	$link = JRoute::_('index.php?option=com_lg&task=newuser', false);
	$this->setRedirect($link,$msg);
	return false;
  }
 
 if ($model->getDuplicateEmailID($emailid))
 {
  	$msg="Duplicate Email-ID found" ;
	$link = JRoute::_('index.php?option=com_lg&task=newuser', false);
	$this->setRedirect($link,$msg);
	return false;
}

	$dateNow= new JDate();

	$data = JRequest::get('POST');
	$data['registrationdate'] = $dateNow->toMySQL();
	$data['activation'] =sha1($this->_randomText(8));
	$acode=$data['activation'];
	

	if ($model->save($data))
	{
		$message =JText::_('Your Information Saved'); 
		$sitename=$mainframe->getCfg('sitename');
		$mailfrom=$mainframe->getCfg('mailfrom');
		$fromname=$mainframe->getCfg('fromname');
		$siteURL=JURI::base();
		$name=$data['username'];
		$userid=$data['userid'];
		$password=$data['password'];

		$subject=JText::_('Account Detail for '). $name . " of ". $sitename;
		$subject= html_entity_decode($subject, ENT_QUOTES);

		//$msg=sprintf(JText::_('SEND_MSG_ACTIVATE', $name, $sitename, $siteURL."index.php?option=com_lg&task=activate&activation=".$acode."&userid=".$userid, $siteURL,$userid,$password));
		$alink=JRoute::_($siteURL."index.php?option=com_lg&task=activate&activation=".$acode."&userid=".$userid, false);
		$clink = JRoute::_($siteURL,false);
		$msg ="Hello " . $userid. " .Thank you for registering at ".$sitename. ". Your account is created and must be activated ". 
			" before you can use it. To activate the account click on the following link or copy-paste it in your browser " .
			" <a href='". $alink ."'> " .$alink. "</a>. After activation you may login to the ".$siteURL ." using the ".
			" username and password username : ".$userid . " and password : ". $password ;
			
		echo $msg;
		$msg= html_entity_decode($msg, ENT_QUOTES);
		JUtility::sendMail($mailfrom, $fromname, $emailid, $subject,$msg);

		
		
	}
	else
	{
		$message= JText::_('Your Inforamtion save failed');
		$message .= ' ['. $model->getError() .']';
	}

	



	$link = JRoute::_('index.php?option=com_lg',false);


	//$this->setRedirect($link, $message );




}

 
 
  function login()
  {
    $userid=JRequest::getVar("userid");
    $pwd= JRequest::getVar("pwd");
    $model = $this->getModel('login');

   if (empty($userid) || empty($pwd) )
   { 
		$msg="Please provide the complete Login infomation" ;
  }
  else
 {

      if (!$model->log($userid, $pwd))
    {
 

        $msg="Invalid user information ";
    }
    else
  {
		$msg="Valid user ";
  		
   }
	}
 $link = JRoute::_('index.php?option=com_lg&controller=lg', false);
   $this->setRedirect($link, $msg);
   }

   function _randomText($length = 8) {
    // Declare a blank string to start from
    $txt = '';

    // Now loop for as many times as the length
    for ($i = 0; $i < $length; $i++) {
        // For this character, first give an equal chance of upper,lower,num
        switch (rand(0,2)) {
            case 0:
                // Generate a Number from 0 to 9
                $txt .= rand(0,9);
                break;
            case 1:
                // Generate a letter from A to Z via ascii values 65 to 90
                $txt .= chr(rand(65,90));
                break;
            default:
                // Instead use a letter from a to z, via ascii 97 to 122
                $txt .= chr(rand(97,122));
        }
    }

    return $txt;
}

   }