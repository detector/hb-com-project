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
<form action="<?php echo JRoute::_('index.php?option=com_Hotelbooking'); ?>" method="post" name="adminForm">

 
<!-- ITEMS FROM THE DATABASE GO HERE!!!! -->
<?php if( count( $this->items )) : ?>
    <table>
	<thead>
	</thead>
	<tfoot>
	</tfoot>
    <?php foreach( $this->items as $item ) : ?>
        <tr>
            <!--<td><?php echo $item->hotel_id; ?></td> -->
			<td>
				<a href="<?php echo JRoute::_('index.php?option=com_Hotelbooking&view=roomlist&hotel_id=' . (int)$item->hotel_id); ?>"> 
					<?php echo $item->Name; ?>
				</a>
			</td>
			<td><?php echo $item->Description; ?></td>
			<tr>
				<td><?php echo $item->HotelAddress; ?></td>
				<td><?php echo $item->HotelPhotoNumber; ?></td>
				<td><?php echo $item->HotelEmail; ?></td>
			</tr>
			<tr>
				<td><?php echo $item->maxPrice; ?></td>
				<td><?php echo $item->minPrice; ?></td>
			</tr>
        </tr>
    <?php endforeach; ?>

    </table>
<?php endif; ?>
 
<!-- PAGINATION GOES HERE -->
</form>
</div>