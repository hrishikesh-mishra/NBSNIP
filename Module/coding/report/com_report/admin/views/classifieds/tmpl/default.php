<?php 
	defined ('_JEXEC') or die('Restricted Access');
	$options =array();

	for ($i=0, $n=count($this->user); $i < $n; $i++)	
	{
		$row = $this->user[$i];
		$options[]= JHTML::_('select.option',$row->userid,$row->id.'::'.$row->userid);
	}
	
	
?>
<div>
  <table width="100%" border="0">
    <tr>
      <td width="16%" height="49">&nbsp;</td>
      <td colspan="2" align="center" valign="middle"><font size="+2" color="#0000CC" face="Times New Roman, Times, serif"><strong>Classifieds Reports</strong></font></td>
      <td width="15%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="34%">&nbsp;</td>
      <td width="35%">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><a href="<?php echo JRoute::_('index.php?option=com_report&controller=classifieds&task=realstRpt&format=pdf',false); ?>" style="text-decoration:none"><font size="2" face="Times New Roman, Times, serif" color="#990000"><strong>Real-State Classifieds Report </strong></font></a></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	<tr>
      <td>&nbsp;</td>
      <td colspan="2"><a href="<?php echo JRoute::_('index.php?option=com_report&controller=classifieds&task=jobRpt&format=pdf',false); ?>" style="text-decoration:none"><font size="2" face="Times New Roman, Times, serif" color="#990000"><strong>Jobs Classifieds Report </strong></font></a></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><a href="<?php echo JRoute::_('index.php?option=com_report&controller=classifieds&task=realStDefRpt&format=pdf',false); ?>" style="text-decoration:none"><font size="2" face="Times New Roman, Times, serif" color="#990000"><strong>Real-State Defaulter Report </strong></font></a></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	 <tr>
      <td>&nbsp;</td>
      <td colspan="2"><a href="<?php echo JRoute::_('index.php?option=com_report&controller=classifieds&task=jobDefRpt&format=pdf',false); ?>" style="text-decoration:none"><font size="2" face="Times New Roman, Times, serif" color="#990000"><strong>Jobs Defaulter  Report </strong></font></a></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	<form name="sendMailFrm" id ="sendMailFrm" method="post" >
	 <tr>
      <td></td>
      <td colspan="2">Select Classifieds :  <select name="type"><option value="1" selected="selected">JObs</option>
		<option value="2">Computer </option>
		<option value="3">RealState</option>
		<option value="4">Tea</option>
    </select><input type="submit" value="Send mail to Defaulter "/></td>
      <td>&nbsp;</td>
    </tr>
	<input type="hidden" id="option" name="option" value="com_report"/>
	<input type="hidden" id="controller" name="controller" value="classifieds" />
	<input type="hidden" id ="task" name="task" value="sendMail" />
	</form>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
