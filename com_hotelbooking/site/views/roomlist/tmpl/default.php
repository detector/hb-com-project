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
<div id="hotelbooking" class="hotelbooking"><?php echo $this->getName(); ?>
<form action="<?php echo JRoute::_('index.php?option=com_Hotelbooking'); ?>" method="post" name="bookingfrom">

 
<!-- ITEMS FROM THE DATABASE GO HERE!!!! -->
<?php if( count( $this->items )) : ?>
    <table>
	<thead>
	</thead>
	<tfoot>
	</tfoot>
    <?php foreach( $this->items as $item ) : ?>
        <tr>
            <td><?php echo $item->exhibition_id; ?></td>
			<td><?php echo $item->hotel_id; ?></td>
			<td><?php echo $item->room_id; ?></td>
			<td><?php echo $item->AvailableBookingDate; ?></td>
			<td><?php echo $item->AvailableNumber; ?></td>
			<td><?php echo $item->BookedNumber; ?></td>
			<td><?php echo $item->Name; ?></td>
			<td><?php echo $item->RoomType; ?></td>
			<td><?php echo $item->BedType; ?></td>
			<td><?php echo $item->SellType; ?></td>
			<td><?php echo $item->Breakfast; ?></td>
			<td><?php echo $item->Broadband; ?></td>
			<td><?php echo $item->Policy; ?></td>
			<td><?php echo $item->Price; ?></td>
			<td><?php echo $item->Description; ?></td>
        </tr>
    <?php endforeach; ?>

    </table>
<?php endif; ?>
 
<!-- PAGINATION GOES HERE -->
</form>
</div>