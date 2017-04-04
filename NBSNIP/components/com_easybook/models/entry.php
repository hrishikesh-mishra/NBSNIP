<?php
/**
 * @version $Id: entry.php 684 2008-06-16 04:06:04Z snipersister $
 * @package    Easybook
 * @link http://www.easy-joomla.org
 * @license    GNU/GPL
 */

// no direct access

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );

/**
 * Easybook Model
 *
 * @package    Easybook
 */
class EasybookModelEntry extends JModel
{
var $_data = null;
var $_id = null;
var $_badwords = null;			


	/**
	 * Constructor that retrieves the ID from the request
	 *
	 * @access    public
	 * @return    void
	 */
	function __construct()
	{
    	parent::__construct();


    	$id = JRequest::getVar('cid',  0, '', 'int');
    	$this->setId($id);
	}
	
	/**
 	* Method to set the entry identifier
 	*
 	* @access    public
 	* @param    int Entry identifier
 	* @return    void
 	*/
	function setId($id)
	{
    	// Set id and wipe data
    	$this->_id        = $id;
    	$this->_data    = null;
	}
	
	/**
 	* Method to get a entry
 	* @return object with data
 	*/
	function getData()
	{
    	global $mainframe;
    	$user =& JFactory::getUser();
    	
    	if(	JRequest::getVar('retry') == 'true' )
    	{
    		$this->_data = $this->getTable();
    		$this->_data->bind($mainframe->getUserState('eb_validation_data'));
    	}
    	
    	// Load the data
    	if(empty( $this->_data )) {
       	 $query = ' SELECT * FROM #__easybook '.
       	         '  WHERE id = '.$this->_id;
       	 $this->_db->setQuery( $query );
       	 $this->_data = $this->_db->loadObject();
    	}
    	// When not editing an entry, create a new one
    	if (!$this->_data) {
    	    $this->_data = $this->getTable();
    	    $this->_data->id = 0;
    	    //Insert name and email of the registred user
    	    if($user->get('id'))
    	    {
	    	    $this->_data->gbname = $user->get('name');;
	    	    $this->_data->gbmail = $user->get('email');;
    	    }
    	}    	    
    	return $this->_data;
	}
	
	/**
	 * Method to store a record
 	*
 	* @access    public
 	* @return    boolean    True on success
 	*/
	function store()
	{
    	
    	global $mainframe;
    	jimport('joomla.utilities.date');
    	
    	$row =& $this->getTable();
		$params = &$mainframe->getParams();
    	$data = JRequest::get( 'post' );

		$date =& JFactory::getDate();

		// Set Default Values
		if(!$data['id'])
		{
			$data['gbdate'] = $date->toMysql();
			$data['published'] = $params->get('default_published', 1);
			if($params->get('enable_log', true))
			{
				$data['gbip'] = getenv('REMOTE_ADDR');
			}
			else
			{
				$data['gbip'] = "0.0.0.0";
			}
			$data['gbcomment'] = null;
		}
		
		// Make sure the record is valid
	    if (!$this->validate($data)) {
   		     return false;
    	}
    	
    	// Bind the form fields to the table
    	if (!$row->bind($data)) {
       	 	$this->setError($this->_db->getErrorMsg());
        	return false;
    	} 

   		// Store the entry to the database
    	if (!$row->store()) {
        	$this->setError($this->_db->getErrorMsg());
        	return false;
    	}

    	return true;
	}
	
	function delete()
	{
    	$row =& $this->getTable();

       	if (!$row->delete( $this->_id )) {
           	$this->setError( $this->_db->getErrorMsg() );
           	return false;
       	}
    	return true;
	}

	// Publishes an entry or unpublishes it
	function publish() {
		$data = $this->getData();
		$status = $data->published;

		$query = 'UPDATE #__easybook SET `published` = '.(int)!$status.' WHERE `id` = '.$this->_id.' LIMIT 1;';
		$this->_db->SetQuery($query);
		if(!$this->_db->query()) {
			$this->setError($this->_db->getErrorMsg());
			return -1;
		}
		return (int)!$status;
	}
	
	function getCaptcha($id = null) {
		global $mainframe;
		jimport( 'joomla.filesystem.file' );
		
		$user = &JFactory::getUser();
		$params = &$mainframe->getParams('com_easybook');
		$path = JPATH_BASE.DS.'components'.DS.'com_easycaptcha'.DS.'class.easycaptcha.php';
		
		if(JFile::exists($path) AND !$user->gid) {
	 		include_once($path);
	 		$captcha = new easyCaptcha($id);
	 		return $captcha;
	 	} else {
	 		$params->set('enable_captcha', false);
	 		return false;
	 	}
	}
	
	function validate(&$data) {
    	global $mainframe;
    	$params = &$mainframe->getParams('com_easybook');
    	$user = &JFactory::getUser();
    	jimport( 'joomla.mail.helper' );
    	$errors = array();
    	
    	//Name can not be empty
    	if(empty($data['gbname']))
    	{
    		$error = true;
    		$errors['name'] = true;
    	}
    	
    	//Check captcha if enabled
    	if($params->get('enable_captcha', false) AND !$user->gid)
		{
    		$captcha = $this->getCaptcha($data['captcha_id']);
    		if(is_object($captcha))
    		{
	    		if(!$captcha->checkEnteredCode($data['gbcode']))
	    		{
	    			$error = true;
	    			$errors['captcha'] = true; 
	    		}
    		}
		}
		
		//Text can not be empty
		if(empty($data['gbtext']))
		{
			$error = true;
			$errors['text'] = true; 
		}
		
		//valid email-address supplied?
		if(!JMailHelper::isEmailAddress($data['gbmail']) AND $params->get('show_mail', true) AND $params->get('require_mail', true))
		{
			$error = true;
			$errors['mail'] = true; 
		}
		
		if($params->get('badwordfilter', true))
		{
			//replace bad words
			$badwords = $this->_getBadwordList();
			foreach ($badwords as $badword)
			{
				$data['gbtext'] = preg_replace("/\b".$badword->word."\b/i", "***" , $data['gbtext']);
			}
		}
		
		if($error)
		{
			$mainframe->setUserState( 'eb_validation_errors', $errors);
			$mainframe->setUserState( 'eb_validation_data' , $data);
			return false;
		}
		else
		{
			return true;
		}
    }
	  function savecomment() {
    	$row =& $this->getTable();
    	$data = JRequest::get( 'post' );
	    
	    // Bind the form fields to the table
    	if (!$row->bind($data)) {
       	 	$this->setError($this->_db->getErrorMsg());
        	return false;
    	} 

   		// Store the entry to the database
    	if (!$row->store()) {
        	$this->setError($this->_db->getErrorMsg());
        	return false;
    	}
    	
    	return true;
	  }
	
	
	  function _getBadwordList() {
    	
    	if(empty( $this->_badwords )) {
       	 $query = ' SELECT * FROM #__easybook_badwords';
       	 $this->_db->setQuery( $query );
       	 $this->_badwords = $this->_db->loadObjectList();
    	}
    	    
    	return $this->_badwords;
	  }
}
