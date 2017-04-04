<?php 
	defined ('_JEXEC') or die('Restricted Access');
	
?>

<table  border="0">
  <tr>
    <td ><font size="7" face="Times New Roman, Times, serif"><strong><?php echo $this->msg; ?></strong></font> </td>
  </tr>
  <?php 
	
	for ($i=0,$n=count($this->ven); $i<$n; $i++)
	{
		$row = $this->ven[$i];
?>	
	<tr>
    <td><hr></td>    
  </tr>	
  <tr>
    <td ><strong>ID </strong></td>
    <td><?php echo $row->id; ?></td>
  </tr>
  <tr>
    <td><strong>Name</strong></td>
    <td><?php echo $row-> name; ?></td>
  </tr>
  <tr>
    <td><strong>Phone </strong></td>
    <td><?php echo $row->phone; ?></td>
  </tr>
  <tr>
    <td><strong>Mobile </strong></td>
    <td><?php echo $row->mobile; ?></td>
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
    <td><strong>Email-ID </strong></td>
    <td><?php echo $row-> emailid; ?></td>
  </tr>
  <?php } ?>
</table>
