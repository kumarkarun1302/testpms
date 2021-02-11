<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>New Contacts | ANJ Webtech Pvt Ltd</title>
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

    <!-- Dragula -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/dragula/dragula.min.css">

    <!--Simplebar CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/simplebar.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/structure.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/animate.css/animate.min.css">

    <!-- Nestable CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/jquery-nestable.css">

    <!-- Role Permission CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/rolePermission.css">
</head>

<body class="common_dashboard_trello rolePermission-bg">

    <!--  BEGIN NAVBAR  -->
    <div class="header-container" style="background-color: rgb(94, 37, 111);">
        
    </div>
    <!--  END NAVBAR  -->
    
    <!--  BEGIN BOARDS MAIN CONTAINER  -->
    <div class="boards-container rolePermission pt-3" id="container" data-simplebar>
        <div class="board-canvas container-fluid metricsContainer">
            <div class="row no-gape mb-2 mainpageheader">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="dashboardTitleIcon_box">
                        <div class="dashboardTitle">
                        </div>
                    </div>
                </div>
            </div>
            
            <h2>New Contacts</h2>
            
            <form action="<?php echo base_url('insert_Permission'); ?>" method="post">
                <div class="form-row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 stack-item-col mb-3">
                        <div class="stack-item-content">
                            <div class="blockContent">
                                <div class="form-row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="individual" type="radio" id="individualID" value="individual">
                                                <label class="form-check-label" for="individualID">individual</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="company" type="radio" id="companyID" value="company">
                                                <label class="form-check-label" for="companyID">company</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="company_address" type="text" id="contact_name" placeholder="Name">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <label>Company Address</label>
                                <div class="form-row">
                                    <div class="col-3">
                                        <input class="form-control" name="street" type="text" id="street" placeholder="street">
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" name="street_2" type="text" id="street_2" placeholder="street_2">
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" name="city" type="text" id="city" placeholder="city">
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" name="s﻿t﻿a﻿t﻿e" type="text" id="s﻿t﻿a﻿t﻿e" placeholder="s﻿t﻿a﻿t﻿e">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-3">
                                        <input class="form-control" name="zip" type="text" id="zip" placeholder="zip">
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" name="c﻿o﻿u﻿n﻿t﻿r﻿y" type="text" id="c﻿o﻿u﻿n﻿t﻿r﻿y" placeholder="c﻿o﻿u﻿n﻿t﻿r﻿y">
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" name="gst_treatment" type="text" id="gst_treatment" placeholder="gst_treatment">
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" name="vat" type="text" id="vat" placeholder="vat">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-2">
                                        <input class="form-control" name="phone" type="text" id="phone" placeholder="phone">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-control" name="mobile" type="text" id="mobile" placeholder="mobile">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-control" name="email" type="text" id="email" placeholder="email">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-control" name="website_link" type="text" id="website_link" placeholder="website_link">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-control" name="tag" type="text" id="tag" placeholder="tag">
                                    </div>
                                </div>

                                <hr>
                                <label>contacts addresses</label>
                                
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="contact" type="radio" id="contactID" value="contact">
                                                <label class="form-check-label" for="contactID">contact</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="invoice_address" type="radio" id="invoice_addressID" value="invoice address">
                                                <label class="form-check-label" for="invoice_addressID">invoice address</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="delivery_address" type="radio" id="delivery_addressID" value="delivery address">
                                                <label class="form-check-label" for="delivery_addressID">delivery address</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="other_address" type="radio" id="other_addressID" value="other address">
                                                <label class="form-check-label" for="other_addressID">other address</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="private_address" type="radio" id="private_addressID" value="private address">
                                                <label class="form-check-label" for="private_addressID">private address</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-3">
                                        <input class="form-control" name="street" type="text" id="street" placeholder="street">
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" name="street_2" type="text" id="street_2" placeholder="street_2">
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" name="city" type="text" id="city" placeholder="city">
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" name="s﻿t﻿a﻿t﻿e" type="text" id="s﻿t﻿a﻿t﻿e" placeholder="s﻿t﻿a﻿t﻿e">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-2">
                                        <input class="form-control" name="phone" type="text" id="phone" placeholder="phone">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-control" name="mobile" type="text" id="mobile" placeholder="mobile">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-control" name="email" type="text" id="email" placeholder="email">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-control" name="internal_notes" type="text" id="internal_notes" placeholder="internal_notes">
                                    </div>
                                    <div class="col-2">
                                        <input class="form-control" name="contact_name" type="text" id="contact_name" placeholder="contact_name">
                                    </div>
                                </div>

                                <hr>
                                <label>sales & purchase</label>
                                <div class="form-row">
                                    <div class="col-3">
                                        <input class="form-control" name="street" type="text" id="street" placeholder="salesperson">
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" name="street_2" type="text" id="street_2" placeholder="payment_terms">
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" name="city" type="text" id="city" placeholder="purchase payment_terms">
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" name="s﻿t﻿a﻿t﻿e" type="text" id="s﻿t﻿a﻿t﻿e" placeholder="barcode">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-3">
                                        <input class="form-control" name="street" type="text" id="street" placeholder="fiscal_position">
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" name="reference" type="text" id="reference" placeholder="reference">
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" name="company" type="text" id="company" placeholder="company">
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" name="industry" type="text" id="industry" placeholder="industry">
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
<script src="<?php echo base_url('assets/'); ?>js/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/validator.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/main.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/dragula/dragula.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/dragula.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/simplebar/simplebar.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/clipboard.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>

<script type="text/javascript">
</script>

</body>
</html>