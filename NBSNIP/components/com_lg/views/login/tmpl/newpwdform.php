<form name="newpassword" method="post" >
<table>
<tr> 
 <td>User-ID:</td>
 <td><input type="text" name="userid" id="userid" value="<?php echo JRequest::getVar(userid); ?>"/> </td>
 </tr>
<tr> 
 <td>Email-ID :</td>
 <td><input type="text" name="emailid" id="emailid" value="<?php echo JRequest::getVar(emailid); ?>"/> </td>
 </tr>
 <tr> 
<td> Captcha </td>
<td> <img src="components\com_lg\assets\captcha.php" > </td>
</tr>
 
 <tr>
 <td colspa="2">
 <input type="submit" value="New password" />
 </td>
 </tr>
 </table>
 <input type ="hidden" name="option" value="com_lg" >
 <input type="hidden" name="task" value="newpassword" >
</form>