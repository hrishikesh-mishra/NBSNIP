<?php 
	/* 
		Classifieds Jobs input form layout
	*/
	
	//no direct access	
	defined('_JEXEC') or die('Restricted access'); 

	jimport('joomla.html.pane');
    $pane = &JPane::getInstance('tabs', array('allowAllClose' => true));
	$pane2 = &JPane::getInstance('tabs', array('allowAllClose' => true));

	$file = JPATH_ADMINISTRATOR .'/components/com_classifieds/helpers/jobs_items.xml';
	$params = new JParameter( $this->jobs->params, $file, 'component' );
	$editor =& JFactory::getEditor();	
	$options =array();
	
	for ($i=0, $n=count($this->vendor); $i < $n; $i++)	
	{
		$row = $this->vendor[$i];
		$options[]= JHTML::_('select.option',$row->id,$row->id.'::'.$row->name);
	}
	
	$jtypes =array();
	$jtypes[]=JHTML::_('select.option','Full_Time','Full_Time');
	$jtypes[]=JHTML::_('select.option','Part_Time','Part_Time');
	$jtypes[]=JHTML::_('select.option','Intership','Intership');



?>
	<script language="javascript" type="text/javascript">
		
		function submitbutton(pressbutton, section) {
		var form = document.adminForm;
			
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}
			
			var sdate = new Date(form.regstartdate.value);
			var edate = new Date(form.regenddate.value);
			
			var datediff= edate.getTime() - sdate.getTime();
			
			if (datediff < 0 )
			{
				alert( "<?php echo JText::_( 'You must Invalid dates.', true ); ?>" );	
			}
					
			else if ( form.title.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Jobs Name.', true ); ?>" );
			}
			else if ( form.memberid.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Member ID.', true ); ?>" );
			}
			else if ( form.comemailid.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a company Email-ID.', true ); ?>" );
			}
			else if ( form.contactemailid.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Contact Email-ID.', true ); ?>" );
			}

			else
			{
				<?php	echo $editor->save( 'description' ) ; ?>
				submitform(pressbutton);
			}
			
		}
		</script>


<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col width-50" >
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Jobs Information' ); ?></legend>
			<?php
				echo $pane->startPane("menu-pane");
				echo $pane->startPanel(JText :: _('Jobs Info'), "param-page");
			 ?>
				<table class="admintable">
				<tr>
				<td class="key">
					<label for="id">
						<?php echo JText::_( 'ID' ); ?> :
					</label>
				</td>
				<td >
					<?php 
						if (empty($this->jobs->id))
						{
							echo "<strong> New </strong>" ;
						}
						else
						{
							  echo "<strong>".$this->jobs->id ." [Edit]</strong>";
						}
					 ?>
				</td>
			</tr>

			<tr>
			<td class="key">
				<label for="type">
					<?php echo JText::_( 'Type' ); ?> :
				</label>
			</td>
			<td >
				<?php echo "<strong>Jobs</strong>";?>
			</td>
			</tr>
			<tr>	
			<td class="key">
				<label for="title">
					<?php echo JText::_( 'Title' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="title" id="title" size="32" maxlength="100" value="<?php echo $this->jobs->title;?>" /> 
			</td>
			</tr>

			<tr>
			<td class="key">
				<label for="reference">
					<?php echo JText::_( 'Reference' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="reference" id="reference" size="32" maxlength="140" value="<?php echo $this->jobs->reference;?>" /> 
			</td>
			</tr>
		</table>
		
	<?php
		echo $pane->endPanel();
		echo $pane->startPanel(JText :: _('Job Detail'), "param-page");
	?>
		<table class="admintable">
		<tr>
			<td class="key">
			<label for="jobtype">
				<?php echo JText::_( 'Job Type' ); ?> :
			</label>
			</td>
			<td >
				<?php echo JHTML::_('select.genericlist',$jtypes,'jobtype',null,'value','text',$this->jobs->jobtype); ?>				
			</td>

			
		</tr>

		<tr>
			<td class="key">
			<label for="qualification">
				<?php echo JText::_( 'Qualification'); ?> :
			</label>
			</td>
			<td >
				<textarea class="text_area" name="qualification" id="qualification" rows="3" cols="30" maxlength="190" ><?php echo $this->jobs->qualification;?></textarea> 
			</td>
		</tr>
		
		<tr>
			<td class="key">
			<label for="duration">
				<?php echo JText::_( 'Duration'); ?> :
			</label>
			</td>
			<td >
				<input class="text_area" type="text" name="duration" id="duration" size="20" maxlength="50" value="<?php echo $this->jobs->duration;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
			<label for="howtoapply">
				<?php echo JText::_( 'How-to-Apply'); ?> :
			</label>
			</td>
			<td >
				<textarea class="text_area" name="howtoapply" id="howtoapply" rows="3" cols="30" maxlength="240" ><?php echo $this->jobs->howtoapply;?></textarea> 
			</td>
		</tr>
		<tr>
			<td class="key">
			<label for="compensationrange">
				<?php echo JText::_( 'Compensation-Range'); ?> :
			</label>
			</td>
			<td>
				<input class="text_area" type="text" name="compensationrange" id="compensationrange" size="32" maxlength="90" value="<?php echo $this->jobs->compensationrange;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
			<label for="noofopenings">
				<?php echo JText::_( 'No. of Openings'); ?> :
			</label>
			</td>
			<td>
				<input class="text_area" type="text" name="noofopenings" id="noofopenings" size="7" maxlength="7" value="<?php echo $this->jobs->noofopenings;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
			<label for="joblocation">
				<?php echo JText::_( 'Job Location'); ?> :
			</label>
			</td>
			<td>
				<input class="text_area" type="text" name="joblocation" id="joblocation" size="32" maxlength="100" value="<?php echo $this->jobs->joblocation;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
			<label for="jobcity">
				<?php echo JText::_( 'Job City'); ?> :
			</label>
			</td>
			<td>
				<input class="text_area" type="text" name="jobcity" id="jobcity" size="20" maxlength="25" value="<?php echo $this->jobs->jobcity;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
			<label for="jobstate">
				<?php echo JText::_( 'Job State'); ?> :
			</label>
			</td>
			<td>
				<input class="text_area" type="text" name="jobstate" id="jobstate" size="20" maxlength="25" value="<?php echo $this->jobs->jobstate;?>" /> 
			</td>
		</tr>

		
	</table>
		<?php 
		
		echo $pane->endPanel();
		echo $pane->startPanel(JText :: _('Contact Deatail'), "param-page");
	?>
		<table class="admintable">
		<tr>
			<td class="key">
			<label for="comname">
				<?php echo JText::_( 'Company Name' ); ?> :
			</label>
			</td>
			<td>
				<input class="text_area" type="text" name="comname" id="comname" size="32" maxlength="90" value="<?php echo $this->jobs->comname;?>" /> 
			</td>			
		</tr>
		<tr>
			<td class="key">
			<label for="comlocation">
				<?php echo JText::_( 'Company Location' ); ?> :
			</label>
			</td>
			<td>
				<input class="text_area" type="text" name="comlocation" id="comlocation" size="32" maxlength="90" value="<?php echo $this->jobs->comlocation;?>" /> 
			</td>			
		</tr>
		<tr>
			<td class="key">
			<label for="comcity">
				<?php echo JText::_( 'Company City' ); ?> :
			</label>
			</td>
			<td>
				<input class="text_area" type="text" name="comcity" id="comcity" size="20" maxlength="25" value="<?php echo $this->jobs->comcity;?>" /> 
			</td>			
		</tr>
		<tr>
			<td class="key">
			<label for="comstate">
				<?php echo JText::_( 'Company State' ); ?> :
			</label>
			</td>
			<td>
				<input class="text_area" type="text" name="comstate" id="comstate" size="20" maxlength="25" value="<?php echo $this->jobs->comstate;?>" /> 
			</td>			
		</tr>
		<tr>
			<td class="key">
			<label for="comemailid">
				<?php echo JText::_( 'Company Email-ID' ); ?> :
			</label>
			</td>
			<td>
				<input class="text_area" type="text" name="comemailid" id="comemailid" size="32" maxlength="200" value="<?php echo $this->jobs->comemailid;?>" /> 
			</td>			
		</tr>
		<tr>
			<td class="key">
			<label for="comwebsite">
				<?php echo JText::_( 'Company WebSite' ); ?> :
			</label>
			</td>
			<td>
				<input class="text_area" type="text" name="comwebsite" id="comwebsite" size="32" maxlength="100" value="<?php echo $this->jobs->comwebsite;?>" /> 
			</td>			
		</tr>
		<tr>
			<td class="key">
			<label for="contactname">
				<?php echo JText::_( 'Contact Name' ); ?> :
			</label>
			</td>
			<td>
				<input class="text_area" type="text" name="contactname" id="contactname" size="32" maxlength="50" value="<?php echo $this->jobs->contactname;?>" /> 
			</td>			
		</tr>
	
		<tr>
			<td class="key">
			<label for="contactphone">
				<?php echo JText::_( 'Contact Phone' ); ?> :
			</label>
			</td>
			<td>
				<input class="text_area" type="text" name="contactphone" id="contactphone" size="20" maxlength="50" value="<?php echo $this->jobs->contactphone;?>" /> 
			</td>			
		</tr>
	
		<tr>
			<td class="key">
			<label for="contactmobile">
				<?php echo JText::_( 'Contact Mobile' ); ?> :
			</label>
			</td>
			<td>
				<input class="text_area" type="text" name="contactmobile" id="contactmobile" size="20" maxlength="50" value="<?php echo $this->jobs->contactmobile;?>" /> 
			</td>			
		</tr>
		<tr>	
			<td class="key">
			<label for="contactemailid">
				<?php echo JText::_( 'Contact Email-ID' ); ?> :
			</label>
			</td>
			<td>
				<input class="text_area" type="text" name="contactemailid" id="contactemailid" size="32" maxlength="200" value="<?php echo $this->jobs->contactemailid;?>" /> 
			</td>			
		</tr>
</table>
<?php
		echo $pane->endPanel();
		echo $pane->startPanel(JText :: _('Member Info'), "param-page");
?>
		<table class="admintable">
		<tr>
			<td class="key">
			<label for="memberid">
				<?php echo JText::_( 'Member ' ); ?> :
			</label>
			</td>
			<td>	
				<?php echo JHTML::_('select.genericlist',$options,'memberid',null,'value','text',$this->jobs->memberid); ?>	
			
			</td>			
		</tr>
		<tr>
			<td class="key">
				<label for="regstartdate">
					<?php echo JText::_( 'Reg. Start Date (yyy/mm/dd)' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('calendar',$this->jobs->regstartdate ,'regstartdate','regstartdate','%Y/%m/%d'); ?>				
			</td>

		</tr>
		<tr>
			<td class="key">
				<label for="regEnddate">
					<?php echo JText::_( 'Reg. Start Date (yyy/mm/dd)' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('calendar',$this->jobs->regenddate ,'regenddate','regenddate','%Y/%m/%d'); ?>				
			</td>

		</tr>
		<tr>
		<td class="key">
				<label for="published">
					<?php echo JText::_( 'Published' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('select.booleanlist',  'published', '', $this->jobs->published ); ?>
			</td>
		</tr>
		
 </table>
<?php
		echo $pane->endPanel();
		echo $pane->endPane();
?>
</fieldset>
</div>
<div class="col width-45" >
<fieldset class="adminform">
<legend><?php echo JText::_( 'Jobs Parameters' ); ?></legend>

<?php
		echo $pane2->startPane("menu-pane");
		echo $pane2->startPanel(JText :: _('Job Parameters'), "param-page");
		echo $params->render();
		echo $pane2->endPanel();
		echo $pane2->startPanel(JText :: _('Advanced Parameters'), "param-page");
		echo $params->render('params', 'advanced');
		echo $pane2->endPanel();
		echo $pane2->startPanel(JText :: _('E-mail Parameters'), "param-page");
		echo $params->render('params', 'email');
		echo $pane2->endPanel();
		echo $pane2->endPane();
		
		
?>
</fieldset>
</div>



<div class="col width-50">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Description' ); ?></legend>
			<?php	echo $editor->display( 'description',  htmlspecialchars($this->jobs->description, ENT_QUOTES), '70%', '400', '40', '50', array('pagebreak', 'readmore') ) ; ?>
	</fieldset>
</div>	
	

<input type="hidden" name="option" value="com_classifieds" />
<input type="hidden" name="id" value="<?php echo $this->jobs->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="jobs" />

</form>
