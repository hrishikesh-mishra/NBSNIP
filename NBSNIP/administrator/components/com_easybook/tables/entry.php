<?php
/**
 * @version $Id: entry.php 420 2007-12-28 15:52:11Z snipersister $
 * @package    Easybook
 * @link http://www.easy-joomla.org
 * @license    GNU/GPL
 */


// no direct access
defined('_JEXEC') or die('Restricted access');

class TableEntry extends JTable
{
    /**
     * Primary Key
     *
     * @var int
     */
    var $id = null;
    var $gbip = null;
    var $gbname = null;
    var $gbmail = null;
    var $gbmailshow = null;
    var $gbloca = null;
    var $gbpage = null;
    var $gbvote = null;
    var $gbtext = null;
    var $gbdate = null;
    var $gbcomment = null;
	var $published = null;
	var $gbicq = null;
	var $gbaim = null;
	var $gbmsn = null;
	var $gbyah = null;
	var $gbskype = null;

    /**
     * Constructor
     *
     * @param object Database connector object
     */
    function TableEntry( &$db ) {
        parent::__construct('#__easybook', 'id', $db);
    }
    
}
?>