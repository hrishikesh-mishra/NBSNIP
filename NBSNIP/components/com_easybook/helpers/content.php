<?php
/**
 * @version $Id: content.php 420 2007-12-28 15:52:11Z snipersister $
 * @package    Easybook
 * @link http://www.easy-joomla.org
 * @license    GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Component Helper
jimport('joomla.application.component.helper');

class EasybookHelperContent {
	
	function parse($message) {
	global $mainframe;
	$ebconfig = &$mainframe->getParams();
	$smiley = EasybookHelperSmilie::getSmilies();
	# Convert BB Code to HTML commands
	if ($ebconfig->get('support_bbcode', true)) {
		$matchCount = preg_match_all("#\[code\](.*?)\[/code\]#si", $message, $matches);
		for ($i = 0; $i < $matchCount; $i++) {
			$currMatchTextBefore = preg_quote($matches[1][$i]);
			$currMatchTextAfter = htmlspecialchars($matches[1][$i]);
			$message = preg_replace("#\[code\]$currMatchTextBefore\[/code\]#si", "<b>Code:</b><hr />$currMatchTextAfter<hr />", $message);
		}
		$message = preg_replace("#\[quote\](.*?)\[/quote]#si", "<strong>Quote:</strong><hr /><blockquote>\\1</blockquote><hr />", $message);
		$message = preg_replace("#\[b\](.*?)\[/b\]#si", "<strong>\\1</strong>", $message);
		$message = preg_replace("#\[i\](.*?)\[/i\]#si", "<i>\\1</i>", $message);
		$message = preg_replace("#\[u\](.*?)\[/u\]#si", "<u>\\1</u>", $message);
		if ($ebconfig->get('support_link', false)) $message = preg_replace("#\[url\](http://)?(.*?)\[/url\]#si", "<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $message);
		if ($ebconfig->get('support_link', false)) $message = preg_replace("#\[url=(http://)?(.*?)\](.*?)\[/url\]#si", "<a href=\"http://\\2\" target=\"_blank\">\\3</a>", $message);
		if ($ebconfig->get('support_mail', true)) $message = preg_replace("#\[email\](.*?)\[/email\]#si", "<a href=\"mailto:\\1\">\\1</a>", $message);
		if ($ebconfig->get('support_pic', false)) $message = preg_replace("#\[img\](.*?)\[/img\]#si", "<img src=\"\\1\" />", $message);
		$matchCount = preg_match_all("#\[list\](.*?)\[/list\]#si", $message, $matches);
		for ($i = 0; $i < $matchCount; $i++) {
			$currMatchTextBefore = preg_quote($matches[1][$i]);
			$currMatchTextAfter = preg_replace("#\[\*\]#si", "<li>", $matches[1][$i]);
			$message = preg_replace("#\[list\]$currMatchTextBefore\[/list\]#si", "<ul>$currMatchTextAfter</ul>", $message);
		}
		$matchCount = preg_match_all("#\[list=([a1])\](.*?)\[/list\]#si", $message, $matches);
		for ($i = 0; $i < $matchCount; $i++) {
			$currMatchTextBefore = preg_quote($matches[2][$i]);
			$currMatchTextAfter = preg_replace("#\[\*\]#si", "<li>", $matches[2][$i]);
			$message = preg_replace("#\[list=([a1])\]$currMatchTextBefore\[/list\]#si", "<ol type=\\1>$currMatchTextAfter</ol>", $message);
		}
	}
	# Convert CR and LF to HTML BR command
	$message = preg_replace("/(\015\012)|(\015)|(\012)/","<br />", $message);

	# Einfuegen des automatischen Zeilenumbruchs
	if($ebconfig->get('wordwrap', true))
	{
		$message = EasybookHelperContent::wordwrap($message);
	}
	# Convert smilies to images
	if ($ebconfig->get('support_smilie', true)) {
		foreach ($smiley as $i=>$sm) {
			$message = str_replace ("$i", "<img src='".JURI::base()."components/com_easybook/images/smilies/$sm' border='0' alt='$i' title='$i' />", $message);
		}
	}
	return $message;

	}
	
	function wordwrap($text)
	{
	global $mainframe;
	$ebconfig = &$mainframe->getParams();
	$size = $ebconfig->get('maxlength', 75);
	$words = explode(" ", $text);
	$anzahl = count($words);
	$newtext = NULL;
	for ($i=0; $i<$anzahl; $i++)
	{
		if (strlen($words[$i]) > $size)
		{
			$words[$i] = wordwrap($words[$i], $size, "\n",1);
		}
		$newtext = $newtext . " " . $words[$i];
	}
	return $newtext;
	}
}
?>
