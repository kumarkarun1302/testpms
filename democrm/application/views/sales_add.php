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
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Sales</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
             
<div class="row">

<!-- onsubmit="return validateForm()" -->

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Company Address Form</h5>
        <div class="card-body">
            <form class="needs-validation" novalidate action="<?php echo base_url('insertdb/insert_sales'); ?>" method="post" >


 <input type="hidden" name="sales_id" value="<?php if(isset($result['sales_id'])) { echo $result['sales_id']; }?>">

 <input type="hidden" name="sales_combo_id" value="<?php if(isset($result['sales_combo_id'])) { echo $result['sales_combo_id']; }?>">

                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                        <label for="sales_customer">Customer</label>
                        <input type="text" class="form-control" id="sales_customer" name="sales_customer" required value="<?php if(isset($result['sales_customer'])) { echo $result['sales_customer']; }?>">
                        
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                        <label for="validationCustom02">GST Treatment</label>
                        <select class="form-control" name="gst_treatment" id="gst_treatment">
                            <option value="">select gst treament</option>
                            <option value="regular">Registered Business - Regular</option>
                            <option value="composition">Registered Business - Composition</option>
                            <option value="unregistered">Unregistered Business</option>
                            <option value="consumer">Consumer</option>
                            <option value="overseas">Overseas</option>
                            <option value="special_economic_zone">Special Economic Zone</option>
                            <option value="deemed_export">Deemed Export</option>
                        </select>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                        <label for="sales_customer">Payment Terms</label>
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
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                        <label for="validationCustom02">Expiration</label>
                        <input type="text" class="form-control" id="expiration_date" name="expiration_date" value="<?php if(isset($result['expiration_date'])) { echo $result['expiration_date']; }?>">
                    </div>
                </div>


    <div class="form-row">
        <!-- <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city">
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
            <label for="state">State</label>
            <input type="text" class="form-control" id="state" name="state">
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
            <label for="zip_code">Zip</label>
            <input type="text" class="form-control" name="zip_code" id="zip_code">
        </div> -->
    
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                            <div class="section-block">
                                <h5 class="section-title">Others Details</h5>
                                <p></p>
                            </div>
                            <div class="tab-regular">
                                <ul class="nav nav-tabs nav-fill" id="myTab7" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab-justify" data-toggle="tab" href="#home-justify" role="tab" aria-controls="home" aria-selected="true">Order Lines</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab-justify" data-toggle="tab" href="#profile-justify" role="tab" aria-controls="profile" aria-selected="false">Optional Products</a>
                                    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab-justify" data-toggle="tab" href="#contact-justify" role="tab" aria-controls="contact" aria-selected="false">Other Info</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent7">
    <div class="tab-pane fade show active" id="home-justify" role="tabpanel" aria-labelledby="home-tab-justify">
        <p class="lead"> </p>
        
        <button type="button" class="btn btn-primary" id="add_product">
            add a product
        </button>
        <button type="button" class="btn btn-primary" id="add_section">
            add a section
        </button>
        <button type="button" class="btn btn-primary" id="add_note">
            add a note
        </button>

        <div id="order_list_append">
        </div>
    </div>
    <div class="tab-pane fade" id="profile-justify" role="tabpanel" aria-labelledby="profile-tab-justify">
        <p></p>

    <button type="button" class="btn btn-primary" id="add_product_optional">
    add a product
    </button>
    <div id="optional_list_append">    
    </div>
    </div>
    <div class="tab-pane fade" id="contact-justify" role="tabpanel" aria-labelledby="contact-tab-justify">
        <p>&nbsp;</p>
        <div class="row">
                <div class="col-sm-6">
                     <h3>Sales</h3>
                    <div class="form-row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label>Salesperson</label>
                            <input class="form-control" name="sales_person" type="text" id="sales_person" value="<?php if(isset($result['sales_person'])) { echo $result['sales_person']; }?>">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label>Sales Team</label>
                            <input class="form-control" name="sales_team" type="text" id="sales_team" value="<?php if(isset($result['sales_team'])) { echo $result['sales_team']; }?>">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label>Company</label>
                            <input class="form-control" name="company" type="text" id="company" value="<?php if(isset($result['company'])) { echo $result['company']; }?>">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label>Online Signature</label>
                            <input class="form-control" name="online_signature" type="text" id="online_signature" value="<?php if(isset($result['online_signature'])) { echo $result['online_signature']; }?>">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label>Online Payment</label>
                            <input class="form-control" name="online_payment" type="text" id="online_payment" value="<?php if(isset($result['online_payment'])) { echo $result['online_payment']; }?>">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label>Customer Reference</label>
                            <input class="form-control" name="customer_reference" type="text" id="customer_reference" value="<?php if(isset($result['customer_reference'])) { echo $result['customer_reference']; }?>">
                        </div>

                    </div>
                </div>
                <div class="col-sm-6">
                    <h3>Invoicing</h3>
                    <div class="form-row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label>Fiscal Position</label>
                            <select class="form-control" name="fiscal_position" id="fiscal_position">
                                <option value="">Select Fiscal Position</option>
                                <option value="Export">Export</option>
                                <option value="Reverse charge Inter State">Reverse charge Inter State</option>
                                <option value="Inter State">Inter State</option>
                                <option value="Reverse charge Intra State">Reverse charge Intra State</option>
                            </select>

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label>Journal</label>
                            <input class="form-control" name="journal" type="text" id="journal" value="<?php if(isset($result['journal'])) { echo $result['journal']; }?>">
                        </div>
                    </div>

                    <br>
                    <h3>Delivery</h3>
                    <div class="form-row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label>Shipping Policy</label>
                            <select class="form-control" name="shipping_policy" id="shipping_policy">
                                <option value="">Select Shipping Policy</option>
                                <option value="As soon as possible">As soon as possible</option>
                                <option value="When all products are ready">When all products are ready</option>
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <label>Delivery Date</label>
                            <input class="form-control" name="delivery_date" type="text" id="delivery_date" value="<?php if(isset($result['delivery_date'])) { echo $result['delivery_date']; }?>">
                        </div>
                    </div>
                </div>
            </div>

                </div>
            </div>
        </div>
    </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>