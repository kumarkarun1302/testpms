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
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block">
                                    <h5 class="section-title"></h5>
                                    <p></p>
                                </div>
                                <div class="accrodion-regular">
                                    <div id="accordion3">
                                        <div class="card">
                                            <div class="card-header" id="headingSeven">
                                                <h5 class="mb-0">
                                                   <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                                     <span class="fas fa-angle-down mr-3"></span>Lead Infomation
                                                   </button>
                                                  </h5>
                                            </div>
                                            <div id="collapseSeven" class="collapse show" aria-labelledby="headingSeven" data-parent="#accordion3">
                                                <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                    <label for="sales_customer">Title</label>
                                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                    <label for="validationCustom02">Organization</label>
                                                    <input type="text" class="form-control" name="organization" id="organization" placeholder="Title" required>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                    <label for="validationCustom02">Contact Name</label>
                                                    <input type="text" class="form-control" name="contact_name" id="contact_name" placeholder="Title" required>
                                                </div>
                                            </div>

    <div class="form-row">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
            <label for="sales_customer">Source</label>
            <select class="select2 pmd-select2 form-control" id="lead_source_id" name="lead_source_id">
                <option value="" selected="selected">Choose value</option>
                <option value="1">Advertisement</option>
                <option value="2">Cold call</option>
                <option value="3">Employee referral</option>
                <option value="4">External referral</option>
                <option value="5">Partner</option>
                <option value="6">Public relations</option>
                <option value="7">Trade show</option>
                <option value="8">Web form</option>
                <option value="9">Search engine</option>
                <option value="10">Facebook</option>
                <option value="11">Twitter</option>
                <option value="12">Online store</option>
                <option value="13">Seminar partner</option>
                <option value="14">Web download</option>
                </select>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
            <label for="validationCustom02">Language</label>
            <select class="select2 pmd-select2 form-control" id="lead_source_id" name="lead_source_id">
                <option value="" selected="selected">Choose value</option>
                <?php
                $this->db->select('*');
                $this->db->from('tbl_language');
                $this->db->order_by('value','ASC');
                $query=$this->db->get();
                $result = $query->result_array();
                    foreach ($result as $key => $value) {
                ?>

                <option value="<?php echo $value["value"]; ?>"><?php echo $value["value"]; ?></option>

                <?php } ?>
            </select>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
            <label for="validationCustom02">Industry</label>
            <select class="select2 pmd-select2 form-control" id="lead_industry_id" name="lead_industry_id">
            <option value="" selected="selected">Choose value</option>
            <option value="1">Communucation</option>
            <option value="2">Technology</option>
            <option value="3">Government military</option>
            <option value="4">Manufacturing</option>
            <option value="5">Financial services</option>
            <option value="6">IT Service</option>
            <option value="7">Education</option>
            <option value="8">Pharma</option>
            <option value="9">Real Estate</option>
            <option value="10">Consulting</option>
            <option value="11">Health Care</option>
            <option value="12">RRP</option>
            <option value="13">Service provider</option>
            <option value="14">Data telecom</option>
            <option value="15">Large enterprise</option>
            </select>
        </div>
    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mb-2">
                                            <div class="card-header" id="headingEight">
                                                <h5 class="mb-0">
                                                   <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                     <span class="fas fa-angle-down mr-3"></span>Contact Data
                                                 </button>       </h5>
                                            </div>
                                            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion3">
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                            <label>Phone</label>
                                                            <input class="form-control" name="phone" type="text" id="phone" placeholder="Phone">
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                            <label>Mobile</label>
                                                             <input class="form-control" name="mobile" type="text" id="mobile" placeholder="Mobile">
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                            <label>Email</label>
                                                             <input class="form-control" name="email" type="text" id="email" placeholder="Email">
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                            <label>Fax</label>
                                                             <input class="form-control" name="fax" type="text" id="fax" placeholder="Email">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mb-2">
                                            <div class="card-header" id="headingNine">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                        <span class="fas fa-angle-down mr-3"></span>Company Data
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion3">
                                                <div class="card-body">
                                                    <div class="form-row">
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                    <label for="sales_customer">Job Title</label>
                                                    <input type="text" class="form-control" name="job_title" id="job_title" placeholder="Title" required>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                    <label for="validationCustom02">Website</label>
                                                    <input type="text" class="form-control" name="website" id="website" placeholder="Title" required>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                    <label for="validationCustom02">Company Name</label>
                                                    <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Title" required>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                    <label for="validationCustom02">No Of Employee</label>
                                                    <input type="text" class="form-control" name="no_of_employee" id="no_of_employee" placeholder="No Of Employee" required>
                                                </div>
                                            </div>
                                                </div>
                                            </div>
                                        </div>

            <div class="card mb-2">
                <div class="card-header" id="headingNine1">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine1" aria-expanded="false" aria-controls="collapseNine1">
                            <span class="fas fa-angle-down mr-3"></span>Address Infomation
                        </button>
                    </h5>
                </div>
                <div id="collapseNine1" class="collapse" aria-labelledby="headingNine1" data-parent="#accordion3">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="sales_customer">street</label>
                                <input type="text" class="form-control" name="street" id="street" placeholder="street" required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="validationCustom02">zip code</label>
                                <input type="text" class="form-control" name="zip_code" id="zip_code" placeholder="zip code" required>
                            </div>
                        </div>
                        <div class="form-row">
                            
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="country">Country</label>
                                <select class="select2 pmd-select2 form-control" id="country_id" name="country">
                                    <option value="" selected="selected">Choose value</option>
                            <?php
                            $this->db->select('*');
                            $this->db->from('tbl_country');
                            $this->db->order_by('name','ASC');
                            $query_country=$this->db->get();
                            $result_country = $query_country->result_array();
                            foreach ($result_country as $key => $val) {
                            ?>
                                <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                            <?php } ?>
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="state">State</label>
                                <select class="select2 pmd-select2 form-control" id="state_id" name="state">
                                    <option value="" selected="selected">Choose value</option>
                                </select>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="City" required>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header" id="headingNine2">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine2" aria-expanded="false" aria-controls="collapseNine2">
                        <span class="fas fa-angle-down mr-3"></span>Social Infomation
                     </button>
                    </h5>
                </div>
                <div id="collapseNine2" class="collapse" aria-labelledby="headingNine2" data-parent="#accordion3">
                    <div class="card-body">
                            <div class="form-row">
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                    <label>Facebook URL</label>
                                    <input class="form-control" name="facebook_url" type="text" id="facebook_url" placeholder="https://www.facebook.com/xxxxx">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                    <label>Twitter URL</label>
                                    <input class="form-control" name="twitter_url" type="text" id="twitter_url" placeholder="https://twitter.com/xxxxx">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                    <label>Skype URL</label>
                                    <input class="form-control" name="skype_url" type="text" id="skype_url" placeholder="https://twitter.com/xxxxx">
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header" id="headingNine3">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine3" aria-expanded="false" aria-controls="collapseNine3">
                        <span class="fas fa-angle-down mr-3"></span>
                            Description
                        </button>
                    </h5>
                </div>
                <div id="collapseNine3" class="collapse" aria-labelledby="headingNine3" data-parent="#accordion3">
                    <div class="card-body">
                        <textarea name="description" class="form-control" id="description"></textarea>
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
            </div>
        </div>
    </div>
</div>