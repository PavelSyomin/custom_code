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

//Parameters
$codearea 	= $params->get( 'code_area' ); 	
$clean_js 	= $params->get( 'clean_js' );		
$clean_css 	= $params->get( 'clean_css' );		
$clean_all 	= $params->get( 'clean_all' );
$userlevel 	= $params->get('userlevel');	
$use_php 	= $params->get( 'use_php' );

$user 		= & JFactory::getUser();
$mylevel 	= (!$user->get('guest')) ? 'logout' : 'login';

//Clean CSS & JS  & All
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
			if ($use_php == 1) { modFlexiCustomCode::parsePHPviaFile($codearea); }
				else {	echo $codearea; }
		}
		break;
	case 2: //Guest Visitors
		if ($mylevel == 'login'){
			if ($use_php == 1) { modFlexiCustomCode::parsePHPviaFile($codearea); }
				else {	echo $codearea; }
		}
		break;
	case 0: //Registered Visitors
	default:
		if ($mylevel == 'logout'){
			if ($use_php == 1) { modFlexiCustomCode::parsePHPviaFile($codearea); }
				else {	echo $codearea; }
		}
		break;
	}
 ?>