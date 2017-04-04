<?php 
	/*
	  yellowpage Medical add layout 
	*/

	//direct access not allowed
	
	
	defined('_JEXEC') or die ('Restricted Access');

?>
<script language="javascript" type="text/javascript">
		function submitbutton() {
			var form = document.addinfo;
			
			if ( form.medname.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Medical Name.', true ); ?>" );
				return false;
			}
			else if ( form.category.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Cateogry of Medical.', true ); ?>" );
				return false;
			}
			else if ( form.location.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide Location.', true ); ?>" );
				return false;
			}
			else if ( form.city.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide City.', true ); ?>" );
				return false;
			}
			else if ( form.state.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide State.', true ); ?>" );
				return false;
			}
			else if ( form.emailid.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Email-ID.', true ); ?>" );
				return false;
			}
			else if ( form.scode.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide Security code.', true ); ?>" );
				return false;
			}
			else 
			{
				submitform(pressbutton);
				return true;
			}
			
		}
		</script>


<form name="addinfo" name="addinfo" method="post" action="index.php" class="form-validate" >
<div>
  <table width="100%" border="1">
    <tr>
      <td height="36" colspan="2" align="center"><strong>Add Medical YellowPage Information </strong></td>
    </tr>
    <tr>
      <td width="18%" height="23" align="right">Medical Name: </td>
      <td width="82%" align="left"><input type="text" name="medname" id="medname" size="32" maxlength="100" value="" class="inputbox required" /></td>
    </tr>
    <tr>
      <td height="23" align="right">Category:</td>
      <td height="23" align="left"><input type="text" name="category" id="category" size="20" maxlength="25" value="" class="inputbox required"/></td>
    </tr>
    <tr>
      <td height="23" align="right">Speciality:</td>
      <td height="23" align="left"><input type="text" name="speciality" id="speciality" size="32" maxlength="250" value="" /></td>
    </tr>
    <tr>
      <td height="23" align="right">Doctors:</td>
      <td height="23" align="left"><input type="text" name="doctors" id="doctors" size="32" maxlength="200" value="" class="inputbox required"/></td>
    </tr>
    <tr>
      <td height="23" align="right">Working Time: </td>
      <td height="23" align="left"><input type="text" name="workingtime" id="workingtime" size="10" maxlength="20" value="" /></td>
    </tr>
   <tr>
      <td height="23" align="right">Holiday Time: </td>
      <td height="23" align="left"><input type="text" name="holiday" id="holiday" size="10" maxlength="20" value="" /></td>
    </tr>

    <tr>
      <td height="23" align="right">Phone:</td>
      <td height="23" align="left"><input type="text" name="phone" id="phone" size="20" maxlength="50" value="" /></td>
    </tr>
    <tr>
      <td height="23" align="right">Mobile:</td>
      <td height="23" align="left"><input type="text" name="mobile" id="mobile" size="20" maxlength="50" value="" /></td>
    </tr>
    <tr>
      <td height="23" align="right" valign="top">Address</td>
      <td height="23" align="left"><table width="36%" border="1">
        <tr>
          <td width="30%">Location:</td>
          <td width="70%" align="left"><input type="text" name="location" id="location" size="32" maxlength="100" value="" class="inputbox required"/></td>
        </tr>
        <tr>
          <td>City:</td>
          <td align="left"><input type="text" name="city" id="city" size="20" maxlength="25" value="" class="inputbox required"/></td>
        </tr>
        <tr>
          <td>State:</td>
          <td align="left"><input type="text" name="state" id="state" size="20" maxlength="25" value="" class="inputbox required"/></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="23" align="right" valign="top">Email-ID</td>
      <td height="23" align="left"><input type="text" name="emailid" id="emailid" size="32" maxlength="100" value="" class="inputbox required validate-email"/></td>
    </tr>
    <tr align="left">
      <td height="23" align="right" valign="top">WebSite</td>
      <td height="23"><input type="text" name="website" id="website" size="32" maxlength="100" value="" /></td>
    </tr>
    <tr>
      <td height="177" align="right" valign="top">About</td>
      <td height="177" align="left" valign="top"><table width="100%" border="1">
        <tr>
          <td height="167" valign="top"><p>
            <textarea name="description" rows="10" cols="70"></textarea>
          </p>            </td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="23" align="center" valign="top"><?php echo $this->image; ?></td>
      <td height="23" align="left" valign="top"><input type="text" name="scode" class="inputbox required"></td>
    </tr>
    <tr>
      <td height="23" colspan="2" align="center" valign="top"><input type="submit" name="Submit" ONCLICK="return submitbutton()" value="Save" />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="Reset" name="Reset" value="Clear" /></td>
    </tr>
  </table>
  </div>
<input type="hidden" name="option" value="com_yellowpage" />
<input type="hidden" name="task" value="saveinfo" />
<input type="hidden" name="controller" value="medical" />
</form>
