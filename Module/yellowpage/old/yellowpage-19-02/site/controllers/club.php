<?php
 
 /* 
	yellow page Club Controller
	
 */


 // direct access not allowed 

 defined ('_JEXEC') or die ('Ristricted Access');

 jimport('joomla.application.component.controller');

 class yellowpageControllerClub extends JController
 {
		
		var $_flag=0;
		

	function __construct()
	{
		$this->_flag=0;

		parent::__construct();


		$this->registerTask('info','info');
		$this->registerTask('submit','submit');
		
	}

	
	function info()
	{

		JRequest::setVar('view','clubinfo');
		JRequest::setVar('layout','default');
		$this->_flag=1;
		
		$this->display();

	}
	
	function saveinfo()
	{
		
		$sess	=& JFactory::getSession();
		
		$scode	= JRequest::getVar( 'scode','','post' );
		$clubname = JRequest::getVar( 'clubname','','post' );
		$location	= JRequest::getVar( 'location','','post' );
		$city	= JRequest::getVar( 'city','','post' );
		$state	= JRequest::getVar( 'state','','post' );
		$emailid	= JRequest::getVar( 'emailid','','post' );

		if (!$scode || !$clubname || !$location || !$city || !$state || !$emailid )
		{
			$msg ="Please provide the complite information ";
			$link = JRoute::_('index.php?option=com_yellowpage&controller=club&task=add', false);
			$this->setRedirect($link, $msg);
			return false;	
		}
		
		if (strtoupper($scode) != strtoupper($sess->get('scode',null,'clubadd')))
		{
	
			$this->_err=1;
			$msg="Security code is invalid.";
			$link = JRoute::_('index.php?option=com_yellowpage&controller=club&task=add', false);
			$this->setRedirect($link, $msg);
			return false;
		}

		$data = JRequest::get('POST');
		$data['yid']=1;
		$data['addedby']=$_SERVER['REMOTE_ADDR'];
	
		
		$model = $this->getModel('club');

		if ($model->save($data))
		{
			$message =JText::_('Club Information Saved'); 
		}
		else
		{
			$message= JText::_('Club Information Save Failed');
			$message .= ' ['. $model->getError() .']';
		}
		$this->setRedirect('index.php?option=com_yellowpage&controller=club', $message );

	}
	
	function add()
	{
		JRequest::setVar('view','clubadd');
		JRequest::setVar('layout','default');
		$this->_flag=1;
		
		$this->display();
	}
		
	
	 function display()
	 {
		
		 	
		 if ($this->_flag==0)
		 {
			 JRequest::setVar('view','club');
		 }

		 $this->_flag=0;

		 parent::display();
		
	 }
	 



	


	function submit()
	{

		global $mainframe;
		
		$db			= & JFactory::getDBO();
		$sess	=& JFactory::getSession();
		$SiteName	= $mainframe->getCfg('sitename');

		$default	= JText::sprintf( 'MAILENQUIRY', $SiteName );
		$clubId		= JRequest::getInt( 'id',0,'post' );
		$sendername	= JRequest::getVar( 'sendername','','post' );
		$emailid	= JRequest::getVar( 'emailid','','post' );
		$msgsubject	= JRequest::getVar( 'msgsubject',$default,'post' );
		$body		= JRequest::getVar( 'message',	'','post' );
		$emailCopy	= JRequest::getInt( 'chkemail', 0,'post' );
		$scode = strtoupper(JRequest::getVar('scode','','post'));
	
		$this->_row =$clubID;
		
		$model= &$this->getModel('club');

		$club= $model->getClubVal( $clubId);

			

		jimport('joomla.mail.helper');
		if (!$emailid || !$body || (JMailHelper::isEmailAddress($emailid) == false)|| !$scode)
		{
			$this->_err=1;
			//$this->setError(JText::_('Email Form are not complete.'));
			$msg="Email Form are not complete.";
			$link = JRoute::_('index.php?option=com_yellowpage&controller=club&task=info&row='.$clubId, false);
			$this->setRedirect($link, $msg);
			return false;
		}
		
		if ($scode != strtoupper($sess->get('scode',null,'club')))
		{
			$this->_err=1;
			$msg="Security code is invalid.";
			$link = JRoute::_('index.php?option=com_yellowpage&controller=club&task=info&row='.$clubId, false);
			$this->setRedirect($link, $msg);
			return false;
		}


	

		// Input validation
		
			$MailFrom 	= $mainframe->getCfg('mailfrom');
			$FromName 	= $mainframe->getCfg('fromname');



			// Prepare email body
			$prefix = JText::sprintf('ENQUIRY_TEXT', JURI::base());
			$body 	= $prefix."\n".$sendername.' <'.$emailid.'>'."\r\n\r\n".stripslashes($body);
			$body 	= $prefix."  ".$sendername.' <'.$emailid.'>'."  ".stripslashes($body);
	
			$mail = JFactory::getMailer();

			$mail->addRecipient( $ed->emailid );
			$mail->setSender( array( $emailid, $sendername ) );
			$mail->setSubject( $FromName.': '.$msgsubject );
			$mail->setBody( $body );

			$sent = $mail->Send();


	

			$params = new JParameter( $club->params );
			$emailcopyCheck = $params->get( 'show_email_copy', 0 );

			
			if ( $emailCopy && $emailcopyCheck )
			{
				$copyText 		= JText::sprintf('Copy of:', $club->clubname, $SiteName);
				$copyText 		.= "\r\n\r\n".$body;
				$copySubject 	= JText::_('Copy of:')." ".$msgsubject;

				$mail = JFactory::getMailer();

				$mail->addRecipient( $emailid );
				$mail->setSender( array( $MailFrom, $FromName ) );
				$mail->setSubject( $copySubject );
				$mail->setBody( $copyText );

				$sent = $mail->Send();
			}
		$msg = JText::_( 'Thank you for your e-mail');
		$link = JRoute::_('index.php?option=com_yellowpage&controller=club', false);
		$this->setRedirect($link, $msg);
		
	}


				
}
?>



