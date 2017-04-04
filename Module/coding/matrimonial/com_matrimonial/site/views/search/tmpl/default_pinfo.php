<?php 
 
 defined('_JEXEC') or ('Restricted Access');
 $row=$this->data;
 
 ?>

<div id="layer1" align="center";  style="background-image: url('components/com_matrimonial/assets/fbase.gif'); layer-background-imageurl url('components/com_matrimonial/assets/fbase.gif');  width:800px; height:800px; border: 1px none #000000">
  <table width="100%" border="0">
    <tr>
      <td height="45" colspan="4" align="left" valign="bottom"><font face="Verdana, Arial, Helvetica, sans-serif" size="5" color="#0000CC">
      <strong> Personal information of <?php echo strtoupper($row->username); ?></strong></font> </td>
    </tr>
    <tr>
      <td width="19%" align="left" valign="top">&nbsp;</td>
      <td width="24%" align="left" valign="top">&nbsp;</td>
      <td width="22%" rowspan="5" align="left" valign="top">
      <input type="image" name="imageField" 
      src="components/com_matrimonial/assets/photos/<?php
		if($row->image)
		    echo $row->image; 
		else
		    echo 'blnkphotogif.gif';	
		?>" height="120" width="140"> 
      
      </td>
      <td width="35%" align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Profile-ID</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->userid; ?></strong></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Created-On</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->registrationdate; ?></strong></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="left" valign="top"><font face="Courier New, Courier, monospace" size="2" color="#F32E55" ><strong> Personal Information: </strong></font></td>
      <td colspan="2" align="left" valign="top"><font face="Courier New, Courier, monospace" size="2" color="#F32E55" ><strong>Educational &amp; Occupation Detail: </strong></font> </td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Age</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->age; ?> Years</strong></td>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Education</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->education; ?></strong></td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Gender</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->gender; ?></strong></td>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Specifice degree </strong></font> </td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->specificdegree; ?></strong></td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Marital-Status</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->mstatus; ?></strong></td>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Profession</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->profession; ?></strong></td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Height</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->height; ?> cm</strong></td>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Montly-Income</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->monthlyincome; ?></strong></td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Weight</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->weight; ?></strong></td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Complexion</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->complexion; ?></strong></td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Body-Type</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->bodytype; ?></strong></td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="left" valign="top"><font face="Courier New, Courier, monospace" size="2" color="#F32E55" ><strong>Ethnicity Detail: </strong></font></td>
      <td colspan="2" align="left" valign="top"><font face="Courier New, Courier, monospace" size="2" color="#F32E55" ><strong>Other Detail: </strong></font></td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Community</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->community; ?></strong></td>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Diet</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->diet; ?></strong></td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Family value </strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->familyvalue; ?></strong></td>
  <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Smoke</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->smoke; ?></strong></td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Mother-Tongue</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->mothertongue; ?></strong></td>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Drink</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->drink; ?></strong></td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Manglik</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->manglik; ?></strong></td>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Blood-Group</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->bloodgroup; ?></strong></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>City</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->city; ?></strong></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>States</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->state; ?></strong></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Hobbies</strong></font></td>
      <td colspan="3" valign="top"><strong>:&nbsp;<?php echo $row->hobbies; ?></strong></td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>About</strong></font></td>
      <td colspan="3" rowspan="3" align="left" valign="top"><strong>:&nbsp;<?php echo $row->about; ?></strong></td>
    </tr>
    <tr align="left" valign="top">
      <td>&nbsp;</td>
    </tr>
    <tr align="left" valign="top">
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    
    <tr>
      <td colspan="4" align="left" valign="top"><font face="Courier New, Courier, monospace" size="2" color="#F32E55" ><strong>Looking for:</strong></font> </td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Height</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->lfheight1.'cm between '. $row->lfheight2; ?>cm</strong></td>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Marital-Status</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->lfmstatus; ?></strong></td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Age</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->lfage1.' Years between '.$row->lfage2; ?> Years</strong></td>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Mother-Tongue</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->lfmothertongue; ?></strong></td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Profession</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->lfprofession; ?></strong></td>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Complexion</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->lfcomplexion; ?></strong></td>
    </tr>
     <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Matrial-Status</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->lfmstatus; ?></strong></td>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Manglik</strong></font></td>
      <td align="left" valign="top"><strong>:&nbsp;<?php echo $row->lfmanglik; ?></strong></td>
    </tr>
    <tr>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#CC00FF"><strong>Other-Requirement</strong></font></td>
      <td colspan="3" rowspan="2" align="left" valign="top"><strong>:&nbsp;<?php echo $row->lfotherrequirement; ?></strong></td>
    </tr>
    <tr align="left" valign="top">
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"><input type="button" value="Back" 
onClick="javascript: history.go(-1)">
</td>
      <td colspan="3" align="left" valign="top">&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>

