<?php
/**
 * @version $Id: badword.php 420 2007-12-28 15:52:11Z snipersister $
 * @package    Easybook
 * @link http://www.easy-joomla.org
 * @license    GNU/GPL
 */


// no direct access
defined('_JEXEC') or die('Restricted access');

class TableBadword extends JTable
{
    /**
     * Primary Key
     *
     * @var int
     */
    var $id = null;
    var $word = null;

    /**
     * Constructor
     *
     * @param object Database connector object
     */
    function TableBadword( &$db ) {
        parent::__construct('#__easybook_badwords', 'id', $db);
    }
    
}
?>