<?php defined('_JEXEC') or die('Restricted access'); ?>
<form action="index.php" method="post" name="adminForm">
<div id="editcell">
    <table class="adminlist">
    <thead>
        
        <tr>
            <th width="20">
    			<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
			</th>
			<th width="40">
                <?php echo JText::_( 'Author' ); ?>
            </th>
            <th>
                <?php echo JText::_( 'Message' ); ?>
            </th>
            <th>
                <?php echo JText::_( 'Date' ); ?>
            </th>
            <th>
                <?php echo JText::_( 'Rating' ); ?>
            </th>
            <th>
                <?php echo JText::_( 'Comment' ); ?>
            </th>
            <th>
                <?php echo JText::_( 'Published' ); ?>
            </th>
        </tr>            
    </thead>
    <?php
    $k = 0;
    for ($i=0, $n=count( $this->items ); $i < $n; $i++)
    {
        $row =& $this->items[$i];
        $checked    = JHTML::_( 'grid.id', $i, $row->id );
        $published 	= JHTML::_('grid.published', $row, $i );
        $link = JRoute::_( 'index.php?option=com_easybook&controller=entry&task=edit&cid[]='. $row->id );
        ?>
        <tr class="<?php echo "row$k"; ?>">
            <td>
  				  <?php echo $checked; ?>
			</td>
            <td>
                <?php echo $row->gbname; ?>
            </td>
            <td>
                <span class="hasTip" title="<?php echo $row->gbtext?>"><a href="<?php echo $link ?>"><?php echo substr($row->gbtext,0,50)."..."; ?></a></span>
            </td>
            <td>
                <?php echo JHTML::_('date', $row->gbdate, "%d %B %Y %H:%M") ?>
            </td>
            <td>
                <?php echo $row->gbvote; ?>
            </td>
            <td>
                <?php if($row->gbcomment){ echo '<img src="images/tick.png" class="hasTip" title="'.$row->gbcomment.'" border="0" alt="Has a comment" />';} ?>
            </td>
            <td>
                <?php echo $published; ?>
            </td>
        </tr>
        <?php
        $k = 1 - $k;
    }
    ?>
    <tfoot>
		<tr>
			<td colspan="7">
				<?php echo $this->pagination->getListFooter(); ?>
			</td>
		</tr>
	</tfoot>
    </table>
</div>

<input type="hidden" name="option" value="com_easybook" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="entry" />
<?php echo JHTML::_( 'form.token' ); ?>
</form>
<div class="padding">
</div>

<div style="margin: 0 auto; width: 600px; text-align: center; background-color: #F3F3F3; padding: 7px; border: 1px solid #999999;">
	<span><?php echo $this->version; ?></span>
</div>
				