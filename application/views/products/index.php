
<?php
$price_hide=$this->session->userdata('price_hide');
$query_tbl_pricemonth = $this->db->query("SELECT * FROM `tbl_price` where price_hide='$price_hide'");
$result_tbl_pricemonth = $query_tbl_pricemonth->row_array();
//echo print_r($result_tbl_pricemonth);
?>

<div class="pro-box">
    <div class="info">
        <h4>packege</h4>
        <h5>Price: <?php echo '$'.$this->session->userdata('price'); ?></h5>
    </div>
    <div class="action">
        <a href="<?php echo base_url('products/purchase/1'); ?>">Purchase</a>
    </div>
</div>
