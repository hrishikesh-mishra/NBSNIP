<?php 
	defined ('_JEXEC') or die('Restricted Access');
	
?>

<table  border="0">
  <tr>
    <td  ><font size="7" face="Times New Roman, Times, serif"><strong>Visitor Report </strong></font> </td>
  </tr>
  <tr>
    <td ><font size="1" face="Times New Roman, Times, serif"><strong>ID</strong></font> </td>
    <td ><font size="1" face="Times New Roman, Times, serif"><strong>IP Address</strong></font></td>
    <td ><font size="1" face="Times New Roman, Times, serif"><strong>Acess-Time</strong></font></td>
  </tr>
  <tr>
    <td ><hr></td>
    
  </tr>
  <tr>
    <td >&nbsp;</td>    
  </tr>
  <?php
	for ($i=0, $n=count($this->vst); $i<$n; $i++)
	{
		$row=$this->vst[$i];
	?>
  <tr>
    <td ><font size="1" face="Times New Roman, Times, serif"><?php echo $row->id; ?></font> </td>
    <td ><font size="1" face="Times New Roman, Times, serif"><?php echo $row->ipaddress; ?></font></td>
    <td ><font size="1" face="Times New Roman, Times, serif"><?php echo $row->accesstime; ?></font></td>
  </tr>
  
  <?php } ?>
  <tr>
    <td ><hr></td>
    
  </tr>
  
</table>
