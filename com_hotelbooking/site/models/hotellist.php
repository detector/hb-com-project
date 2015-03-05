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
 
// import the Joomla modellist library
jimport('joomla.application.component.modellist');
 
class HotelbookingModelHotelList extends JModelList
{
	protected $classname = 'HotelbookingModelHotelList';
	/**
	* Items total
	* @var integer
	*/
	protected $_total = null;

	/**
	* Pagination object
	* @var object
	*/
	protected $_pagination = null;
	
	function __construct()
	{
		parent::__construct();
		
		
		$functionname = $this->classname . '.__construct';
		
		
		//JLog::add($functionname . ' limit = ' . $limit . ' limitstart ' . $limitstart, JLog::DEBUG);
	}
	
	function getItems() 
	{
		$functionname = $this->classname . '.getItems';
		JLog::add('Enter ' . $functionname, JLog::DEBUG);
		// if data hasn't already been obtained, load it
		
		if (empty($this->_data)) {
			$query = $this->getListQuery();
			$this->_data = $this->_getList($query);
		}
		
		return $this->_data;
	}
	

	
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return	string	An SQL query
	 */
	protected function getListQuery()
	{
		$functionname = $this->classname . '.getListQuery';
		JLog::add('Enter ' . $functionname, JLog::DEBUG);
		
		// Create a new query object.		
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		// Select some fields
		$query->select('*');
		// From the tablename
		$query->from('#__AvailableHotelList');
		return $query;
	}
}