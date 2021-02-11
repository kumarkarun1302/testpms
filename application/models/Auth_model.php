<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{

	public $table = "tbl_users";

	public function login($data){
		$username = $data['username'];
		$this->db->from($this->table);
		$this->db->where("(username = '$username' OR email = '$username' OR mobile_no = '$username')");
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		if ($query->num_rows() == 0){
			return false;
		} else {
			$result = $query->row_array();
		    $validPassword = password_verify($data['password'], $result['password']);
		    if($validPassword){
		        return $result = $query->row_array();
		    }
		}
	}

	function check_username_notfound($email)
    {
    	$this->db->from($this->table);
		$this->db->where("(username = '$email' OR email = '$email' OR mobile_no = '$email')");
		$result = $this->db->get();
    	if($result->num_rows() > 0){
    		return 1;
    	} else {
    		return 0;
    	}
    }

	//--------------------------------------------------------------------
	public function register($data){
		$this->db->insert($this->table, $data);
		return true;
	}

	//--------------------------------------------------------------------
	public function email_verification($code){
		$this->db->select('email, token, is_active');
		$this->db->from($this->table);
		$this->db->where('token', $code);
		$query = $this->db->get();
		$result= $query->result_array();
		$match = count($result);
		if($match > 0){
			$this->db->where('token', $code);
			$this->db->update($this->table, array('is_verify' => 1));
			return true;
		} else {
			return false;
		}
	}

	//============ Check User Email ============
    function check_user_mail($email)
    {
    	$result = $this->db->get_where($this->table, array('email' => $email));
    	if($result->num_rows() > 0){
    		$result = $result->row_array();
    		return $result;
    	} else {
    		return false;
    	}
    }

    function check_user_mobile_no($mobile_no)
    {
    	$result = $this->db->get_where($this->table, array('mobile_no' => $mobile_no));
    	if($result->num_rows() > 0){
    		$result = $result->row_array();
    		return $result;
    	} else {
    		return false;
    	}
    }

    //============ Update Reset Code Function ===================
    public function update_reset_code($reset_code, $user_id){
    	$data = array('password_reset_code' => $reset_code);
    	$this->db->where('user_id', $user_id);
    	$this->db->update($this->table, $data);
    }

    //============ Activation code for Password Reset Function ===================
    public function check_password_reset_code($code){

    	$result = $this->db->get_where($this->table,  array('password_reset_code' => $code ));
    	if($result->num_rows() > 0){
    		return true;
    	} else {
    		return false;
    	}
    }
    
    //============ Reset Password ===================
    public function reset_password($id, $new_password){
	    $data = array(
			'password_reset_code' => '',
			'password' => $new_password
	    );
		$this->db->where('user_id', $id);
		$this->db->update($this->table, $data);
		return true;
    }

    public function reset_password2($id, $new_password){
	    $data = array(
			'password_reset_code' => '',
			'password' => $new_password
	    );
		$this->db->where('password_reset_code', $id);
		$this->db->update($this->table, $data);
		//echo $this->db->last_query();exit;
		return true;
    }

    //--------------------------------------------------------------------
	public function get_user_detail(){
		//$id = $this->session->userdata('user_id');
		$id = getSession('user_id');
		$query = $this->db->get_where($this->table, array('user_id' => $id));
		//echo $this->db->last_query();
		return $result = $query->row_array();
	}

	//--------------------------------------------------------------------
	public function update_user($data){
		$id = getSession('user_id');
		$this->db->where('user_id', $id);
		$this->db->update($this->table, $data);
		//echo $this->db->last_query();
		return true;
	}


	//--------------------------------------------------------------------
	public function change_pwd($data, $id){
		$this->db->where('user_id', $id);
		$this->db->update($this->table, $data);
		return true;
	}

	public function getTokens(){
		$query = $this->db->get('tokens');
		$result= $query->result_array();
		// $token = [];
		// foreach($result as $key => $val){
		//    $token1 = $val['token'];
		//    array_push($token, $token1);
		// }
		return $result;
	}

	public function getOnecloumn($user_id,$cloumn){
		$this->db->select($cloumn);
		$this->db->from($this->table);
		$this->db->where('user_id', $user_id);
		$query=$this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() > 0){
	    	return $query->row_array();
	    }
	}

}

?>