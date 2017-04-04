<?php 
	/* 
		Matrimonial Msg edit form layout
	*/
	
	//no direct access	
	defined('_JEXEC') or die('Restricted access'); 
	jimport('joomla.utilities.date');
	$options =array();
	
	for ($i=0, $n=count($this->userid); $i < $n; $i++)	
	{
		$row = $this->userid[$i];
		$options[]= JHTML::_('select.option',$row->userid,$row->userid);
	}
 
 ?>
	<script language="javascript" type="text/javascript">
		
		function submitbutton(pressbutton, section) {
		var form = document.adminForm;
			
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}				

					
			if ( form.receiver.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a receiver Name.', true ); ?>" );
			}
			
			else if ( form.sender.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Sender Name.', true ); ?>" );
			}
			else if ( form.title.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide a Title.', true ); ?>" );
			}
			else if ( form.msg.value == "" ) 
			{
				alert( "<?php echo JText::_( 'You must provide message.', true ); ?>" );
			}			
			else
			{
			
				submitform(pressbutton);
			}
			
		}
		</script>


<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col width-70" >
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Details' ); ?></legend>

		<table class="admintable">
		<tr/>
		<tr>
			<td class="key">
				<label for="id">
					<?php echo JText::_( 'ID' ); ?> :
				</label>
			</td>
				<td >
				<?php 
					if (empty($this->msg->id))
					{
						echo "<strong> New </strong>" ;
					}
					else
					{
					  echo "<strong>".$this->msg->id ." [Edit]</strong>";
					}
				 ?>
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="receiver">
					<?php echo JText::_( 'Receiver' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('select.genericlist',$options,'receiver',null,'value','text',$this->msg->receiver); ?>
			</td>
		</tr>


		<tr>
			<td class="key">
				<label for="sender">
					<?php echo JText::_( 'Sender' ); ?> :
				</label>
			</td>
			<td >
				<input type="text" class="text_area"  name="sender" id="sender" size="32" maxlength="90" value="<?php echo $this->msg->sender;?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="title">
					<?php echo JText::_( 'Title' ); ?> :
				</label>
			</td>
			<td >
				<input class="text_area" type="text" name="title" id="title" size="20" maxlength="50" 
				value="<?php echo $this->msg->title; ?>" /> 
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="sdate">
					<?php echo JText::_( 'Date' ); ?> :
				</label>
			</td>
			<td >
				<input type="text class="text_area" name="sdate" id="sdate" size="32" readonly="readonly" 
				value="<?php 
						if ($this->msg->sdate)
								echo $this->msg->sdate;
						else
						{
								$dateNow= new JDate();
								echo $dateNow->toMySQL();
						}
								
								?>" />
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="msg">
					<?php echo JText::_( 'Message' ); ?> :
				</label>
			</td>
			<td >
				<textarea class="text_area"  name="msg" id="msg" rows="8" 
				cols="60" ><?php echo $this->msg->msg;?></textarea>
			</td>
		</tr>
		
		<tr>
			<td class="key">
				<label for="published">
					<?php echo JText::_( 'Publish' ); ?> :
				</label>
			</td>
			<td >
				<?php echo JHTML::_('select.booleanlist',  'block', '', $this->msg->published ); ?>
			</td>
		</tr>
		<tr/>
	</table>
	</fieldset>
</div>

	

<input type="hidden" name="option" value="com_matrimonial" />
<input type="hidden" name="id" value="<?php echo $this->msg->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="msg" />

</form>
