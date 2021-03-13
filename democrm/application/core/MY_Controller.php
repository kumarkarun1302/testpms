<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	function __construct() {
        parent::__construct();
        is_login_admin();
        if(!getProfileName('user_id')){
            redirect("login/logout");
        }
    }

} 