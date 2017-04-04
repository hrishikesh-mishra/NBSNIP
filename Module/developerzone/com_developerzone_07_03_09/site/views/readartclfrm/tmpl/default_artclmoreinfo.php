<?php 
 
 defined('_JEXEC') or ('Restricted Access');
 ?>
<div id="div_downmoreinfo">
  <table width="100%" border="0" cellpadding="5">
    <tr>
      <td colspan="2"><font face="Geneva, Arial, Helvetica, sans-serif" size="3" color="#3333FF" ><strong>More Information On:</strong></font> </td>
    </tr>
    <tr>
      <td width="15%"><font face="Times New Roman, Times, serif" size="3" color="#006633" ><strong>Topic</strong></font></td>
      <td width="85%"><strong>:<?php echo $this->resultInfo->title; ?></strong></td>
    </tr>
    <tr>
      <td><font face="Times New Roman, Times, serif" size="2" color="#006633" ><strong>Created On</strong></font></td>
      <td><strong>:<?php echo $this->resultInfo->createdate; ?></strong></td>
    </tr>
	<tr>
      <td><font face="Times New Roman, Times, serif" size="2" color="#006633" ><strong>Author</strong></font></td>
      <td><strong>:<?php echo $this->resultInfo->author; ?></strong></td>
    </tr>
    <tr>
      <td valign="top" align="left"><font face="Times New Roman, Times, serif" size="2" color="#006633" ><strong>Article</strong></font></td>
      <td>:<?php echo $this->resultInfo->article; ?></td>
    </tr>
	<tr> 
	<td colspan="2"><input type="button" value="Back" onClick="javascript: history.go(-1)"></td>
	</tr>
  </table>
</div>
