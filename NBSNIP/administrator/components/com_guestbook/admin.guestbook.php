<?php 

defined ('_JEXEC') or die ('Restricted access');

switch (JRequest::getVar('task'))
{
case 'edit':
	editEntry ();
	break ;
case 'update' :
	updateEntry();
	break;
default:
	displayEntries();
	break;
}

function updateEntry()
{
	JToolBarHelper ::title (JText::_('Update Guestbook Entry') , 'addedit.png');
	
	$db =&  JFactory::getDBO();

	$fldMessage ="'" . $db->getEscaped(JRequest::getVar('message')) . "'";
	$fldLocation="'" . $db->getEscaped(JRequest::getVar('location')). "'";
	$fldID= "'". $db->getEscaped(JRequest::getVar('id'))."'";

	$insertFields ="UPDATE #__guestbook ".
		" SET message =" .$fldMessage ."," .
		" location=". $fldLocation .
		" WHERE id = " . $fldID ;

	$db->setQuery ($insertFields, 0);
	$db->query();

	echo "<h3> Field updated! </h3>";
	echo "<a href ='index.php?option=com_guestbook'> Return to GuestBook List </a>";
}

function displayEntries () 
{
	JToolBarHelper :: title(JText::_('Guest Book Entries'), 'addedit.png');

	$db =&JFactory::getDBO();
	$query ="SELECT a.id, a.message, a.created, a.created_by, u.name ".
		" FROM #__guestbook AS a".
		" LEFT JOIN #__users As u ON u.id=a.created_by".
		" ORDER BY created DESC";

	$db->setQuery ($query, 0 , 10);
	$rows = $db->loadObjectList();

?>

<table class="adminlist">
<tr>
     <td class="title" width=10%>
          <strong><?php echo JText::_( 'EntryID' ); ?></strong>
     </td>
     <td class="title" width=50%>
          <strong><?php echo JText::_( 'Entry' ); ?></strong>
     </td>
     <td class="title" width=10%>
          <strong><?php echo JText::_( 'Created' ); ?></strong>
     </td>
     <td class="title" width=10%>
          <strong><?php echo JText::_( 'Created by' ); ?></strong>
     </td>
</tr>
<?php 
	
	foreach ($rows as $row )
	{
		$link ='index.php?option=com_guestbook&tast=edit&id='. $row->id;
		$rowMessage =$row->message ;
		if (strlen($rowMessage) > 100)
		{
			$rowMessage=substr($rowMessage, 0 , 100). "....";			
		}
		echo "<tr>".
			"<td>". $row->id ." </td>".
			"<td> <a href=". $link. ">". $rowMessage . "</a></td>".
		        "<td>" . $row->created . "</td>" .
			"<td>" . $row->name . "</td>" .
			"</tr>";

	}

	echo "</table>";
	echo "<h3> Click on entry link in the table to edit entry. </h3>";
}

function editEntry()
{
	 JToolBarHelper ::title (JText :: _('Guestbook Entry Editor'), 'addedit.png');

	$db = & JFactory :: getDBO ();
	$query = "select a.id, a.message, a.created, a.created_by ,a.location" . 
		" FROM #__guestbook AS a ".
		" WHERE a.id = ". JRequest::getVar('id');

	$db->setQuery($query , 0 ,10);

	if ($rows = $db->LoadObjectList()) 
	{
?>

<form id="form1" name="form1" method="post" 
		action ="index.php?option=com_guestbook&task=update" >
	<p>Enter Message here :<br/>
	<textarea name="message" cols="60" rows="4"  id="message">
	<?php echo $rows[0]->message; ?> </textarea>
	</p>

<p> <label> Location (optional) :</label>
	<input name="location" type ="text" id="location" 
	value='<?php echo $rows[0]->location ; ?>' />

	<input name="id" type="hidden" id="id" 
		value='<?php echo $rows[0]->id; ?>' />
	</p>
	<p>
		 <input type ="submit" name ="submit" value="Record Changes " />
	</p>

</form>

<?php   }} ?>