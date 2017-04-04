<?php

 defined('_JEXEC') or die('Redirect Access');
 //print_r($this->bDData
 ?>
  <script language="javascript" type="text/javascript">
<!--
function FRMnonBlank(el, name)
{
 var err = new String();
if (document.all || document.getElementById)
{
  elid= document.getElementById(el);
  if(elid.value == "")
  {
     err="The '" + name + "' field cannot be blank.<br />";
  }
}
 return err;
}
 
function FRMvalidate()
{

var err=new String();

  err += FRMnonBlank("cname" , "Commenter Name");
   err += FRMnonBlank("textimg", "Image-Text");
  err += FRMnonBlank("comment", "comment" );
   
   if (document.all || document.getElementById)
   { 
       if (err.length !=0)
       {
         errid = document.getElementById("errtext1");
         errid.innerHTML = err;
         return false;
       }
    }
  return true;
}

-->

</script>

<div id="errtext1" name="errtext1" class="errtext"><?php 
if(!empty($this->bFulmsg))
{
	echo "<strong>".$this->bFulmsg."</strong>";
	$this->bFulmsg="";
 }
?></div>
<div id="divfullblgview">
<table width="100%" border="1" cellpadding="5" cellspacing="3" bordercolor="#666666">
<tr><td>
  <table width="100%" border="0" cellpadding="3" cellspacing="1" >
    <tr>
      <td height="60" colspan="4"><font face="Verdana, Arial, Helvetica, sans-serif" size="+3" color="#A65402"><strong><?php echo 'Blog of ' .$this->blogFullInfo->userid; ?></strong></font></td>
    </tr>
    <tr>
      <td width="2%">&nbsp;</td>
      <td width="9%" align="left" valign="top"><font face="Arial, Helvetica, sans-serif" size="3" color="#2C5961"><strong>Topic</strong></font></td>
      <td width="87%" align="left" valign="top"><font face="Georgia, Times New Roman, Times, serif" color="#333333" size="2"><strong><?php echo $this->blogFullInfo->topic; ?></strong></font></td>
      <td width="2%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top"><font face="Arial, Helvetica, sans-serif" color="#333333" size="2"><strong>[<?php echo $this->blogFullInfo->bdate; ?>]</strong></font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="top"><font face="Arial, Helvetica, sans-serif" size="3" color="#2C5961"><strong>Blog</strong></font></td>
      <td rowspan="2" align="left" valign="top"><?php echo $this->blogFullInfo->blog; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><hr  color="#990000"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="27">&nbsp;</td>
      <td>&nbsp;</td>
      <td><font face="Georgia, Times New Roman, Times, serif" color="#009900" size="2"><strong>[<?php echo count($this->blogComnt) ; ?>]</strong></font><font face="Georgia, Times New Roman, Times, serif" color="#333333" size="2"><strong>&nbsp;&nbsp;&nbsp;comments</strong></font> </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><hr color="#990000"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><font face="Arial, Helvetica, sans-serif" size="3" color="#2C5961"><strong>Add Your Comment:</strong></font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	
	<form name="addCmtFrm" id="addCmtFrm" method="post" onSubmit="return FRMvalidate();">
	
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#913C73"><strong>Name</strong></font></td>
      <td align="left" valign="top"><input type="text" name="cname" id="cname" size="25" maxlength="50"/></td>
      <td>&nbsp;</td>
    </tr>
		
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="top"><img src="<?php echo 'components/com_blog/assets/captcha/'.$this->fileName;?>" ></td>
      <td align="left" valign="top"><input type="text" name="textimg" id="textimg" size="10" maxlength="6" /></td>
      <td>&nbsp;</td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#913C73"><strong>Comment</strong></font></td>
      <td rowspan="2" align="left" valign="top"><textarea id="comment" name="comment" rows="8" cols="60"></textarea></td>
      <td>&nbsp;</td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top"><input type="submit" name="Submit" value="Add Comment"></td>
      <td>&nbsp;</td>
    </tr>
	<input type ="hidden" name="option" value="com_blog" >
	<input type="hidden" name="task" value="addCmt" >
	<input type="hidden" name="blogid" id="blogid" value="<?php echo $this->blogFullInfo->id; ?>"/>
	</form>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><hr color="#990000"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="27">&nbsp;</td>
      <td>&nbsp;</td>
      <td align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="3" color="#000099"><strong>Comments:</strong></font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><table width="100%" border="1">
         
		  <?php 
			
			for($i=0, $n=count($this->blogComnt); $i<$n; $i++)
			{
				
			?>
			 <tr align="left" valign="top">
            <td width="47%"><table width="100%" border="0">
                <tr>
                  <td colspan="2" align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="3" color="#004080"><strong>Comment</strong></font> </td>
                </tr>
                <tr>
                  <td width="27%" align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#0033FF"><strong>Comment By</strong></font></td>
                  <td width="73%" align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#333333"><strong>:<?php echo $this->blogComnt[$i]->cname; ?></strong></font></td>
                </tr>
                <tr>
                  <td align="left" valign="top">&nbsp;</td>
                  <td align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#333333"><strong>:[<?php echo $this->blogComnt[$i]->cdate; ?>]</strong></font></td>
                </tr>
                <tr>
                  <td align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#0033FF"><strong>Comment</strong></font></td>
                  <td rowspan="2" align="left" valign="top"><?php echo $this->blogComnt[$i]->comment; ?></td>
                </tr>
                <tr>
                  <td align="left" valign="top">&nbsp;</td>
                </tr>
            </table></td>
			<?php
				$i++;
				
				if($i<$n)
				{
			?>
            <td width="53%"><table width="100%" border="0">
              <tr>
                <td colspan="2" align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="3" color="#004080"><strong>Comment</strong></font> </td>
              </tr>
              <tr>
                <td width="27%" align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#0033FF"><strong>Comment By</strong></font></td>
                <td width="73%" align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#333333"><strong>:<?php echo $this->blogComnt[$i]->cname; ?></strong></font></td>
              </tr>
              <tr>
                <td align="left" valign="top">&nbsp;</td>
                <td align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#333333"><strong>:[<?php echo $this->blogComnt[$i]->cdate; ?>]</strong></font></td>
              </tr>
              <tr>
                <td align="left" valign="top"><font face="Geneva, Arial, Helvetica, sans-serif" size="2" color="#0033FF"><strong>Comment</strong></font></td>
                <td rowspan="2" align="left" valign="top"><?php echo $this->blogComnt[$i]->comment; ?></td>
              </tr>
              <tr>
                <td align="left" valign="top">&nbsp;</td>
              </tr>
            </table></td>
			<?php 
				}
				echo "</tr>";
				}
			?>
       
      </table></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><hr color="#990000"/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="button" value="Back" onClick="javascript: history.go(-1)"></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  </td></tr>
  </table>
</div>

