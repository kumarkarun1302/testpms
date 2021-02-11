<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require __DIR__.'/../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


class Firebase {

    protected $config	= array();
    protected $serviceAccount;

    public function __construct()
    {
        $this->CI =& get_instance();
        //$this->serviceAccount = ServiceAccount::fromJsonFile($this->CI->config->item('firebase_app_key'));
    }

    
    public function init()
    {
        $this->CI =& get_instance();
        return $firebase = (new Factory)->withServiceAccount($this->CI->config->item('firebase_app_key'));
    }
}