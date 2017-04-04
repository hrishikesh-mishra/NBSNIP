<?php 
 
defined('_JEXEC') or ('Restricted Access');
 ?>

<script type="text/javascript">
 <!--
function submitbutton(pressbutton) 
{
		var form = document.adminForm;
			
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}				

	var form = document.adminForm;
	var err=new String();

	if (form.monthlyincome.value=="")
		err +='Monthly income not specified. <br/>';
	
	if (form.hobbies.value=="")
		err+='Hobbies not specified. <br/>';
	
	if( form.about.value=="")
		err +='About ourself not specified. <br/>';
	
	if ( form.about.value.length < 100)
		err +='About ourself could not less 100 characters. <br/>';
	
	if (form.location.value=="")
		err +='Location is not specified. <br/>';
	
	if (form.city.value=="")
		err +='city is not specified. <br/>';
	
	if (form.phone.value=="" && form.mobile.value=="" )
		err +='Contact number is specified. <br/>';
	if (err.length !=0)
       {
         errid = document.getElementById("errtext");
         errid.innerHTML = err;
       
       }
	else
		{
				submitform(pressbutton);
		}

       
  }

  function checksize()
  {
  
   if (document.all || document.getElementById)
    {
	var counter= document.getElementById("ctype");
	var text = document.getElementById("about");
	counter.value= text.value.length;
    }
  }
-->
  </script>
  

<style type="text/css">
  .errtext{ color :red; }
  </style>

<form name="adminForm" id="adminForm" method="post"  enctype="multipart/form-data"  onkeyup="checksize()"> 
<div id="pcreate">
  <table width="100%" border="0">
    <tr>
      <td colspan="4"><li><font face="Geneva, Arial, Helvetica, sans-serif" size="4" color="#FF0000"><strong> Edit Profile </strong></font></li>
       
	  </p>
	  <hr/></td>
    </tr>
    <tr>
    <td colspan="4"> <div id="errtext" name="errtext" class="errtext"></div></td>
    </tr>

    <tr>
      <td colspan="4"><strong><em>Your Profile Detail</em></strong> </td>
    </tr>
    <tr>
      <td width="17%" height="26" align="left" valign="top">Profile Create By</td>
      <td width="25%" align="left" valign="top"><strong>:</strong>        
	  <select name="pcby" id ="pcby"><option  selected value="self">Self</option><option value="Parent_Guradian">Parent_Guradian</option><option value="sibling"> Sibling</option>
	  <option value="friend">Friend</option><option value="other">Other </option></select> </td>
      <td width="46%" rowspan="11" align="left" valign="top"></td>
      <td width="12%" align="left" valign="top">&nbsp;</td>
    </tr>

    <tr>
      <td height="26" align="left" valign="top">Gender</td>
      <td align="left" valign="top"><strong>:</strong>
        <select name="gender" id="gender" > <option value="male" selected> Male</option><option value="female">Female</option>
        </select></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Marital Status</td>
      <td align="left" valign="top"><strong>:</strong>
        <select name="mstatus" id ="mstatus" >
		<option value="Never Married" selected >Never Married</option>
		<option value="Divorced">Divorced</option>
		<option value="Widowed">Widowed</option>
		<option value="Separate">Separate</option>
		<option value="Annulled">Annulled</option>
        </select></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="12" align="left" valign="top">Weight</td>
      <td align="left" valign="top"><strong>:
        <select name="weight">
		<option value="below-30">below-30</option>
		<option value="30-to-35">30-to-35</option>
		<option value="35-to-40">35-to-40</option>
		<option value="40-to-45">40-to-45</option>
		<option value="45-to-50">45-to-50</option>
		<option value="50-to-55">50-to-55</option>
		<option value="55-to-60" selected >55-to-60</option>
		<option value="60-to-65">60-to-65</option>
		<option value="65-to-70">65-to-70</option>
		<option value="70-to-75">70-to-75</option>
		<option value="75-to-80">75-to-80</option>
		<option value="85-to-90">85-to-90</option>
		<option value="90-to-95">90-to-95</option>
		<option value="95-to-100">95-to-100</option>
		<option value="More than 100">More than 100</option>
        </select>
      </strong></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="12" align="left" valign="top">Age</td>
      <td align="left" valign="top">:
        <select name="age" id="age">
	<?php 
	
	 for ($i=18; $i<=60; $i++)
    {
	echo "<option value=".$i.">".$i."Years" ."</option>";
  }
	?>
        <option value="more than 60" >more than 60year </option>
        </select>      </td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Body Type </td>
      <td align="left" valign="top"><strong>:
        <select name="bodytype" id ="bodytype">
		<option value="silm">silm</option>
		<option value="average" selected >average</option>
		<option value="athletic">athletic</option>
		<option value="heavy">heavy</option>
        </select>
      </strong></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Complexion</td>
      <td align="left" valign="top"><strong>:
        <select name="complexion" id="complexion" >
		<option value="Very_Fair">Very_Fari</option>
		<option value="Fair" selected >Fair</option>
		<option value="Wheatish">Wheatish</option>
		<option value="Wheatish_medium">Wheatish_medium</option>
		<option value="Wheatish_brown">Wheatish_brown</option>
		<option value="Dark">Dark</option>
        </select>
      </strong></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Height</td>
      <td align="left" valign="top"><strong>:</strong>
        <select name="height" id ="height">
		<option value="134">4ft 5in - 134cm</option>
		<option value="137">4ft 6in - 137cm</option>
		<option value="139">4ft 7in - 139cm</option>
		<option value="142">4ft 8in - 142cm</option>
		<option value="144">4ft 9in - 144cm</option>
		<option value="147">4ft 10in - 147cm</option>
		<option value="149">4ft 11in - 149cm</option>
		<option value="154">5ft 1in - 154cm</option>
		<option value="157">5ft 2in - 157cm</option>
		<option value="160">5ft 3in - 160cm</option>
		<option value="162">5ft 4in - 162cm</option>
		<option value="165" >5ft 5in - 165cm</option>
		<option value="167">5ft 6in - 167cm</option>
		<option value="170">5ft 7in - 170cm</option>
		<option value="172">5ft 8in - 172cm</option>
		<option value="175">5ft 9in - 175cm</option>
		<option value="177">5ft 10in - 177cm</option>
		<option value="180">5ft 11in - 180cm</option>
		<option value="182">6ft - 182cm</option>
		<option value="185">6ft 1in - 185cm</option>
		<option value="187">6ft 2in - 187cm</option>
		<option value="190">6ft 3in - 190cm</option>
		<option value="193">6ft 4in - 193cm</option>
		<option value="195">6ft 5in - 195cm</option>
		<option value="198">6ft 6in - 198cm</option>
		<option value="200">6ft 7in - 200cm</option>
		<option value="203">6ft 8in - 203cm</option>
		<option value="205">6ft 9in - 205cm</option>
		<option value="208">6ft 10in - 208cm</option>
		<option value="210"selected>6ft 11in - 210cm</option>
		<option value="213">7ft - 213cm</option>	
        </select></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Mother Tongue </td>
      <td align="left" valign="top"><strong>:
        <select name="mothertongue" id="mothertongue" >
		<option value="Aka"  >Aka</option>
		<option value="Arabic" >Arabic</option>
		<option value="Arunachali" >Arunachali</option>
		<option value="Assamese" >Assamese</option>
		<option value="Awadhi"  >Awadhi</option>
		<option value="Baluchi" >Baluchi</option>
		<option value="Bengali" >Bengali</option>
		<option value="Bhojpuri" >Bhojpuri</option>
		<option value="Bhutia" >Bhutia</option>
		<option value="Brahui" >Brahui</option>
		<option value="Brij" >Brij</option>
		<option value="Burmese" >Burmese</option>
		<option value="Chattisgarhi" >Chattisgarhi</option>
		<option value="Chinese" >Chinese</option>
		<option value="Coorgi" >Coorgi</option>
		<option value="Dogri" >Dogri</option>
		<option value="English" >English</option>
		<option value="French" >French</option>
		<option value="Garhwali" >Garhwali</option>
		<option value="Gujarati" >Gujarati</option>
		<option value="Garo" >Garo</option>
		<option value="Haryanavi" >Haryanavi</option>
		<option value="Himachali/Pahari" >Himachali/Pahari</option>
		<option value="Hindi" selected >Hindi</option>
		<option value="Hindko" >Hindko</option>
		<option value="Kakbarak" >Kakbarak</option>
		<option value="Kanauji" >Kanauji</option>
		<option value="Kannada" >Kannada</option>
		<option value="Kashmiri" >Kashmiri</option>
		<option value="Khandesi" >Khandesi</option>
		<option value="Khasi" >Khasi</option>
		<option value="Konkani" >Konkani</option>
		<option value="Konkani" >Konkani</option>
		<option value="Koshali" >Koshali</option>
		<option value="Kumaoni" >Kumaoni</option>
		<option value="Kutchi" >Kutchi</option>
		<option value="Ladakhi" >Ladakhi</option>
		<option value="Lepcha" >Lepcha</option>
		<option value="Magahi" >Magahi</option>
		<option value="Maithili" >Maithili</option>
		<option value="Malay" >Malay</option>
		<option value="Malayalam" >Malayalam</option>
		<option value="Manipuri" >Manipuri</option>
		<option value="Marathi" >Marathi</option>
		<option value="Marwari" >Marwari</option>
		<option value="Miji" >Miji</option>
		<option value="Mizo" >Mizo</option>
		<option value="Monpa" >Monpa</option>
		<option value="Nepali" >Nepali</option>
		<option value="Oriya" >Oriya</option>
		<option value="Pashto" >Pashto</option>
		<option value="Persian" >Persian</option>
		<option value="Punjabi" >Punjabi</option>
		<option value="Rajasthani" >Rajasthani</option>
		<option value="Russian" >Russian</option>
		<option value="Sanskrit" >Sanskrit</option>
		<option value="Santhali" >Santhali</option>
		<option value="Seraiki" >Seraiki</option>
		<option value="Sindhi" >Sindhi</option>
		<option value="Sinhala" >Sinhala</option>
		<option value="Spanish" >Spanish</option>
		<option value="Swedish" >Swedish</option>
		<option value="Tagalog" >Tagalog</option>
		<option value="Tamil" >Tamil</option>
		<option value="Telugu" >Telugu</option>
		<option value="Tulu" >Tulu</option>
		<option value="Urdu" >Urdu</option>
		<option value="Other" >Other</option>
        </select>
      </strong></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="11" align="left" valign="top">Community</td>
      <td align="left" valign="top"><strong>:
	  
         
		
		<select name="community" id ="community"  >        
		<option value="hindu" >Hindu</option>
            <option value="muslim">Muslim</option>
            <option value="christian" >Christian</option>
            <option value="jain">Jain</option>
            <option value="buddhist">Buddhist</option>
            <option value="sikh">Sikh</option>
        </select>		
      </strong></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="13" align="left" valign="top">Zodic Sign </td>
      <td align="left" valign="top"><strong>:
        <select name="zodic" id="zodic">
		 <option value="cancer" selected>cancer</option>
        </select>
      </strong></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Manglik/Kuja Doshan </td>
      <td colspan="3" align="left" valign="top"><strong>:
        <select name="manglik" id="manglik">
            <option value="Yes">Yes</option>
            <option value="No" selected>No</option>
            <option value="Do not know">Do not know</option>
            <option value="Not applicable">not applicable</option>
		   </select>
      </strong></td>
    </tr>
    <tr>
      <td height="26" colspan="4"><hr/></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Education</td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
        <select name="education" id="education">
		<option value="Bachelors">Bachelors</option>
		<option value="Masters" selected>Masters</option>
		<option value="Doctorate">Doctorate</option>
		<option value="Diploma">Diploma</option>
		<option value="Undergraduate">Undergraduate</option>
		<option value="Associates degree">Associates degree</option>
		<option value="Honours degree ">Honours degree </option>
		<option value="Trade school">Trade school</option>
		<option value="High school">High school</option>
		<option value="Less than high school">Less than high school</option>
		</select>
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Specific degree </td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
          <input type="text" name="specificdegree" id="specificdegree" size="20" maxlength="40"
		  value="<?php 
					if($this->profile->specificdegree)
						echo $this->profile->specificdegree ;
					?>"/>
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Profession</td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
        <select name="profession" id="profession">
		<option value="Not working" selected>Not working</option>
		<option value="Non-mainstream professional">Non-mainstream professional</option>
		<option value="Accountant">Accountant</option>
		<option value="Acting Professional">Acting Professional</option>
		<option value="Actor">Actor</option>
		<option value="Administration">Administration</option>
		<option value="Professional Advertising">Professional Advertising</option>
		<option value="Professional Air Hostess">Professional Air Hostess</option>
		<option value="Architect">Architect</option>
		<option value="Artisan">Artisan</option>
		<option value="Audiologist">Audiologist</option>
		<option value="Banker">Banker</option>
		<option value="Beautician">Beautician</option>
		<option value="Biologist / Botanist">Biologist / Botanist</option>
		<option value="Business Person">Business Person</option>
		<option value="Chartered Accountant">Chartered Accountant</option>
		<option value="Civil Engineer">Civil Engineer</option>
		<option value="Clerical Official">Clerical Official</option>
		<option value="Commercial Pilot">Commercial Pilot</option>
		<option value="Company Secretary">Company Secretary</option>
		<option value="Computer Professional">Computer Professional</option>
		<option value="Consultant">Consultant</option>
		<option value="Contractor Cost">Contractor Cost</option>
		<option value="Accountant">Accountant</option>
		<option value="Defense Employee">Defense Employee</option>
		<option value="Doctor">Doctor</option>
		<option value=" Engineer"> Engineer</option>
		<option value="Factory worker">Factory worker</option>
		<option value="Farmer">Farmer</option>
		<option value="Fashion Designer">Fashion Designer</option>
		<option value="Hotel & Restaurant Professional">Hotel & Restaurant Professional</option>
		<option value="Human Resources Professional">Human Resources Professional</option>
		<option value="Professional IT / Telecom Professional">Professional IT / Telecom Professional</option>
		<option value="Journalist">Journalist</option>
		<option value="Lawyer">Lawyer</option>
		<option value="Lecturer">Lecturer</option>
		<option value="Merchant Naval Officer">Merchant Naval Officer</option>
		<option value="Nurse">Nurse</option>
		<option value="Politician">Politician</option>
		<option value="Professor">Professor</option>
		<option value="Real Estate Professional">Real Estate Professional</option>
		<option value="Software Consultant">Software Consultant</option>
		<option value="Sportsman">Sportsman</option>
		<option value="Student">Student</option>
		<option value="Teacher">Teacher</option>
		<option value="Veterinary Doctor">Veterinary Doctor</option>
		<option value="Volunteer">Volunteer</option>
		<option value="Writer">Writer</option>
		<option value=" Zoologist"> Zoologist</option>
        </select>
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Monthy income </td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
          <input type="text" name="monthlyincome" id="monthlyincome" size="20" maxlength="20"
		  value="<?php 
					if($this->profile->monthlyincome)
						echo $this->profile->monthlyincome;
					?>"/>
      </strong></td>
    </tr>
    <tr>
      <td height="26" colspan="4"><hr></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Family Values </td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
        <select name="familyvalue" id="familyvalue">
		<option value="Traditional">Traditional</option>
		<option value="Moderate" selected>Moderate</option>
		<option value="Liberal">Liberal</option>
        </select>
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Diet</td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
        <select name="diet" id="diet">
		<option value="Veg" selected>Veg</option>
		<option value="Non-Veg Occasionally">Non-Veg Occasionally</option>
		<option value="Non-Veg">Non-Veg</option>
		<option value="Eggetarian">Eggetarian</option>
		<option value="Jain">Jain</option>
		<option value="Vegan">Vegan</option>
        </select>
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Smoke</td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
        <select name="smoke" id ="smoke">
		<option value="No" selected>No</option>
		<option value="Yes">Yes</option>
		<option value="Occasionally">Occasionally</option>
        </select>
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Drink</td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
        <select name="drink" id ="drink" >
		<option value="No" selected>No</option>
		<option value="Yes">Yes</option>
		<option value="Occasionally">Occasionally</option>
        </select>
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Blood group </td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
        <select name="bloodgroup" id="bloodgroup">
		<option value="A+">A+</option>
		<option value="A-">A-</option>
		<option value="B+">B+</option>
		<option value="B-">B-</option>
		<option value="O+" selected>O+</option>
		<option value="O-">O-</option>
		<option value="AB+">AB+</option>
		<option value="AB-">AB-</option>
        </select>
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Hobbies</td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
          <input type="text" name="hobbies" id="hobbies" size="25" maxlength="100" 
		  value="<?php
				if ($this->profile->hobbies)
					echo $this->profile->hobbies;
				?>">
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">About ourself </td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
          <textarea name="about" id="about" rows="5" cols="60"><?php 
			if ($this->profile->about)
			{	
				echo $this->profile->about;
			}
			?></textarea>
	  <br/>
	  <p>Character Typed :<input type="text" name="ctype" id="ctype" size="3" readonly="readonly"
	  value="<?php
			if ($this->profile->about)
				echo strlen($this->profile->about);
			?>"/> (minimum: 100 character) </p>
	  
      </strong></td>
    </tr>
    <tr>
      <td height="26" colspan="4"><hr/></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Location</td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
          <input type="text" name="location" id="location" maxlength="100"
		  value="<?php
				if ($this->profile->location)
					echo $this->profile->location;
				?>"/>
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">City</td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
          <input type="text" name="city" id="city" maxlength="25"
		  value="<?php
				if ($this->profile->city)
					echo $this->profile->city;
				?>">
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">State</td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
        <select name="state" id="state">
		<option value="Andaman & Nicobar">Andaman & Nicobar</option>
		<option value="Andhra Pradesh">Andhra Pradesh</option>
		<option value="Arunachal Pradesh">Arunachal Pradesh</option>
		<option value="Assam">Assam</option>
		<option value="Bihar">Bihar</option>
		<option value="Chandigarh">Chandigarh</option>
		<option value="Chhattisgarh">Chhattisgarh</option>
		<option value="Dadra & Nagar Haveli">Dadra & Nagar Haveli</option>
		<option value="Daman & Diu">Daman & Diu</option>
		<option value="Delhi">Delhi</option>
		<option value="Goa">Goa</option>
		<option value="Gujarat">Gujarat</option>
		<option value="Haryana">Haryana</option>
		<option value="Himachal Pradesh">Himachal Pradesh</option>
		<option value="Jammu & Kashmir">Jammu & Kashmir</option>
		
		<option value="Jharkhand">Jharkhand</option>
		<option value="Karnataka">Karnataka</option>
		<option value="Kerala">Kerala</option>
		<option value="Lakshadweep">Lakshadweep</option>
		<option value="Madhya  Pradesh">Madhya  Pradesh</option>
		<option value="Maharashtra">Maharashtra</option>
		<option value="Manipur">Manipur</option>
		<option value="Meghalaya">Meghalaya</option>
		<option value="Mizoram">Mizoram</option>
		
		<option value="Nagaland">Nagaland</option>
		<option value="Orissa">Orissa</option>
		<option value="Pondicherry">Pondicherry</option>
			
		<option value="Punjab">Punjab</option>
		<option value="Rajasthan">Rajasthan</option>
		<option value="Sikkim">Sikkim</option>
		<option value="TamilNadu">TamilNadu</option>
		<option value="Tripura">Tripura</option>
		<option value="Uttar Pradesh">Uttar Pradesh</option>
		<option value="Uttaranchal">Uttaranchal</option>
		<option value="West Bengal" selected>West Bengal</option>
		<option value="Other">Other</option>
        </select>
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Phone</td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
          
        <input type="text" name="phone" id="phone" size="15" maxlength="20"
		value="<?php
				if ($this->profile->phone)
					echo $this->profile->phone;
				?>"/>
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Mobile</td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
          <input type="text" name="mobile" id="mobile" size="15" maxlength="20"
		  value="<?php
				if ($this->profile->mobile)
					echo $this->profile->mobile;
				?>"/>
      </strong></td>
    </tr>
    <tr>
      <td height="26" colspan="4"><hr/></td>
    </tr>
    
    
    <tr align="left" valign="top">
      <td height="26" colspan="4"><strong><em>Looking for:</em></strong> </td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Height</td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
        <select name="lfheight1" id="lfheight1">	
		<option value="134" selected>4ft 5in - 134cm</option>
		<option value="137">4ft 6in - 137cm</option>
		<option value="139">4ft 7in - 139cm</option>
		<option value="142">4ft 8in - 142cm</option>
		<option value="144">4ft 9in - 144cm</option>
		<option value="147">4ft 10in - 147cm</option>
		<option value="149">4ft 11in - 149cm</option>
		<option value="154">5ft 1in - 154cm</option>
		<option value="157">5ft 2in - 157cm</option>
		<option value="160">5ft 3in - 160cm</option>
		<option value="162">5ft 4in - 162cm</option>
		<option value="165" >5ft 5in - 165cm</option>
		<option value="167">5ft 6in - 167cm</option>
		<option value="170">5ft 7in - 170cm</option>
		<option value="172">5ft 8in - 172cm</option>
		<option value="175">5ft 9in - 175cm</option>
		<option value="177">5ft 10in - 177cm</option>
		<option value="180">5ft 11in - 180cm</option>
		<option value="182">6ft - 182cm</option>
		<option value="185">6ft 1in - 185cm</option>
		<option value="187">6ft 2in - 187cm</option>
		<option value="190">6ft 3in - 190cm</option>
		<option value="193">6ft 4in - 193cm</option>
		<option value="195">6ft 5in - 195cm</option>
		<option value="198">6ft 6in - 198cm</option>
		<option value="200">6ft 7in - 200cm</option>
		<option value="203">6ft 8in - 203cm</option>
		<option value="205">6ft 9in - 205cm</option>
		<option value="208">6ft 10in - 208cm</option>
		<option value="210">6ft 11in - 210cm</option>
		<option value="213">7ft - 213cm</option>	
        </select>
      -to-
      <select name="lfheight2" id="lfheight2">
	  
		<option value="134">4ft 5in - 134cm</option>
		<option value="137">4ft 6in - 137cm</option>
		<option value="139">4ft 7in - 139cm</option>
		<option value="142">4ft 8in - 142cm</option>
		<option value="144">4ft 9in - 144cm</option>
		<option value="147">4ft 10in - 147cm</option>
		<option value="149">4ft 11in - 149cm</option>
		<option value="154">5ft 1in - 154cm</option>
		<option value="157">5ft 2in - 157cm</option>
		<option value="160">5ft 3in - 160cm</option>
		<option value="162">5ft 4in - 162cm</option>
		<option value="165" >5ft 5in - 165cm</option>
		<option value="167">5ft 6in - 167cm</option>
		<option value="170">5ft 7in - 170cm</option>
		<option value="172">5ft 8in - 172cm</option>
		<option value="175">5ft 9in - 175cm</option>
		<option value="177">5ft 10in - 177cm</option>
		<option value="180">5ft 11in - 180cm</option>
		<option value="182">6ft - 182cm</option>
		<option value="185">6ft 1in - 185cm</option>
		<option value="187">6ft 2in - 187cm</option>
		<option value="190">6ft 3in - 190cm</option>
		<option value="193">6ft 4in - 193cm</option>
		<option value="195">6ft 5in - 195cm</option>
		<option value="198">6ft 6in - 198cm</option>
		<option value="200">6ft 7in - 200cm</option>
		<option value="203">6ft 8in - 203cm</option>
		<option value="205">6ft 9in - 205cm</option>
		<option value="208">6ft 10in - 208cm</option>
		<option value="210"selected>6ft 11in - 210cm</option>
		<option value="213">7ft - 213cm</option>	
      </select>
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Age:</td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
        <select name="lfage1" id="lfage1">
	<?php 
	
	 for ($i=18; $i<=60; $i++)
   	 {
		echo "<option value=".$i.">".$i."Years" ."</option>";
  	 }
	?>
        </select>
      -to-
      <select name="lfage2" id="lfage2">
	<?php 
	
	 for ($i=18; $i<=60; $i++)
   	 {
		echo "<option value=".$i.">".$i."Years" ."</option>";
  	 }
	?>
      </select>
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Matrial-Status</td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
        <select name="lfmstatus" id="lfmstatus">
		<option value="Never Married" selected >Never Married</option>
		<option value="Divorced">Divorced</option>
		<option value="Widowed">Widowed</option>
		<option value="Separate">Separate</option>
		<option value="Annulled">Annulled</option>
        </select>
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Community</td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
        <select name="lfcommunity" id="lfcommunity">
		<option value="hindu" selected>Hindu</option>
            <option value="muslim">Muslim</option>
            <option value="christian">Christian</option>
            <option value="jain">Jain</option>
            <option value="buddhist">Buddhist</option>
            <option value="sikh">Sikh</option>
        </select>
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Mother-Tongue </td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
        <select name="lfmothertongue" id="lfmothertongue">
		<option value="Aka"  >Aka</option>
		<option value="Arabic" >Arabic</option>
		<option value="Arunachali" >Arunachali</option>
		<option value="Assamese" >Assamese</option>
		<option value="Awadhi"  >Awadhi</option>
		<option value="Baluchi" >Baluchi</option>
		<option value="Bengali" >Bengali</option>
		<option value="Bhojpuri" >Bhojpuri</option>
		<option value="Bhutia" >Bhutia</option>
		<option value="Brahui" >Brahui</option>
		<option value="Brij" >Brij</option>
		<option value="Burmese" >Burmese</option>
		<option value="Chattisgarhi" >Chattisgarhi</option>
		<option value="Chinese" >Chinese</option>
		<option value="Coorgi" >Coorgi</option>
		<option value="Dogri" >Dogri</option>
		<option value="English" >English</option>
		<option value="French" >French</option>
		<option value="Garhwali" >Garhwali</option>
		<option value="Gujarati" >Gujarati</option>
		<option value="Garo" >Garo</option>
		<option value="Haryanavi" >Haryanavi</option>
		<option value="Himachali/Pahari" >Himachali/Pahari</option>
		<option value="Hindi" selected >Hindi</option>
		<option value="Hindko" >Hindko</option>
		<option value="Kakbarak" >Kakbarak</option>
		<option value="Kanauji" >Kanauji</option>
		<option value="Kannada" >Kannada</option>
		<option value="Kashmiri" >Kashmiri</option>
		<option value="Khandesi" >Khandesi</option>
		<option value="Khasi" >Khasi</option>
		<option value="Konkani" >Konkani</option>
		<option value="Konkani" >Konkani</option>
		<option value="Koshali" >Koshali</option>
		<option value="Kumaoni" >Kumaoni</option>
		<option value="Kutchi" >Kutchi</option>
		<option value="Ladakhi" >Ladakhi</option>
		<option value="Lepcha" >Lepcha</option>
		<option value="Magahi" >Magahi</option>
		<option value="Maithili" >Maithili</option>
		<option value="Malay" >Malay</option>
		<option value="Malayalam" >Malayalam</option>
		<option value="Manipuri" >Manipuri</option>
		<option value="Marathi" >Marathi</option>
		<option value="Marwari" >Marwari</option>
		<option value="Miji" >Miji</option>
		<option value="Mizo" >Mizo</option>
		<option value="Monpa" >Monpa</option>
		<option value="Nepali" >Nepali</option>
		<option value="Oriya" >Oriya</option>
		<option value="Pashto" >Pashto</option>
		<option value="Persian" >Persian</option>
		<option value="Punjabi" >Punjabi</option>
		<option value="Rajasthani" >Rajasthani</option>
		<option value="Russian" >Russian</option>
		<option value="Sanskrit" >Sanskrit</option>
		<option value="Santhali" >Santhali</option>
		<option value="Seraiki" >Seraiki</option>
		<option value="Sindhi" >Sindhi</option>
		<option value="Sinhala" >Sinhala</option>
		<option value="Spanish" >Spanish</option>
		<option value="Swedish" >Swedish</option>
		<option value="Tagalog" >Tagalog</option>
		<option value="Tamil" >Tamil</option>
		<option value="Telugu" >Telugu</option>
		<option value="Tulu" >Tulu</option>
		<option value="Urdu" >Urdu</option>
		<option value="Other" >Other</option>
        </select>
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Manglik/Kuja Doshan </td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
        <select name="lfmanglik" id="lfmanglik">
		    <option value="Yes">Yes</option>
            <option value="No" selected>No</option>
            <option value="Not applicable">not applicable</option>
        </select>
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Profession</td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
        <select name="lfprofession" id="lfprofession" >
		<option value="Not working" selected>Not working</option>
		<option value="Non-mainstream professional">Non-mainstream professional</option>
		<option value="Accountant">Accountant</option>
		<option value="Acting Professional">Acting Professional</option>
		<option value="Actor">Actor</option>
		<option value="Administration">Administration</option>
		<option value="Professional Advertising">Professional Advertising</option>
		<option value="Professional Air Hostess">Professional Air Hostess</option>
		<option value="Architect">Architect</option>
		<option value="Artisan">Artisan</option>
		<option value="Audiologist">Audiologist</option>
		<option value="Banker">Banker</option>
		<option value="Beautician">Beautician</option>
		<option value="Biologist / Botanist">Biologist / Botanist</option>
		<option value="Business Person">Business Person</option>
		<option value="Chartered Accountant">Chartered Accountant</option>
		<option value="Civil Engineer">Civil Engineer</option>
		<option value="Clerical Official">Clerical Official</option>
		<option value="Commercial Pilot">Commercial Pilot</option>
		<option value="Company Secretary">Company Secretary</option>
		<option value="Computer Professional">Computer Professional</option>
		<option value="Consultant">Consultant</option>
		<option value="Contractor Cost">Contractor Cost</option>
		<option value="Accountant">Accountant</option>
		<option value="Defense Employee">Defense Employee</option>
		<option value="Doctor">Doctor</option>
		<option value=" Engineer"> Engineer</option>
		<option value="Factory worker">Factory worker</option>
		<option value="Farmer">Farmer</option>
		<option value="Fashion Designer">Fashion Designer</option>
		<option value="Hotel & Restaurant Professional">Hotel & Restaurant Professional</option>
		<option value="Human Resources Professional">Human Resources Professional</option>
		<option value="Professional IT / Telecom Professional">Professional IT / Telecom Professional</option>
		<option value="Journalist">Journalist</option>
		<option value="Lawyer">Lawyer</option>
		<option value="Lecturer">Lecturer</option>
		<option value="Merchant Naval Officer">Merchant Naval Officer</option>
		<option value="Nurse">Nurse</option>
		<option value="Politician">Politician</option>
		<option value="Professor">Professor</option>
		<option value="Real Estate Professional">Real Estate Professional</option>
		<option value="Software Consultant">Software Consultant</option>
		<option value="Sportsman">Sportsman</option>
		<option value="Student">Student</option>
		<option value="Teacher">Teacher</option>
		<option value="Veterinary Doctor">Veterinary Doctor</option>
		<option value="Volunteer">Volunteer</option>
		<option value="Writer">Writer</option>
		<option value=" Zoologist"> Zoologist</option>
        </select>
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Complexion</td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
        <select name="lfcomplexion" id="lfcomplexion">
		<option value="Very_Fair">Very_Fari</option>
		<option value="Fair" selected >Fair</option>
		<option value="Wheatish">Wheatish</option>
		<option value="Wheatish_medium">Wheatish_medium</option>
		<option value="Wheatish_brown">Wheatish_brown</option>
		<option value="Dark">Dark</option>
        </select>
      </strong></td>
    </tr>
    <tr>
      <td height="26" align="left" valign="top">Other-Requirement</td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
        
        <textarea name="lfotherrequirement" id="lfotherrequirement" rows="5" cols="55"><?php 
			if ($this->profile->lfotherrequirement)
				echo $this->profile->lfotherrequirement;
			?></textarea>
      </strong></td>
    </tr>
	<tr>
      <td height="26" align="left" valign="top">Photo</td>
      <td height="26" colspan="3" align="left" valign="top"><strong>:
          <input type="file" name="photo" id="photo" >
      </strong></td>
    </tr>

    

      </table></td>
    </tr>
  </table>
</div>
<input type="hidden" name="option" value="com_matrimonial" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="id" value="<?php echo $this->profile->id; ?>" />
<input type="hidden" name="userid" value="<?php echo $this->profile->userid; ?>" />
<input type="hidden" name="controller" value="profile" />
</form>

