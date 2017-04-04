<?php

defined ('_JEXEC') or die ('Restricted access');

switch (JRequest::getVar('task'))
{
case  'add':
		addEntry();
		break;
	
	default:
		displayGuestbook();
		break;
}

function addEntry()  {      
     // Get reference to database object
     $db =& JFactory::getDBO();
     // Get user id for recording with entry.
     $user =& JFactory::getUser();
     $uid     = $user->get('id');

    
     
     // Get message and location from form posting values
     $fldMessage = JRequest::getVar('message') ;
     // Strip away anything that could be code, carriage returns, and so on
     $fldMessage = preg_replace("/[^a-zA-Z0-9 .?!$()\'\"]/", "", $fldMessage);
     // Escape the message so it can be placed in the insert statement
     $fldMessage = "'" . $db->getEscaped($fldMessage) . "'";
     $fldLocation = "'" . $db->getEscaped(JRequest::getVar( 'location' )) . "'";
     // Obtain userIP and store with entry for security reasons
     $userIp = "'" . $_SERVER['REMOTE_ADDR'] . "'";
     
     $insertFields = "INSERT INTO #__guestbook " .
          "(message, created_by, location, userip) " .  
          "VALUES (" . $fldMessage . "," . intval($uid) . "," . 
               $fldLocation . "," . $userIp . ");";
     $db->setQuery( $insertFields, 0);
     $db->query();
     echo "<h1>Thanks for the entry!</h1>";
     echo "<a href=index.php?option=com_guestbook>" . 
          "Return to guestbook</a>";
}


function displayGuestbook()
{
	$db =& JFactory::getDBO ();
	
	$query ="SELECT a.message, u.name".
		" FROM #__guestbook As a ". 
		"LEFT JOIN #__users AS u ON u.id=a.created_by".
		"ORDER BY a.created DESC";

	$db->setQuery($query, 0);

	if ($rows = $db->loadObjectList())
	{
		foreach ($rows as $row)
		{
			$rowMessage =htmlspecialchars($row->message, ENT_QUOTES);
			echo "<b>".$rowMessage ."</b>";
			echo " - " . $row->name;

			echo "<hr />";
		} 
	}
?>

<h1 class="contentheading" > Guestbook Entry Form </h1>

<form id="form1" name ="form1" method ="post" 
	action ="index.php?option=com_guestbook&task=add" >
	<p> Enter Message here:<br/> 
	<textarea name="message" cols="60" rows="4" id ="message" > </textarea>
	</p>

	<p><label> Location (optional) : </label>
		<input name="location" type="text" id ="location" />
	</p>
	
	<p> 
		<input type ="submit" name="submit" value="Post Entry" />
	</p>
	</form>
	<?php } ?>
		





