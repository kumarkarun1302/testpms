<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/php-jwt/JWT.php';
require_once APPPATH . 'third_party/php-jwt/BeforeValidException.php';
require_once APPPATH . 'third_party/php-jwt/ExpiredException.php';
require_once APPPATH . 'third_party/php-jwt/SignatureInvalidException.php';

use \Firebase\JWT\JWT;

use Restserver\Libraries\REST_Controller;
require_once APPPATH . '/libraries/REST_Controller.php';
 
class Logout extends \Restserver\Libraries\REST_Controller {

	public function logout_post()
	{
		$token['exp']=60*60*24;
            $res= JWT::encode($token);

            $message = ['status' => true,'res'=>$res,'message' =>"User logout successful"];
            $this->response($message, REST_Controller::HTTP_OK);
	}
}
