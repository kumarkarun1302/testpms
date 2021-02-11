<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	function __construct() {
        parent::__construct();
        is_login();
        if(!getProfileName('user_id')){
            redirect("login/logout");
        }
    }

    //only allowed to access for team members 
    protected function access_only_business($user_type) {
        if ($user_type == "business") {
            redirect("forbidden");
        }
    }

    //only allowed to access for admin users
    protected function access_only_admin($user_type) {
        if ($user_type !== 'hr operations') {
            echo '0';
        }
    }

    //access only allowed team members
    protected function access_only_allowed_members() {
        if ($this->access_type == "all") {
            return true; 
        } else if ($this->module_group === "hr" && $this->access_type === "supper") {
            return true;
        } else {
            redirect("forbidden");
        }
    }

} 