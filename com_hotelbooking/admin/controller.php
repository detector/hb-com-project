<?php
/*------------------------------------------------------------------------
  Hotelbooking - Hotel booking extension for Joomla
  ------------------------------------------------------------------------
  @Author    Mark Gu
  @Copyright Copyright (C) 2013 - 2015 Hotelbooking. All Rights Reserved.
  @License   GNU General Public License version 3, or later
------------------------------------------------------------------------*/

defined('_JEXEC') or die;

/**
 * Hotelbooking Component Controller
 *
 * @package     Hotelbooking
 * @since 		0.1.0
 */
class HotelbookingController extends JControllerLegacy
{
	jimport('joomla.log.log');
	/**
	 * Method to display a view.
	 *
	 * @param	boolean			$cachable If true, the view output will be cached
	 * @param	boolean			$urlparams An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return	JControllerLegacy		This object to support chaining.
	 * @since	1.5
	 */
	function display($cachable = false, $urlparams = false)
	{
		$cachable = true;
		$functionname = 'class HotelbookingController.display'
		
		JLog::add('Enter ' .  $functionname);
/*
		$lang = JFactory::getLanguage();
		$lang->load('com_Hotelbooking', JPATH_ADMINISTRATOR);
		if (SR_PLUGIN_HUB_ENABLED)
		{
			$lang->load('plg_Hotelbooking_hub', JPATH_ADMINISTRATOR);
		}
*/
		//JHtml::stylesheet('com_Hotelbooking/assets/main.min.css', false, true);

		// TODO: need to review these params, make sure only allowed params can be set
		//$safeurlparams = array('catid'=>'INT','id'=>'INT','cid'=>'ARRAY','year'=>'INT','month'=>'INT','limit'=>'INT','limitstart'=>'INT',
		//	'showall'=>'INT','return'=>'BASE64','filter'=>'STRING','filter_order'=>'CMD','filter_order_Dir'=>'CMD','filter-search'=>'STRING','print'=>'BOOLEAN','lang'=>'CMD');

		$viewName = $this->input->get('view');
		$user = JFactory::getUser();
		
		JLog::add($functionname . ' ' . $viewName);
		switch ($viewName)
		{
			case 'hotelbooking':
				/*
				//JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_solidres/tables', 'SolidresTable');
				//JModelLegacy::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_solidres/models', 'SolidresModel');

				if ($user->get('guest') == 1)
				{
					// Redirect to login page.
					$return = JRoute::_('index.php?option=com_solidres&view=customer', false);
					$this->setRedirect(JRoute::_('index.php?option=com_users&view=login&return=' . base64_encode($return), false));
					return;
				}

				foreach ($customerUserGroups as $customerUserGroup)
				{
					if (!in_array($customerUserGroup, $userGroups))
					{
						JError::raiseError(403, JText::_('JERROR_ALERTNOAUTHOR'));
						return false;
					}
				}
				*/
				$modelAvaiableHotels = JModelLegacy::getInstance('MyReservations', 'SolidresModel', array('ignore_request' => false));
				//$modelAsset = JModelLegacy::getInstance('ReservationAsset', 'SolidresModel', array('ignore_request' => false));
				//$customerTable = JTable::getInstance('Customer', 'SolidresTable');
				//$customerTable->load(array('user_id' => $user->get('id')));
				//$modelReservations->setState('filter.customer_id', isset($customerTable->id) ? $customerTable->id : 0 );
				//$modelReservations->setState('filter.customer_email', $user->get('email') );

				$document = JFactory::getDocument();
				$viewType = $document->getType();
				$viewName = 'Customer';
				$viewLayout = 'default';

				$view = $this->getView($viewName, $viewType, '', array('base_path' => $this->basePath, 'layout' => $viewLayout));
				$view->setModel($modelAvaiableHotels, true);
				//$view->setModel($modelAsset);
				$view->document = $document;
				$view->display();
				break;
			case 'orderlist':
				if ($user->get('guest') == 1)
				{
					// Redirect to login page.
					$this->setRedirect(JRoute::_('index.php?option=com_users&view=login', false));
					return;
				}

				//JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_solidres/tables', 'SolidresTable');
				//JModelLegacy::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_solidres/models', 'SolidresModel');
				//$customerTable = JTable::getInstance('Customer', 'SolidresTable');
				//$customerTable->load(array('user_id' => $user->get('id')));
				$model = JModelLegacy::getInstance('ReservationAssets', 'SolidresModel', array('ignore_request' => false));
				$model->setState('filter.partner_id', $customerTable->id);

				$document = JFactory::getDocument();
				$viewType = $document->getType();
				$viewName = 'ReservationAssets';
				$viewLayout = 'default';

				$view = $this->getView($viewName, $viewType, '', array('base_path' => $this->basePath, 'layout' => $viewLayout));
				$view->setModel($model, true);
				$view->document = $document;
				$view->display();
				break;
			case 'roomtypes':
				if ($user->get('guest') == 1)
				{
					// Redirect to login page.
					$this->setRedirect(JRoute::_('index.php?option=com_users&view=login', false));
					return;
				}
				/*
				JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_solidres/tables', 'SolidresTable');
				JModelLegacy::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_solidres/models', 'SolidresModel');
				$customerTable = JTable::getInstance('Customer', 'SolidresTable');
				$customerTable->load(array('user_id' => $user->get('id')));
				$model = JModelLegacy::getInstance('RoomTypes', 'SolidresModel', array('ignore_request' => false));
				$model->setState('filter.partner_id', $customerTable->id);

				$document = JFactory::getDocument();
				$viewType = $document->getType();
				$viewName = 'RoomTypes';
				$viewLayout = 'default';

				$view = $this->getView($viewName, $viewType, '', array('base_path' => $this->basePath, 'layout' => $viewLayout));
				$view->setModel($model, true);
				$view->document = $document;
				$view->display();
				*/
				break;
			case 'reservations':
				/*
				if ($user->get('guest') == 1)
				{
					// Redirect to login page.
					$this->setRedirect(JRoute::_('index.php?option=com_users&view=login', false));
					return;
				}
				JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_solidres/tables', 'SolidresTable');
				JModelLegacy::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_solidres/models', 'SolidresModel');
				$customerTable = JTable::getInstance('Customer', 'SolidresTable');
				$customerTable->load(array('user_id' => $user->get('id')));
				$model = JModelLegacy::getInstance('Reservations', 'SolidresModel', array('ignore_request' => false));
				$model->setState('filter.partner_id', $customerTable->id);

				$document = JFactory::getDocument();
				$viewType = $document->getType();
				$viewName = 'Reservations';
				$viewLayout = 'default';

				$view = $this->getView($viewName, $viewType, '', array('base_path' => $this->basePath, 'layout' => $viewLayout));
				$view->setModel($model, true);
				$view->document = $document;
				$view->display();
				*/
				break;
			default:
				JLog::add($functionname . ' ' . $viewName . ' No match viewname found!!!');
				parent::display($cachable, $safeurlparams);
				break;
		}

		return $this;
	}
}