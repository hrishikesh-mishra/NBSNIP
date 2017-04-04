<?php
 
 /* 
	Developer Zone Controller
	
 */

 // direct access not allowed 

defined('_JEXEC') or die ('Ristricted Access ');

 jimport('joomla.application.component.controller');

 class developerzoneController extends JController
 {
		
		
	function __construct()
	{
		

		parent::__construct();
		
		
	}

	function display($msg=null)
	 {
	
		require_once (JPATH_COMPONENT.DS.'views'.DS.'DeveloperZone'.DS.'view.html.php');
		$view = new developerzoneViewDeveloperZone();
		$model=$this->getModel('developerzone');
		$cat = $model->getCategories();
		$view->assign('cat',$cat);
		$view->assign('msg',$msg);
		$view->display();
		return true;
	 }
	 
	function dwnlodfrm($msg=null)
	{	 
		require_once (JPATH_COMPONENT.DS.'views'.DS.'dwnloadfrm'.DS.'view.html.php');
		$view = new developerzoneViewDwnloadfrm();
		$model=$this->getModel('developerzone');
		$cat = $model->getCategories();
		$view->assign('cat',$cat);
		$view->assign('msg',$msg);
		$view->display('dwnloadfrm');
		return true;
	}
	
	function dwnldsearch()
	{

		$cat=trim(JRequest::getVar('category'));
		$key=JRequest::getVar('searchkey');
		
		if (empty($cat))
		{
			$this->dwnlodfrm('Category Cannot be empty.');
			return;
		}
		
		$model=$this->getModel('developerzone');
		$dwnsresult=$model->getDownloadSearch($cat,$key);

		if (!count($dwnsresult))
		{
			$this->dwnlodfrm('<strong>Your Search not found.<strong>');
			return;
		}
		$cname=$model->catName($cat);
		$info ="Category =" .$cname->category;
		
		if ($key)
			$info .="<br/>Search Key =" .$key;
		
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'dwnloadfrm'.DS.'view.html.php');
		$view = new developerzoneViewDwnloadfrm();
		$model=$this->getModel('developerzone');
		$cat = $model->getCategories();
		$view->assign('cat',$cat);
		$view->assign('dwnsresult',$dwnsresult);
		$view->assign('info',$info);
		$view->display('dwnloadfrm');
		$view->display('downsreasult');
		return true;	
	}
	
	function downmoreinfo()
	{
		$id =JRequest::getVar('id');
		
		$model=$this->getModel('developerzone');
		$resultInfo=$model->downmoreinfo($id);
		
		if (!count($resultInfo))
		{
			$this->dwnlodfrm('<strong>More information of that topic not found.<strong>');
			return;
		}
		require_once (JPATH_COMPONENT.DS.'views'.DS.'dwnloadfrm'.DS.'view.html.php');
		$view = new developerzoneViewDwnloadfrm();
		$model=$this->getModel('developerzone');	
		$cat = $model->getCategories();
		$view->assign('cat',$cat);
		$view->assign('resultInfo',$resultInfo);
		$view->display('dwnloadfrm');
		$view->display('downmoreinfo');
		return;
	}
	function readArtclFrm()
	{
		require_once (JPATH_COMPONENT.DS.'views'.DS.'readArtclFrm'.DS.'view.html.php');
		$view = new developerzoneViewReadArtclFrm();
		$model=$this->getModel('developerzone');
		$cat = $model->getCategories();
		$view->assign('cat',$cat);
		$view->assign('msg',$msg);
		$view->display('readArtclFrm');
		return true;
	}
	
	function artclsearch()
	{
		$cat=trim(JRequest::getVar('category'));
		$key=JRequest::getVar('searchkey');
		
		if (empty($cat))
		{
			$this->readArtclFrm('Category Cannot be empty.');
			return;
		}
		
		$model=$this->getModel('developerzone');
		$artclresult=$model->getArtclSearch($cat,$key);

		if (!count($artclresult))
		{
			$this->readArtclFrm('<strong>Your Search not found.<strong>');
			return;
		}
		$cname=$model->catName($cat);
		$info ="Category =" .$cname->category;
		
		if ($key)
			$info .="<br/>Search Key =" .$key;
		
		
		require_once (JPATH_COMPONENT.DS.'views'.DS.'readArtclFrm'.DS.'view.html.php');
		$view = new developerzoneViewReadArtclFrm();
		$model=$this->getModel('developerzone');
		$cat = $model->getCategories();
		$view->assign('cat',$cat);
		$view->assign('artclresult',$artclresult);
		$view->assign('info',$info);
		$view->display('readArtclFrm');
		$view->display('atclResult');
		return true;
	}
	
	function artclmoreinfo()
	{
		$id =JRequest::getVar('id');
		
		$model=$this->getModel('developerzone');
		$resultInfo=$model->artclmoreinfo($id);
		
		if (!count($resultInfo))
		{
			$this->dwnlodfrm('<strong>More information of that topic not found.<strong>');
			return;
		}
		require_once (JPATH_COMPONENT.DS.'views'.DS.'readArtclFrm'.DS.'view.html.php');
		$view = new developerzoneViewReadArtclFrm();
		$model=$this->getModel('developerzone');	
		$cat = $model->getCategories();
		$view->assign('cat',$cat);
		$view->assign('resultInfo',$resultInfo);
		$view->display('readArtclFrm');
		$view->display('artclmoreinfo');
		return;
	}
	
	function codeSubmitFrm($msg=null)
	{
		require_once (JPATH_COMPONENT.DS.'views'.DS.'submitCode'.DS.'view.html.php');
		$view = new developerzoneViewSubmitCode();
		$model=$this->getModel('developerzone');
		$cat = $model->getCategories();
		$view->assign('cat',$cat);
		$view->assign('msg',$msg);
		$view->display('submitcodFrm');
		return true;
	}
	
	function writArtFrm($msg=null)
	{
		require_once (JPATH_COMPONENT.DS.'views'.DS.'writeArticle'.DS.'view.html.php');
		$view = new developerzoneViewWriteArticle();
		$model=$this->getModel('developerzone');
		$cat = $model->getCategories();
		$view->assign('cat',$cat);
		$view->assign('msg',$msg);
		$view->display('writeArticleFrm');
		return true;
	}
	
	function submitCode()
	{
		$title=trim(JRequest::getVar('title'));
		$desc=trim(JRequest::getVar('description'));
		$cat=trim(JRequest::getVar('category'));
				
		$msg='';
		$flag='';
		if (!$title)
		{
			$msg.='Title is empty.<br/>';
			$flag=true;
		}
		if (!$desc)
		{
			$msg.='About Code is empty.<br/>';
			$flag=true;
		}
		
		if (!$cat)
		{
			$msg.='Category is empty.<br/>';
			$flag=true;
		}
		
		if (!($_FILES['cfile']['size']) || ($_FILES['cfile']['size'])>6000000 ) 
		{
			$msg.='File Size is larger than permitted size.<bt/>';
			$flag=true;;
		}
		else 
		{
		 
			$permitted = array('application/zip','application/x-rar-compressed');
			$typeOK = false;
			
			
		
			foreach ($permitted as $type) 
			{
				if ($type == $_FILES['cfile']['type']) 
				{
					$typeOK = true;
					break;
				}
			}
			if (!$typeOK )
			{
				$msg.='File format not supported.<br/>Only Zip files are allowed.';
				$flag=true;
			}
		}
				
	
		if ($flag)
		{
			$this-> codeSubmitFrm($msg);
			return false;
		}

		$model =$this->getModel('developerzone');
		$data= JRequest::get('POST');
		if(!$model->saveCode($data))
		{
			$this-> codeSubmitFrm('Unable to upload your code.<br/>');
			return false;
		}
		
		$link=JRoute::_('index.php?option=com_developerzone',false);
		$msg="Your code saved.";
		$this->setRedirect($link,$msg);
		return;
	}
	
	function submitArticle()
	{
		$title=trim(JRequest::getVar('title'));
		$article=trim(JRequest::getVar('article'));
		$cat=trim(JRequest::getVar('category'));
		$author=trim(JRequest::getVar('author'));
				
		$msg='';
		$flag='';
		if (!$title)
		{
			$msg.='Title is empty.<br/>';
			$flag=true;
		}
		if (!$article)
		{
			$msg.='Article is empty.<br/>';
			$flag=true;
		}
		
		if (!$cat)
		{
			$msg.='Category is empty.<br/>';
			$flag=true;
		}
		
		if (!$author)
		{
			$msg.='Author is empty.<br/>';
			$flag=true;
		}

		if ($flag)
		{
			$this-> writArtFrm($msg);
			return false;
		}
		
		$model =$this->getModel('developerzone');
		$data= JRequest::get('POST');
		if(!$model->saveArticle($data))
		{
			$this-> writArtFrm('Unable to upload your article.<br/>');
			return false;
		}
		
		$link=JRoute::_('index.php?option=com_developerzone',false);
		$msg="Your article is uploaded.";
		$this->setRedirect($link,$msg);
		return;
		
	}
	
	function mainsearch()
	{
		$key=trim(JRequest::getVar('searchkey'));
		$cat=trim(JRequest::getVar('category'));
		$opt=trim(JRequest::getVar('opt'));
			
		$msg='';
		$flag='';
		if (!$key)
		{
			$msg.='Search Key is empty.<br/>';
			$flag=true;
		}
		
		if (!$cat)
		{
			$msg.='Category is empty.<br/>';
			$flag=true;
		}
		
		if (!$opt)
		{
			$msg.='Type is empty.<br/>';
			$flag=true;
		}

		if ($flag)
		{
			$this->display($msg);
			return true;
		}
		$opt=strtolower($opt);
		
		if ($opt=='code')
			$this->dwnldsearch();
		else
			$this->artclsearch();
	
	}
}
?>	