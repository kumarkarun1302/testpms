            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Projects List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">project</li>
                        </ol>
                        <a href="<?php echo base_url('admin/projectView'); ?>" class="btn">add</a>
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
                                                <th>Project Name</th>
                                                <th>Start Date</th>
                                                <th>Deadline Date</th>
                                                <th>Client Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach (get_by_all_record('tbl_project','project_id') as $val) { ?>
                                            <tr>
                                                <td><?php echo $val['project_name']; ?></td>
                                                <td><?php echo $val['start_date']; ?></td>
                                                <td><?php echo $val['deadline']; ?></td>
                                                <td><?php echo $val['client_id']; ?></td>
                                                <td>
                                                    <a>Edit</a>
                                                    |
                                                    <a>Delete</a>
                                                </td>
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
        
