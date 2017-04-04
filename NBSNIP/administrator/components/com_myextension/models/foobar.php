<?php
defined( '_JEXEC' ) or die( 'Restricted access model' );

jimport ('joomla.application.component.model');

class myextensionModelFoobar extends JModel
{
	var $_id;

	var $_foobar;
	var $_data;
	
	function __construct()
	{
		parent::__construct();
		global $mainframe;

		$limit = $mainframe->getUserStateFromRequest('global.list.limit','limit', $mainframe->getCfg('list_limit'));
		$limitstart = $mainframe->getUserStateFromRequest($option.'limitstart','limitstart',0);
		$this->setState('limit',$limit);
		$this->setState('limitstart',$limitstart);
		
		$cid= JRequest::getVar('cid',  0, '', 'array');
		

		if($cid)
		{
			$id=$cid[0];
		}
		else
		{
			$id=JRequest::getInt('id', 0);
		}
		$this->setId($id);
	}


	function setId($id=0)
	{

		$this->_id= $id;
		$this->_foobar = null;
		$this->data=null;
	}

	function &getFoobar()
	{

		if(empty($this->_foobar))
		{
			$query = "select * from #__myextension_foobars "; 
			$limitstart= $this->getState('limitstart');
			$limit = $this->getState('limit');
		 	$this->_foobar= $this->_getList($query,$limitstart, $limit);
		}
		return $this->_foobar;
	}
	
	function &getData()
	{
		// Load the data
		echo "<br><br><br>The ID  = " .$this->_id . "\n";
		if (empty( $this->_data)) {
			$query = ' SELECT * FROM #__myextension_foobars '.
					'  WHERE id = '.$this->_id;
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();
		}
		if (!$this->_data) {
			$this->_data = new stdClass();
			$this->_data->id = 0;
			$this->_data->foobar = null;
		}
		return $this->_data;
	}


	function save ($data, $params)
	{
		//$table =& $this->getTable('Foobar');
		
		$row =& JTable::getInstance('foobar','Table');
		
		if (!$row->bind($data))
		{
			JError::raiseError(500,$row->getError());
			return false;
		}
		
		//echo "<br><br>The Params = " . $params;
		if (is_array( $params )) {
			$txt = array();
			foreach ( $params as $k=>$v) {
				$txt[] = "$k=$v";
				echo $k ."  " . $v ."<br>";
			}
			$row->params= implode( "\n", $txt );
		}		
		
		
		
		if (!$row->store())
		{
			JError::raiseError(500,$row->getErrro());
			return false;
		}
		//if (!$table->setParams($paramsString))
		//{
		//	$this->setError($table->getError());
	//		return false;
	//	}
/*
		if(!$table->save($data))
		{
			$this->setError($table->getError());
			return false;
		}
		
*/
		return true;
	}

	function getPagination()
	{
		if(empty($this->_pagination))
		{
			jimport('joomla.html.pagination');
			$total =$this->getTotal();
			$limitstart = $this->getState('limitstart');
			$limit = $this->getState('limit');
			$this->_pagination = new JPagination($total, $limitstart,$limit);
		}
		return $this->_pagination;
	}
	
	function getTotal()
	{
		if (empty($this->_total))
		{
			$this->_total = $this->_getListCount("select * from #__myextension_foobars");
		}
		return $this->_total;
	}
			


	function hit()
	{
		$db =& JFactory::getDBO();
		$db->setQuery("UPDATE #__myextension_foobar set hits = hits + 1 " .
				" where id = " . $this->_id);
		$db->query();
	}
		
	
	function changeFoobar( $cid=null, $state=0 )
	{
	

	// Check for request forgeries
	//JRequest::checkToken() or jexit( 'Invalid Token' );

	// Initialize variables
	$db 	=& JFactory::getDBO();
	$user 	=& JFactory::getUser();
	
	JArrayHelper::toInteger($cid);

	if (count( $cid ) < 1) {
		$action = $state ? 'publish' : 'unpublish';
		JError::raiseError(500, JText::_( 'Select an item to' .$action, true ) );
	}

	$cids = implode( ',', $cid );

	$query = 'UPDATE #__myextension_foobars'
	. ' SET published = ' . (int) $state
	. ' WHERE id IN ( '. $cids .' )'
	. ' AND ( checked_out = 0 OR ( checked_out = '. (int) $user->get('id') .' ) )'
	;
	$db->setQuery( $query );
	if (!$db->query()) {
		JError::raiseError(500, $db->getErrorMsg() );
	}

	if (count( $cid ) == 1) {
		$row =& JTable::getInstance('foobar', 'Table');
		$row->checkin( intval( $cid[0] ) );
	}

	}
	 
	function delete()
	{
		$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );

		$row =& $this->getTable();

		if (count( $cids )) {
			foreach($cids as $cid) {
				if (!$row->delete( $cid )) {
					$this->setError( $row->getErrorMsg() );
					return false;
				}
			}
		}
		return true;
	}



	
}
?>