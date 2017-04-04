<?php

 defined('_JEXEC') or die ('Restricted Access');
 $newUser = JRoute::_('index.php?option=com_lg&task=newuser', false);
 $frgPwd = JRoute::_('index.php?option=com_lg&task=forgetpwd', false);

?>
<form name="login" method="post" >

<div id="login" >
 Login User 
 <table border="0" >
 <tr> 
 <td> User :</td>
 <td> <input type="text" name="userid" id="userid"/> </td>
 </tr> 
 <tr> 
 <td>Password :</td>
 <td><input type="text" name="pwd" id="pwd" /> </td>
 </tr>
 <tr>
 <td colspan="2">
 <input type="submit" value="Login" />
 </td>
 </tr>
 <tr> 
 <td colspan="2" > 
  <a href = "<?php echo $newUser; ?>" > New User </a></td>
</tr>
<tr> 
<td colspan="2">
<a href="<?php echo $frgPwd ; ?>" > Forget Password </a> </td>
</tr>


 </table>
 <input type ="hidden" name="option" value="com_lg" >
 <input type="hidden" name="task" value="login" >
 </form>

