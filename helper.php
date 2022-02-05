<?php
/**
* Flexi Custom Code - Joomla Module
* Version			: 1.3.1
* Created by		: RBO Team > Project::: RumahBelanja.com & AppsNity.com
* Created on		: v1.0 - December 16th, 2010 (Joomla 1.6.x)
					  v1.2 - August 21th, 2011 (Joomla 1.7.x) - v1.2.1 December 24th, 2011 (Joomla 2.5)
					  V.1.3.1 - September 30, 2012
* Updated			: v1.4 - August 2, 2014
* Package			: Joomla 3.x.x
* License			: GNU General Public License version 2 or later; see LICENSE.txt
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

?>