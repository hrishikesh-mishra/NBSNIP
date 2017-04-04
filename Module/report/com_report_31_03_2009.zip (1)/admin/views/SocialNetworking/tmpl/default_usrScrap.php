<?php 
	defined ('_JEXEC') or die('Restricted Access');	
?>

  <table border="0">
  <tr>
    
    <td ><font size="+3" face="Times New Roman, Times, serif"><strong>Social Networking User Scrap</strong></font> </td>
    <td >&nbsp;</td>
  </tr>
  
  <tr>
    
    <td colspan="3"><font size="2" face="Times New Roman, Times, serif"><strong>User ID</strong></font> </td>
    <td>&nbsp;</td>
  </tr>
  <tr>    
    <td ><strong>Receiver</strong></td>
    <td ><strong>Date</strong></td>
    <td ><strong>Scrap</strong></td>    
  </tr>
  <tr><td><hr></td></tr>
  <?php
	
	for ($i=0, $n=count($this->usrSrp); $i <$n; $i++)
	{	
		$row=$this->usrSrp[$i];
		
	?>
  <tr>
    
    <td ><strong><?php echo $row->recevier ;?></strong></td>
    <td ><strong><?php echo $row->sdate ;?></strong></td>
    <td ><strong><?php echo substr($row->scrap,0,25).'.....' ;?></strong></td>
    </tr>
	<?php } ?>
</table>
