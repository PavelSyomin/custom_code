<?php
/**
 * @package     Flexi Custom Code, a Joomla module
 *
 * @author      RBO Team > Project::: RumahBelanja.com & AppsNity.com; Pavel Syomin
 * @copyright   Copyright © Pavel Syomin, 2022 
 * @license     GNU General Public License version 3; see LICENSE.txt
 */

namespace Joomla\Module\FlexiCustomCode\Site\Helper;

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class Helper {
	public static function parsePHP($code) {
		$tmpfname = tempnam(JPATH_SITE . "/tmp", "php");
		$handle = fopen($tmpfname, "w");
		fwrite($handle, $code);
		fclose($handle);
		require_once $tmpfname;
		unlink($tmpfname);
	}
}
