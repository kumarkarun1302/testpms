<?php
class Invite extends CI_Controller
{
	public function __construct(){
		parent::__construct();
	}

	public function anj()
    {
    	$projectID =$this->uri->segment(3);
    	$projectNAME =$this->uri->segment(4);
    	$projectASSIGN =$this->uri->segment(5);
    	$projectMain_user_id =$this->uri->segment(6);
    	$projectCombo_id =$this->uri->segment(7);
    	$this->session->set_userdata('projectASSIGN', $projectASSIGN);
    	$this->session->set_userdata('projectID', $projectID);
    	$this->session->set_userdata('projectNAME', $projectNAME);
    	$this->session->set_userdata('projectMain_user_id', $projectMain_user_id);
    	$this->session->set_userdata('projectCombo_id', $projectCombo_id);

    	$check_status=getProjectName('status',anj_decode($projectID));
    	//echo $check_status;exit;
    	if($check_status=='2'){
    		$this->session->set_userdata('checkbox_session_store', 'completed');
    		$this->session->set_userdata('completedProjectList', anj_decode($projectID));
    	} else if($check_status=='3'){
    		$this->session->set_userdata('checkbox_session_store', 'hold');
    	} else if($check_status=='4'){
    		$this->session->set_userdata('checkbox_session_store', 'canceled');
    	} else if($check_status=='0'){
    		$this->session->set_userdata('checkbox_session_store', 'running');
    	}

    	if(isset($_SESSION['user_details'])){
			$maa = $_SESSION['user_details'];
    		$user_id = $maa['user_id'];
			$main_user_id1 = anj_decode($projectMain_user_id);
			$projectID1 = anj_decode($projectID);
			project_assgin_tbl_role($projectMain_user_id,$projectID,$user_id);
			//$this->session->set_userdata('checkbox_session_store', 'running');
			$this->session->set_userdata('projectCombo_id', $projectCombo_id);
			$this->session->set_userdata('runningProjectList', $projectID1);
//echo $this->db->last_query();exit;
		     redirect('dashboard/'.$projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id);	
		} else {
			redirect('returnUrllogin/'.$projectID.'/'.$projectNAME.'/'.$projectASSIGN.'/'.$projectMain_user_id.'/'.$projectCombo_id);
		}        
    }

    public function encryption_manish()
    {
    	//$this->load->library('encrypt');
    	//$first = $this->encryption->create_key(20);
		//$second = bin2hex($first);
		//$config['encryption_key']=hex2bin($second);
		//$plain_text = 'manish';
		//echo $ciphertext = $this->encryption->encrypt($plain_text);
		//$this->encryption->decrypt($ciphertext);
		//str_replace('=', '', strtr(base64_encode(123), '+/', '-_'));
		echo str_replace('+', '.', rtrim(base64_encode(1), '='));
		echo '<br>';
		echo str_replace('+', '.', rtrim(anj_decode('MTIz'), '='));
    }

    public function ml(){
    	$simple_string = '1';
		$ciphering = "BF-CBC"; 
		$iv_length = openssl_cipher_iv_length($ciphering); 
		$options = 0;
		$encryption_iv = random_bytes($iv_length); 
		$encryption_key = openssl_digest(php_uname(), 'sha512', TRUE); 
		$encryption = openssl_encrypt($simple_string, $ciphering, $encryption_key, $options, $encryption_iv); 
		echo str_replace('=', '', strtr($encryption, '+/', '-_'));
		echo '<br>';
		$decryption_iv = random_bytes($iv_length); 
		$decryption_key = openssl_digest(php_uname(), 'sha512', TRUE); 
		$decryption = openssl_decrypt ($encryption, $ciphering, $decryption_key, $options, $encryption_iv);
		echo str_replace('=', '', strtr($decryption, '+/', '-_'));
		echo '<br>';
		$p = $this->my_simple_crypt('123','e');
		echo $p;
		echo '<br>';
		echo $this->my_simple_crypt($p,'d');
    }

    public function my_simple_crypt( $string, $action = 'e' ) {
	    $secret_key = '!@#$%^&*()+qwertyuioplkjhgfdsazxcvbnm*?=;[{ZXCVBNMLKJHGFDSAQWERTYUIOP}]';
		$secret_iv=hash('sha512',$secret_key);
	    $output = false;
	    $encrypt_method = "AES-256-CBC";
	    $key = hash( 'sha512', $secret_key );
	    $iv = substr( hash( 'sha512', $secret_iv ), 0, 256);
	    if( $action == 'e' ) {
	        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
	    }
	    else if( $action == 'd' ){
	        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
	    }
	    return $output;
	}
    public function encrypt($plaintext, $password) {
	    $method = "AES-128-CTR";
	    $key = hash('sha256', $password, true);
	    $iv = openssl_random_pseudo_bytes(16);
	    $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
	    $hash = hash_hmac('sha256', $ciphertext . $iv, $key, true);
	    return $iv . $hash . $ciphertext;
	}

	public function decrypt($ivHashCiphertext, $password) {
	    $method = "AES-256-CBC";
	    $iv = substr($ivHashCiphertext, 0, 16);
	    $hash = substr($ivHashCiphertext, 16, 32);
	    $ciphertext = substr($ivHashCiphertext, 48);
	    $key = hash('sha256', $password, true);

	    if (!hash_equals(hash_hmac('sha256', $ciphertext . $iv, $key, true), $hash)) return null;

	    return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
	}
    public function slugify($text)
	{
	  $text = preg_replace('~[^\pL\d]+~u', '-', $text);
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	  $text = preg_replace('~[^-\w]+~', '', $text);
	  $text = trim($text, '-');
	  $text = preg_replace('~-+~', '-', $text);
	  $text = strtolower($text);
	  if (empty($text)) {
	    return 'n-a';
	  }
	  return $text;
	}

	

}