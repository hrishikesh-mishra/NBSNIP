<?php
/**
* @package JFusion
* @subpackage Plugin_User
* @version 1.0.7
* @author JFusion development team
* @copyright Copyright (C) 2008 JFusion. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

// no direct access
defined('_JEXEC' ) or die('Restricted access' );

jimport('joomla.plugin.plugin');

class plgSystemNOAH extends JPlugin
{
	var $db;
	var $_init_ok;

    function plgSystemNOAH(& $subject, $config)
    {
		$this->_init_ok = false;

        parent::__construct($subject, $config);

		global $mainframe;
		if ($mainframe->isAdmin()) {
			return; // Dont run in admin
		}

		$noah_path = $this->params->get('noah_path', 1);

		@include "$noah_path/app/config.php";

		if (!isset($hostName) || !isset($dbUser) || !isset($dbPrefix)) {
			$this->_init_ok = false;
			return;
		}

		$this->db = new JDatabaseMYSQL(array(
				'host' => $hostName, 
				'user' => $dbUser, 
				'password' => $dbUserPw, 
				'database' => $dbName, 
				'prefix' => $dbPrefix));

		if (!$this->db->connected()) {
			$this->_init_ok = false;
			return;
		}
		$this->_init_ok = true;
    }

	function getPassword( $s )
	{
	    $s=addcslashes($s,"'\\");
	    $version = $this->db->getVersion();
	    $mainVersion = intval($version[0]);
	    $subVersion = intval($version[2]);
	    $pwdQuery = ($mainVersion==4 && $subVersion==0) || $mainVersion<4 ? "password" : "old_password";
	    $this->db->setQuery("SELECT $pwdQuery('$s')");
	    return $this->db->loadResult();
	}

	function generateRandomId()
	{
		mt_srand((double)microtime()*1000000);
	    $randIdMin=0;
	    $randIdMax=getrandmax();

	    while (true)
	    {
	        $id = (int)mt_rand($randIdMin,$randIdMax);
	        $this->db->setQuery("SELECT id FROM #__user WHERE id = $id");

			$ret = $this->db->loadResult();
			if (is_null($ret)) {
				return $id;
			}
    	}
	}

	function createUser($username)
	{
		$new_user = new JUser();
			
		$this->db->setQuery("SELECT email, isAdm FROM #__user WHERE name = " . $this->db->Quote($username));
		$r = $this->db->loadRow();
		$email = $r[0];
		$isAdm = $r[1];

		jimport('joomla.application.component.helper');
		$config   = &JComponentHelper::getParams( 'com_users' );
		
		if ($isAdm) {
			$usertype = 'Super Administrator';
		} else {
			$usertype = $config->get( 'new_usertype', 'Registered' );
		}

		$acl =& JFactory::getACL();

		$new_user->set( 'id'			, 0 );
		$new_user->set( 'name'			, $username );
		$new_user->set( 'username'		, $username );
		$new_user->set( 'email'			, $email );
		$new_user->set( 'gid'			, $acl->get_group_id( '', $usertype));
		$new_user->set( 'usertype'		, $usertype );
		$new_user->set( 'registeredDate', date( 'Y-m-d H:i:s' ) );
		$new_user->set( 'lastVisitDate', date( 'Y-m-d H:i:s' ) );

		$table = & $new_user->getTable();
		$new_user->params = $new_user->_params->toString();
		$table->bind($new_user->getProperties());
			
//			$new_user->save();
		if ($table->store()) {
			$id = $table->get( 'id' );
			$this->activateUser($id);
		}

	}

	function activateUser($user_id)
	{
/*		global $mainframe;
		$mainframe->logout();*/

		$new_user = new JUser();
		$new_user->load($user_id);
		
		$acl =& JFactory::getACL();
		$grp = $acl->getAroGroup($user_id);

		$new_user->set( 'guest', 0);
		$new_user->set('aid', 1);
	
		if ($acl->is_group_child_of($grp->name, 'Registered')      ||
		    $acl->is_group_child_of($grp->name, 'Public Backend'))    {
			$new_user->set('aid', 2);
		}
		$new_user->set('usertype', $grp->name);
    
		$session =& JFactory::getSession();
		$session->set('user', $new_user);

		$table = & JTable::getInstance('session');
		$table->load( $session->getId() );

		$table->guest 		= $new_user->get('guest');
		$table->username 	= $new_user->get('username');
		$table->userid 		= intval($new_user->get('id'));
		$table->usertype 	= $new_user->get('usertype');
		$table->gid 		= intval($new_user->get('gid'));

		$table->update();
		$new_user->setLastVisit();
	}

	function onAfterInitialise()
	{
		if (!$this->_init_ok) return;
		setcookie("j_back",$_SERVER['REQUEST_URI'], strtotime("+1 day"), "/");
		
		$my = & JFactory::getUser();

		if (!isset($_COOKIE['sessionUserId']) && $my->id) {
			global $mainframe;
			$mainframe->logout();
			return;
		}

		if (!isset($_COOKIE['sessionUserId'])) return;

		$id = $_COOKIE['sessionUserId'];
		$pass = $_COOKIE['usrPassword'];
		$this->db->setQuery("SELECT name FROM #__user WHERE id = $id");
		$username = $this->db->loadResult();

		if (!$username) return;
		
		// already logged in?
		if ($my->username === $username) return;

		jimport('joomla.user.helper');

		$user_id = JUserHelper::getUserId($username);
		if (!$user_id) $this->createUser($username);
		else $this->activateUser($user_id);

	}
}

