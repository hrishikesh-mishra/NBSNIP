  <?php 
	defined ('_JEXEC') or die('Restricted Access');	
?>
  <table>
    <tr>
      <td><font color="#333333" size="10" face="Arial, Helvetica, sans-serif"><strong>Social-Networking All User Report </strong></font></td>
    </tr>
	 <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><font color="#990033" size="+1" face="Times New Roman, Times, serif"><strong>ID</strong></font></td>
      <td><font color="#990033" size="+1" face="Times New Roman, Times, serif"><strong>Userid</strong></font></td>
      <td><font color="#990033" size="+1" face="Times New Roman, Times, serif"><strong>User Name </strong></font></td>
    </tr>
	<tr>
      <td><hr></td>
    </tr>
	<?php
		for ($i=0, $n=count($this->allUser); $i <$n; $i++)
		{
			$row=$this->allUser[$i];
	?>
    <tr>
      <td><font color="#333333" size="1" face="Times New Roman, Times, serif"><?php echo $row->id; ?></font></td>
      <td><font color="#333333" size="1" face="Times New Roman, Times, serif"><?php echo $row->userid; ?></font></td>
      <td><font color="#333333" size="1" face="Times New Roman, Times, serif"><?php echo $row->firstname.' '.$row->lastname; ?></font></td>
    </tr>
	<?php
	}
	?>
  </table>
  

