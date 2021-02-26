
<div class="container">
<?php 
if($this->session->userdata('price')){
    $price = $this->session->userdata('price');
} else {
    $price = '1';
}
?>
<div class="starter-template">
    <h4>packege</h4>
        <h5>Price: <?php echo '$'.$price; ?></h5>
</div>

<div class="contact-form">
    <p class="notice error"><?= $this->session->flashdata('error_msg') ?></p><br/>
    <p class="notice error"><?= $this->session->flashdata('success_msg') ?></p><br/>
    <form method="post" class="form-horizontal" role="form" action="<?= base_url() ?>paypal/create_payment_with_paypal">
        <fieldset>
            <input title="item_name" name="item_name" type="hidden" value="Monthly plan">
            <input title="item_number" name="item_number" type="hidden" value="12345">
            <input title="item_description" name="item_description" type="hidden" value="to buy Monthly plan">
            <!-- <input title="item_tax" name="item_tax" type="hidden" value="1"> -->
            <input title="item_price" name="item_price" type="hidden" value="<?php echo $price; ?>">
            <input title="details_tax" name="details_tax" type="hidden" value="0.33">
            <input title="details_subtotal" name="details_subtotal" type="hidden" value="<?php echo $price; ?>">
            <div class="form-group">
                <div class="col-sm-offset-5">
                    <button  type="submit" class="btn btn-success">Pay Now</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
</div>
