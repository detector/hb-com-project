<?php
/*------------------------------------------------------------------------
# com_bookings - Bookings
# ------------------------------------------------------------------------
# author    Zingiri
# copyright Copyright (C) 2011-2014 Zingiri. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.zingiri.com
# Technical Support:  Forum - http://forums.zingiri.com/forumdisplay.php?fid=58
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * HTML View class for the Bookings Component
 */
class HotelBookingViewHotelBooking extends JViewLegacy
{
	var $classname = 'HotelBookingViewHotelBooking';
	protected $state;
	protected $items;
	protected $pagination;	
	// Overwriting JView display method
	function display($tpl = null) 
	{
		
			// Assign data to the view
			//$this->msg = $this->get('Msg');
			$functionname = $this->classname . '.display';
			JLog::add('Enter ' .  $functionname, JLog::DEBUG);
			
			// Get data from the model
			$items = $this->get('Items');
			$pagination = $this->get('Pagination');

			// Assign data to the view
			$this->items = $items;
			$this->pagination = $pagination;
			
			// Check for errors.
			if (count($errors = $this->get('Errors'))) 
			{

					JError::raiseError(500, implode('<br />', $errors));
					return false;
			}
			// Display the view
			parent::display($tpl);
	}
}
