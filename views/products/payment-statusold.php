
<?php 

$price_hide=$this->session->userdata('price_hide');
$query_tbl_pricemonth = $this->db->query("SELECT file_sharing_storage,max_file_size_upload FROM `tbl_price` where price_hide='$price_hide'");
$result_tbl_pricemonth = $query_tbl_pricemonth->row_array();
$file_sharing_storage = $result_tbl_pricemonth['file_sharing_storage'];
$max_file_size_upload = $result_tbl_pricemonth['max_file_size_upload'];
$month_year=$this->session->userdata('month_year');
$package_date=$this->session->userdata('package_date');
$month_count=$this->session->userdata('month_count');
$plan_packages=$this->session->userdata('plan_packages');
$total_user_support = $this->session->userdata('total_user_support');

$user_id_payment= $this->session->userdata('user_id_payment');
if($this->session->userdata('upgrademdr')=='yes'){
    upgrade_plan_mdr(getProfileName('email'),$order['payment_status'],$order['paid_amount']);
} else if($this->session->userdata('upgrademdr')=='no'){
    $supayResponse = getResponse($user_id_payment);
    $user_data = array(
        'user_id'=>$user_id_payment,
        'username' => $supayResponse['username'],
        'email' => $supayResponse['email'],
        'user_type' => $supayResponse['user_type'],
        'slug_username' =>slugify($supayResponse['username']), 
        'main_merge_account'=>$supayResponse['merge_account'],
        'merge_account_userID'=>$supayResponse['user_id']);
    $this->session->set_userdata('user_details', $user_data);
}

$this->db->query("UPDATE `tbl_users` SET paymentyesnot='0',month_year='$month_year',package_date='$package_date',month_count='$month_count',plan_packages='$plan_packages',total_user_support='$total_user_support' where user_id='$user_id_payment'");

if(!empty($order)){ ?>
    <!-- Display transaction status -->
    <?php if($order['payment_status'] == 'succeeded'){ ?>
    <h1 class="success">Your Payment has been Successful!</h1>
    <?php }else{ ?>
    <h1 class="error">The transaction was successful! But your payment has been failed!</h1>
    <?php } ?>
    
    <h4>Payment Information</h4>
    <p><b>Reference Number:</b> <?php echo $order['id']; ?></p>
    <p><b>Transaction ID:</b> <?php echo $order['txn_id']; ?></p>
    <p><b>Paid Amount:</b> <?php echo $order['paid_amount'].' '.$order['paid_amount_currency']; ?></p>
    <p><b>Payment Status:</b> <?php echo $order['payment_status']; ?></p>
    
    <h1> <a href="<?php echo base_url('dashboard'); ?>" class="btn success">Go To Dashboard</a></h1>

<?php }else{ ?>
    <h1 class="error">The transaction has failed</h1>
<?php } ?>