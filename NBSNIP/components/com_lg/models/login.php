<?php 

 defined('_JEXEC') or die (" Restricted Access");

jimport('joomla.application.component.model');
require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'tables'.DS.'login.php');

class LgModelLogin extends JModel
{

 function varifyInfo($userid, $emailid)
 { 
	$query = "select * from #__mat_users where userid='".$userid."' and emailid= '".$emailid."'";
	echo $query;
   $result = $this->_getList( $query );
   if (count($result) == 1)
   	return true; 
    else
	return false;
  }

  function newpassword($userid, $pwd )
 {
  
	$query = "UPDATE #__mat_users "
		. " SET password ='" . $pwd . "'"
		. " WHERE userid='".$userid."'";
   $db 	=& JFactory::getDBO();

	$db->setQuery( $query );
	if( $db->query())
	  return true;

      else
         return false;
  }

  
  function log($userid, $pwd )
  {
    
    $query = "select * from #__mat_users where userid='".$userid."' and password= '" .$pwd ."'";
    $result = $this->_getList( $query );
    return @$result[0];
   }
 function getDuplicateEmailID($emailid)
  {
      $query = "select * from #__mat_users where emailid='".$emailid."'";
	 $result = $this->_getList( $query );
	return @$result[0];
  }

 function getDuplicateUser($userid)
  {
      $query = "select * from #__mat_users where userid='".$userid."'";
	 $result = $this->_getList( $query );
	return @$result[0];
  }
 
function activate($acode, $userid)
{
   
   $query = "select * from #__mat_users where userid='".$userid."' and activation= '".$acode."'";
   $result = $this->_getList( $query );
  
 if (count($result) == 1)
   {
    $db 	=& JFactory::getDBO();

    $query = "UPDATE #__mat_users "
		. " SET block =0 "
		. " WHERE userid='".$userid."'";
   
	$db->setQuery( $query );
	if( $db->query()){


	  return true;
}
      else
         return false;
   } 
   else 
	return false;
      
}	
   
function save($data)
{

	$data['password']=sha1($data['password']);
 	$row =& JTable::getInstance('Login','Table');
		
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


}



