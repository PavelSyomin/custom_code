<?php
/**
 * @package     Flexi Custom Code, a Joomla module
 *
 * @author      RBO Team > Project::: RumahBelanja.com & AppsNity.com; Pavel Syomin
 * @copyright   Copyright © Pavel Syomin, 2022 
 * @license     GNU General Public License version 3; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

// Include the syndicate functions only once
require_once (dirname(__FILE__) . '/helper.php');

require ModuleHelper::getLayoutPath('mod_flexi_customcode', $params->get('layout', 'default'));
