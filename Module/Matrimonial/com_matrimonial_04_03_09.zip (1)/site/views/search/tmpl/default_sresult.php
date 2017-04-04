<?php 
 
 defined('_JEXEC') or ('Restricted Access');
 ?>

<table border="0" cellspacing="0" cellpadding="0" > 
<tr>
<td colspan="2"> 
<div id="layer1" align="center";  style="background-image: url('components/com_matrimonial/assets/matlog.gif'); layer-background-imageurl url('components/com_matrimonial/assets/matlog.gif');  width:504px; height:70px; border: 1px none #000000"></div>
</td>
</tr>

<tr>
<td colspan="2">
<div id="layer2" align="center";  style="background-image: url('components/com_matrimonial/assets/space.gif'); layer-background-imageurl url('components/com_matrimonial/assets/space.gif');  width:574px; height:15px; border: 1px none #000000"></div>
</td>
</tr>

<tr>
<td width="324">
<div id="layer3" align="right";  style="background-image: url('components/com_matrimonial/assets/loginbase.gif'); layer-background-imageurl url('components/com_matrimonial/assets/login.gif');  width:324px; height:250px; border: 1px none #000000">
<table width="100%">
 <tr>
  <td colspan="2" height="40"> </td>
 </tr>

<form name="loginform" id="loginform" method="post" >
  <tr>
 <td width="14"/>
  <td colspan="2" height="30"> <b><font face="Verdana, Arial, Helvetica, sans-serif" size="4" color="#00FFFF"> Member Login  </font></b> </td>
  <td width="11"/>
  </tr>
  
  <tr>
  <td width="14"/>
    <td width="90"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FFFF00"><strong>Memeber Id :<strong></font></td>
    <td width="170" align="left"><input type="text" name="userid" id="userid" size="10" maxlength="20"/> </td>
   <td width="11"/>
   </tr>
   <tr>
   <td width="14"/>
   <td width="90"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FFFF00"><strong>Password :</strong></font></td>
   <td width="170" align="left"><input type="password" name="password"  id="password" size="10" maxlength="20"/></td>
   <td width="11"/>
   </tr>
   <tr>
   <td width="14"/>
   <td colspan="2"><input type="submit" value="login"></td>
   <td width="11"/>
   </tr>
<input type ="hidden" name="option" value="com_matrimonial" >
<input type="hidden" name="task" value="login" >
</form>
   <tr>
   <td width="14"/>
   <td colspan="2"><a href ='<?php echo JRoute::_("index.php?option=com_matrimonial&task=frgpwd", false); ?>'> Forget Password ?</a></td>
   <td width="11"/>
   </tr>
</table>

</div>
</td>
<td width="477">
<div id="layer4" align="left";  style="background-image: url('components/com_matrimonial/assets/searchbase.gif'); layer-background-imageurl url('components/com_matrimonial/assets/searchbase.gif');   width:477px; height:250px; border: 1px none #000000">
<form name="searchform" id="searchform" method="post">
<table width="100%">
 <tr>
  <td colspan="2" height="40"> </td>
 </tr>

  <tr>
 <td width="37"/>
  <td colspan="2" height="30"> <b><font face="Verdana, Arial, Helvetica, sans-serif" size="4" color="#00FFFF"> Partner Search </font></b> </td>
  <td width="20"/>
  </tr>

  <tr>
   <td width="37"/>
   <td width="95"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FFFF00"><strong>Search For:</strong></font></td>
   <td width="280" align="left"><SELECT name=gender> <OPTION selected>Bride</OPTION> <OPTION>Groom</OPTION></SELECT></td>
   <td width="20"/>
   </tr>

  <tr>
   <td width="37"/>
   <td width="95"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFF00"><strong>Age :</strong></font></td>
   <td width="280" align="left"><SELECT id="age1" name="age1"> <OPTION value="any" selected>any</OPTION> 
<OPTION value='' selected>any</OPTION> 
<OPTION value=18>18 years</OPTION> 
<OPTION value=19>19 years</OPTION> 
<OPTION value=20>20 years</OPTION> 
<OPTION value=21>21 years</OPTION> 
<OPTION value=22>22 years</OPTION> 
<OPTION value=23>23 years</OPTION> 
<OPTION value=24>24 years</OPTION> 
<OPTION value=25>25 years</OPTION> 
<OPTION value=26>26 years</OPTION> 
<OPTION value=27>27 years</OPTION> 
<OPTION value=28>28 years</OPTION> 
<OPTION value=29>29 years</OPTION> 
<OPTION value=30>30 years</OPTION> 
<OPTION value=31>31 years</OPTION>
<OPTION value=32>32 years</OPTION> 
<OPTION value=33>33 years</OPTION> 
<OPTION value=34>34 years</OPTION> 
<OPTION value=35>35 years</OPTION> 
<OPTION value=36>36 years</OPTION> 
<OPTION value=37>37 years</OPTION> 
<OPTION value=38>38 years</OPTION> 
<OPTION value=39>39 years</OPTION> 
<OPTION value=40>40 years</OPTION> 
<OPTION value=41>41 years</OPTION> 
<OPTION value=42>42 years</OPTION> 
<OPTION value=43>43 years</OPTION> 
<OPTION value=44>44 years</OPTION> 
<OPTION value=45>45 years</OPTION> 
<OPTION value=46>46 years</OPTION> 
<OPTION value=47>47 years</OPTION> 
<OPTION value=48>48 years</OPTION> 
<OPTION value=49>49 years</OPTION> 
<OPTION value=50>50 years</OPTION> </SELECT> 
<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFF00"><strong>to </strong></font>
<SELECT id="age2" name="age2"> 
<OPTION value='' selected>any</OPTION> 
<OPTION value=18>18 years</OPTION> 
<OPTION value=19>19 years</OPTION> 
<OPTION value=20>20 years</OPTION> 
<OPTION value=21>21 years</OPTION> 
<OPTION value=22>22 years</OPTION> 
<OPTION value=23>23 years</OPTION> 
<OPTION value=24>24 years</OPTION> 
<OPTION value=25>25 years</OPTION> 
<OPTION value=26>26 years</OPTION> 
<OPTION value=27>27 years</OPTION> 
<OPTION value=28>28 years</OPTION> 
<OPTION value=29>29 years</OPTION> 
<OPTION value=30>30 years</OPTION> 
<OPTION value=31>31 years</OPTION>
<OPTION value=32>32 years</OPTION> 
<OPTION value=33>33 years</OPTION> 
<OPTION value=34>34 years</OPTION> 
<OPTION value=35>35 years</OPTION> 
<OPTION value=36>36 years</OPTION> 
<OPTION value=37>37 years</OPTION> 
<OPTION value=38>38 years</OPTION> 
<OPTION value=39>39 years</OPTION> 
<OPTION value=40>40 years</OPTION> 
<OPTION value=41>41 years</OPTION> 
<OPTION value=42>42 years</OPTION> 
<OPTION value=43>43 years</OPTION> 
<OPTION value=44>44 years</OPTION> 
<OPTION value=45>45 years</OPTION> 
<OPTION value=46>46 years</OPTION> 
<OPTION value=47>47 years</OPTION> 
<OPTION value=48>48 years</OPTION> 
<OPTION value=49>49 years</OPTION> 
<OPTION value=50>50 years</OPTION> 
</SELECT></td>
   <td width="20"/>
   </tr>
<tr>
   <td width="37"/>
   <td width="95"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FFFF00"><strong>Community:</strong></font></td>
   <td width="280" align="left">
   <SELECT name="community" id ="community"> 
 		 <option value='' selected>Any</option>
		 <option value="hindu" >Hindu</option>
            <option value="muslim">Muslim</option>
            <option value="christian">Christian</option>
            <option value="jain">Jain</option>
            <option value="buddhist">Buddhist</option>
            <option value="sikh">Sikh</option>
</SELECT></td>
   <td width="20"/>
   </tr>
 <tr>
   <td width="37"/>
    <td colspan="2" align="center"> <input type="submit" value ="Search" />
   <td width="20"/>
   </tr>

 </table>
<input type ="hidden" name="option" value="com_matrimonial" >
<input type="hidden" name="task" value="search" >
</form>
</div>
  </td>
</tr>
<tr>
<td colspan="2">
<div id="layer4" align="left";  style="background-image: url('components/com_matrimonial/assets/base.gif'); layer-background-imageurl url('components/com_matrimonial/assets/base.gif');   width:800px; height:25px; border: 1px none #000000">
<table border="0">
<tr> 
<td width="35" />

<form name="pidform" id="pidform" method="post" >


<td width="77"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FF0033"><strong>Profile ID:</strong></font></td>

<td width="170" align="left" ><input type="text" id="pid" name="pid" size="7" maxlength="50"/></td>
<input type ="hidden" name="option" value="com_matrimonial" >
<input type="hidden" name="task" value="pidinfo" >
</form>
<td width="216"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FF0033"><strong>GuestBook:</strong></font></td>
<td width="201"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FF0033">
<a href="<?php echo JRoute::_('index.php?option=com_matrimonial&task=regform'); ?>"><strong>Registration:</strong></a></font></td>
<td width="36" />
</tr>
</table>
</div>

</td>
</tr>
</table>


<?php
	for ($i=0, $n=count($this->data); $i < $n; $i++)	
	{
		$row = $this->data[$i];
		$link= JRoute::_('index.php?option=com_matrimonial&task=pinfo&userid='.$row->userid, false);
		$linkmsg=JRoute::_('index.php?option=com_matrimonial&task=sendmsg&userid='.$row->userid, false);
		
		echo "<tr><td>";
	?>

<div id="layer<?php echo $i; ?>" align="left";  style="background-image: url('components/com_matrimonial/assets/sbase.gif'); layer-background-imageurl url('components/com_matrimonial/assets/base.gif');   width:550px; height:190px; border: 1px none #000000">
<table width="100%" border="0">
    <tr>
      <td width="1%" height="37" align="left" valign="top">&nbsp;</td>
      <td colspan="2" align="left" valign="center">Profile-ID: <font face="Verdana, Arial, Helvetica, sans-serif" size="3" color="#3F00FF"> <strong>
      <?php echo $row->userid;?></strong></font></td>
      <td width="40%" align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="26">&nbsp; </td>
      <td width="26%" rowspan="4" align="left" valign="top"><input type="image" name="imageField" 
      src="components/com_matrimonial/assets/photos/<?php
		if($row->image)
		    echo $row->image; 
		else
		    echo 'blnkphotogif.gif';	
		?>" height="120" width="140"> </td>
      <td width="33%" align="center" valign="top"><strong><?php echo $row->username; ?></strong></td>
      <td rowspan="4" align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif"  color="#990000">
      <em><?php echo substr($row->about,0,100)."...."; ?></em></font></td>
    </tr>
    <tr>
      <td height="23">&nbsp;</td>
      <td align="left" align="center" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;
      <font face="Verdana, Arial, Helvetica, sans-serif"  color="#0099FF"><?php echo "Age : " .$row->age;?> Years</font></td>
    </tr>
    <tr>
      <td height="22">&nbsp;</td>
      <td align="left" align="center" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;
      <font face="Verdana, Arial, Helvetica, sans-serif"  color="#0099FF"><?php echo "Height : " .$row->height?>cm</font> </td>
    </tr>
    <tr>
      <td height="23">&nbsp;</td>
      <td align="left" align="center" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;
      <font face="Verdana, Arial, Helvetica, sans-serif"  color="#0099FF"><?php echo $row->city .", ". $row->state; ?> </font></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top"><a href='<?php echo $link; ?>'><em><strong>View Profile</a></strong></em></a> </td>
      <td align="left" valign="top"><a href='<?php echo $linkmsg; ?>'><em><strong>Post Message.</strong></em></a></td>
    </tr>
  </table>
  </div>
		<?php
		
	}
?>
</table>
		

	
		




