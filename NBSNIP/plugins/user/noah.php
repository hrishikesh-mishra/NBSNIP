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

class plgUserNOAH extends JPlugin
{
	var $db;

    function plgUserNOAH(& $subject, $config)
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
    /**
* Remove all sessions for the user name
*
* Method is called after user data is deleted from the database
*
* @param array holds the user data
* @param boolean true if user was succesfully stored in the database
* @param string message
*/
    function onAfterDeleteUser($user, $succes, $msg)
    {
		return $success;
/*        $db =& JFactory::getDBO();
        $db->setQuery('DELETE FROM #__session WHERE userid = '.$db->Quote($user['id']));
        $db->Query();

        return true;*/
    }

    /**
* This method should handle any login logic and report back to the subject
*
* @access public
* @param array holds the user data
* @param array array holding options (remember, autoregister, group)
* @return boolean True on success
* @since 1.5
*/
    function onLoginUser($user, $options = array())
    {
		if (!$this->_init_ok) return;
		$login = $user['username'];
		$pass  = $this->getPassword($user['password']);

		$this->db->setQuery("SELECT id FROM #__user WHERE name = ". $this->db->Quote($login));
	
		if(!$this->db->query())
		{
			JError::raiseError( 500, $this->db->stderr());
		}

		$acl =& JFactory::getACL();
		$grp_super_adm = $acl->get_group_id('Super Administrator');
		
		jimport('joomla.user.helper');
		$j_id = JUserHelper::getUserId($login);
		
		$j_user = new JUser();
		$j_user->load($j_id);

		$isAdm = 0;
		if ($j_user->gid == $grp_super_adm) {
			$isAdm = 1;
		}

		$email = $j_user->email;

		$id = $this->db->loadResult();
		if (!$id) {
			// user does not exists
			$id = $this->generateRandomID();
			$this->db->setQuery("INSERT INTO #__user (id, name, password, isAdm, email, creationTime, lastClickTime, active) VALUES (".
					$id . ",".
					$this->db->Quote($login) . "," .
					$this->db->Quote($pass) . "," .
					$this->db->Quote($isAdm) . "," .
					$this->db->Quote($email) . ", NOW(), NOW(), 1 )");
	
			if(!$this->db->query())
			{
				JError::raiseError( 500, $this->db->stderr());
			}

		} else {
			$this->db->setQuery("UPDATE #__user SET "
								. " password = " . $this->db->Quote($pass) . ", "
								. " isAdm = " . $this->db->Quote($isAdm) . ", "
								. " email = " . $this->db->Quote($email)  . ", "
								. " lastClickTime = NOW() WHERE id = $id ");
			if (!$this->db->query())
			{
				JError::raiseError( 500, $this->db->stderr() );
				return false;
			}
		}
        setcookie("usrPassword",$pass, 2000000000, "/");
        setcookie("sessionUserId", $id, 0, "/" );
		return true;
    }


    /**
* This method should handle any logout logic and report back to the subject
*
* @access public
* @param array holds the user data
* @param array array holding options (client, ...)
* @return object True on success
* @since 1.5
*/
    function onLogoutUser($user, $options = array())
    {
		if (!$this->_init_ok) return;
//		$login = $user['username'];
//		$pass  = $this->getPassword($user['password']);

/*		$this->db->setQuery("SELECT id FROM #__user WHERE name = ". $this->db->Quote($login));
		$id = $this->db->loadRow();*/

		if (isset($_COOKIE["usrPassword"])) {
        	setcookie("usrPassword", false, strtotime("-1 day"), "/");
		}

		if (isset($_COOKIE["sessionUserId"])) {
        	setcookie("sessionUserId", false, strtotime("-1 day"), "/" );
		}

		if (isset($_COOKIE["globalUserId"])) {
        	setcookie("globalUserId", false, strtotime("-1 day"), "/" );
		}

		return true;
    }
}

