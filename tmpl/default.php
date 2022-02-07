<?php
/**
 * @package     Flexi Custom Code, a Joomla module
 *
 * @author      RBO Team > Project::: RumahBelanja.com & AppsNity.com; Pavel Syomin
 * @copyright   Copyright © Pavel Syomin, 2022 
 * @license     GNU General Public License version 3; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Factory;
use Joomla\Module\FlexiCustomCode\Site\Helper\Helper;

// Get settings
$code	    = $params->get('code');
$clean 	= $params->get('clean');
$use_php 	= $params->get('use_php');

// Clean CSS & JS or All
if ($clean)
{
    $code = str_replace(['<br />', '\\n', '\\t'], '', $code);
}

if ($use_php == 1)
{
    Helper::parsePHP($code);
}
else
{
    echo $code;
}
