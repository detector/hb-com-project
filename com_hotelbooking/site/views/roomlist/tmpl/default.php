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
//JHtml::_('behavior.tooltip');

?>
<script language="javascript">

</script>

<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->

<form action="#" id="form" method="post" name="form">
<img id="close" src="images/3.png" onclick ="div_hide()">
<h2>Contact Us</h2>
<hr>
<input id="name" name="name" placeholder="Name" type="text">
<input id="email" name="email" placeholder="Email" type="text">
<textarea id="msg" name="message" placeholder="Message"></textarea>
<a href="javascript:%20check_empty()" id="submit">Send</a>
</form>
</div>
<!-- Popup Div Ends Here -->
</div>

<div id="hotelbooking" class="hotelbooking"><?php echo $this->getName(); ?>

<!--
<form action="<?php echo JRoute::_('index.php?option=com_Hotelbooking'); ?>" method="post" name="bookingfrom">
-->

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
				<td><img id="book" src="<?php echo JUri::root()?>/media/com_hotelbooking/images/book.png" onclick ="div_show()"></td>
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
 
<!-- PAGINATION GOES HERE 
</form>-->

</a>
</div>