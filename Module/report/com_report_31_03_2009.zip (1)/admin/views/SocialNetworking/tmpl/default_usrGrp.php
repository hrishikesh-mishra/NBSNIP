<?php 
	defined ('_JEXEC') or die('Restricted Access');
	
?>

<table  border="0">
  <tr>
    <td ><font size="7" face="Times New Roman, Times, serif"><strong>Social Networking User Group Report </strong></font> </td>
  </tr>
  <tr>
    <td ><font size="2" face="Times New Roman, Times, serif"><strong>User ID <?php echo $this->usrGrp[0]->createdby; ?></strong></font> </td>
  </tr>
  <?php 
	
	for ($i=0,$n=count($this->usrGrp); $i<$n; $i++)
	{
		$row = $this->usrGrp[$i];
?>	
	<tr>
    <td><hr></td>    
  </tr>	
  <tr>
    <td ><strong>Group Id </strong></td>
    <td><?php echo $row->id; ?></td>
  </tr>
  <tr>
    <td><strong>Topic</strong></td>
    <td><?php echo $row-> topic; ?></td>
  </tr>
  <tr>
    <td><strong>Creation Date </strong></td>
    <td><?php echo $row-> creationdate; ?></td>
  </tr>
  <tr>
    <td><strong>By Client IP </strong></td>
    <td><?php echo $row-> addedbyip; ?></td>
  </tr>
  <tr>
    <td><strong>Blocked</strong></td>
    <td><?php 
			if ($row->published)
				echo "Active";
			else
				echo "Blocked"; 
		?></td>
  </tr>
  <?php } ?>
</table>
