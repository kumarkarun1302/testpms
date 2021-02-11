<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['facebook_app_id']              = '';
$config['facebook_app_secret']          = '';
$config['facebook_login_type']          = 'web';
$config['facebook_login_redirect_url']  = 'users/social_login/facebook_login';
$config['facebook_logout_redirect_url'] = 'user_authentication/logout';
$config['facebook_permissions']         = array('email');
$config['facebook_graph_version']       = 'v2.6';
$config['facebook_auth_on_load']        = TRUE;

//Twitter API Configuration
$config['client_id'] = '';
$config['secret_id'] = '';
$config['call_back'] = base_url().'users/social_login/twitter_login/';

// Google Project API Credentials
$config['google_client_id'] = '';
$config['google_secret_id'] = '';
$config['google_call_back'] = base_url() . 'users/social_login/google_login/';

// Instagram API Credentials
$config['insta_client_id'] = '';
$config['insta_secret_id'] = '';
$config['grant_type']      = 'authorization_code';
$config['insta_call_back'] = base_url() . 'users/Social_login/instagram_login';

//Linkedin Credentials
$config['linkedin_client_id'] = "";
$config['linkedin_client_secret'] = "";
$config['linkedin_redirect_uri'] = base_url()."users/social_login/linkedin_data";
$config['linkedin_csrf_token'] = rand(1111111,9999999);
$config['linkedin_scopes'] = "";