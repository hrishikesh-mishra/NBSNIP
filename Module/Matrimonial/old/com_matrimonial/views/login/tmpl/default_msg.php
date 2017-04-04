<?php 
 
 defined('_JEXEC') or ('Restricted Access');
$sess= JFactory::getSession();
if (!$sess->get('access','','mat')|| !$sess->get('userid','','mat'))
{
	echo 'Access Forbiden';
	exit();
}
$userid=$sess->get('userid','','mat');
 
 ?>

<div>
  <table width="550" border="1" cellspacing="0">
    <tr>
      <td colspan="5"><font  face="Times New Roman, Times, serif" size="5" color="#660000"> <strong>
      Inbox</strong></font></td>
    </tr>
    <tr>
      <td width="8%" bgcolor="#999999"><font  face="Georgia, Times New Roman, Times, serif" size="2" color="#000099"> <strong>Sln</strong></font></td>
      <td width="13%" bgcolor="#999999"><font  face="Georgia, Times New Roman, Times, serif" size="2" color="#000099"> <strong>Date</strong></font></td>
      <td width="19%" bgcolor="#999999"><font  face="Georgia, Times New Roman, Times, serif" size="2" color="#000099"> <strong>Sender</strong></font></td>
      <td width="43%" bgcolor="#999999"><font  face="Georgia, Times New Roman, Times, serif" size="2" color="#000099"> <strong>Title</strong></font></td>
      <td width="17%" bgcolor="#999999"><font  face="Georgia, Times New Roman, Times, serif" size="2" color="#000099"> <strong>Action</strong></font></td>
    </tr>
  


    <?php
	for ($i=0, $n=count($this->msg); $i < $n; $i++)	
	{
		$row = $this->msg[$i];
		$linkread= JRoute::_('index.php?option=com_matrimonial&task=readmsg&userid='.$userid.'&mid='.$row->id, false);
		$linkdel=JRoute::_('index.php?option=com_matrimonial&task=delmsg&userid='.$userid.'&mid='.$row->id, false);		
		
	?>
   <tr> 
      <td><?php echo $i+1; ?></td>
      <td><?php echo $row->sdate; ?></td>
      <td><?php echo $row->sender; ?></td>
      <td><?php echo $row->msg; ?></td>
      <td><a href='<?php echo $linkread; ?>'> <strong>Read</strong></a><br/>
      <a href='<?php echo $linkdel; ?>' onclick='return confirm("Do you want to delete");'> <strong>Del</strong></a></td> </tr>
<?php 
}
?>
   
  </table>
</div>

