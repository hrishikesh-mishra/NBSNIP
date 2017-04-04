<?php
 
defined ('_JEXEC') or die( "Restricted Access" );

switch (JRequest ::getVar('task'))
{

case 'search':
	searchInfo();
	break;
default :
	entryForm();
}

Function entryForm()
{
?>

<form id="form1" name="form1" method="post" action= "index.php?option=com_student&task=search" >

<p>
	Enter Enrollment No : 
	<input type="text" name="enl" /> 
	<br><br>
	<input type ="submit" name="submit" value="Display Info" />
</p>
</form>

<?php 
}

Function searchInfo()
{
	$db = & JFactory :: getDBO();
	
	$fldID= "'". $db->getEscaped(JRequest::getVar('enl'))."'";
	$db = & JFactory :: getDBO();
	$query = "SELECT * FROM #__student  " .
	" WHERE enl= " .$fldID ;

	$db->setQuery($query, 0 , 10);
	$rows = $db->loadObjectList();

	if($rows= $db->loadObjectList())
	{
	
?>


<p> 
<table >
<tr> 
	<td>  <strong><?php echo JText::_( 'Enrollment Number:' ); ?></strong></td> 
	<td> <?php echo $rows[0]->enl; ?> </td>
</tr>
<tr>
	<td> <strong><?php echo JText::_( 'Name:' ); ?></strong> </td> 
	<td><?php echo $rows[0]->name; ?><td>
</tr>

<tr>
	<td> <strong><?php echo JText::_( 'Progam:' ); ?></strong></td>
	<td><?php echo $rows[0]->pro; ?></td>
</tr>


<tr>
	<td>  <strong><?php echo JText::_( 'Study Center:' ); ?></strong></td>
	<td> <?php echo $rows[0]->scenter; ?></td>
</tr>

<tr>
	<td> <strong><?php echo JText::_( 'Regional Center:' ); ?></strong></td>
	<td><?php echo $rows[0]->regcenter; ?> </td>
</tr>

</table>
</p>
<br>
<a href="index.php?option=com_student"> Back </a>

<?php
	}
	else
	{
		echo "<h1> Enrollment Number not found.... </h1>";
		echo '<bar><a href="index.php?option=com_student"> Back </a>';
	}
}
?>