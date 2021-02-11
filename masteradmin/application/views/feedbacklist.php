<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Feedback List 
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable_tbl_feedback" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
									<th>Name</th>
									<th>Email</th>
									<th>Quality</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="fetchRecordtbl_feedback">
                                <?php

                                $i=1;
                                $this->db->select('*');
                                $this->db->from('tbl_feedback');
                                $this->db->order_by('feedback_id','desc');
                                $query = $this->db->get();
                                //echo print_r($query->result_array());exit;
                                foreach ($query->result_array() as $key => $val) {
                                    $buttonDel = '<button class="btn" onclick="ajaxdelete_tbl_feedback('.$val['feedback_id'].')">Delete</button>';
                                    echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$val['first_name'].'</td>
                                            <td>'.$val['email'].'</td>
                                            <td>'.$val['quality'].'</td>
                                            <td>'.$buttonDel.'</td>
                                            </tr>';
                                            $i++;
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>




