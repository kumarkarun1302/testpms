<?php

 public function upgrade_plan_mdr($payer_email,$payment_status,$price){
    $ci = & get_instance();
    $user_id = getProfileName('user_id');
    $price_hide = $ci->session->userdata('price_hide');
    $month_year = $ci->session->userdata('month_year');
    $next_due_date = date('Y-m-d H:i:s', strtotime(date_from_today(). ' +30 days'));
    if($month_year=='month'){
      $plan_packages=2;
    } else if($month_year=='year'){
      $plan_packages=3; 
    }
    $txn_id = time();
    $payment_gross = $price;
    $total_user_support = $ci->session->userdata('total_user_support');
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
    $ci->session->set_flashdata('success', 'Your Plan Successfully Update');
    redirect('dashboard');
  }

  ?>