<?php 
	defined ('_JEXEC') or die('Restricted Access');
	
?>

<table  border="0">
  <tr>
    <td ><font size="7" face="Times New Roman, Times, serif"><strong><?php echo $this->msg; ?></strong></font> </td>
  </tr>
  <?php 
	
	for ($i=0,$n=count($this->realst); $i<$n; $i++)
	{
		$row = $this->realst[$i];
?>	
	<tr>
    <td><hr></td>    
  </tr>	
  <tr>
    <td ><strong>ID </strong></td>
    <td><?php echo $row->id; ?></td>
  </tr>
  <tr>
    <td><strong>Title</strong></td>
    <td><?php echo $row-> title; ?></td>
  </tr>
  <tr>
    <td><strong>Company </strong></td>
    <td><?php echo $row-> company; ?></td>
  </tr>
  <tr>
    <td><strong>Location </strong></td>
    <td><?php echo $row-> location; ?></td>
  </tr>
  <tr>
    <td><strong>City </strong></td>
    <td><?php echo $row-> city; ?></td>
  </tr>
  <tr>
    <td><strong>Registration Start Date </strong></td>
    <td><?php echo $row-> regstartdate; ?></td>
  </tr>
  <tr>
    <td><strong>Registration End Date</strong></td>
    <td><?php echo $row-> regenddate; ?></td>
  </tr>
  <tr>
    <td><strong>Vendor ID</strong></td>
    <td><?php echo $row-> vid; ?></td>
  </tr>
  
  <?php } ?>
</table>
