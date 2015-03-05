<?php
/*------------------------------------------------------------------------
  Hotelbooking - Hotel booking extension for Joomla
  ------------------------------------------------------------------------
  @Author    Hotelbooking Team
  @Copyright Copyright (C) 2013 - 2015 Hotelbooking. All Rights Reserved.
  @License   GNU General Public License version 3, or later
------------------------------------------------------------------------*/

defined('_JEXEC') or die;

/**
 * Hotelbooking Component Model
 *
 * @package		Reservation
 * @since		0.1.0
 */
class HotelbookingTableSaleroom extends JTable
{
	$id = null;
	$exhibition_id
	$hotel_id = null;
	$room_id = null;
	$BookingDate = null;
	$AvailableNumber = null;
	$BookedNumber = null;
	$Status = null;
	
	function __construct(&$db)
	{
		parent::__construct( '#__sale_exhibitions_rooms', 'id', $db );
	}
}