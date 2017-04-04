<?php 


	// Direct Acces not allow 
	defined ('_JEXEC') or die ('Restricted Access');

	jimport ('joomla.application.component.model');

	class reportModelVisitor extends JModel
	{  

	function __construct()
	{
		parent::__construct();
	}
	
	
	
	function todayVisitor()
	{
		$db=& JFactory::getDBO();
		$where =array();

		$where[] = ' (date(accesstime)=curdate() )';
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select * from #__visitor " .$where; 
		
		$result = $this->_getList( $query );		
		return $result;
	}
	
	function visitorBtwn($sdate,$edate)
	{
		$db=& JFactory::getDBO();
		$where =array();
		
		$where[] = " (date(accesstime) between '". $sdate . "' and '". $edate ."')" ;
		$where= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		$query = "select * from #__visitor " .$where; 
		
		$result = $this->_getList( $query );		
		return $result;
	}
	
}
?>