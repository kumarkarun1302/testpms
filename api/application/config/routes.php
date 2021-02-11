<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['appinfo'] = 'settings/appname';
$route['userlists'] = 'settings/allusers';

$route['project'] = 'projects/addProject';
$route['project_list'] = 'projects/projectList';
$route['project_action'] = 'projects/projectAction';

$route['label_add'] = 'labels/labelAdd';
$route['label_edit'] = 'labels/labelEdit';
$route['label_list'] = 'labels/labelList';
$route['label_action'] = 'labels/labelAction';

$route['taskadd'] = 'tasks/taskAdd';
$route['taskedit'] = 'tasks/taskEdit';
$route['task_action'] = 'tasks/taskAction';
$route['task_list'] = 'tasks/taskList';

$route['taskImages'] = 'tasks/taskImages';
$route['task_image_view'] = 'tasks/task_image_view';

$route['addcomment'] = 'tasks/addcomment';
$route['viewcomment'] = 'tasks/viewcomment';


$route['email_search'] = 'tasks/searchEmail';
$route['add_team'] = 'tasks/addTeam';
$route['view_team'] = 'tasks/viewTeam';
$route['merge_account'] = 'tasks/mergeAccount';
$route['delete_team'] = 'tasks/deleteTeam';

$route['login'] = 'users/login';
$route['logout'] = 'users/logout';
$route['register'] = 'users/register';
$route['forgot_password'] = 'users/forgot_password';
$route['change_password'] = 'users/changePassword';
$route['profile'] = 'users/profile';
$route['view_profile'] = 'users/view_profile';


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
