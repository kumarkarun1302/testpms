            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">template List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">template</li>
                        </ol>
                        <a href="<?php echo base_url('admin/templatev'); ?>" class="btn">add</a>
                        <div class="card mb-4">
                            <!-- <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Example
                            </div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>template Name</th>
                                                <th>custom message</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach (get_by_all_record('tbl_email_templates','email_templates_id') as $val) { ?>
                                            <tr>
                                                <td><?php echo $val['template_name']; ?></td>
                                                <td><?php echo $val['custom_message']; ?></td>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                
            </div>
        </div>
        
