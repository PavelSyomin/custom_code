<?php
/**
 * @package     Flexi Custom Code, a Joomla module
 *
 * @author      RBO Team > Project::: RumahBelanja.com & AppsNity.com; Pavel Syomin
 * @copyright   Copyright © Pavel Syomin, 2022 
 * @license     GNU General Public License version 3; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

class modFlexiCustomCode {
	public static function parsePHPviaFile($custom) {
		$tmpfname = tempnam(JPATH_SITE."/tmp", "html");
		$handle = fopen($tmpfname, "w");
		fwrite($handle, $custom, strlen($custom));
		fclose($handle);
		include_once($tmpfname);
		unlink($tmpfname);
	}
}
