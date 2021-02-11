<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model
{
    protected $tbl = 'tbl_users';
    public function insert_user(array $data) {
        $this->db->insert($this->tbl, $data);
        return $this->db->insert_id();
    }

    public function reset_password($id, $new_password){
        $data = array(
            'password_reset_code' => '',
            'password' => $new_password
        );
        $this->db->where('user_id', $id);
        $this->db->update($this->tbl, $data);
        return true;
    }
    
    public function getAllusers()
    {
        $result = $this->db->query('SELECT * FROM `tbl_users` where user_id!=1');
        if($result->num_rows() > 0){
            $result = $result->result_array();
            return $result;
        } else {
            return false;
        }
    }

    public function getResponse($user_id)
    {
        $result = $this->db->get_where($this->tbl, array('user_id' => $user_id));
        if($result->num_rows() > 0){
            $result = $result->row_array();
            return $result;
        } else {
            return false;
        }
    }

    public function check_user_mail($email)
    {
        $result = $this->db->get_where($this->tbl, array('email' => $email));
        if($result->num_rows() > 0){
            $result = $result->row_array();
            return $result;
        } else {
            return false;
        }
    }

    public function login($data){
        $username = $data['username'];
        $this->db->from($this->tbl);
        $this->db->where("(username = '$username' OR email = '$username' OR mobile_no = '$username')");
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        if ($query->num_rows() == 0){
            return 0;
        } else {
            $result = $query->row_array();
            $validPassword = password_verify($data['password'], $result['password']);
            if($validPassword){
                return $result = $query->row_array();
            }
        }
    }

    public function user_login($username, $password)
    {
        $this->db->where('email', $username);
        $this->db->or_where('username', $username);
        $q = $this->db->get($this->tbl);
        if( $q->num_rows() ) 
        {
            $user_pass = $q->row('password');
            if(md5($password) === $user_pass) {
                return $q->row();
            }
            return FALSE;
        }else{
            return FALSE;
        }
    }

    public function fetch_all_users() {
        return $this->db->select()->from($this->tbl)->get()->result();
    }

    public function update_reset_code($reset_code, $user_id){
        $data = array('password_reset_code' => $reset_code);
        $this->db->where('user_id', $user_id);
        $this->db->update($this->tbl, $data);
    }


}
