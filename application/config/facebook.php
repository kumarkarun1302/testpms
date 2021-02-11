<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$config['facebook_app_id']              = '3941313025899344';
$config['facebook_app_secret']          = '280f46aee37e4ea63336be91e8f1b7dc';
$config['facebook_login_type']          = 'web';
$config['facebook_login_redirect_url']  = 'login/web_login';
$config['facebook_logout_redirect_url'] = 'login/logout';
$config['facebook_permissions']         = array('public_profile', 'email');
$config['facebook_graph_version']         = 'v2.6';
$config['facebook_auth_on_load']          = TRUE;