<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class General extends CI_Controller {
    function checkLogin($loginStatus) {
    	$this->CI =& get_instance();
        $this->CI->load->library("session");
        if($loginStatus) {
            echo "Logged-in";
        }
        else {
            echo "Not logged-in";
        }
    }
}