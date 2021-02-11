<?php 
class Dropbox1 extends CI_Controller {
        
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
      $path = "../assets/images/twitter.png"; 
      chdir($path);
      exec("git add .");  
      exec("git commit -m'message'");       
    }

    // Call this method first by visiting http://SITE_URL/example/request_dropbox
    public function request_dropbox()
  {
    $params['key'] = 'zr5l2s4pfcjepyj';
    $params['secret'] = '4abwe7biqsrwn6t';
    
    $this->load->library('dropbox', $params);
    $data = $this->dropbox->get_request_token(site_url("dropbox1/access_dropbox"));

    $this->session->set_userdata('token_secret', $data['token_secret']);
    redirect($data['redirect']);
    
  }
  //This method should not be called directly, it will be called after 
    //the user approves your application and dropbox redirects to it
  public function access_dropbox()
  {
    $params['key'] = 'zr5l2s4pfcjepyj';
    $params['secret'] = '4abwe7biqsrwn6t';
    
    $this->load->library('dropbox', $params);
    
    $oauth = $this->dropbox->get_access_token($this->session->userdata('token_secret'));
    
    $this->session->set_userdata('oauth_token', $oauth['oauth_token']);
    $this->session->set_userdata('oauth_token_secret', $oauth['oauth_token_secret']);
        redirect('dropbox1/test_dropbox');
  }
  //Once your application is approved you can proceed to load the library
    //with the access token data stored in the session. If you see your account
    //information printed out then you have successfully authenticated with
    //dropbox and can use the library to interact with your account.
  public function test_dropbox()
  {
    $params['key'] = 'zr5l2s4pfcjepyj';
    $params['secret'] = '4abwe7biqsrwn6t';
    $params['access'] = array('oauth_token'=>urlencode($this->session->userdata('oauth_token')),
                  'oauth_token_secret'=>urlencode($this->session->userdata('oauth_token_secret')));
    
    $this->load->library('dropbox', $params);
    
        $dbobj = $this->dropbox->account();
    
        print_r($dbobj);
  }
    
}