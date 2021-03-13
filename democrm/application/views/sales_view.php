<div class="dashboard-wrapper">
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Sales List View</h2>
                <p class="pageheader-text"></p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sales List View</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <a href="<?php echo base_url('assets/leads_demo.csv'); ?>" class="btn btn-success d-none d-lg-block" download>
                <i class="ti-import"></i> Sample File for import Sales
            </a>
        </div>

        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
        <form accept-charset="utf-8" role="form" method="post" id="import_form" enctype="multipart/form-data" action="<?php echo base_url('insertdb/import'); ?>">
            <div class="form-group">
                <label for="site_name" class="col-sm-3 control-label">Select File</label>
                <div class="col-sm-9">
                    <div class="input file required">
                        <input type="file" name="file" id="file" required accept=".xls, .xlsx .csv">
                    </div>                       
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group text-left">
                    <div class="col-sm-offset-3 col-sm-7">
                        <button type="submit" class="btn btn-success">
                            <span class="ti-export"></span>&nbsp;Import Contacts</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>


    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <a href="<?php echo base_url('sales_add'); ?>" class="btn btn-rounded btn-primary">Add Sales</a>
                    </div>
                </h5>
<div class="card-body">

<div class="simple-outline-card">
    
    <div class="tab-content" id="myTabContent6">
        <div class="tab-pane fade show active" id="home-simple-outline" role="tabpanel" aria-labelledby="home-tab-simple-outline">

    <div class="table-responsive">
    <table class="table table-striped table-bordered first">
        <thead>
            <tr>
                <th>Sales Customer Name</th>
                <th>GST Treatment</th>
                <th>Payment Terms</th>
                <th>Expiration Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
<?php 
    $user_id = getProfileName('user_id');
    $query_tbl_leads = $this->db->query("SELECT * FROM `tbl_sales` where eDelete=0 ORDER BY `tbl_sales`.`sales_id` DESC");    
    $result_leads = $query_tbl_leads->result_array();
    foreach ($result_leads as $key => $value) {
?>
<tr>
    <td><?php echo $value['sales_customer']; ?></td>
    <td><?php echo $value['gst_treatment']; ?></td>
    <td><?php echo $value['payment_terms']; ?></td>
    <td><?php echo date('Y-m-d', strtotime($value['expiration_date'])); ?></td>
    <td>
        <a href="<?php echo base_url('sales_edit/'); ?><?php echo $value['sales_id']; ?>" class="btn btn-primary">Edit</a>
    </td>
</tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>

                            </div>
                           
                            
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>