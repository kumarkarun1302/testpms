<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

  public function index()
  {

    /*$query=$this->db->query("SELECT payment_expire_time FROM `tbl_users` WHERE payment_expire_time!=''");
      foreach ($query->result_array() as $key => $value) 
      {
        $payment_expire_time = $value['payment_expire_time'];
        if((time() - $payment_expire_time)>900)
        {
          $this->db->query("DELETE FROM `tbl_users` WHERE payment_expire_time='$payment_expire_time' and paymentyesnot=1");
        }  
      }*/

        
  	//echo password_hash(10, PASSWORD_BCRYPT);exit;
    $this->load->view('home_page');
    /*if(isset($_SESSION['user_details'])){
        redirect('dashboard');
    }else{
       $this->load->view('home_page');
    }*/
  }

  public function upgradePlanMdr(){
    $user_id = getProfileName('user_id');
    $this->session->set_userdata('user_id_payment',$user_id);
    $this->session->set_userdata('upgrademdr','yes');
    $this->session->set_userdata('upgrademdr','yes');
    echo $this->session->set_userdata('upgrademdr').' '.$this->session->set_userdata('user_id_payment');

    //echo $this->session->userdata('upgrademdr').' '.$this->session->userdata('user_id_payment');
  }

  public function upgradePlanM(){
    $user_id = getProfileName('user_id');
    $price_hide = $this->session->userdata('price_hide');
    $month_year = $this->session->userdata('month_year');
    $next_due_date = date('Y-m-d H:i:s', strtotime(date_from_today(). ' +30 days'));
    if($month_year=='month'){
      $plan_packages=2;
    } else if($month_year=='year'){
      $plan_packages=3; 
    }
    $payer_email = 'manish@anjwebtech.com';
    $payment_status = 'success';
    $txn_id = time();
    $payment_gross = $this->session->userdata('price');
    $total_user_support = $this->session->userdata('total_user_support');
    $max_file_size_upload = get_tbl_price($price_hide,'max_file_size_upload');
    $file_sharing_storage = get_tbl_price($price_hide,'file_sharing_storage');
    $file_sharing_storageOLD = getProfileName('file_sharing_storage');
    $file_sharing_storage = $file_sharing_storage + $file_sharing_storageOLD;
    $payemntdata = array('user_id'=>$user_id,
                         'month_year'=>$month_year,'plan_packages'=>$plan_packages,
                         'txn_id'=>$txn_id,'payment_gross'=>$payment_gross,
                         'payer_email'=>$payer_email,'payment_status'=>$payment_status,
                         'created_date'=>date_from_today());
    insert_data_last_id('tbl_payments',$payemntdata);
      if($month_year=='year'){
          $updatedata = array('total_user_support'=>$total_user_support,'package_date'=>$next_due_date,'plan_packages'=>$plan_packages,'month_year'=>$month_year);
      } else if($month_year=='month'){
        if(getProfileName('month_year')=='month'){
          $month_count = getProfileName('month_count') + 1;
          $updatedata = array('total_user_support'=>$total_user_support,'package_date'=>$next_due_date,'month_count'=>$month_count);
        } else {
          $updatedata = array('total_user_support'=>$total_user_support,'package_date'=>$next_due_date,'plan_packages'=>$plan_packages,'month_year'=>$month_year,'file_sharing_storage'=>$file_sharing_storage,'max_file_size_upload'=>$max_file_size_upload);
        }
      }
    $multi_where = array('user_id'=>$user_id);
    edit_update_multi_where('tbl_users',$updatedata, $multi_where);
    $this->session->set_flashdata('success', 'Your Plan Successfully Update');
    redirect('dashboard');
  }

  public function platinum_packege(){
      $price_hide = $this->input->post('price_hide');
      $query = $this->db->query("SELECT price,month_year,total_user_support,price_tax FROM `tbl_price` where price_hide='$price_hide'");
      if($query->num_rows() > 0){
        $result = $query->row_array();
        $price = $result['price'];
        $month_year = $result['month_year'];
        $total_user_support = $result['total_user_support'];
        $price_tax = $result['price_tax'];
        if($month_year=='month'){
          $package_date = date('Y-m-d H:i:s', strtotime(date_from_today(). ' +30 days'));
          $month_count='1';
        } else if($month_year=='year'){
          $package_date = date('Y-m-d H:i:s', strtotime(date_from_today(). ' +365 days'));
          $month_count='12';
        }
      } else {
        $price = 100;
        $month_year=$package_date=$month_count=$total_user_support=$price_tax='0'; 
      }
      $this->session->set_userdata('price',$price);
      $this->session->set_userdata('price_hide',$price_hide);
      $this->session->set_userdata('month_year',$month_year);
      $this->session->set_userdata('package_date',$package_date);
      $this->session->set_userdata('price_tax',$price_tax);
      $this->session->set_userdata('month_count',$month_count);
      $this->session->set_userdata('total_user_support',$total_user_support);
      $user_id = getProfileName('user_id');
      $this->session->set_userdata('user_id_payment',$user_id);
      $this->session->set_userdata('upgrademdr',$this->input->post('upgrademdr'));

      echo $this->session->userdata('price_tax');
    }
    
}