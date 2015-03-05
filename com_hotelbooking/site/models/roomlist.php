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
 
class HotelbookingModelRoomList extends JModelList
{
	protected $classname = 'HotelbookingModelRoomList';
	/**
	* Items total
	* @var integer
	*/
	protected $_total = null;
	
	//define to filter the rooms by the hotel id
	protected $_hotel_id = 0;
	
	function __construct(array $config = array())
	{
		parent::__construct($config);
		
		
		$functionname = $this->classname . '.__construct';
		
		JLog::add('Enter ' . $functionname, JLog::DEBUG);
		JLog::add($functionname . ' hotel_id = ' . $config['hotel_id'], JLog::DEBUG);
		$this->_hotel_id = $config['hotel_id'];

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
		$query->from('#__AvailableRoomList');
		$query->where($db->quoteName('hotel_id') . ' = ' . $this->_hotel_id);
		return $query;
	}
}