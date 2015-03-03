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
		<tr>
			<td colspan="11">
				<?php echo $this->pagination->getListFooter(); ?>
			</td>
		</tr>
	</tfoot>
    <?php foreach( $this->items as $item ) : ?>
        <tr>
            <td><?php echo $item->hotel_id; ?></td>
			<td><?php echo $item->Name; ?></td>
			<td><?php echo $item->maxPrice; ?></td>
			<td><?php echo $item->minPrice; ?></td>
        </tr>
    <?php endforeach; ?>

    </table>
<?php endif; ?>
 
<!-- PAGINATION GOES HERE -->
</form>
</div>