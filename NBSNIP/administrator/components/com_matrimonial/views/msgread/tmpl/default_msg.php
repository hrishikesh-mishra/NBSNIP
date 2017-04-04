<?php 
	/* 
		Matrimonial Msg edit form layout
	*/
	
	//no direct access	
	defined('_JEXEC') or die('Restricted access'); 
	
JToolBarHelper::back(); 
 ?>

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
			<td>
				<?php  echo $this->msg->id; ?>			
			</td>
		</tr>

		<tr>
			<td class="key">
				<label for="receiver">
					<?php echo JText::_( 'Receiver' ); ?> :
				</label>
			</td>
			<td >
				<?php echo $this->msg->receiver; ?>
			</td>
		</tr>


		<tr>
			<td class="key">
				<label for="sender">
					<?php echo JText::_( 'Sender' ); ?> :
				</label>
			</td>
			<td >
					<?php echo $this->msg->sender; ?>
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="title">
					<?php echo JText::_( 'Title' ); ?> :
				</label>
			</td>
			<td >
				<?php echo $this->msg->title; ?>
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="sdate">
					<?php echo JText::_( 'Date' ); ?> :
				</label>
			</td>
			<td >
				<?php 	echo $this->msg->sdate; ?>
			</td>
		</tr>
		<tr>
			<td class="key">
				<label for="msg">
					<?php echo JText::_( 'Message' ); ?> :
				</label>
			</td>
			<td >
					<?php echo $this->msg->msg;?>
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
