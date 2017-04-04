<?php 
	/*
	  classifieds Categories layout 
	*/

	//direct access not allowed
	
	defined('_JEXEC') or die('Restricted access'); 
	require_once JPATH_COMPONENT_SITE.'/assets/headerinfo.php';
	
?>
<br/>
<br/>
<div> 
	Welcome to the Classifieds Zone. Here you get the current market information like the computers, realstate, jobs etc, with
 full information.
</div>
<br/>
<div id="editcell1">
	<table >

	<?php

	
	for ($i=0, $n=count($this->categories); $i < $n; $i++)
	{
		$row = &$this->categories[$i];
		$link = JRoute::_("index.php?option=com_classifieds&controller=categories&cid=".$row->cid);
	?>
		<tr>
		<td>
			<li><a href="<?php echo $link; ?>"><?php echo $row->type; ?> </a></li>
		</td>
		</tr>
		<tr>	
		<td>
			<?php echo $row->description ;?>
		</td>	</tr><tr/><tr/>			
		<?php		
	}
	?>
	<tfoot>	
		<tr>
			<td colspan="1"><hr>
				<?php echo $this->pageIn(); ?><hr>
			</td>
		</tr>
	</tfoot>
</table>
	</div>

