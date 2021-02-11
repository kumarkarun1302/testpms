<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;
require_once APPPATH . '/libraries/REST_Controller.php';
 
class Settings extends \Restserver\Libraries\REST_Controller
{

    public function __construct() {
        parent::__construct();
    }

    public function appname_get()
    {
    	$json_response['application_name'] = 'ANJPMS';
    	$json_response['application_logo'] = 'https://anjpms.com/assets/images/logo.png';
    	$json_response['application_icon'] = 'https://anjpms.com/assets/home/images/favicon.ico';
    	$json_response['application_website_url'] = 'https://anjpms.com/api/';
    	$json_response['application_image_uploads_path'] = 'https://anjpms.com/uploads/';
    	$json_response['application_image_type_support'] = 'doc,pdf';
    	$json_response['application_imageuploads_size_upload'] = '5 MB';

    	$message=['status'=>true,'data'=>$json_response,'message'=>'Application Info'];
        $this->response($message, REST_Controller::HTTP_OK);
    }

    public function allusers_get()
    {
        $this->load->model('user_model', 'UserModel');
        $json_response = $this->UserModel->getAllusers();
        $message=['status'=>true,'data'=>$json_response,'message'=>'All users List'];
        $this->response($message, REST_Controller::HTTP_OK);
    }

}