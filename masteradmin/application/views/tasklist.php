<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?php echo base_url('adddb/add_task'); ?>" class="btn">Add Task</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Task List 
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable_tbl_task" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
									<th>Project</th>
                                    <th>Task</th>
                                    <th>Deu Date</th>
                                    <th>Priority</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="fetchRecordtbl_task">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
        
