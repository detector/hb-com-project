<?php
/*------------------------------------------------------------------------
  Hotelbooking - Hotel booking extension for Joomla
  ------------------------------------------------------------------------
  @Author    hotelbooking Team
  @Copyright Copyright (C) 2013 - 2015 hotelbooking. All Rights Reserved.
  @License   GNU General Public License version 3, or later
------------------------------------------------------------------------*/

defined('_JEXEC') or die;

//JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.'/tables');

//require_once JPATH_COMPONENT_ADMINISTRATOR.'/helpers/helper.php';

// Include the JLog class.
jimport('joomla.log.log');
// Initialise a basic logger with no options (once only).
//JLog::addLogger(array());
// Log to a specific text file.
JLog::addLogger(array('text_file' => 'myHotelbookinglogs.php'));

JLog::add('hotel booking start ... ', JLog::DEBUG);

$controller	= JControllerLegacy::getInstance('Hotelbooking');
$controller->execute(JFactory::getApplication()->input->get('task', '', 'cmd'));
$controller->redirect();