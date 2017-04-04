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
if (!defined('_BC_NAME')) DEFINE('_BC_NAME','Имя');
if (!defined('_BC_USERNAME')) DEFINE('_BC_USERNAME','Имя пользователя');
if (!defined('_BC_EMAIL')) DEFINE('_BC_EMAIL','Email');
if (!defined('_BC_NOUSERS')) DEFINE('_BC_NOUSERS','Пользователь создается в системе blastchat, когда зарегистрированный пользователь вашего сайта входит в чат через интерфейс вашего сайта (без поддержки администратора).');
if (!defined('_BC_LOGGEDIN')) DEFINE('_BC_LOGGEDIN','Выполнен вход');
if (!defined('_BC_INCHAT')) DEFINE('_BC_INCHAT','В чате');
if (!defined('_BC_ENABLED')) DEFINE('_BC_ENABLED','Включен');
if (!defined('_BC_CHATTING_U')) DEFINE('_BC_CHATTING_U','Общается');
if (!defined('_BC_ID')) DEFINE('_BC_ID','ID');
if (!defined('_BC_INROOM')) DEFINE('_BC_INROOM','В&nbsp;комнате');
if (!defined('_BC_GROUP')) DEFINE('_BC_GROUP','Группа');
if (!defined('_BC_ROOMNAME')) DEFINE('_BC_ROOMNAME','Название комнаты');
if (!defined('_BC_SECURITYCODE')) DEFINE('_BC_SECURITYCODE','Код&nbsp;безопасности');
if (!defined('_BC_LASTVISIT')) DEFINE('_BC_LASTVISIT','Последний&nbsp;визит');
if (!defined('_BC_LASTCHATENTRY')) DEFINE('_BC_LASTCHATENTRY','Последний&nbsp;вход&nbsp;в чат');
if (!defined('_BC_LASTCHATACTIVITY')) DEFINE('_BC_LASTCHATACTIVITY','Последняя активность в чате');
if (!defined('_BC_FILTER')) DEFINE('_BC_FILTER','Фильтр');
if (!defined('_BC_DETACH')) DEFINE('_BC_DETACH','Отдельное окно');
if (!defined('_BC_DETACH_DESC')) DEFINE('_BC_DETACH_DESC','Отдельное окно для настроек со стороны сервера');
if (!defined('_BC_UNDETACH')) DEFINE('_BC_UNDETACH','Отменить отдельное окно');
if (!defined('_BC_UNDETACH_DESC')) DEFINE('_BC_UNDETACH_DESC','Отменить отдельное окно для настроек со стороны сервера');
if (!defined('_BC_EXPAND')) DEFINE('_BC_EXPAND','Расширить');
if (!defined('_BC_EXPAND_DESC')) DEFINE('_BC_EXPAND_DESC','Расширить окно настроек со стороны сервера');
if (!defined('_BC_COLLAPSE')) DEFINE('_BC_COLLAPSE','Закрыть');
if (!defined('_BC_COLLAPSE_DESC')) DEFINE('_BC_COLLAPSE_DESC','Закрыть окно настроек со стороны сервера');
if (!defined("_BC_WEBSITE")) DEFINE("_BC_WEBSITE", "Сайт");
if (!defined("_BC_DELETEWEBSITE")) DEFINE("_BC_DELETEWEBSITE", "(Данная операция удалит все данные из таблиц blastchatc и blastchatc_users этого сайта, при этом ваша регистрация в системе BlastChat станет недействительной.)");
if (!defined("_BC_DELETEUSER")) DEFINE("_BC_DELETEUSER", "(Данная операция удалит выбранного пользователя (-ей).)");
if (!defined("_BC_OLDBROWSER")) DEFINE("_BC_OLDBROWSER", "Данный сайт использует DHTML. Рекомендуем обновить ваш браузер.");
if (!defined("_BC_OPENUNDETACHED")) DEFINE("_BC_OPENUNDETACHED", "Нажмите на %s для загрузки чата в отдельном окне.");
if (!defined("_BC_OPENUNDETACHED_HERE")) DEFINE("_BC_OPENUNDETACHED_HERE", "здесь"); //заполнение %s в предыдущем определении
if (!defined("_BC_ERROR_0004")) DEFINE("_BC_ERROR_0004", "Ошибка при обновлении базы данных");
if (!defined("_BC_MENU_CONFIG_C")) DEFINE("_BC_MENU_CONFIG_C","Настройки со стороны клиента (местно - администратором)");
if (!defined("_BC_MENU_CONFIG_S")) DEFINE("_BC_MENU_CONFIG_S","Настройки со стороны сервера (удаленно - через аккаунт blastchat)");
if (!defined("_BC_MUSTREG")) DEFINE("_BC_MUSTREG","Сначала необходимо зарегистрировать ваш сайт");
if (!defined("_BC_REGNOW")) DEFINE("_BC_REGNOW","ЗАРЕГИСТРИРУЙТЕ ваш сайт бесплатно");
if (!defined("_BC_MENU_USERS_DELETE")) DEFINE("_BC_MENU_USERS_DELETE", "Пользователь(и) удален");
if (!defined("_BC_MENU_WEBSITE_DELETE")) DEFINE("_BC_MENU_WEBSITE_DELETE", "Вебсайт удален");
if (!defined("_BC_MENU_CREDITS")) DEFINE("_BC_MENU_CREDITS","Информация о разработчиках");
//for Mambo sites which ar emissing this definition
if (!defined("_CURRENT_SERVER_TIME_FORMAT")) DEFINE( '_CURRENT_SERVER_TIME_FORMAT', '%Г-%м-%д %Ч:%М:%С' );

	/** новое в модуле  */
	if (!defined('_BC_NEVER')) DEFINE('_BC_NEVER','Никогда');
	if (!defined("_BC_USER_LASTCHATENTRY")) DEFINE("_BC_USER_LASTCHATENTRY", "<br><br><b>Последний вход в чат:</b><br>%s");
	if (!defined('_BC_WE_HAVE')) DEFINE('_BC_WE_HAVE', 'Сейчас у нас ');
	if (!defined('_BC_AND')) DEFINE('_BC_AND', ' и ');
	if (!defined('_BC_GUEST_COUNT')) DEFINE('_BC_GUEST_COUNT','%s гость');
	if (!defined('_BC_GUESTS_COUNT')) DEFINE('_BC_GUESTS_COUNT','%s гостей');
	if (!defined('_BC_MEMBER_COUNT')) DEFINE('_BC_MEMBER_COUNT','%s участников');
	if (!defined('_BC_MEMBERS_COUNT')) DEFINE('_BC_MEMBERS_COUNT','%s участников');
	if (!defined('_BC_ONLINE')) DEFINE('_BC_ONLINE',' онлайн');
	if (!defined('_BC_NONE')) DEFINE('_BC_NONE','Нет пользователей в онлайне');
	/**изменено в модуле **/
	if (!defined("_BC_USER_LASTLOGIN")) DEFINE("_BC_USER_LASTLOGIN", "<br><b>Последний логин:</b><br>%s");
	if (!defined("_BC_MEMBER")) DEFINE("_BC_MEMBER", "<b>Участник &quot;%s&quot;</b>");



//New in version 2.2
if (!defined("_BC_LICENSE_INFO_HEADER")) DEFINE("_BC_LICENSE_INFO_HEADER", "Исключение");
if (!defined("_BC_MENU_CONFIG_SAVE")) DEFINE("_BC_MENU_CONFIG_SAVE", "Настройки сохранены");
if (!defined("_BC_DATABASE_UPDATED")) DEFINE("_BC_DATABASE_UPDATED","База данных обновлена");
	//New for module 2.2
	if (!defined("_BC_JOINCHAT")) DEFINE("_BC_JOINCHAT", "Присоединиться к чату");
	if (!defined("_BC_CHATLINK")) DEFINE("_BC_CHATLINK", "Присоединиться к чату");
	if (!defined("_BC_CBLINK")) DEFINE("_BC_CBLINK", "Отобразить профиль");
	if (!defined("_BC_SMFLINK")) DEFINE("_BC_SMFLINK", "Отобразить профиль");
	if (!defined("_BC_USER_INSIDE_CHAT")) DEFINE("_BC_USER_INSIDE_CHAT", "<br>В чате[%s&nbsp;idle].");
	if (!defined("_BC_USER_NOT_CHATTING")) DEFINE("_BC_USER_NOT_CHATTING", "<br>Не в чате.");
	if (!defined("_BC_USER_CHATTING_IN")) DEFINE("_BC_USER_CHATTING_IN", "<br>В приватной комнате &quot;%s&quot; [%s&nbsp;idle].");
	if (!defined("_BC_CHATTING")) DEFINE("_BC_CHATTING", "в чате");
	if (!defined("_BC_GLOBALSTATUS")) DEFINE("_BC_GLOBALSTATUS", "глобальный статус");
	if (!defined("_BC_LASTUPDATE")) DEFINE("_BC_LASTUPDATE", "<br><br>Последнее обновление:<br>%s");
	if (!defined("_BC_GLOBALCOUNT")) DEFINE("_BC_GLOBALCOUNT", "Присутствует %s чатеров в онлайне.");


//New in version 2.1
if (!defined('_BC_DATABASE_UPDATE')) DEFINE("_BC_DATABASE_UPDATE","Обновить базу данных с  Версии");
if (!defined('_BC_DATABASE_CURRENT')) DEFINE("_BC_DATABASE_CURRENT","Текущая версия базы данных");
if (!defined('_BC_DATABASE_WRONG')) DEFINE("_BC_DATABASE_WRONG","Неверная версия базы данных");
if (!defined('_BC_INSTAL_FAIL')) DEFINE("_BC_INSTAL_FAIL","Установка не выполнена");

//New in version 2.0
//component menus
if (!defined('_BC_MENU_USERS')) DEFINE("_BC_MENU_USERS","Пользователи");
if (!defined('_BC_MENU_CONFIG')) DEFINE("_BC_MENU_CONFIG","Конфигурация");
if (!defined('_BC_MENU_REG')) DEFINE("_BC_MENU_REG","Регистрация");

//registration
if (!defined('_BC_DETACHED')) DEFINE("_BC_DETACHED","В отдельном окне");
if (!defined('_BC_DETACHED_DES')) DEFINE("_BC_DETACHED_DES","Если оставить линк по умолчанию, компонент BlastChat откроется в отдельном окне");
if (!defined('_BC_WIDTH')) DEFINE("_BC_WIDTH","Ширина");
if (!defined('_BC_WIDTH_DES')) DEFINE("_BC_WIDTH_DES","Ширина фрейма по умолчанию");
if (!defined('_BC_HEIGHT')) DEFINE("_BC_HEIGHT","Высота");
if (!defined('_BC_HEIGHT_DES')) DEFINE("_BC_HEIGHT_DES","Высота фрейма по умолчанию");
if (!defined('_BC_DWIDTH')) DEFINE("_BC_DWIDTH","Ширина отдельного окна");
if (!defined('_BC_DWIDTH_DES')) DEFINE("_BC_DWIDTH_DES","Ширина фрейма в отдельном окне по умолчанию");
if (!defined('_BC_DHEIGHT')) DEFINE("_BC_DHEIGHT","Высота отдельного окна");
if (!defined('_BC_DHEIGHT_DES')) DEFINE("_BC_DHEIGHT_DES","Высота фрейма в отдельном окне по умолчанию");
if (!defined('_BC_FRAMEBORDER')) DEFINE("_BC_FRAMEBORDER","Граница фрейма");
if (!defined('_BC_FRAMEBORDER_DES')) DEFINE("_BC_FRAMEBORDER_DES","Граница фрейма по умолчанию");
if (!defined('_BC_MWIDTH')) DEFINE("_BC_MWIDTH","Ширина отступа");
if (!defined('_BC_MWIDTH_DES')) DEFINE("_BC_MWIDTH_DES","Ширина отступа фо фрейме по умолчанию");
if (!defined('_BC_MHEIGHT')) DEFINE("_BC_MHEIGHT","Высота отступа");
if (!defined('_BC_MHEIGHT_DES')) DEFINE("_BC_MHEIGHT_DES","Высота отступа фо фрейме по умолчанию");

if (!defined('_BC_INSTAL')) DEFINE("_BC_INSTAL","Установка прошла успешно");
if (!defined('_BC_UNINSTAL')) DEFINE("_BC_UNINSTAL","Деинсталляция прошла успешно");
if (!defined('_BC_MUSTREG')) DEFINE("_BC_MUSTREG","Сначала необходимо зарегистрировать ваш сервер");
if (!defined('_BC_REGNOW')) DEFINE("_BC_REGNOW","ЗАРЕГИСТРИРУЙТЕ ваш сервер сейчас");

if (!defined('_BC_NEXT')) DEFINE("_BC_NEXT","Дальше");
if (!defined('_BC_RESULT')) DEFINE("_BC_RESULT","Результат");
if (!defined('_BC_UPDATE')) DEFINE("_BC_UPDATE","Обновление");

if (!defined('_BC_CONTACTWEBMASTER')) DEFINE("_BC_CONTACTWEBMASTER", "Произошла ошибка. Обратитесь к вашему веб-мастеру");
if (!defined('_BC_NOT_IMPLEMENTED')) DEFINE("_BC_NOT_IMPLEMENTED", "Еще не выполнено");

if (!defined('_BC_ERROR_MOSCONFIG')) DEFINE("_BC_ERROR_MOSCONFIG", "Указано неверное значение. Исправьте проблему или обратитесь за помощью в службу поддержки BlastChat");
if (!defined('_BC_ERROR_TABLE')) DEFINE("_BC_ERROR_TABLE", "Таблица");
if (!defined('_BC_ERROR_NOPOPUP')) DEFINE("_BC_ERROR_NOPOPUP", "Нельзя открыть чат в отдельном окне, поскольку ваш браузер блокирует появление всплывающих окон");
if (!defined('_BC_ERROR_0002')) DEFINE("_BC_ERROR_0002", "Введены неверные данные");
if (!defined('_BC_ERROR_0003')) DEFINE("_BC_ERROR_0003", "Введены несоответствующие данные");

if (!defined('_BC_LICENSE_INFO')) DEFINE("_BC_LICENSE_INFO", "Исключение: вы можете устанавливать и использовать данный компонент на сайте, направленном на получение прибыли. Однако запрещается любое другое коммерческое использование, выражающееся в предложении данного компонента за вознаграждение (например, в составе пакета услуг веб-хостинга).");
?>