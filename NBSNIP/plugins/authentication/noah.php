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

class plgAuthenticationNOAH extends JPlugin
{
	var $db;
	var $_init_ok;

    function plgAuthenticationNOAH(& $subject, $config)
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
			return $table->get( 'id' );
		}

	}

	function onAuthenticate($credentials, $options, &$response)
	{
		if (!$this->_init_ok) return;
		$login = $credentials['username'];
		$pass = $credentials['password'];

		$this->db->setQuery("SELECT id FROM #__user WHERE name = " . $this->db->Quote($login)
							. " AND password = " . $this->db->Quote($this->getPassword($pass)));
		$id = $this->db->loadResult();
		if (!$id) {
			$response->status = JAUTHENTICATE_STATUS_FAILURE;
			$response->error_message	= 'Could not authenticate';
			return;
		}

		$response->status = JAUTHENTICATE_STATUS_SUCCESS;

		jimport('joomla.user.helper');
		$j_id = JUserHelper::getUserId($login);
		
		if (!$j_id) {
			$j_id = $this->createUser($login);
		}

		$j_user = new JUser();

		$j_user->load($j_id);
		$j_user->set('password_clear', $pass);
		$j_user->save();

		return true;
	}
}

