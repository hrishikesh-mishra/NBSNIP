<div id="divgrp">
  <table width="100%" border="0" cellpadding = "1"  cellspacing="1">
    <tr>
      <td width="12%" height="45">&nbsp;</td>
      <td colspan="2" align="center" valign="middle" bgcolor="#CDFEC5"><font color="#FF0033" size="+1" face="Times New Roman, Times, serif"  ><strong>Search Result</strong></font></td>
      <td width="14%">&nbsp;</td>
    </tr>
    <tr>
      <td height="30">&nbsp;</td>
      <td colspan="2" bgcolor="#E7BCCF" ><font size="2" face="Arial, Helvetica, sans-serif" color="#009900"><strong>[<?php
		if (count($this->grpSrchResult))
		{
			echo ' ' .count($this->grpSrchResult).' ';
		}
		else
			echo " 0 ";
		?>] Search Results Found.</strong></font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" ><?php
	
		if (count ($this->grpSrchResult))
		{
		?>
		<table width="100%" border="0" cellspacing="0">
		<?php 
			$n = count ($this->grpSrchResult); 
			$k=0; 
			$counter= $n/4;
			for ($i=0 ; $i <= $counter; $i++)
			{
				echo "<tr>";
				for ($j=0; $j<4 ; $j++)
				{
					if ($k < $n)
					{
						$link =JRoute::_('index.php?option=com_socialnetworking&task=discDtl&id='.$this->grpSrchResult[$k]->id,false);
						echo '<td bgcolor="#EAEAEA" height="20" width = "25%" align="center" valign="middle"><a href="'.$link.'" style="text-decoration:none"><strong>'. $this->grpSrchResult[$k]->topic. '</strong></a></td>'; 
						$k++;
					}
					else
						echo '<td bgcolor="#EAEAEA" height="20"  width = "25%"  align="center" valign="middle">&nbsp;</td>';
				}
				echo "</td>";
			}
			?>
        </table>
		<?php  }?>		</td>
      <td>&nbsp;</td>
    </tr>
   
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>