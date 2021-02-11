<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['list'] = 'anj_drive/list';

$route['upgradePlanM'] = 'home/upgradePlanM';
$route['upgradePlanY'] = 'home/upgradePlanY';

$route['help'] = 'otherPages/help';
$route['training'] = 'otherPages/training';
$route['updates'] = 'otherPages/updates';
$route['terms_policy'] = 'otherPages/terms_policy';
$route['send_feedback'] = 'otherPages/send_feedback';

$route['contact'] = 'otherPages/contact';
$route['insertContact'] = 'otherPages/insertContact';

$route['blog'] = 'otherPages/bloglist';
$route['terms_privacy'] = 'otherPages/terms_privacy';
$route['developer_api'] = 'otherPages/developer_api';
$route['terms_privacy'] = 'otherPages/terms_privacy';
$route['product'] = 'otherPages/product';


$route['logout'] = 'login/logout';
$route['rolename'] = 'admin/rolename';

$route['shared_me'] = 'anj_drive/shared_me';

$route['upgrade'] = 'anj_drive/upgrade';
$route['anj_drive'] = 'anj_drive/index/$1';
$route['request_list'] = 'file/filerequestlist';
$route['trash'] = 'file/trash';


$route['f/(:any)/(:any)'] = 'anj_drive/index/$1/$2';

$route['anj_drive/insert_create_folder/(:any)'] = 'anj_drive/insert_create_folder/$1';

// website //
$route['notificationread'] = 'ajax/notification_read';

$route['permission2'] = 'permission/permission2';
$route['permission2/(:any)'] = 'permission/permission2/$1';

$route['permission'] = 'permission/add_permission';
$route['permission/(:any)'] = 'permission/add_permission/$1';
$route['insert_Permission'] = 'permission/insert_Permission';


$route['clients'] = 'Dashboard/clientsView';
$route['projects'] = 'Dashboard/projectView';
$route['profile'] = 'Dashboard/profileView';
$route['userlists'] = 'Dashboard/userlistsView';
$route['settings'] = 'Dashboard/settingsView';

$route['admin'] = 'admin/index';

$route['forget_password'] = 'login/forgetPassword';

$route['dashboard'] = 'dashboard/index';
$route['dashboard/(:any)'] = 'dashboard/index/$1';
$route['dashboard/(:any)/(:any)'] = 'dashboard/index/$1/$2';
$route['dashboard/(:any)/(:any)/(:any)'] = 'dashboard/index/$1/$2/$3';
$route['dashboard/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'dashboard/index/$1/$2/$3/$4/$5';

$route['register'] = 'login/registerFrm';
$route['register/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'login/registerFrm/$1/$2/$3/$4/$5';

$route['returnUrllogin/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'login/returnUrllogin/$1/$2/$3/$4/$5';
$route['returnUrllog_in/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'login/returnUrllog_in/$1/$2/$3/$4/$5';

$route['file/anj/(:any)/(:any)/(:any)'] = 'file/anj/$1/$2/$3';

//$route['(:any)'] = 'joint_account/index/$1';

$route['anj/(:any)'] = 'joint_account/peg/$1';

$route['default_controller'] = 'home';
$route['404_override'] = 'Error404';
$route['translate_uri_dashes'] = FALSE;
