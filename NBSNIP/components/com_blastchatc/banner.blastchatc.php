<?php
/**
 * @version		$Id: banner.blastchatc.php 2009-01-01 15:24:18Z $
 * @package		BlastChat Client
 * @author 		BlastChat
 * @copyright	Copyright (C) 2004-2009 BlastChat. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * @HomePage 	<http://www.blastchat.com>

 * This file is part of BlastChat Client.

 * BlastChat Client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * BlastChat Client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with BlastChat Client.  If not, see <http://www.gnu.org/licenses/>.
 */

/** ensure this file is being included by a parent file */
defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );

/* Support functions for loading banners from a module assigned to position*/

function bc_loadBanner() {

	$pos = mosGetParam($_REQUEST, 'pos', '');
	$style = mosGetParam($_REQUEST, 'st', 0);
	$no_html = mosGetParam($_REQUEST, 'no_html', 0);
	$format = mosGetParam($_REQUEST, 'format', null); //raw
	$tmpl = mosGetParam($_REQUEST, 'tmpl', null); //component
	$dynamic = mosGetParam($_REQUEST, 'dyn', 0);

	if (!$pos) {
		return;
	}
	if ($dynamic) {
		//set no caching in browser, this is for dynamic reloading of banner
		header( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
		header( "Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . " GMT" );
		header( "Cache-Control: no-store, no-cache, must-revalidate" );
		header( "Pragma: no-cache" );
	}

	if ($format == "raw") {
		//show RAW output, what are 1.5 parameters for render function torender raw output?
		echo "<?xml version=\"1.0\" encoding=\"utf-8\"?><!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">"
		."\n<html xmlns=\"http://www.w3.org/1999/xhtml\">"
		."\n<head>"
		."\n<title></title>"
		."\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />"
		."\n<meta name=\"robots\" content=\"noindex, nofollow\" />"
		."\n</head>"
		."\n<body>\n"
		;
	}

	// Include the syndicate functions only once
	jimport('joomla.application.module.helper');
	$modules	=& JModuleHelper::getModules($pos);
	$total		= count($modules);
	for ($i = 0; $i < $total; $i++) {
		JModuleHelper::renderModule($modules[$i]);
	}
	if ($format == "raw") {
		echo "\n</body>\n</html>";
	}
}
?>
