<?php
/**
 * @package     Custom Code, a Joomla module
 *
 * @author      RBO Team > Project::: RumahBelanja.com & AppsNity.com; Pavel Syomin
 * @copyright   Copyright © Pavel Syomin, 2022 
 * @license     GNU General Public License version 3; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\Module\CustomCode\Site\Helper\Helper;

require ModuleHelper::getLayoutPath('mod_custom_code', $params->get('layout', 'default'));
