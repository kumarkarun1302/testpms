<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Leads | ANJ Webtech Pvt Ltd</title>
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
            
            <h2>Add Leads</h2>
            
<form action="<?php echo base_url('insert_leads'); ?>" method="post" onsubmit="return validateForm()">
    
    
    <div class="form-row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 stack-item-col mb-3">
            <div class="stack-item-content">
                <div class="blockContent">
                <hr>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-row">
                <div class="col-md-12">
                    <label>Title</label>
                    <input class="form-control" name="title_lead" type="text" id="title_lead" placeholder="Title">
                </div>
                <div class="col-md-12">
                    <label>Organization</label>
                    <input class="form-control" name="organization_lead" type="text" id="organization_lead" placeholder="Organization">
                </div>
                <div class="col-md-12">
                    <label>Contact Name</label>
                    <input class="form-control" name="contact_name_lead" type="text" id="contact_name_lead" placeholder="Contact Name">
                </div>
                
                 <div class="col-md-4">
                    <label>City</label>
                     <input class="form-control" name="city_lead" type="text" id="city_lead" placeholder="City">
                </div>
                 <div class="col-md-4">
                    <label>State</label>
                     <input class="form-control" name="state_lead" type="text" id="state_lead" placeholder="State">
                </div>
                 <div class="col-md-4">
                    <label>Country</label>
                     <input class="form-control" name="country_lead" type="text" id="country_lead" placeholder="Country">
                </div>

            </div>
        </div>
        
        <div class="col-sm-6">
            <div class="form-row">
                <div class="col-md-12">
                    <label>Phone</label>
                    <input class="form-control" name="phone_lead" type="text" id="phone_lead" placeholder="Phone">
                </div>
                <div class="col-md-12">
                    <label>Mobile</label>
                     <input class="form-control" name="mobile_lead" type="text" id="mobile_lead" placeholder="Mobile">
                </div>
                <div class="col-md-12">
                    <label>Email</label>
                     <input class="form-control" name="email_lead" type="text" id="email_lead" placeholder="Email">
                </div>
                <div class="col-md-12">
                    <label>Facebook URL</label>
                    <input class="form-control" name="facebook_url_lead" type="text" id="facebook_url_lead" placeholder="https://www.facebook.com/xxxxx">
                </div>
                <div class="col-md-12">
                    <label>Twitter URL</label>
                     <input class="form-control" name="twitter_lead" type="text" id="twitter_lead" placeholder="https://twitter.com/xxxxx">
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