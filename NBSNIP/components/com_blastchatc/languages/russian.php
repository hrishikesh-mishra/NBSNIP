<?php
/**
* russian.php
* @package BlastChat client
* @copyright 2004-2007 BlastChat
* @license Creative Commons Attribution-Noncommercial-Share Alike 3.0 United States License. http://creativecommons.org/licenses/by-nc-sa/3.0/us/
* @license Permissions beyond the scope of this license may be available at http://www.blastchat.com/client_license.html
* @version $Revision: 2.0 $
* @author BlastChat
* @HomePage <www.blastchat.com>
**/

/**
* Credit to translators
* Name: Hotstone
* Contact email: sacron@yandex.ru
* URL: 
**/

//New in version 2.3
if (!defined('_BC_NAME')) DEFINE('_BC_NAME','���');
if (!defined('_BC_USERNAME')) DEFINE('_BC_USERNAME','��� ������������');
if (!defined('_BC_EMAIL')) DEFINE('_BC_EMAIL','Email');
if (!defined('_BC_NOUSERS')) DEFINE('_BC_NOUSERS','������������ ��������� � ������� blastchat, ����� ������������������ ������������ ������ ����� ������ � ��� ����� ��������� ������ ����� (��� ��������� ��������������).');
if (!defined('_BC_LOGGEDIN')) DEFINE('_BC_LOGGEDIN','�������� ����');
if (!defined('_BC_INCHAT')) DEFINE('_BC_INCHAT','� ����');
if (!defined('_BC_ENABLED')) DEFINE('_BC_ENABLED','�������');
if (!defined('_BC_CHATTING_U')) DEFINE('_BC_CHATTING_U','��������');
if (!defined('_BC_ID')) DEFINE('_BC_ID','ID');
if (!defined('_BC_INROOM')) DEFINE('_BC_INROOM','�&nbsp;�������');
if (!defined('_BC_GROUP')) DEFINE('_BC_GROUP','������');
if (!defined('_BC_ROOMNAME')) DEFINE('_BC_ROOMNAME','�������� �������');
if (!defined('_BC_SECURITYCODE')) DEFINE('_BC_SECURITYCODE','���&nbsp;������������');
if (!defined('_BC_LASTVISIT')) DEFINE('_BC_LASTVISIT','���������&nbsp;�����');
if (!defined('_BC_LASTCHATENTRY')) DEFINE('_BC_LASTCHATENTRY','���������&nbsp;����&nbsp;� ���');
if (!defined('_BC_LASTCHATACTIVITY')) DEFINE('_BC_LASTCHATACTIVITY','��������� ���������� � ����');
if (!defined('_BC_FILTER')) DEFINE('_BC_FILTER','������');
if (!defined('_BC_DETACH')) DEFINE('_BC_DETACH','��������� ����');
if (!defined('_BC_DETACH_DESC')) DEFINE('_BC_DETACH_DESC','��������� ���� ��� �������� �� ������� �������');
if (!defined('_BC_UNDETACH')) DEFINE('_BC_UNDETACH','�������� ��������� ����');
if (!defined('_BC_UNDETACH_DESC')) DEFINE('_BC_UNDETACH_DESC','�������� ��������� ���� ��� �������� �� ������� �������');
if (!defined('_BC_EXPAND')) DEFINE('_BC_EXPAND','���������');
if (!defined('_BC_EXPAND_DESC')) DEFINE('_BC_EXPAND_DESC','��������� ���� �������� �� ������� �������');
if (!defined('_BC_COLLAPSE')) DEFINE('_BC_COLLAPSE','�������');
if (!defined('_BC_COLLAPSE_DESC')) DEFINE('_BC_COLLAPSE_DESC','������� ���� �������� �� ������� �������');
if (!defined("_BC_WEBSITE")) DEFINE("_BC_WEBSITE", "����");
if (!defined("_BC_DELETEWEBSITE")) DEFINE("_BC_DELETEWEBSITE", "(������ �������� ������ ��� ������ �� ������ blastchatc � blastchatc_users ����� �����, ��� ���� ���� ����������� � ������� BlastChat ������ ����������������.)");
if (!defined("_BC_DELETEUSER")) DEFINE("_BC_DELETEUSER", "(������ �������� ������ ���������� ������������ (-��).)");
if (!defined("_BC_OLDBROWSER")) DEFINE("_BC_OLDBROWSER", "������ ���� ���������� DHTML. ����������� �������� ��� �������.");
if (!defined("_BC_OPENUNDETACHED")) DEFINE("_BC_OPENUNDETACHED", "������� �� %s ��� �������� ���� � ��������� ����.");
if (!defined("_BC_OPENUNDETACHED_HERE")) DEFINE("_BC_OPENUNDETACHED_HERE", "�����"); //���������� %s � ���������� �����������
if (!defined("_BC_ERROR_0004")) DEFINE("_BC_ERROR_0004", "������ ��� ���������� ���� ������");
if (!defined("_BC_MENU_CONFIG_C")) DEFINE("_BC_MENU_CONFIG_C","��������� �� ������� ������� (������ - ���������������)");
if (!defined("_BC_MENU_CONFIG_S")) DEFINE("_BC_MENU_CONFIG_S","��������� �� ������� ������� (�������� - ����� ������� blastchat)");
if (!defined("_BC_MUSTREG")) DEFINE("_BC_MUSTREG","������� ���������� ���������������� ��� ����");
if (!defined("_BC_REGNOW")) DEFINE("_BC_REGNOW","��������������� ��� ���� ���������");
if (!defined("_BC_MENU_USERS_DELETE")) DEFINE("_BC_MENU_USERS_DELETE", "������������(�) ������");
if (!defined("_BC_MENU_WEBSITE_DELETE")) DEFINE("_BC_MENU_WEBSITE_DELETE", "������� ������");
if (!defined("_BC_MENU_CREDITS")) DEFINE("_BC_MENU_CREDITS","���������� � �������������");
//for Mambo sites which ar emissing this definition
if (!defined("_CURRENT_SERVER_TIME_FORMAT")) DEFINE( '_CURRENT_SERVER_TIME_FORMAT', '%�-%�-%� %�:%�:%�' );

	/** ����� � ������  */
	if (!defined('_BC_NEVER')) DEFINE('_BC_NEVER','�������');
	if (!defined("_BC_USER_LASTCHATENTRY")) DEFINE("_BC_USER_LASTCHATENTRY", "<br><br><b>��������� ���� � ���:</b><br>%s");
	if (!defined('_BC_WE_HAVE')) DEFINE('_BC_WE_HAVE', '������ � ��� ');
	if (!defined('_BC_AND')) DEFINE('_BC_AND', ' � ');
	if (!defined('_BC_GUEST_COUNT')) DEFINE('_BC_GUEST_COUNT','%s �����');
	if (!defined('_BC_GUESTS_COUNT')) DEFINE('_BC_GUESTS_COUNT','%s ������');
	if (!defined('_BC_MEMBER_COUNT')) DEFINE('_BC_MEMBER_COUNT','%s ����������');
	if (!defined('_BC_MEMBERS_COUNT')) DEFINE('_BC_MEMBERS_COUNT','%s ����������');
	if (!defined('_BC_ONLINE')) DEFINE('_BC_ONLINE',' ������');
	if (!defined('_BC_NONE')) DEFINE('_BC_NONE','��� ������������� � �������');
	/**�������� � ������ **/
	if (!defined("_BC_USER_LASTLOGIN")) DEFINE("_BC_USER_LASTLOGIN", "<br><b>��������� �����:</b><br>%s");
	if (!defined("_BC_MEMBER")) DEFINE("_BC_MEMBER", "<b>�������� &quot;%s&quot;</b>");



//New in version 2.2
if (!defined("_BC_LICENSE_INFO_HEADER")) DEFINE("_BC_LICENSE_INFO_HEADER", "����������");
if (!defined("_BC_MENU_CONFIG_SAVE")) DEFINE("_BC_MENU_CONFIG_SAVE", "��������� ���������");
if (!defined("_BC_DATABASE_UPDATED")) DEFINE("_BC_DATABASE_UPDATED","���� ������ ���������");
	//New for module 2.2
	if (!defined("_BC_JOINCHAT")) DEFINE("_BC_JOINCHAT", "�������������� � ����");
	if (!defined("_BC_CHATLINK")) DEFINE("_BC_CHATLINK", "�������������� � ����");
	if (!defined("_BC_CBLINK")) DEFINE("_BC_CBLINK", "���������� �������");
	if (!defined("_BC_SMFLINK")) DEFINE("_BC_SMFLINK", "���������� �������");
	if (!defined("_BC_USER_INSIDE_CHAT")) DEFINE("_BC_USER_INSIDE_CHAT", "<br>� ����[%s&nbsp;idle].");
	if (!defined("_BC_USER_NOT_CHATTING")) DEFINE("_BC_USER_NOT_CHATTING", "<br>�� � ����.");
	if (!defined("_BC_USER_CHATTING_IN")) DEFINE("_BC_USER_CHATTING_IN", "<br>� ��������� ������� &quot;%s&quot; [%s&nbsp;idle].");
	if (!defined("_BC_CHATTING")) DEFINE("_BC_CHATTING", "� ����");
	if (!defined("_BC_GLOBALSTATUS")) DEFINE("_BC_GLOBALSTATUS", "���������� ������");
	if (!defined("_BC_LASTUPDATE")) DEFINE("_BC_LASTUPDATE", "<br><br>��������� ����������:<br>%s");
	if (!defined("_BC_GLOBALCOUNT")) DEFINE("_BC_GLOBALCOUNT", "������������ %s ������� � �������.");


//New in version 2.1
if (!defined('_BC_DATABASE_UPDATE')) DEFINE("_BC_DATABASE_UPDATE","�������� ���� ������ �  ������");
if (!defined('_BC_DATABASE_CURRENT')) DEFINE("_BC_DATABASE_CURRENT","������� ������ ���� ������");
if (!defined('_BC_DATABASE_WRONG')) DEFINE("_BC_DATABASE_WRONG","�������� ������ ���� ������");
if (!defined('_BC_INSTAL_FAIL')) DEFINE("_BC_INSTAL_FAIL","��������� �� ���������");

//New in version 2.0
//component menus
if (!defined('_BC_MENU_USERS')) DEFINE("_BC_MENU_USERS","������������");
if (!defined('_BC_MENU_CONFIG')) DEFINE("_BC_MENU_CONFIG","������������");
if (!defined('_BC_MENU_REG')) DEFINE("_BC_MENU_REG","�����������");

//registration
if (!defined('_BC_DETACHED')) DEFINE("_BC_DETACHED","� ��������� ����");
if (!defined('_BC_DETACHED_DES')) DEFINE("_BC_DETACHED_DES","���� �������� ���� �� ���������, ��������� BlastChat ��������� � ��������� ����");
if (!defined('_BC_WIDTH')) DEFINE("_BC_WIDTH","������");
if (!defined('_BC_WIDTH_DES')) DEFINE("_BC_WIDTH_DES","������ ������ �� ���������");
if (!defined('_BC_HEIGHT')) DEFINE("_BC_HEIGHT","������");
if (!defined('_BC_HEIGHT_DES')) DEFINE("_BC_HEIGHT_DES","������ ������ �� ���������");
if (!defined('_BC_DWIDTH')) DEFINE("_BC_DWIDTH","������ ���������� ����");
if (!defined('_BC_DWIDTH_DES')) DEFINE("_BC_DWIDTH_DES","������ ������ � ��������� ���� �� ���������");
if (!defined('_BC_DHEIGHT')) DEFINE("_BC_DHEIGHT","������ ���������� ����");
if (!defined('_BC_DHEIGHT_DES')) DEFINE("_BC_DHEIGHT_DES","������ ������ � ��������� ���� �� ���������");
if (!defined('_BC_FRAMEBORDER')) DEFINE("_BC_FRAMEBORDER","������� ������");
if (!defined('_BC_FRAMEBORDER_DES')) DEFINE("_BC_FRAMEBORDER_DES","������� ������ �� ���������");
if (!defined('_BC_MWIDTH')) DEFINE("_BC_MWIDTH","������ �������");
if (!defined('_BC_MWIDTH_DES')) DEFINE("_BC_MWIDTH_DES","������ ������� �� ������ �� ���������");
if (!defined('_BC_MHEIGHT')) DEFINE("_BC_MHEIGHT","������ �������");
if (!defined('_BC_MHEIGHT_DES')) DEFINE("_BC_MHEIGHT_DES","������ ������� �� ������ �� ���������");

if (!defined('_BC_INSTAL')) DEFINE("_BC_INSTAL","��������� ������ �������");
if (!defined('_BC_UNINSTAL')) DEFINE("_BC_UNINSTAL","������������� ������ �������");
if (!defined('_BC_MUSTREG')) DEFINE("_BC_MUSTREG","������� ���������� ���������������� ��� ������");
if (!defined('_BC_REGNOW')) DEFINE("_BC_REGNOW","��������������� ��� ������ ������");

if (!defined('_BC_NEXT')) DEFINE("_BC_NEXT","������");
if (!defined('_BC_RESULT')) DEFINE("_BC_RESULT","���������");
if (!defined('_BC_UPDATE')) DEFINE("_BC_UPDATE","����������");

if (!defined('_BC_CONTACTWEBMASTER')) DEFINE("_BC_CONTACTWEBMASTER", "��������� ������. ���������� � ������ ���-�������");
if (!defined('_BC_NOT_IMPLEMENTED')) DEFINE("_BC_NOT_IMPLEMENTED", "��� �� ���������");

if (!defined('_BC_ERROR_MOSCONFIG')) DEFINE("_BC_ERROR_MOSCONFIG", "������� �������� ��������. ��������� �������� ��� ���������� �� ������� � ������ ��������� BlastChat");
if (!defined('_BC_ERROR_TABLE')) DEFINE("_BC_ERROR_TABLE", "�������");
if (!defined('_BC_ERROR_NOPOPUP')) DEFINE("_BC_ERROR_NOPOPUP", "������ ������� ��� � ��������� ����, ��������� ��� ������� ��������� ��������� ����������� ����");
if (!defined('_BC_ERROR_0002')) DEFINE("_BC_ERROR_0002", "������� �������� ������");
if (!defined('_BC_ERROR_0003')) DEFINE("_BC_ERROR_0003", "������� ����������������� ������");

if (!defined('_BC_LICENSE_INFO')) DEFINE("_BC_LICENSE_INFO", "����������: �� ������ ������������� � ������������ ������ ��������� �� �����, ������������ �� ��������� �������. ������ ����������� ����� ������ ������������ �������������, ������������ � ����������� ������� ���������� �� �������������� (��������, � ������� ������ ����� ���-��������).");
?>