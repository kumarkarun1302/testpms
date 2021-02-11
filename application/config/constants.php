<?php
defined('BASEPATH') OR exit('No direct script access allowed');
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); 
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b');
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

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

defined('ANJ_TBL_SETTINGS') OR define('ANJ_TBL_SETTINGS','tbl_settings');

defined('ANJ_CI_SESSIONS') OR define('ANJ_CI_SESSIONS','ci_sessions');
defined('ANJ_LIKE_UNLIKE') OR define('ANJ_LIKE_UNLIKE','like_unlike');
defined('ANJ_TBL_ACCOUNT_USE') OR define('ANJ_TBL_ACCOUNT_USE','tbl_account_use');
defined('ANJ_TBL_ANJDRIVE') OR define('ANJ_TBL_ANJDRIVE','tbl_anjdrive');
defined('ANJ_TBL_BLOG') OR define('ANJ_TBL_BLOG','tbl_blog');
defined('ANJ_TBL_CHAT') OR define('ANJ_TBL_CHAT','tbl_chat');
defined('ANJ_TBL_COMMENT') OR define('ANJ_TBL_COMMENT','tbl_comment');
defined('ANJ_TBL_GROUPCHAT') OR define('ANJ_TBL_GROUPCHAT','tbl_groupchat');
defined('ANJ_TBL_MAIN_CHAT') OR define('ANJ_TBL_MAIN_CHAT','tbl_main_chat');
defined('ANJ_TBL_MAIN_GROUP_CHAT') OR define('ANJ_TBL_MAIN_GROUP_CHAT','tbl_main_group_chat');
defined('ANJ_TBL_MERGE_USERS') OR define('ANJ_TBL_MERGE_USERS','tbl_merge_users');
defined('ANJ_TBL_MULTIPLE_IMAGE') OR define('ANJ_TBL_MULTIPLE_IMAGE','tbl_multiple_image');
defined('ANJ_TBL_MY_ACTIVITY') OR define('ANJ_TBL_MY_ACTIVITY','tbl_my_activity');
defined('ANJ_TBL_NOTIFICATIONS') OR define('ANJ_TBL_NOTIFICATIONS','tbl_notifications');
defined('ANJ_TBL_PAGE_REFRESH') OR define('ANJ_TBL_PAGE_REFRESH','tbl_page_refresh');
defined('ANJ_TBL_PAYMENTS') OR define('ANJ_TBL_PAYMENTS','tbl_payments');
defined('ANJ_TBL_PERMISSION') OR define('ANJ_TBL_PERMISSION','tbl_permission');
defined('ANJ_TBL_PRICE') OR define('ANJ_TBL_PRICE','tbl_price');
defined('ANJ_TBL_PROJECT') OR define('ANJ_TBL_PROJECT','tbl_project');
defined('ANJ_TBL_ROLES') OR define('ANJ_TBL_ROLES','tbl_roles');



