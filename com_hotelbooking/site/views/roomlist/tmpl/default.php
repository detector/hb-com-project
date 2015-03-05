<?php
/*------------------------------------------------------------------------
# com_bookings - Bookings
# ------------------------------------------------------------------------
# author    MarkGu
# copyright Copyright (C) 2011-2014 Mark gu. All Rights Reserved.

-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// load tooltip behavior
JHtml::_('behavior.tooltip');
?>
<script language="javascript">
function ale()
{//这个基本没有什么说的，就是弹出一个提醒的对话框
    alert("我敢保证，你现在用的是演示一");
}
</script>

<div id="hotelbooking" class="hotelbooking"><?php echo $this->getName(); ?>
<form action="<?php echo JRoute::_('index.php?option=com_Hotelbooking'); ?>" method="post" name="bookingfrom">


<!-- ITEMS FROM THE DATABASE GO HERE!!!! -->
<?php if( count( $this->items )) : ?>
    <table>
	<thead>
	</thead>
    <?php foreach( $this->items as $item ) : ?>
			<tr>
				<td><?php echo $item->RoomPrefix . ' - ' . $item->Name; ?></td>
				<td><?php echo $item->RoomType; ?></td>
				<td>
				<?php foreach(explode(',', $item->AvailableBookingDate) as $dt) : ?>
				<tr>
					<td>
						<input type="checkbox" name="checkall-toggle" value="<?php echo $dt; ?>" title="<?php echo $dt; ?>" onclick="" />
						<?php echo date('m/d', strtotime($dt)); ?>
					</td>
				</tr>
				<?php endforeach; ?>
				</td>
				<td><?php echo ($item->BookedNumber . '/' . $item->AvailableNumber); ?></td>
				<td><?php echo $item->Price; ?></td>
			</tr>
			<tr>
				<td><?php echo $item->exhibition_id; ?></td>
				<td><?php echo $item->hotel_id; ?></td>
				<td><?php echo $item->room_id; ?></td>
			</tr>
			<tr>
				<td><?php echo $item->BedType; ?></td>
				<td><?php echo $item->SellType; ?></td>
				<td><?php echo $item->Breakfast; ?></td>
				<td><?php echo $item->Broadband; ?></td>
				<td><?php echo $item->Policy; ?></td>
				<td><?php echo $item->Description; ?></td>
				<td><input type="submit" name="Submit" value="book" onclick="ale()" /></td>
			</tr>
			


        
    <?php endforeach; ?>
	<tfoot>
			<tr>
				<td>
					<a href="<?php echo JRoute::_('index.php?option=com_Hotelbooking&view=hotellist'); ?>"> 
					<?php echo 'Back'; ?>
				</td>
			</tr>	
	</tfoot>

    </table>
<?php endif; ?>
 
<!-- PAGINATION GOES HERE -->
</form>

</a>
</div>