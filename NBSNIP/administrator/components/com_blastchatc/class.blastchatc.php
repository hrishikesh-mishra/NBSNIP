<?php
/**
 * @version		$Id: class.blastchatc.php 2009-01-01 15:24:18Z $
 * @package		BlastChat Client
 * @author 		BlastChat
 * @copyright	Copyright (C) 2004-2009 BlastChat. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @HomePage 	<http://www.blastchat.com>

 * This file is part of BlastChat Client.

 * BlastChat Client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * BlastChat Client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with BlastChat Client.  If not, see <http://www.gnu.org/licenses/>.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );

/**
* BlastChat Website Table Class
* Provides access to the jos_blastchatc table
*/
class josBC_website extends JTable {
  var $id = 0; //int(11) NOT NULL auto_increment,
  var $url = null; // varchar(100) default NULL,
  var $intra_id = null; // varchar(100) default NULL,
  var $priv_key = null; //  varchar(100) default NULL,
  var $detached = 0; // binary(1) NOT NULL default '0',
  var $adm_expand = 1; // binary(1) NOT NULL default '0',
  var $width = "100%"; //  varchar(6) NOT NULL default '100%',
  var $height = "480"; //  varchar(6) NOT NULL default '480',
  var $d_width = "640"; //  varchar(6) NOT NULL default '640',
  var $d_height = "480"; //  varchar(6) NOT NULL default '480',
  var $frame_border = 0; // binary(1) NOT NULL default '0',
  var $m_width = "0"; //  varchar(6) NOT NULL default '0',
  var $m_height = "0"; //  varchar(6) NOT NULL default '0',

    /**
	* @param database A database connector object
	*/
	function __construct( &$_db ) {
		parent::__construct( '#__blastchatc', 'id', $_db );
	}

	/**
	*	binds an array/hash to this object
	*	@param int $oid optional argument, if not specifed then the value of current key is used
	*	@return any result from the database operation
	*/
	function loadByURL( $oid=null ) {
		$db =& $this->getDBO();

		$query = "SELECT *"
		. "\n FROM ".$this->_tbl
		. "\n WHERE url = '".$oid."'"
		;
		$db->setQuery( $query );
		$result = null;
		$result = $db->loadAssoc();
		if ($result) {
			return $this->bind($result);
		}
		else
		{
			$this->setError( $db->getErrorMsg() );
			return false;
		}
	}

	/**
	 * Validation and filtering
	 * @return boolean True is satisfactory
	 */
	function check() {
		return true;
	}

	function store( $updateNulls=false ) {
		global $migrate;

		$k = $this->_tbl_key;
		$key =  $this->$k;
		if( $key && !$migrate) {
			// existing record
			$ret = $this->_db->updateObject( $this->_tbl, $this, $this->_tbl_key, $updateNulls );
		} else {
			// new record
			$ret = $this->_db->insertObject( $this->_tbl, $this, $this->_tbl_key );
		}
		if( !$ret ) {
			$this->_error = strtolower(get_class( $this ))."::store failed <br />" . $this->_db->getErrorMsg();
			return false;
		} else {
			return true;
		}
	}

	function delete( $oid=null ) {
		$k = $this->_tbl_key;
		if ($oid) {
			$this->$k = intval( $oid );
		}

		$query = "DELETE FROM $this->_tbl"
		. "\n WHERE $this->_tbl_key = '". $this->$k ."'"
		;
		$this->_db->setQuery( $query );

		if ($this->_db->query()) {
			// cleanup related data
			$query = "DELETE FROM #__blastchatc_users WHERE 1";
			$this->_db->setQuery( $query );
			if (!$this->_db->query()) {
				$this->_error = $this->_db->getErrorMsg();
				return false;
			}
			return true;
		} else {
			$this->_error = $this->_db->getErrorMsg();
			return false;
		}
	}
}
?>