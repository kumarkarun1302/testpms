<?php 
$sales_combo_id = $result['sales_combo_id']; 
$query_product0 = $this->db->query("SELECT * FROM `tbl_products` WHERE product_type=0 and `sales_combo_id`='$sales_combo_id' and section_sales='' and noted_sales=''");

$query_product1 = $this->db->query("SELECT * FROM `tbl_products` WHERE product_type=1 and `sales_combo_id`='$sales_combo_id' and section_sales='' and noted_sales=''");

$query_section_sales = $this->db->query("SELECT * FROM `tbl_products` WHERE product_type=0 and `sales_combo_id`='$sales_combo_id' and section_sales!=''");

$query_noted_sales = $this->db->query("SELECT * FROM `tbl_products` WHERE product_type=0 and `sales_combo_id`='$sales_combo_id' and noted_sales!=''");

?>

<script type="text/javascript">

$(document).ready(function() {
    var max_fields      = 1000;
    var x = 1; 
    
    <?php
    if($query_product1->num_rows() > 0){
        $result_salesproduct1 = $query_product1->result_array();
        foreach ($result_salesproduct1 as $key => $value) {
    ?>
            $("#optional_list_append").append('<br>'+
            '<div class="row optional_remove">'+
            '   <div class="col-md-3"><input type="text" name="product_nameo[]" id="product_nameo" class="form-control" value="<?php echo $value['product_name']; ?>"></div>'+
            '   <div class="col-md-3"><input type="text" name="product_descriptiono[]" id="product_descriptiono" class="form-control" value="<?php echo $value['product_description']; ?>"/></div>'+
            '   <div class="col-md-1"><input type="text" name="product_qtyo[]" id="product_qtyo" class="form-control" value="<?php echo $value['product_qty']; ?>"/></div>'+
            '   <div class="col-md-1"><input type="text" name="unit_priceo[]" id="unit_priceo" class="form-control" value="<?php echo $value['unit_price']; ?>"/></div>'+
            '   <div class="col-md-1"><input type="text" name="product_taxso[]" id="product_taxso" class="form-control" value="<?php echo $value['product_taxs']; ?>"/></div>'+
            '   <div class="col-md-2"><input type="text" name="subtotalo[]" id="subtotalo" class="form-control" value="<?php echo $value['subtotal']; ?>"/></div>'+
            '   <div class="col-md-1"><a href="#" id="optioanl_remove_field" product_id="<?php echo $value['product_id']; ?>" class="optioanl_remove_field">Remove</a></div>'+
            '</div>');
    <?php } } ?>

    $("#add_product_optional").click(function(e){ 
        e.preventDefault();
        if(x < max_fields){ 
            x++;
        $("#optional_list_append").append('<br>'+
'<div class="row optional_remove">'+
'   <div class="col-md-3"><input type="text" name="product_nameo[]" id="product_nameo" class="form-control" placeholder="Product Name"></div>'+
'   <div class="col-md-3"><input type="text" name="product_descriptiono[]" id="product_descriptiono" class="form-control" placeholder="Product description"/></div>'+
'   <div class="col-md-1"><input type="text" name="product_qtyo[]" id="product_qtyo" class="form-control" placeholder="Quantity"/></div>'+
'   <div class="col-md-1"><input type="text" name="unit_priceo[]" id="unit_priceo" class="form-control" placeholder="Unit Price"/></div>'+
'   <div class="col-md-1"><input type="text" name="product_taxso[]" id="product_taxso" class="form-control" placeholder="Taxes"/></div>'+
'   <div class="col-md-2"><input type="text" name="subtotalo[]" id="subtotalo" class="form-control" placeholder="Sub Total"/></div>'+
'   <div class="col-md-1"><a href="#" product_id="'+x+'" id="optioanl_remove_field" class="optioanl_remove_field">Remove</a></div>'+
'</div>');
      }
    });


    $("#optional_list_append").on("click",".optioanl_remove_field", function(e){ 
        var product_id = $('#optioanl_remove_field').attr('product_id');
        $.ajax({
            url: '<?php echo base_url('insertdb/optioanl_remove_field'); ?>', 
            dataType: 'html',type: 'post',
            data:{product_id:product_id},
            success: function (response) {
                alert("Remove Product")
            },
            error: function (response) {
                console.log(response);
            }
        });
        e.preventDefault(); $(this).parent().parent('div.optional_remove').remove(); 
        x--;
    })

<?php 
if($query_product0->num_rows() > 0){
    $result_salesproduct0 = $query_product0->result_array();
    foreach ($result_salesproduct0 as $key => $value) {  ?>

        $("#order_list_append").append('<br>'+
        '<div class="row remove_product">'+
        '   <div class="col-md-3"><input type="text" name="product_name[]" id="product_name" class="form-control" value="<?php echo $value['product_name']; ?>"></div>'+
        '   <div class="col-md-3"><input type="text" name="product_description[]" id="product_description" class="form-control" value="<?php echo $value['product_description']; ?>"/></div>'+
        '   <div class="col-md-1"><input type="text" name="product_qty[]" id="product_qty" class="form-control" value="<?php echo $value['product_qty']; ?>"/></div>'+
        '   <div class="col-md-1"><input type="text" name="unit_price[]" id="unit_price" class="form-control" value="<?php echo $value['unit_price']; ?>"/></div>'+
        '   <div class="col-md-1"><input type="text" name="product_taxs[]" id="product_taxs" class="form-control" value="<?php echo $value['product_taxs']; ?>"/></div>'+
        '   <div class="col-md-2"><input type="text" name="subtotal[]" id="subtotal" class="form-control" value="<?php echo $value['subtotal']; ?>"/></div>'+
        '   <div class="col-md-1"><a href="#" id="remove_field_product" product_id="<?php echo $value['product_id']; ?>" class="remove_product_field">Remove</a></div>'+
        '</div>');

    <?php } } ?>

    $("#add_product").click(function(e){ 
        e.preventDefault();
        if(x < max_fields){ 
            x++;
        $("#order_list_append").append('<br>'+
'<div class="row remove_product">'+
'   <div class="col-md-3"><input type="text" name="product_name[]" id="product_name" class="form-control" placeholder="Product Name"></div>'+
'   <div class="col-md-3"><input type="text" name="product_description[]" id="product_description" class="form-control" placeholder="Product description"/></div>'+
'   <div class="col-md-1"><input type="text" name="product_qty[]" id="product_qty" class="form-control" placeholder="Quantity"/></div>'+
'   <div class="col-md-1"><input type="text" name="unit_price[]" id="unit_price" class="form-control" placeholder="Unit Price"/></div>'+
'   <div class="col-md-1"><input type="text" name="product_taxs[]" id="product_taxs" class="form-control" placeholder="Taxes"/></div>'+
'   <div class="col-md-2"><input type="text" name="subtotal[]" id="subtotal" class="form-control" placeholder="Sub Total"/></div>'+
'   <div class="col-md-1"><a href="#" id="remove_field_product" product_id="" class="remove_product_field">Remove</a></div>'+
'</div>');
      }
    });

    $("#order_list_append").on("click",".remove_product_field", function(e){
        var product_id = $('#remove_field_product').attr('product_id');
        $.ajax({
            url: '<?php echo base_url('insertdb/optioanl_remove_field'); ?>', 
            dataType: 'html',type: 'post',
            data:{product_id:product_id},
            success: function (response) {
                alert("Remove Product")
            },
            error: function (response) {
                console.log(response);
            }
        });
        e.preventDefault(); $(this).parent().parent('div.remove_product').remove(); 
        x--;
    })

    $("#add_section").click(function(e){ 
        e.preventDefault();
        if(x < max_fields){ 
            x++;
        $("#order_list_append").append('<br><div class="row remove_section_sales"><div class="col-md-11"><input type="text" name="section_sales[]" id="section_sales" class="form-control" placeholder="Section Sales Name"></div><div class="col-md-1"><a href="#" class="remove_field_section_sales" id="remove_field_section_sales" product_id="">Remove</a></div></div>');
      }
    });
    
    <?php 
    if($query_section_sales->num_rows() > 0){
        $result_section_sales = $query_section_sales->result_array();
        foreach ($result_section_sales as $key => $value) {  ?>
            $("#order_list_append").append('<br><div class="row remove_section_sales"><div class="col-md-11"><input type="text" name="section_sales[]" id="section_sales" class="form-control" value="<?php echo $value['section_sales']; ?>"></div><div class="col-md-1"><a href="#" class="remove_field_section_sales" id="remove_field_section_sales" product_id="<?php echo $value['product_id']; ?>">Remove</a></div></div>');
    <?php } } ?>

    $("#order_list_append").on("click",".remove_field_section_sales", function(e){ 
        var product_id = $(this).attr('product_id');
        $.ajax({
            url: '<?php echo base_url('insertdb/optioanl_remove_field'); ?>', 
            dataType: 'html',type: 'post',
            data:{product_id:product_id},
            success: function (response) {
                alert("Remove")
            },
            error: function (response) {
                console.log(response);
            }
        });
        e.preventDefault(); $(this).parent().parent('div.remove_section_sales').remove(); 
        x--;
    })

    <?php 
        if($query_noted_sales->num_rows() > 0){
          $result_noted_sales = $query_noted_sales->result_array();
            foreach ($result_noted_sales as $key => $value) {  ?>
                $("#order_list_append").append('<br><div class="row remove_noted_sales"><div class="col-md-11"><input type="text" name="noted_sales[]" id="noted_sales" class="form-control" value="<?php echo $value['noted_sales']; ?>"/></div><div class="col-md-1"><a href="#" class="remove_field_noted_sales" id="remove_field_noted_sales" product_id="<?php echo $value['product_id']; ?>">Remove</a></div></div>');
    <?php } } ?>

    $("#add_note").click(function(e){ 
        e.preventDefault();
        if(x < max_fields){ 
            x++;
        $("#order_list_append").append('<br><div class="row remove_noted_sales"><div class="col-md-11"><input type="text" name="noted_sales[]" id="noted_sales" class="form-control" placeholder="Add Notes Sales"/></div><div class="col-md-1"><a href="#" class="remove_field_noted_sales" id="remove_field_noted_sales" product_id="">Remove</a></div></div>');
      }
    });

    $("#order_list_append").on("click",".remove_field_noted_sales", function(e){ 
        var product_id = $(this).attr('product_id');
        $.ajax({
            url: '<?php echo base_url('insertdb/optioanl_remove_field'); ?>', 
            dataType: 'html',type: 'post',
            data:{product_id:product_id},
            success: function (response) {
                alert("Remove")
            },
            error: function (response) {
                console.log(response);
            }
        });
        e.preventDefault(); $(this).parent().parent('div.remove_noted_sales').remove(); 
        x--;
    })

});

$(document).ready(function() {

    $("#gst_treatment").val('<?php if(isset($result['gst_treatment'])) { echo $result['gst_treatment']; }?>');
    $("#payment_terms").val('<?php if(isset($result['payment_terms'])) { echo $result['payment_terms']; }?>');


    $("#fiscal_position").val('<?php if(isset($result['fiscal_position'])) { echo $result['fiscal_position']; }?>');
    $("#shipping_policy").val('<?php if(isset($result['shipping_policy'])) { echo $result['shipping_policy']; }?>');

    var max_fields      = 1000;
    var wrapper         = $(".input_fields_wrap");
    var add_button      = $(".add_field_button");
    
    var x = 1; 
    $(add_button).click(function(e){ 
        e.preventDefault();
        if(x < max_fields){ 
            x++; 
            $(wrapper).append('<div class="row"><div class="col-md-5"><input type="text" name="bank_name[]" class="form-control" placeholder="Bank Name"></div><div class="col-md-5"><input type="text" name="account_number[]" class="form-control" placeholder="Account Number"/></div><div class="col-md-2"><a href="#" class="remove_field">Remove</a></div></div>');
        }
    });
    $(wrapper).on("click",".remove_field", function(e){ 
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

</script>
</body>
</html>