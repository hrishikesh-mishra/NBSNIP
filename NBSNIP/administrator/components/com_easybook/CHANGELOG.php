<?php
/**
 * @version $Id: CHANGELOG.php 683 2008-06-15 07:38:45Z snipersister $
 * @package    Easybook
 * @link http://www.easy-joomla.org
 * @license    GNU/GPL
 */

// no direct access to this changelog...
defined( '_JEXEC' ) or die( '!' );
?>
_______________________________________________
_______________________________________________

This is the changelog for Easybook.
_______________________________________________
_______________________________________________

Legend:

* -> Security Fix
# -> Bug Fix
+ -> Addition
^ -> Change
- -> Removed
! -> Note
______________________________________________

-------------------- EasyBook Latestpost-Modul 2.0 beta1 [15 June 2008] ---------------------
-------------------- EasyBook Searchplugin 2.0 final [15 June 2008] 	---------------------
-------------------- EasyBook 2.0 RC 3 [15 June 2008] 					---------------------

15-June-2008 David Jardin
 + Added russian and hungarian language

10-June-2008 David Jardin
 # fixed tiny publish bug
 # Changed standard parameters for security reasons
 # Fixed wrong Date offset

16-April-2008 Martin Buerge
 # Fixed Bug#10580, fixed Image Null Problem 
 # Frontend: models/entry.php Line 150: getErrorMsg() was set wrong.
 ^ Frontend: models/entry.php function publish, little improvement, saved some lines.

04-April-2008 David Jardin
 # Fixed SQL Problem

03-April-2008 David Jardin
 # Reintegrated Global preferences to fix some security issues
 # BBCode Buttons
 + Dutch language files

30-Mar-2008 David Jardin
 # Fixed untranslated string

26-Mar-2008 David Jardin
 + Added an introtext
 # Wordliste will not be deleted anymore

-------------------- 2.0 RC 2 [26 March 2008] ---------------------

25-Mar-2008 David Jardin
 # Fixed a MySQL Bugs

19-Mar-2008 David Jardin
 # Fixed Pagination bug
 # Fixed captcha bug when user is logged in

-------------------- 2.0 RC 1 [18 March 2008] ---------------------

18-Mar-2008 David Jardin
 + Added these Joomla tooken things

10-Feb-2008 Nikolai Plath
 + Spanish language

04-Feb-2008 David Jardin
 + Readded pngfix

28-Jan-2008 David Jardin
 # Fixed border around smilies
 - old pngfix, will be replaced soon
 ^ changed date format
 - removed unused css definitions
 # untranslated strings fixed

27-Jan-2008 David Jardin
 # Div floating error when deactivated logo
 # Badwords not being saved
 ^ Changed message-types in frontend
 + Ip logging can be disabled
 ^ Entry form only displaying the things which are shown in frontend
 # Contact details box display when nothing to display
 ^ Email notification extended

25-Jan-2008 David Jardin
 * savecomment now secured even when admin_acl = 0
 # emailshow now saved correctly

23-Jan-2008 Achim Raji /cybergurk
 ^ fix layout paginaton

23-Jan-2008 David Jardin
 ^ Finished about page
 + Added read guestbook links
 + Created com_migrator plugin
 ^ Name an Email of registered users are now automatically inserted on the entry page

22-Jan-2008 David Jardin
 + Added basic things for the about page
 # Fixed a small bug with the captcha
 + Added some new fancy icons
 # Fixed some pagination problems
 # Reduced Timeout of Versioncheck
 # Fixed minor SQL bug

21-Jan-2008 David Jardin
 + Added Badwords
 + Added translation for untranslated strings
 + Version check in backend implemented

13-Jan-2008 cybergurk
 # Parse error --> return; thx Nik

29-Dec-2007 David Jardin
 # Alternativ text for messenger not displayed in Firefox
 ^ Renamed css file to easybook.css
 + Add Heading on entry and comment form
 + Added RSS/Atom Feed
 ^ Comment Layout now hidden in menumanager
 * Fixed some possible SQL injection leaks

28-Dec-2007 David Jardin
 + Added "require Email" Function
 ! Now using SVN Keyword ID
 + Added "Show-EMail" field in backend
 # Searchbot now working with SEF
 # Searchbot now has his own language files
 # Pagination not displayed when only one page is needed
 # Call-time-reference removed

26-Dec-2007 David Jardin
 + Added Searchbot

26-Dec-2007 Aurel Rothärmel
 ^ Acl stuff now uses caching and better queries leading to better performance

25-Dec-2007 David Jardin
 ! TODO: Translate description in com_easybook.xml
 # Fixed untranslated menuitems
 + Integrated Badwordfilter
 # Fixed ID cutting with SEF in frontend
 # Fixed message type in backend
 ^ Entry form in backend now using mooTools Slidepanes