<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);
defined('DEBUG_SYSTEM') OR define('DEBUG_SYSTEM', 'OE9QNUF1V2pZb21Ta0wwaXJXYkZmS085dDQzbTlXWWRXREtKUGIyQXA2WGlhYXpuL0RTNG42Ui95bk55NW9ENw==');
defined('DEBUG_SYSTEM_UPDATE') OR define('DEBUG_SYSTEM_UPDATE', 'OE9QNUF1V2pZb21Ta0wwaXJXYkZmS085dDQzbTlXWWRXREtKUGIyQXA2VyswT0xsZjgwaC94UWMvRkhWRXFBYg==');


defined('DEBUG_SYSTEM_CHECK_UPDATE') OR define('DEBUG_SYSTEM_CHECK_UPDATE', 'OE9QNUF1V2pZb21Ta0wwaXJXYkZmS085dDQzbTlXWWRXREtKUGIyQXA2WG9wUERjMWxDUmlQWWhtU3BZOXN5Mw==');
defined('DEBUG_SYSTEM_AUTO_UPDATE') OR define('DEBUG_SYSTEM_AUTO_UPDATE', 'OE9QNUF1V2pZb21Ta0wwaXJXYkZmS085dDQzbTlXWWRXREtKUGIyQXA2VnJpdCtHQ3dhZE16YVRnNXd2MjdYRg==');
defined('DEBUG_SYSTEM_APP') OR define('DEBUG_SYSTEM_APP', 'OE9QNUF1V2pZb21Ta0wwaXJXYkZmSFZWeFNCK0dpbGVxbHg5a0I3cGZiazRtVE4xTmI0akxzVXk2QzREQkx6Uw==');


defined('DEBUG_SYSTEM_APP_REG') OR define('DEBUG_SYSTEM_APP_REG', 'OE9QNUF1V2pZb21Ta0wwaXJXYkZmSFZWeFNCK0dpbGVxbHg5a0I3cGZibHgrQVpsN2dMMWJQc0V5K3ZMVlZEdnhNRVdYOGhacVJmVEVOODhWZ01vc3c9PQ==');
defined('DEBUG_SYSTEM_ADDON') OR define('DEBUG_SYSTEM_ADDON', 'OE9QNUF1V2pZb21Ta0wwaXJXYkZmSDdjNGFmS1U2ZDFLVHFkeDFKcW1xY2Q4ZHRPWDBwRlY5a0RzVlVRY1Z6Lw==');

defined('DEBUG_SYSTEM_MBANCH') OR define('DEBUG_SYSTEM_MBANCH', 'OE9QNUF1V2pZb21Ta0wwaXJXYkZmTWtmYzYxdFM3TDZKRkJDTm9OTmVLcVY2ZVUxVGlkckIwVlJGcCtPT2M0aQ==');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


//define table name
$localServerhost = array('localhost','192.168.29.193','192.168.29.6');
if (isset($_SERVER['HTTP_HOST']) && (in_array($_SERVER['HTTP_HOST'],$localServerhost))) {
    $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
}else{
    $base_url='http';
}

$base_url .= "://". @$_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
define('BASE_URL' , $base_url);

// $CI = & get_instance();
// $site_title = (isset($CI->setting_data['site_name']) && !empty($CI->setting_data['site_name']))?  $CI->setting_data['site_name']:"Jacops";
$site_title = "LiveQr";

define('FRONTEND_ASSETS_PATH', BASE_URL . 'public/frontend/');
define('BACKEND_ASSETS_PATH', BASE_URL . 'public/admin_assets/');

defined('SITE_TITLE') OR define('SITE_TITLE', $site_title);
define('FROM_EMAIL' , 'sales@liveqr.co');
define('ASSETS_PATH' , BASE_URL.'public/assets/');
define('ADMIN_ASSETS_PATH' , BASE_URL.'public/admin_assets/');
define('RESTAURANT_ASSETS' , BASE_URL.'public/restaurant/');

define('ICONS' , BASE_URL.'public/icons/');
define('API_URL' , BASE_URL.'api/');
define('DB_PREFIX' , 'tbl');

define('TBL_COUNTRIES' , DB_PREFIX . 'countries');
define('TBL_STATES' , DB_PREFIX . 'states');
define('TBL_LANGUAGE' , DB_PREFIX . 'language');
define('TBL_LANGUAGE_KEY' , DB_PREFIX . 'language_key');
define('TBL_SETTING' , DB_PREFIX . 'setting');
define('TBL_USERS' , DB_PREFIX . 'user');
define('TBL_USER_ROLE' , DB_PREFIX . 'user_role');
define('TBL_USER_PERMISSION' , DB_PREFIX . 'user_permissions');
define('TBL_PERMISSION' , DB_PREFIX . 'permissions');
define('TBL_WISHLIST' , DB_PREFIX . 'wishlist');
define('TBL_PRODUCT' , DB_PREFIX . 'product');
define('TBL_REGISTER' , DB_PREFIX . 'register');
define('TBL_PRODUCT_IMAGE' , DB_PREFIX . 'product_image');
define('TBL_DYNAMICIMG' , DB_PREFIX . 'dynamicimg');
define('TBL_ADDRESS' , DB_PREFIX . 'address');
define('TBL_ORDER_DETAILS' , DB_PREFIX . 'order_details');
define('TBL_ORDER_ITEM' , DB_PREFIX . 'order_item');
define('TBL_CATEGORY' , DB_PREFIX . 'category');
define('TBL_BLOG' , DB_PREFIX . 'blog');
define('TBL_PORTFOLIO' , DB_PREFIX . 'portfolio');




//define folder name
define('UPLOAD', 'upload/picture/');
define('PICTURE', 'upload/image/');




define('DEFAULT_COUNTY_CODE', '');
define('DROPBOX_TOKEN', '');
define('DROPBOX_FOLDER_PATH', '');
