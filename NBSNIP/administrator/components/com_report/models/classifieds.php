<?php 


	// Direct Acces not allow 
	defined ('_JEXEC') or die ('Restricted Access');

	jimport ('joomla.application.component.model');

	class reportModelClassifieds extends JModel
	{  

	function __construct()
	{
		parent::__construct();
	}
	
	
	function realState()
	{
		$query="select *  from #__cf_realstate";
		
		$result= $this->_getList($query);
		return $result;
	}
	function jobRpt()
	{
		$query="select *  from #__cf_jobs";
		
		$result= $this->_getList($query);
		return $result;
	}
	function realStateDefaulter()
	{
		
		$db=& JFactory::getDBO();
		$where =array();

		$where[] = ' (r.vid = v.id)';
		$where[] = ' (curdate() > r.regenddate)';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select distinct v.* from #__cf_vendor v, #__cf_realstate r " .$where; 
		$result = $this->_getList( $query );
		
		return $result;
	}
	function JobDefaulter()
	{
		$db=& JFactory::getDBO();
		$where =array();

		$where[] = ' (j.memberid = v.id)';
		$where[] = ' (curdate() > j.regenddate)';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select distinct v.* from #__cf_vendor v, #__cf_jobs j " .$where; 

		$result = $this->_getList( $query );
		
		return $result;
	}
	function compDefaulter()
	{
		$db=& JFactory::getDBO();
		$where =array();

		$where[] = ' (c.memberid = v.id)';
		$where[] = ' (curdate() > c.regenddate)';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select distinct v.* from #__cf_vendor v, #__cf_computer c " .$where; 

		$result = $this->_getList( $query );
		
		return $result;
	}
	function teaDefaulter()
	{
		$db=& JFactory::getDBO();
		$where =array();

		$where[] = ' (t.memberid = v.id)';
		$where[] = ' (curdate() > t.regenddate)';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select distinct v.* from #__cf_vendor v, #__cf_tea t " .$where; 

		$result = $this->_getList( $query );
		
		return $result;
	}
	
}
?>