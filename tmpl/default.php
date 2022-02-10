<?php
/**
 * @package     Custom Code, a Joomla module
 *
 * @author      RBO Team > Project::: RumahBelanja.com & AppsNity.com; Pavel Syomin
 * @copyright   Copyright © Pavel Syomin, 2022 
 * @license     GNU General Public License version 3; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Factory;
use Joomla\Module\CustomCode\Site\Helper\Helper;

// Get settings
$code 			= $params->get('code');
$clean			= $params->get('clean');
$php 	= strpos($code, '<?php') !== false;

// Clean the code
if ($clean)
{
    $code = str_replace(['\\n', '\\t', '\\r'], ' ', $code);
    $code = preg_replace('/\s+/', ' ', $code);
}

if ($php)
{
    Helper::parsePHP($code);
}
else
{
    echo $code;
}
