<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Form Sales </h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form contacts</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Company Address Form</h5>
                <div class="card-body">
                    
                                
<form action="<?php echo base_url('insert_contacts'); ?>" method="post" onsubmit="return validateForm()">
    
    <div class="row">
        <div class="col-sm-6">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="individualcompany" type="radio" id="individualID" value="individual">
                        <label class="form-check-label" for="individualID">individual</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="individualcompany" type="radio" id="companyID" value="company">
                        <label class="form-check-label" for="companyID">company</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input class="form-control" name="company_address" type="text" id="contact_name" placeholder="Name">
            </div>
        </div>
        <div class="col-sm-6">
            <input class="form-control" name="contact_file_main" type="file" id="contact_file_main">
        </div>
    </div>
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
                    <input class="form-control" name="street" type="text" id="street" placeholder="street">
                </div>
                <div class="col-md-12">
                    <input class="form-control" name="street_2" type="text" id="street_2" placeholder="street_2">
                </div>
                <div class="col-md-4">
                    <input class="form-control" name="city" type="text" id="city" placeholder="city">
                </div>
                <div class="col-md-4">
                    <input class="form-control" name="s﻿t﻿a﻿t﻿e" type="text" id="s﻿t﻿a﻿t﻿e" placeholder="s﻿t﻿a﻿t﻿e">
                </div>
                <div class="col-md-4">
                    <input class="form-control" name="zip" type="text" id="zip" placeholder="zip">
                </div>
                <div class="col-md-12">
                    <input class="form-control" name="c﻿o﻿u﻿n﻿t﻿r﻿y" type="text" id="c﻿o﻿u﻿n﻿t﻿r﻿y" placeholder="c﻿o﻿u﻿n﻿t﻿r﻿y">
                </div>
                <div class="col-md-12">
                    <input class="form-control" name="gst_treatment" type="text" id="gst_treatment" placeholder="gst_treatment">
                </div>
                <div class="col-md-12">
                    <input class="form-control" name="vat" type="text" id="vat" placeholder="vat">
                </div>
            </div>
        </div>
        
        <div class="col-sm-6">
            <div class="form-row">
                <div class="col-md-12">
                    <input class="form-control" name="phone" type="text" id="phone" placeholder="phone">
                </div>
                <div class="col-md-12">
                    <input class="form-control" name="mobile" type="text" id="mobile" placeholder="mobile">
                </div>
                <div class="col-md-12">
                    <input class="form-control" name="email" type="text" id="email" placeholder="email">
                </div>
                <div class="col-md-12">
                    <input class="form-control" name="website_link" type="text" id="website_link" placeholder="website_link">
                </div>
                <div class="col-md-12">
                    <input class="form-control" name="tag" type="text" id="tag" placeholder="tag">
                </div>
            </div>
        </div>
    </div>

                                <hr>

<nav class="taskDetails_Nav w-100">
    <div class="w-100 nav nav-tabs" id="nav-tab" role="tablist">
        <a class="w-25 text-center nav-item nav-link active" id="contacts_addresses_tab" data-toggle="tab" href="#nav-contacts_addresses_tab" role="tab" aria-controls="nav-contacts_addresses_tab" aria-selected="true">contacts addresses</a>
        
        <a class="w-25 text-center nav-item nav-link" id="nav-sales_purchas-tab" data-toggle="tab" href="#nav-sales_purchas" role="tab" aria-controls="nav-sales_purchas" aria-selected="false">sales & purchas</a>
        
        <a class="w-25 text-center nav-item nav-link" id="nav-Invoicing-tab" data-toggle="tab" href="#nav-Invoicing" role="tab" aria-controls="nav-Invoicing" aria-selected="false">Invoicing</a>

        <a class="w-25 text-center nav-item nav-link" id="nav-Internal-tab" data-toggle="tab" href="#nav-Internal" role="tab" aria-controls="nav-Internal" aria-selected="false">Internal Notes</a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    
    <div class="tab-pane fade show active" id="nav-contacts_addresses_tab" role="tabpanel" aria-labelledby="contacts_addresses_tab">

<hr>
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add</button>

<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><label>contacts addresses</label></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
    <div class="form-row">
        <div class="col-md-12">
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


    <div class="row">
        <div class="col-sm-4">
            <div class="form-row">
                <div class="col-md-12">
                    <label>contact name</label>
                    <input class="form-control" name="contact_name" type="text" id="contact_name" placeholder="contact_name">
                </div>
                <div class="col-md-12">
                    <label>street</label>
                    <input class="form-control" name="street" type="text" id="street" placeholder="street">
                </div>
                <div class="col-md-12">
                    <label>street 2</label>
                    <input class="form-control" name="street_2" type="text" id="street_2" placeholder="street_2">
                </div>
                <div class="col-md-6">
                    <label>city</label>
                    <input class="form-control" name="city" type="text" id="city" placeholder="city">
                </div>
                <div class="col-md-6">
                    <label>s﻿t﻿a﻿t﻿e</label>
                    <input class="form-control" name="s﻿t﻿a﻿t﻿e" type="text" id="s﻿t﻿a﻿t﻿e" placeholder="s﻿t﻿a﻿t﻿e">
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="row">
                
                <div class="col-md-12">
                    <label>Email</label>
                    <input class="form-control" name="email" type="text" id="email" placeholder="email">
                </div>
                <div class="col-md-12">
                    <label>Phone</label>
                    <input class="form-control" name="phone" type="text" id="phone" placeholder="phone">
                </div>
                <div class="col-md-12">
                    <label>Mobile</label>
                    <input class="form-control" name="mobile" type="text" id="mobile" placeholder="mobile">
                </div>
                <div class="col-md-12">
                    <label>Internal Notes</label>
                    <textarea class="form-control" name="internal_notes" id="internal_notes" placeholder="Internal Notes"></textarea>
                </div>
                
            </div>
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="col-md-12">
                    <label>contact name</label>
                    <input class="form-control" name="contact_file" type="file" id="contact_file">
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix visible-xs"></div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn" id="save">Save</button>
        </div>
      </div>
    </div>
  </div>

    </div>

    <div class="tab-pane fade" id="nav-sales_purchas" role="tabpanel" aria-labelledby="nav-sales_purchas-tab">

            <hr>
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
    <div class="tab-pane fade" id="nav-Invoicing" role="tabpanel" aria-labelledby="nav-Invoicing-tab">
        <label>Bank Accounts</label>
         
         <div class="input_fields_wrap">
            <button class="add_field_button">Add More Fields</button>
            <div class="row">
                <div class="col-md-6">
                    <label>Bank Name</label>
                    <input type="text" name="bank_name[]" class="form-control" placeholder="Bank Name">
                </div>
                <div class="col-md-6">
                    <label>Account Number</label>
                    <input type="text" name="account_number[]" class="form-control" placeholder="Account Number"/>
                </div>
            </div>
        </div>

    </div>
    <div class="tab-pane fade" id="nav-Internal" role="tabpanel" aria-labelledby="nav-Internal-tab">
        <div class="row">
            <div class="col-md-12">
                <label>Notes</label>
                <textarea class="form-control" name="internal_notes_2" id="internal_notes_2" placeholder="Internal Notes"></textarea>
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
        </div>
    </div>
</div>