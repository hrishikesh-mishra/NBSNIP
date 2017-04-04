<?php 
	defined ('_JEXEC') or die('Restricted Access');
	$options =array();
jimport('joomla.utilities.date');
 $dateNow= new JDate();
 $dateNow=$dateNow->toFormat('%Y-%m-%d');	
	
	
	
?>
<div>
  <table width="100%" border="0">
    <tr>
      <td width="16%" height="49">&nbsp;</td>
      <td colspan="2" align="center" valign="middle"><font size="+2" color="#0000CC" face="Times New Roman, Times, serif"><strong>Visitor Reports</strong></font></td>
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
      <td colspan="2"><a href="<?php echo JRoute::_('index.php?option=com_report&controller=visitor&task=todayVisitor&format=pdf',false); ?>" style="text-decoration:none"><font size="2" face="Times New Roman, Times, serif" color="#990000"><strong>Today's Visitor Report </strong></font></a></td>
      <td>&nbsp;</td>
    </tr>
     <tr>
      <td>&nbsp;</td>
      <td width="34%">&nbsp;</td>
      <td width="35%">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	<form name="sendMailFrm" id ="sendMailFrm" method="post" >
	 <tr>
      <td></td>
      <td colspan="2"><font size="2" face="Times New Roman, Times, serif" color="#990000"><strong>Visitor Between</strong></font> : <?php echo JHTML::_('calendar',$dateNow,'sdate','sdate','%Y-%m-%d','readonly=readonly size=15'); ?> :  <select name="type"> And
	  <?php echo JHTML::_('calendar',$dateNow,'edate','edate','%Y-%m-%d','readonly=readonly size=15'); ?> 
    </select><input type="submit" value="Visitor Between Report"/></td>
      <td>&nbsp;</td>
    </tr>
	<input type="hidden" id="option" name="option" value="com_report"/>
	<input type="hidden" id="controller" name="controller" value="visitor" />
	<input type="hidden" id ="task" name="task" value="visitorBetween" />
	<input type="hidden" id ="format" name="format" value="pdf" />
	</form>
	</form>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
