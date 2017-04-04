<?php 
 
 defined('_JEXEC') or ('Restricted Access');
 ?>
<div id="div_sresult">
  <table width="60%" border="2" cellpadding="5" rules="rows">

    <tr>
      <td height="44" colspan="2"><font face="Courier New, Courier, monospace" size="4" color="#990000"><strong>Your Search Result </strong></font>
      <p><font face="Georgia, Times New Roman, Times, serif" size="2" color="#3366FF"><strong><?php echo $this->info; ?></strong></font></p></td>
    </tr>
	<?php 
	
		for($i=0, $n=count($this->artclresult); $i<$n; $i++)
		{
			$row=$this->artclresult[$i];
		?>
			
    <tr>
      <td width="10%" height="33"></td>
      <td width="90%" valign="Top"><?php
		echo '<font face="Georgia, Times New Roman, Times, serif" size="2" color="#FF33DD"><strong>'.$row->title.'</strong></font>';
		echo '<br/>Author :'.$row->author;
		echo '<br/>Created :'.$row->createdate;
		echo '<br/><a href="'. JRoute::_('index.php?option=com_developerzone&task=artclmoreinfo&id='.$row->id).'" style="text-decoration:none"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#25DD00"><strong><em>More Info:</em></strong></font></a></td>';
		
		}?></td>
	  
    </tr>
	
  </table>
  <input type="button" value="Back" onClick="javascript: history.go(-1)">
</div>
