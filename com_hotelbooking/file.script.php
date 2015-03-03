<?php
/*------------------------------------------------------------------------
  Hotelbooking - Hotel booking extension for Joomla
  ------------------------------------------------------------------------
  @Author    Hotelbooking Team
  @Copyright Copyright (C) 2013 - 2015 Hotelbooking. All Rights Reserved.
  @License   GNU General Public License version 3, or later
------------------------------------------------------------------------*/
/**
 * Installation hook script
 *
 * This class is used to hook into installation process
 */

defined('_JEXEC') or die;

class Com_HotelbookingInstallerScript {

	function install($parent) {
		echo '<p>'. JText::_('HB_16_CUSTOM_INSTALL_SCRIPT') . '</p>';
	}

	function uninstall($parent) {
		echo '<p>'. JText::_('HB_16_CUSTOM_UNINSTALL_SCRIPT') .'</p>';
		
		// Delete all records in #__assets
		/*
		$dbo	= JFactory::getDbo();
		$query = $dbo->getQuery(true);
		
		$query->select('id');
		$query->from($dbo->quoteName('#__assets'));
		$query->where('name LIKE '.$dbo->quote('com_Hotelbooking%'));
		$dbo->setQuery($query);
		$results = $dbo->loadResultArray();
		
		if(!empty($results)) {
			$query->clear();
			$query->delete('');
			$query->from($dbo->quoteName('#__assets'));
			$query->where('id IN ('.implode(',', $results).')');
			
			$dbo->setQuery($query);
			$results = $dbo->execute();
			if(!$results) {
				JError::raiseWarning(-1, 'Hotelbooking::Delete from '.$dbo->quoteName('#__assets').' '. ($results ? 'success' : 'failure'));
			}			
		}
		*/
	}

	function update($parent) {
		echo '<p>'. JText::_('HB_16_CUSTOM_UPDATE_SCRIPT') .'</p>';
	}

	function preflight($type, $parent) {
		echo '<p>'. JText::sprintf('HB_16_CUSTOM_PREFLIGHT', $type) .'</p>';
	}

	function postflight($type, $parent) {
		echo '<p>'. JText::sprintf('HB_16_CUSTOM_POSTFLIGHT', $type) .'</p>';
		// An example of setting a redirect to a new location after the install is completed
		//$parent->getParent()->set('redirect_url', 'http://www.google.com');

	}
}
