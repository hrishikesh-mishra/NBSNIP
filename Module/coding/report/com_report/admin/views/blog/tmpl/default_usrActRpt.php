<?php 
	defined ('_JEXEC') or die('Restricted Access');	
?>
  
  <table >
    <tr>
      <td ><font color="#333333" size="+2" face="Arial, Helvetica, sans-serif"><strong>Blog User Activity Report </strong></font></td>
    </tr>
    <tr>
      <td ><strong><font color="#333333" size="2" face="Times New Roman, Times, serif">ID </font></strong></td>
      <td ><?php echo $this->usrAct->id ; ?></td>
    </tr>
    <tr>
      <td align="left" valign="top"><strong><font color="#333333" size="2" face="Times New Roman, Times, serif">Userid</font></strong></td>
      <td align="left" valign="top"><?php echo $this->usrAct->userid ; ?></td>
    </tr>
    <tr>
      <td align="left" valign="top"><strong><font color="#333333" size="2" face="Times New Roman, Times, serif">User Name </font></strong></td>
      <td align="left" valign="top"><?php echo $this->usrAct->username ; ?></td>
    </tr>
    <tr>
      <td align="left" valign="top"><strong><font color="#333333" size="2" face="Times New Roman, Times, serif">Blocked</font></strong></td>
      <td align="left" valign="top"><?php

					if ($this->usrAct->block)
							echo "Blocked";
					else
							echo "Active";
						 ?></td>
    </tr>
    <tr>
      <td align="left" valign="top"><strong><font color="#333333" size="2" face="Times New Roman, Times, serif">Registration Date </font></strong></td>
      <td align="left" valign="top"><?php echo $this->usrAct->registrationdate; ?></td>
    </tr>
    <tr>
      <td align="left" valign="top"><strong><font color="#333333" size="2" face="Times New Roman, Times, serif">Last Visit Date </font></strong></td>
      <td align="left" valign="top"><?php echo $this->usrAct->lastvisitdate ; ?></td>
    </tr>
    <tr>
      <td align="left" valign="top"><strong><font color="#333333" size="2" face="Times New Roman, Times, serif">Email ID </font></strong></td>
      <td align="left" valign="top"><?php echo $this->usrAct->emailid ; ?></td>
    </tr>
    <tr>
      <td align="left" valign="top"><strong><font color="#333333" size="2" face="Times New Roman, Times, serif">Created By Client IP </font></strong></td>
      <td align="left" valign="top"><?php echo $this->usrAct->addedbyip ; ?></td>
    </tr>
  </table>

