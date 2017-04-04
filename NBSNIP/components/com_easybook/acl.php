<?php
/**
 * @version $Id: acl.php 668 2008-06-12 15:08:15Z snipersister $
 * @package    Easybook
 * @link http://www.easy-joomla.org
 * @license    GNU/GPL
 */

acl_helper::$ebconfig = &$mainframe->getParams();
acl_helper::$acl_hack = true;
acl_helper::$acl = & JFactory::getACL();
acl_helper::setACLs();

class acl_helper {
	static $ebconfig;
	static $acl;
	static $acl_hack;

	static function getChilds($gid) {
		static $hack_cache;
		static $cache;
		if(!isset($cache)) {
			$tmp = self::$acl->get_group_children("30", "ARO", "RECURSE");
			$cache = array("30" => $tmp);
			$hack_cache = array_merge(array("30"), $tmp);
		}

		if(!array_key_exists($gid, $cache)) {
			$tmp = self::$acl->get_group_children($gid, "ARO", "RECURSE");
			if(self::$acl_hack && in_array(21, $tmp)) {
				$tmp = array_merge($tmp, $hack_cache);
			}
			$cache[$gid] = $tmp;
		}
		return $cache[$gid];
	}

	static function getGroupName($gid) {
		static $cache = array();
		if(!array_key_exists($gid, $cache)) {
			$cache[$gid] = self::$acl->get_group_name($gid);
		}
		return $cache[$gid];
	}

	static function setACLs() {
		$addARO = self::$ebconfig->get('add_acl', 18);
		$editOwnARO = self::$ebconfig->get('owner_acl', 20);
		$editAllARO = self::$ebconfig->get('admin_acl', 20);

		//when access is set to everybody...
		if($addARO == 0) {
			self::$acl->addACL('com_easybook', 'add', 'users', null);
			$addARO = 17;
		}
		
		if($editOwnARO == 0) {
			/*self::$acl->addACL('com_easybook', 'publish', 'users', null, 'content', 'own');
			self::$acl->addACL('com_easybook', 'remove', 'users', null, 'content', 'own');
			self::$acl->addACL('com_easybook', 'edit', 'users', null, 'content', 'own');*/
			$editOwnARO = 17;
		}

		if($editAllARO == 0) {
			self::$acl->addACL('com_easybook', 'publish', 'users', null, 'content', 'all');
			self::$acl->addACL('com_easybook', 'remove', 'users', null, 'content', 'all');
			self::$acl->addACL('com_easybook', 'edit', 'users', null, 'content', 'all');
			self::$acl->addACL('com_easybook', 'comment', 'users', null, 'content', 'all');
			$editAllARO = 17;
		}
		
		//set ACLs for group and child groups
		$childs = self::getChilds(17);
		$childs = array_merge(array(17), $childs);
		self::$acl->addACL('com_easybook', 'display', 'users', null);
		self::$acl->addACL('com_easybook', 'save', 'users', null);
		foreach($childs as $i) {
			self::$acl->addACL('com_easybook', 'display', 'users', self::getGroupName($i));
			self::$acl->addACL('com_easybook', 'save', 'users', self::getGroupName($i));
		}

		$childs = self::getChilds($addARO);
		$childs = array_merge(array($addARO), $childs);
		foreach($childs as $i) {
			self::$acl->addACL('com_easybook', 'add', 'users', self::getGroupName($i));
		}

		$childs = self::getChilds($editOwnARO);
		$childs = array_merge(array($editOwnARO), $childs);
		foreach($childs as $i) {
			/*self::$acl->addACL('com_easybook', 'publish', 'users', self::getGroupName($i), 'content', 'own');
			self::$acl->addACL('com_easybook', 'remove', 'users', self::getGroupName($i), 'content', 'own');
			self::$acl->addACL('com_easybook', 'edit', 'users', self::getGroupName($i), 'content', 'own');*/
		}

		$childs = self::getChilds($editAllARO);
		$childs = array_merge(array($editAllARO), $childs);
		foreach($childs as $i) {
			self::$acl->addACL('com_easybook', 'publish', 'users', self::getGroupName($i), 'content', 'all');
			self::$acl->addACL('com_easybook', 'remove', 'users', self::getGroupName($i), 'content', 'all');
			self::$acl->addACL('com_easybook', 'edit', 'users', self::getGroupName($i), 'content', 'all');
			self::$acl->addACL('com_easybook', 'comment', 'users', self::getGroupName($i), 'content', 'all');
			self::$acl->addACL('com_easybook', 'savecomment', 'users', self::getGroupName($i), 'content', 'all');
		}
	}
}

?>
