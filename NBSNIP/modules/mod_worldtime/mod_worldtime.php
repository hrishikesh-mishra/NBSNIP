<?php
/*
* @package World Time Module for Joomla 1.5 from Joomlaspan.com
* @copyright Copyright (C) 2007 Joomlaspan.com. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* Joomla! is free software.
* This extension is made for Joomla! 1.5;

** WE LOVE JOOMLA! **
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

$custcss = $params->get('js_custcss');
$cityname = $params->get('js_cityname');
$clock1224 = $params->get('js_1224');
$color = $params->get('js_color');
$width = $params->get('js_size');
$height = $params->get('js_size');
$align = $params->get('js_align');
$location = $params->get('js_location');
$location2 = str_replace(array("-"), array(""),"".$location."");

if ($custcss) 
	{ 
	echo "<div style=\"" . $custcss . "\">\r\n"; 
	}
	
echo "<!-- World Time Module by Joomlaspan.com -->\r\n";

if ($cityname) 
	{ 
		echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"" . $align . "\"><tr><td align=\"" . $align . "\">\r\n"; 
	}
	
echo "<script type=\"text/javascript\" src=\"http://www.worldtimeserver.com/clocks/embed.js\"></script><script type=\"text/javascript\" language=\"JavaScript\">obj" . $location2 . "=new Object;obj" . $location2 . ".wtsclock=\"wtsclock" . $clock1224 . ".swf\";obj" . $location2 . ".color=\"" . $color . "\";obj" . $location2 . ".wtsid=\"" . $location . "\";obj" . $location2 . ".width=" . $width . ";obj" . $location2 . ".height=" . $height . ";obj" . $location2 . ".wmode=\"transparent\";showClock(obj" . $location2 . ");</script>\r\n";

if ($cityname) 
	{ 
		echo "</td></tr><tr><td align=\"" . $align . "\">" . $cityname . "</td></tr></table>\r\n";
	}

echo "<!-- World Time Module by Joomlaspan.com -->\r\n";

if ($custcss) 
	{ 
	echo "</div>"; 
	}

?>