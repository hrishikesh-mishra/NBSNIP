<?php
defined ('_JEXEC') or die('Restricted Access');
$sess= JFactory::getSession();
$clientIP=sha1($_SERVER['REMOTE_ADDR']);

if (!$sess->get('access','','sn')|| !$sess->get('userid','','sn') || ($sess->get('clientip','','sn') !=$clientIP))
{
	echo 'Access Forbiden';
	exit();
}
?>
<div id="divReadPrf">
  <table width="100%" border="0" cellspacing="2" cellpadding="3">
    <tr>
      <td height="50" colspan="4" align="center" valign="middle"><font color="#990000" size="+2" face="Times New Roman, Times, serif"><strong>Profile Detail</strong></font></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><font face="Arial, Helvetica, sans-serif" size="3" color="#822396"><strong>Personal-Information</strong></font> </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><hr color="#009933"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="5%">&nbsp;</td>
      <td width="16%" align="left" valign="middle"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>First-Name</strong></font> </td>
      <td width="74%" align="left" valign="middle"><strong>: <?php echo $this->readPrfData->firstname; ?></strong></td>
      <td width="5%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>Last-Name </strong></font></td>
      <td align="left" valign="middle"><strong>: <?php echo $this->readPrfData->lastname; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>Sex</strong></font></td>
      <td align="left" valign="middle"><strong>: <?php echo $this->readPrfData->sex; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>Date-of-Birth</strong></font></td>
      <td align="left" valign="middle"><strong>: <?php echo $this->readPrfData->dob. '<br/>(YYYY-MM-DD)'; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><hr color="#009933"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><font face="Arial, Helvetica, sans-serif" size="3" color="#822396"><strong>Educational-Information</strong></font> </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><hr color="#009933"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>High School</strong></font></td>
      <td align="left" valign="middle"><strong>: <?php echo $this->readPrfData->highschool; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>College</strong></font></td>
      <td align="left" valign="middle"><strong>: <?php echo $this->readPrfData->college; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>University</strong></font></td>
      <td align="left" valign="middle"><strong>: <?php echo $this->readPrfData->university; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>Specific Degree</strong></font></td>
      <td align="left" valign="middle"><strong>: <?php echo $this->readPrfData->specificdegree; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><hr color="#009933"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><font face="Arial, Helvetica, sans-serif" size="3" color="#822396"><strong>Professional-Information</strong></font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><hr color="#009933"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>Job-Title</strong></font></td>
      <td align="left" valign="middle"><strong>: <?php echo $this->readPrfData->jobtitle; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>Profession</strong></font></td>
      <td align="left" valign="middle"><strong>: <?php echo $this->readPrfData->profession; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>Company/Organisation</strong></font></td>
      <td align="left" valign="middle"><strong>: <?php echo $this->readPrfData->company; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><hr color="#009933"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><font face="Arial, Helvetica, sans-serif" size="3" color="#822396"><strong>Contact-Information</strong></font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><hr color="#009933"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>Location</strong></font></td>
      <td align="left" valign="middle"><strong>: <?php echo $this->readPrfData->location; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>City</strong></font></td>
      <td align="left" valign="middle"><strong>: <?php echo $this->readPrfData->city; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>State</strong></font></td>
      <td align="left" valign="middle"><strong>: <?php echo $this->readPrfData->state; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>Postal-Code</strong></font></td>
      <td align="left" valign="middle"><strong>: <?php echo $this->readPrfData->postalcode; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>Phone</strong></font></td>
      <td align="left" valign="middle"><strong>: <?php echo $this->readPrfData->phone; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>Mobile</strong></font></td>
      <td align="left" valign="middle"><strong>: <?php echo $this->readPrfData->mobile; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><hr color="#009933"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><font face="Arial, Helvetica, sans-serif" size="3" color="#822396"><strong>About-YourSelf</strong></font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><hr color="#009933"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>Career-Skill</strong></font></td>
      <td align="left" valign="middle"><strong>: <?php echo $this->readPrfData->careerskill; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>Career-Interest</strong></font></td>
      <td align="left" valign="middle"><strong>: <?php echo $this->readPrfData->careerinterest; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="top"><font face="Georgia, Times New Roman, Times, serif" size="2" color="#8000FF"><strong>About-YourSelf</strong></font></td>
      <td rowspan="3" align="left" valign="top"><?php echo $this->readPrfData->aboutyourself; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><hr color="#009933"/></td>
    </tr>
  </table>
</div>
