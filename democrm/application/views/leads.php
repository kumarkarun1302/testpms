
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Form Leads</h2>
                    
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Leads</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
             
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header"></h5>
            <div class="card-body">
                
	<form action="<?php echo base_url('insertdb/insert_leads'); ?>" method="post" autocomplete="off">
        
        <h2><?php echo $order_number_leads; ?></h2>
        <input type="hidden" name="order_number_leads" id="order_number_leads" value="<?php echo $order_number_leads; ?>">
        <input type="hidden" name="combo_id" id="combo_id" value="<?php echo time(); ?>">
        <input type="hidden" name="created_date" id="created_date" value="<?php echo date_from_today(); ?>">
        <input type="hidden" name="user_id" id="user_id" value="<?php echo getProfileName('user_id'); ?>">

        <input type="hidden" name="lead_id" id="lead_id" value="<?php if(isset($result['lead_id'])) { echo $result['lead_id']; }?>">

        <div class="form-row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <!-- <label for="sales_customer">Lead Generation Name</label> -->
                <select class="form-control" name="lead_generation_name" id="lead_generation_name" required>
                    <option value="2">smita</option>
                    <option value="3">ankit thakar</option>
                    <option value="4">devarsh</option>
                </select>
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <!-- <label for="sales_customer">joined us on</label> -->
                <input type="text" class="form-control " id="joined_us_on" name="joined_us_on"  required placeholder="joined us on" value="<?php if(isset($result['joined_us_on'])) { echo $result['joined_us_on']; }?>">
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <!-- <label for="sales_customer">follow up date</label> -->
                <input type="text" class="form-control" id="follow_up_date" name="follow_up_date" required placeholder="follow up date" value="<?php if(isset($result['follow_up_date'])) { echo $result['follow_up_date']; }?>">
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <!-- <label for="sales_customer">contact person name</label> -->
                <input type="text" class="form-control" id="contact_person_name" name="contact_person_name" placeholder="contact person name" value="<?php if(isset($result['contact_person_name'])) { echo $result['contact_person_name']; }?>">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <!-- <label for="validationCustom02">contact person email</label> -->
                <input type="text" class="form-control" id="contact_person_email" name="contact_person_email" placeholder="contact person email" value="<?php if(isset($result['contact_person_email'])) { echo $result['contact_person_email']; }?>">
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <!-- <label for="validationCustom02">contact person skype id</label> -->
                <input type="text" class="form-control" id="contact_person_skype_id" name="contact_person_skype_id" placeholder="contact person skype id" value="<?php if(isset($result['contact_person_skype_id'])) { echo $result['contact_person_skype_id']; }?>">
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <input type="text" class="form-control" id="facebook_url" name="facebook_url" placeholder="facebook url / id" value="<?php if(isset($result['facebook_url'])) { echo $result['facebook_url']; }?>">
            </div>
        </div>
        <br>
        <!-- <div class="form-row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                <label for="sales_customer">password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="password" required>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                <label for="sales_customer">confirm password</label>
                <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="confirm password" required>
            </div>
        </div> -->
        <div class="form-row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <!-- <label for="sales_customer">company name</label> -->
                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="company name" required value="<?php if(isset($result['company_name'])) { echo $result['company_name']; }?>">
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <!-- <label for="sales_customer">company email</label> -->
                <input type="text" class="form-control" id="company_email" name="company_email" placeholder="company email" required value="<?php if(isset($result['company_email'])) { echo $result['company_email']; }?>">
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <!-- <label for="sales_customer">company website</label> -->
                <input type="text" class="form-control" id="company_website" name="company_website" placeholder="company website" required value="<?php if(isset($result['company_website'])) { echo $result['company_website']; }?>">
            </div>
        </div>
        <br>

        <div class="form-row">
            
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <label for="lead_status">Lead Status</label>
                <select class="select2 pmd-select2 form-control" id="lead_status" name="lead_status">
                    <option value="OPEN - NotContacted">OPEN - NotContacted</option>
                    <option value="OPEN - AttemptedContact">OPEN - AttemptedContact</option>
                    <option value="OPEN - Contacted">OPEN - Contacted</option>
                    <option value="CLOSED - Disqualified">CLOSED - Disqualified</option>
                </select>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <label for="lead_source">Lead Source</label>
                <select class="select2 pmd-select2 form-control" id="lead_source" name="lead_source">
                    <option value="Web">Web</option>
                    <option value="Phone Enquiry">Phone Enquiry</option>
                    <option value="Partner Referral">Partner Referral</option>
                    <option value="Purchased List">Purchased List</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <label for="client_type">Client Type</label>
                <select class="select2 pmd-select2 form-control" id="client_type" name="client_type">
                    <option value="Biding">Biding</option>
                    <option value="Reference">Reference</option>
                    <option value="B2B">B2B</option>
                </select>
            </div>
        </div>
        <br>

        <div class="form-row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <!-- <label for="sales_customer">address</label> -->
                <textarea id="address" name="address" class="form-control" placeholder="Enter Address"><?php if(isset($result['address'])) { echo $result['address']; }?></textarea>
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                <input type="text" name="country" id="country" class="form-control" placeholder="Enter Country Name" value="<?php if(isset($result['country'])) { echo $result['country']; }?>">
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                <input type="text" name="state_name" id="state_name" class="form-control" placeholder="Enter State Name" value="<?php if(isset($result['state_name'])) { echo $result['state_name']; }?>">
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                <input type="text" name="city" id="city" class="form-control" placeholder="Enter City Name" required value="<?php if(isset($result['city'])) { echo $result['city']; }?>">
            </div>
        </div>
        <div class="form-row">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-2">
                <!-- <label for="validationCustom03">zip code</label> -->
                <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="zip code" required value="<?php if(isset($result['zip_code'])) { echo $result['zip_code']; }?>">
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-2">
                <!-- <label for="validationCustom04">fax</label> -->
                <input type="text" class="form-control" id="fax" name="fax" placeholder="fax" value="<?php if(isset($result['fax'])) { echo $result['fax']; }?>">
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-2">
                <!-- <label for="validationCustom05">phone number</label> -->
                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="phone number" value="<?php if(isset($result['phone_number'])) { echo $result['phone_number']; }?>">
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 ">
                <!-- <label for="sales_customer">mobile number</label> -->
                <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="mobile number" required value="<?php if(isset($result['mobile_number'])) { echo $result['mobile_number']; }?>">
            </div>
        </div>
        
        <br>
        <div class=" ">
            <input name="submit" class="btn btn-primary" type="submit" value="Submit">
        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">

                    
                    <div class="form-row" id="ajax_comment">
                    </div>

                    <div class="form-row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <textarea name="comment" id="comment" class="form-control" placeholder="enter comment"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</div>