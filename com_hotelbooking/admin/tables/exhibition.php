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
class HotelbookingTableExhibition extends JTable
{
	$id = null;
	$Name = null;
	$StartDate = null;
	$EndDate = null;
	$Description = null;
	$DetailInfoFilePath = null;	

	function __construct(&$db)
	{
		parent::__construct( '#__exhibitions', 'id', $db );
	}
}