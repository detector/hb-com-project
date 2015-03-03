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
	public function getExhibition()
	{
		//JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR . '/tables', 'SolidresTable');
		//$assetTable = JTable::getInstance('ReservationAsset', 'SolidresTable');
		//$assetTable->load($this->getState($this->getName().'.assetId'));
		
		return 'testtable';
	}
}