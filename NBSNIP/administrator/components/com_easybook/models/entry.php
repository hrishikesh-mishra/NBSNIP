<?php
/**
 * @version $Id: entry.php 420 2007-12-28 15:52:11Z snipersister $
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


	/**
	 * Constructor that retrieves the ID from the request
	 *
	 * @access    public
	 * @return    void
	 */
	function __construct()
	{
	    parent::__construct();
	
	    $array = JRequest::getVar('cid',  0, '', 'array');
	    $this->setId((int)$array[0]);
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
    	
    	// Load the data
    	if(empty( $this->_data )) {
       	 $query = ' SELECT * FROM #__easybook '.
       	         '  WHERE id = '.$this->_id;
       	 $this->_db->setQuery( $query );
       	 $this->_data = $this->_db->loadObject();
    	}
    	if (!$this->_data) {
    	    $this->_data = $this->getTable();
    	    $this->_data->id = 0;
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
    	$row =& $this->getTable();
    	$data = JRequest::get( 'post' );

    	// Bind the form fields to the hello table
    	if (!$row->bind($data)) {
       	 	$this->setError($this->_db->getErrorMsg());
        	return false;
    	}
		
		// Make sure the hello record is valid
	    if (!$row->check()) {
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
	    $cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
	    $row =& $this->getTable();
	
	    foreach($cids as $cid) {
	        if (!$row->delete( $cid )) {
	            $this->setError( $row->_db->getErrorMsg() );
	            return false;
	        }
	    }
	
	    return true;
	}

	// Publishes an entry or unpublishes it
	function publish($state) {
		$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
	    $row =& $this->getTable();
	
	        if (!$row->publish( $cids, $state )) {
	            $this->setError( $row->getError() );
	            return false;
	        }
	
	    return true;
	}

	
}
