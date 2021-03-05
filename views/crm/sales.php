<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sales | ANJ Webtech Pvt Ltd</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/'); ?>images/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="<?php echo base_url('assets/'); ?>https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/responsive.css">

    
</head>

<body class="common_dashboard_trello rolePermission-bg" style="overflow: inherit;">
    
    <!--  BEGIN BOARDS MAIN CONTAINER  -->
    <div class="container" id="container" data-simplebar>
        <div class="board-canvas container-fluid metricsContainer">
            <div class="row no-gape mb-2 mainpageheader">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="dashboardTitleIcon_box">
                        <div class="dashboardTitle">
                        </div>
                    </div>
                </div>
            </div>
            
            <h2>Add Sales</h2>
            
<form action="<?php echo base_url('insert_sales'); ?>" method="post" onsubmit="return validateForm()">
    
    
    <div class="form-row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 stack-item-col mb-3">
            <div class="stack-item-content">
                <div class="blockContent">
                <hr>
                <label>Company Address</label>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-row">
                <div class="col-md-12">
                    <label>Customer</label>
                    <input class="form-control" name="Customer" type="text" id="Customer" placeholder="Customer">
                </div>
                <div class="col-md-12">
                    <label>GST Treatment</label>
                    <select class="form-control" name="gst_treatment" id="gst_treatment">
                        <option value="">select gst treament</option>
                        <option value="&quot;regular&quot;">Registered Business - Regular</option>
                        <option value="&quot;composition&quot;">Registered Business - Composition</option>
                        <option value="&quot;unregistered&quot;">Unregistered Business</option>
                        <option value="&quot;consumer&quot;">Consumer</option>
                        <option value="&quot;overseas&quot;">Overseas</option>
                        <option value="&quot;special_economic_zone&quot;">Special Economic Zone</option>
                        <option value="&quot;deemed_export&quot;">Deemed Export</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label>Quotation Template</label>
                    <input class="form-control" name="quotation_template" type="text" id="quotation_template" placeholder="Quotation Template">
                </div>
                
            </div>
        </div>
        
        <div class="col-sm-6">
            <div class="form-row">
                <div class="col-md-12">
                    <label>Expiration</label>
                    <input class="form-control" name="Expiration" type="date" id="Expiration" placeholder="Expiration">
                </div>
                <div class="col-md-12">
                    <label>Payment Terms</label>
                    <select class="form-control" name="payment_terms" id="payment_terms">
                        <option value="">select payment terms</option>
                        <option value="Immediate Payment">Immediate Payment</option>
                        <option value="15 Days">15 Days</option>
                        <option value="21 Days">21 Days</option>
                        <option value="30 Days">30 Days</option>
                        <option value="45 Days">45 Days</option>
                        <option value="2 Months">2 Months</option>
                        <option value="End of Following Month">End of Following Month</option>
                        <option value="30% Now, Balance 60 Days">30% Now, Balance 60 Days</option>
                        <option value="30% Advance End of Following Month">30% Advance End of Following Month</option>

                    </select>
                </div>
                
            </div>
        </div>
    </div>

                                <hr>

<nav class="taskDetails_Nav w-100">
    <div class="w-100 nav nav-tabs" id="nav-tab" role="tablist">
        <a class="w-25 text-center nav-item nav-link active" id="contacts_addresses_tab" data-toggle="tab" href="#nav-contacts_addresses_tab" role="tab" aria-controls="nav-contacts_addresses_tab" aria-selected="true">Order Lines</a>
        
        <a class="w-25 text-center nav-item nav-link" id="nav-sales_purchas-tab" data-toggle="tab" href="#nav-sales_purchas" role="tab" aria-controls="nav-sales_purchas" aria-selected="false">Optional Products</a>
        
        <a class="w-25 text-center nav-item nav-link" id="nav-Invoicing-tab" data-toggle="tab" href="#nav-Invoicing" role="tab" aria-controls="nav-Invoicing" aria-selected="false">Other Info</a>

    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    
    <div class="tab-pane fade show active" id="nav-contacts_addresses_tab" role="tabpanel" aria-labelledby="contacts_addresses_tab">

<hr>
        <button type="button" class="btn btn-info" id="add_product">
            add a product
        </button>
        <button type="button" class="btn btn-info" id="add_section">
            add a section
        </button>
        <button type="button" class="btn btn-info" id="add_note">
            add a note
        </button>

        <div id="order_list_append">
            
        </div>

    </div>

    <div class="tab-pane fade" id="nav-sales_purchas" role="tabpanel" aria-labelledby="nav-sales_purchas-tab">
            <button type="button" class="btn btn-info" id="add_product_optional">
                add a product
            </button>
            <div id="optional_list_append">    
            </div>

    </div>
    <div class="tab-pane fade" id="nav-Invoicing" role="tabpanel" aria-labelledby="nav-Invoicing-tab">
         <p>&nbsp;</p>
                  
            <div class="row">
                <div class="col-sm-6">
                     <h3>Sales</h3>
                    <div class="form-row">
                        <div class="col-md-12">
                            <label>Salesperson</label>
                            <input class="form-control" name="Salesperson" type="text" id="Customer" placeholder="Salesperson">
                        </div>
                        <div class="col-md-6">
                            <label>Sales Team</label>
                            <input class="form-control" name="quotation_template" type="text" id="quotation_template" placeholder="Quotation Template">
                        </div>
                        <div class="col-md-6">
                            <label>Company</label>
                            <input class="form-control" name="quotation_template" type="text" id="quotation_template" placeholder="Quotation Template">
                        </div>
                        <div class="col-md-6">
                            <label>Online Signature</label>
                            <input class="form-control" name="quotation_template" type="text" id="quotation_template" placeholder="Quotation Template">
                        </div>
                        <div class="col-md-6">
                            <label>Online Payment</label>
                            <input class="form-control" name="quotation_template" type="text" id="quotation_template" placeholder="Quotation Template">
                        </div>
                        <div class="col-md-12">
                            <label>Customer Reference</label>
                            <input class="form-control" name="quotation_template" type="text" id="quotation_template" placeholder="Quotation Template">
                        </div>
                         <div class="col-md-12">
                            <label>Tags</label>
                            <input class="form-control" name="quotation_template" type="text" id="quotation_template" placeholder="Quotation Template">
                        </div>

                    </div>
                </div>
                
                <div class="col-sm-6">
                    <h3>Invoicing</h3>
                    <div class="form-row">
                        <div class="col-md-12">
                            <label>Fiscal Position</label>
                            <input class="form-control" name="Expiration" type="text" id="Expiration" placeholder="Expiration">
                        </div>
                        <div class="col-md-12">
                            <label>Journal</label>
                            <input class="form-control" name="Expiration" type="text" id="Expiration" placeholder="Expiration">
                        </div>
                    </div>

                    <br>
                    <h3>Delivery</h3>
                    <div class="form-row">
                        <div class="col-md-12">
                            <label>Shipping Policy</label>
                            <input class="form-control" name="Expiration" type="text" id="Expiration" placeholder="Expiration">
                        </div>
                        <div class="col-md-12">
                            <label>Delivery Date</label>
                            <input class="form-control" name="Expiration" type="date" id="Expiration" placeholder="Expiration">
                        </div>
                    </div>
                </div>
            </div>

    </div>
    
</div> 

                                

                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="form-row mt-3 mb-3">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="rolePermissionBtn w-100">
                            <button type="submit" class="btn btn-primary d-block">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- END BOARDS MAIN CONTAINER -->

    

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/jquery-3.5.0.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/popper.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script>

<script type="text/javascript">
   
    $('.nav a').click(function (e) {
      $(this).tab('show');
      var tabContent = '#tabContent' + this.id; 
      $('#tabContent1').hide();
      $('#tabContent2').hide();
      $('#tabContent3').hide();
      $(tabContent).show();
    })

    function validateForm() {
        var radios = document.getElementsByName("individualcompany");
        var formValid = false;

        var i = 0;
        while (!formValid && i < radios.length) {
            if (radios[i].checked) formValid = true;
            i++;        
        }

        if (!formValid) alert("Must check some option!");
        return formValid;
    }

    $(document).ready(function() {
        var max_fields      = 1000;
        var x = 1; 
        
        $("#add_product_optional").click(function(e){ 
            e.preventDefault();
            if(x < max_fields){ 
                x++;
            $("#optional_list_append").append('<br><div class="row optional_remove"><div class="col-md-3"><input type="text" name="bank_name[]" class="form-control" placeholder="Product Name"></div><div class="col-md-3"><input type="text" name="account_number[]" class="form-control" placeholder="Product description"/></div><div class="col-md-1"><input type="text" name="account_number[]" class="form-control" placeholder="Quantity"/></div><div class="col-md-1"><input type="text" name="account_number[]" class="form-control" placeholder="Unit Price"/></div><div class="col-md-1"><input type="text" name="account_number[]" class="form-control" placeholder="Taxes"/></div><div class="col-md-2"><input type="text" name="account_number[]" class="form-control" placeholder="Sub Total"/></div><div class="col-md-1"><a href="#" class="optioanl_remove_field">Remove</a></div></div>');
          }
        });


        $("#optional_list_append").on("click",".optioanl_remove_field", function(e){ 
            e.preventDefault(); $(this).parent().parent('div.optional_remove').remove(); 
            x--;
        })

        $("#add_product").click(function(e){ 
            e.preventDefault();
            if(x < max_fields){ 
                x++;
            $("#order_list_append").append('<br><div class="row remove"><div class="col-md-3"><input type="text" name="bank_name[]" class="form-control" placeholder="Product Name"></div><div class="col-md-3"><input type="text" name="account_number[]" class="form-control" placeholder="Product description"/></div><div class="col-md-1"><input type="text" name="account_number[]" class="form-control" placeholder="Quantity"/></div><div class="col-md-1"><input type="text" name="account_number[]" class="form-control" placeholder="Unit Price"/></div><div class="col-md-1"><input type="text" name="account_number[]" class="form-control" placeholder="Taxes"/></div><div class="col-md-2"><input type="text" name="account_number[]" class="form-control" placeholder="Sub Total"/></div><div class="col-md-1"><a href="#" class="remove_field">Remove</a></div></div>');
          }
        });

        $("#add_section").click(function(e){ 
            e.preventDefault();
            if(x < max_fields){ 
                x++;
            $("#order_list_append").append('<br><div class="row remove"><div class="col-md-11"><input type="text" name="bank_name[]" class="form-control" placeholder="Bank Name"></div><div class="col-md-1"><a href="#" class="remove_field">Remove</a></div></div>');
          }
        });
        
        $("#add_note").click(function(e){ 
            e.preventDefault();
            if(x < max_fields){ 
                x++;
            $("#order_list_append").append('<br><div class="row remove"><div class="col-md-11"><input type="text" name="account_number[]" class="form-control" placeholder="Account Number"/></div><div class="col-md-1"><a href="#" class="remove_field">Remove</a></div></div>');
          }
        });

        $("#order_list_append").on("click",".remove_field", function(e){ 
            e.preventDefault(); $(this).parent().parent('div.remove').remove(); 
            x--;
        })
    });

</script>

</body>
</html>