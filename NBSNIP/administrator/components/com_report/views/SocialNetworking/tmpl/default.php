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
      <td colspan="2" align="center" valign="middle"><font size="+2" color="#0000CC" face="Times New Roman, Times, serif"><strong>Social Networking Report</strong></font></td>
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
      <td>&nbsp;</td>
      <td colspan="2"><a href="<?php echo JRoute::_('index.php?option=com_report&controller=SocialNetworking&task=allUserRpt&format=pdf',false); ?>" style="text-decoration:none"><font size="2" face="Times New Roman, Times, serif" color="#990000"><strong>All User Report </strong></font></a></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	<form name="frmUsrPrfRpt" id="frmUsrPrfRpt" method="post">
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><font size="2" face="Times New Roman, Times, serif" color="#990000"><strong>User Scrap Report </strong></font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td> Select User 
    <?php echo JHTML::_('select.genericlist',$options,'userid',null,'value','text',$this->user[0]->id); ?>	</td>
      <td><input type="submit" name="Submit" value="Generate Report" /></td>
      <td>&nbsp;</td>
    </tr>
	<input type="hidden" id="option" name="option" value="com_report"/>
	<input type="hidden" id="controller" name="controller" value="SocialNetworking" />
	<input type="hidden" id ="task" name="task" value="usrScrpRpt" />
	<input type="hidden" id ="format" name="format" value="pdf" />
		
	</form>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><font size="2" face="Times New Roman, Times, serif" color="#990000"><strong>User Activity Report </strong></font></td>
      <td>&nbsp;</td>
    </tr>
	<form name="usrActRpt" id="usrActRpt" method="post" >
	 
    <tr>
      <td>&nbsp;</td>
      <td> Select User
       <?php echo JHTML::_('select.genericlist',$options,'userid',null,'value','text',$this->user[0]->id); ?>	</td>
      <td><input type="submit" name="Submit" value="Generate Report" /></td>
      <td>&nbsp;</td>
    </tr>
	<input type="hidden" id="option" name="option" value="com_report"/>
	<input type="hidden" id="controller" name="controller" value="SocialNetworking" />
	<input type="hidden" id ="task" name="task" value="userAcitvityRpt" />
	<input type="hidden" id ="format" name="format" value="pdf" />
	</form>
	 <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	<tr>
      <td>&nbsp;</td>
      <td colspan="2"><font size="2" face="Times New Roman, Times, serif" color="#990000"><strong>User Group Report </strong></font></td>
      <td>&nbsp;</td>
    </tr>
	<form name="usrGrpRpt" id="usrGrpRpt" method="post" >
	<tr>
      <td>&nbsp;</td>
      <td> Select User
       <?php echo JHTML::_('select.genericlist',$options,'userid',null,'value','text',$this->user[0]->id); ?>	</td>
      <td><input type="submit" name="Submit" value="Generate Report" /></td>
      <td>&nbsp;</td>
    </tr>
	<input type="hidden" id="option" name="option" value="com_report"/>
	<input type="hidden" id="controller" name="controller" value="SocialNetworking" />
	<input type="hidden" id ="task" name="task" value="usrGrpRpt" />
	<input type="hidden" id ="format" name="format" value="pdf" />
	</form>
	
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
