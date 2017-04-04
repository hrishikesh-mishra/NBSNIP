<?php 
	defined ('_JEXEC') or die('Restricted Access');	
?>

  <table>
    <tr>
      <td>&nbsp;</td>
      <td><font color="#333333" size="2" face="Arial, Helvetica, sans-serif"><strong>Blogger's Blog Report</strong></font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><font face="Times New Roman, Times, serif" size="3" ><strong>Blogger -<?php echo $this->usrBlg[0]->userid; ?> </strong></font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><font face="Times New Roman, Times, serif" size="1" > <strong>Blogs Topic</strong></font></td>
      <td><font face="Times New Roman, Times, serif" size="1"><strong>Blog Creation Date </strong></font></td>
      <td>&nbsp;</td>
    </tr>
	<?php 
		for ($i=0, $n=count($this->usrBlg); $i <$n; $i++)
		{
			$row = $this->usrBlg[$i];;
		?>
    <tr>
      <td>&nbsp;</td>
      <td><?php echo $row->topic; ?></td>
      <td><?php echo $row->bdate; ?></td>
      <td>&nbsp;</td>
    </tr>
	<?php  } ?>
  </table>

