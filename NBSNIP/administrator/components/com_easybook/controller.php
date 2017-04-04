<?php
/**
 * @version $Id: controller.php 487 2008-01-22 19:51:27Z snipersister $
 * @package    Easybook
 * @link http://www.easy-joomla.org
 * @license    GNU/GPL
 */
// no direct access

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

/**
 * Easybook Component Controller
 *
 * @package    Easybook
 */
class EasybookController extends JController
{
    /**
     * Method to display the view
     *
     * @access    public
     */
    function display()
    {
        parent::display();
    }
    
    function about()
    {
    	JRequest::setVar( 'view', 'about' );
	    JRequest::setVar( 'layout', 'default'  );
	    
	    parent::display();
    }
}
?>