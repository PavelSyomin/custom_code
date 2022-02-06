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
$codearea 	= $params->get('code_area');
$clean_js 	= $params->get('clean_js');
$clean_css 	= $params->get('clean_css');
$clean_all 	= $params->get('clean_all');
$userlevel 	= $params->get('userlevel');
$use_php 	= $params->get('use_php');

$user 		= Factory::getUser();
$mylevel 	= (!$user->get('guest')) ? 'logout' : 'login';

//Clean CSS & JS or All
if (!$clean_all) {
	if ($clean_js) {
		preg_match("/<script(.*)>(.*)<\/script>/i", $codearea, $matches);
		if ($matches) {
			foreach ($matches as $i=>$match) {
				$clean_js = str_replace('<br />', '', $match);
				$codearea = str_replace($match, $clean_js, $codearea);
			}
		}
	}
	if ($clean_css) {
		preg_match("/<style(.*)>(.*)<\/style>/i", $codearea, $matches);
		if ($matches) {
			foreach ($matches as $i=>$match) {
				$clean_js = str_replace('<br />', '', $match);
				$codearea = str_replace($match, $clean_js, $codearea);
			}
		}
	}
} else {
	$codearea = str_replace('<br />', '', $codearea);
}

switch($userlevel) {
	case 1: //All Visitors
		if (($mylevel == 'logout') or ($mylevel == 'login')){
			if ($use_php == 1) { Helper::parsePHP($codearea); }
				else {	echo $codearea; }
		}
		break;
	case 2: //Guest Visitors
		if ($mylevel == 'login'){
			if ($use_php == 1) { Helper::parsePHP($codearea); }
				else {	echo $codearea; }
		}
		break;
	case 0: //Registered Visitors
	default:
		if ($mylevel == 'logout'){
			if ($use_php == 1) { Helper::parsePHP($codearea); }
				else {	echo $codearea; }
		}
		break;
	}
 ?>