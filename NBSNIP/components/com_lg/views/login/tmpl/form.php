<?php

 defined('_JEXEC') or die ('Restricted Access');

?>
<form name="userreg" method="post" >

<div id="userreg" >
<strong> New User Registration :</strong> 
 <table border="0" >
 <tr> 
 <td> UserID :</td>
 <td> <input type="text" name="userid" id="userid" value="<?php echo $_POST[userid]; ?>"/> </td>
 </tr> 
 <tr> 
<tr> 
 <td>User-Name:</td>
 <td><input type="text" name="username" id="username" value="<?php echo JRequest::getVar(username); ?>"/> </td>
 </tr>
 
 <td>Password :</td>
 <td><input type="text" name="password" id="password" value="<?php echo JRequest::getVar(password); ?>"/> </td>
 </tr>
 <tr> 
 <td>Confirm-Password :</td>
 <td><input type="text" name="cpassword" id="cpassword" value="<?php echo JRequest::getVar(cpassword); ?>"/> </td>
 </tr>
<tr> 
 <td>Email-ID :</td>
 <td><input type="text" name="emailid" id="emailid" value="<?php echo JRequest::getVar(emailid); ?>"/> </td>
 </tr>
 
 
 <tr>
 <td colspa="2">
 <input type="submit" value="Register" />
 </td>
 </tr>
 </table>
 <input type ="hidden" name="option" value="com_lg" >
 <input type="hidden" name="task" value="register" >
 </form>

