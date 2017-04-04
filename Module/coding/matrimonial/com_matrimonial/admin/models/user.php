<?php 

	/*
		Matrimonial User model 
	*/

	// Direct Acces not allow 
defined('_JEXEC') or die ('Ristricted Access ');

	jimport ('joomla.application.component.model');

	class matrimonialModelUser extends JModel
	{  

		var $_id;
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
		$this->_data=null;
	}

	function &getUser()
	{

		if(empty($this->_data))
		{
			$query = "select u.id, u.userid, u.username, u.registrationdate, u.lastvisitdate, not(u.block) as published, u.emailid, u.addedat from #__mat_users u"; 
			$limitstart= $this->getState('limitstart');
			$limit = $this->getState('limit');
		 	$this->_data= $this->_getList($query,$limitstart, $limit);
		}
		
		return $this->_data;
	}
	
	
	function save ($data)
	{
				
		$row =& JTable::getInstance('user','Table');
		$pwd=trim($data['password']);
		if (empty($pwd))
		{
			$query="select password from #__mat_users where id='" .$data['id'] ."'";
			$result=$this->_getList($query);
			$pwd=$result[0]->password;
		}
		else
		{
			$pwd=sha1($pwd);
		}
		$data['password']=$pwd;
		
		if (!$row->bind($data))
		{
			JError::raiseError(500,$row->getError());
			return false;
		}
		
		if (!$row->store())
		{
			JError::raiseError(500,$row->getError());
			return false;
		}
		
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
			$this->_total = $this->_getListCount("select * from #__mat_users");
		}
		return $this->_total;
	}
			

	
	
	function changeUser( $cid=null, $state=0 )
	{
		$db 	=& JFactory::getDBO();
		
		JArrayHelper::toInteger($cid);

		if (count( $cid ) < 1) 
		{
			$action = $state ? 'unBlocked' : 'Blocked';
			JError::raiseError(500, JText::_( 'Select an item to' .$action, true ) );
		}

	
		$cids = implode( ',', $cid );

		$query = 'UPDATE #__mat_users '
		. ' SET block = ' . (int) $state
		. ' WHERE id IN ( '. $cids .' )';
		
		$db->setQuery( $query );
		
		if (!$db->query()) 
		{
			JError::raiseError(500, $db->getErrorMsg() );
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