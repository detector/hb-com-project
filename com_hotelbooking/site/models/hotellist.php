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
		
		//JLog::add('output classname: ' . $myclassname);

		//$mainframe = JFactory::getApplication();

		// Get pagination request variables
		//$limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
		//$limitstart = JRequest::getVar('limitstart', 0, '', 'int');

		// In case limit has been changed, adjust it
		//$limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);

		//$this->setState('limit', $limit);
		//$this->setState('limitstart', $limitstart);
		
		JLog::add($functionname . ' limit = ' . $limit . ' limitstart ' . $limitstart, JLog::DEBUG);
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
	
	// function getTotal()
	// {
		// $functionname = $this->classname . '.getTotal';
		// JLog::add('Enter ' . $functionname, JLog::DEBUG);
		// // Load the content if it doesn't already exist
		// if (empty($this->_total)) {
			// $query = $this->getListQuery();
			// $this->_total = $this->_getListCount($query);
			// JLog::add($functionname . ' _total=' . $this->_total, JLog::DEBUG);
		// }
		// return $this->_total;
	// }
	
	// function getPagination()
	// {
		// $functionname = $this->classname . '.getPagination';
		// JLog::add('Enter ' . $functionname, JLog::DEBUG);
		
		// // Load the content if it doesn't already exist
		
		// if (empty($this->_pagination)) {
			// jimport('joomla.html.pagination');
			// $this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
		// }
		// return $this->_pagination;
	// }
	
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