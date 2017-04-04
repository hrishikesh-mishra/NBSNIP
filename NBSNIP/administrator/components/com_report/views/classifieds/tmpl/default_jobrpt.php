<?php 
	defined ('_JEXEC') or die('Restricted Access');
	
?>

<table  border="0">
  <tr>
    <td ><font size="7" face="Times New Roman, Times, serif"><strong><?php echo $this->msg; ?> </strong></font> </td>
  </tr>
  <?php 
	
	for ($i=0,$n=count($this->job); $i<$n; $i++)
	{
		$row = $this->job[$i];
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
    <td><strong>Reference </strong></td>
    <td><?php echo $row->reference; ?></td>
  </tr>
  <tr>
    <td><strong>Job-Location </strong></td>
    <td><?php echo $row-> joblocation; ?></td>
  </tr>
  <tr>
    <td><strong>Job-City </strong></td>
    <td><?php echo $row-> jobcity; ?></td>
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
    <td><?php echo $row-> memberid; ?></td>
  </tr>
  
  <?php } ?>
</table>
