<?php 
 
 defined('_JEXEC') or ('Restricted Access');
$sess= JFactory::getSession();
if (!$sess->get('access','','mat')|| !$sess->get('userid','','mat'))
{
	echo 'Access Forbiden';
	exit();
}
$userid=$sess->get('userid','','mat');
$inboxlink = JRoute::_('index.php?option=com_matrimonial&task=userinbox',false);
$editpflink = JRoute::_('index.php?option=com_matrimonial&task=editpform',false);
$chgpwdlink = JRoute::_('index.php?option=com_matrimonial&task=chgpwdform',false);
$segpartnerlink = JRoute::_('index.php?option=com_matrimonial&task=segpartner',false);
$logoutlink = JRoute::_('index.php?option=com_matrimonial&task=userlogout',false);



 ?>

<div id="layer1" align="center";  style="background-image: url('components/com_matrimonial/assets/matlog.gif'); layer-background-imageurl url('components/com_matrimonial/assets/matlog.gif');  width:500px; height:80px; border: 1px none #000000"></div>
 <div id="layer1"><font color="#0000FF" face="Geneva, Arial, Helvetica, sans-serif" size="+3" ><strong> Welcome  <em> 
 <?php echo $userid; ?></em></strong></font></div>
<div id="layer1" align="center";  style="background-image: url('components/com_matrimonial/assets/space.gif'); layer-background-imageurl url('components/com_matrimonial/assets/space.gif');  width:500px; height:10px; border: 1px none #000000"></div>
 <div id="layer1" align="center";  style="background-image: url('components/com_matrimonial/assets/lhbase.gif'); layer-background-imageurl url('components/com_matrimonial/assets/lhbase.gif');  width:750px; height:40px; border: 1px none #000000">

  <table width="100%" border="0">
	<tr>&nbsp;</tr>
    <tr>
      <td width="14%" align="left" valign="top"><a href='<?php echo $inboxlink; ?>'><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00FF00" ><strong>|| Inbox || </strong></font> </a></td>
      <td width="17%" align="left" valign="top"><a href='<?php echo $editpflink; ?>'><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00FF00" ><strong>|| Edit Profile ||</strong></font></a></td>
      <td width="29%" align="left" valign="top"><a href='<?php echo $chgpwdlink; ?>'><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00FF00" ><strong>|| Change Password ||</strong></font></a></td>
      <td width="27%" align="left" valign="top"><a href='<?php echo $segpartnerlink; ?>'><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00FF00" ><strong>|| Suggested Partner ||</strong></font></a></td>
      <td width="13%" align="left" valign="top"> <a href='<?php echo $logoutlink; ?>'><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00FF00" ><strong>|| logout ||</strong></font></a></td>
    </tr>
  </table>
</div>
