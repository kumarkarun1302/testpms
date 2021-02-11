<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <a href="#" class="btn"></a>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">

<?php 
$qry = $this->db->query("SELECT count(*) as cn FROM `tbl_attendance` WHERE user_id = '".getSessionadmin('user_id')."' and eStatus =0");
$result = $qry->row_array();
//echo $result['cn'];exit;
if($result['cn'] == 0)  { ?>
<div class="col-md-6">
    <button class="btn btn-success" data-toggle="modal" data-target="#clockINModal">CLOCK IN</button>
</div>
<?php } else { ?>
    <div class="col-md-6">
    <button class="btn btn-danger disabled" data-toggle="modal" data-target="#clockoutModal">CLOCK OUT</button>
    </div>
<?php } ?>
                
                
                </div>

            </div>
        </div>
    </div>
</main>
</div>

<div class="modal fade" id="clockoutModal" tabindex="-1" role="dialog" aria-labelledby="anotherCardModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="anotherCardModalLabel">Clock Out</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
            
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label id="clockout">&nbsp;</label>
                    <input type="hidden" class="form-control" id="clock_out" name="clock_out">
                </div>
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="submit_attendance_clock_out()">Submit</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="clockINModal" tabindex="-1" role="dialog" aria-labelledby="anotherCardModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="anotherCardModalLabel">Add Attendance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <select class="custom-select mr-sm-2" name="project_id" id="project_id">
                           <?php foreach (getDropDownList('tbl_project','project_name,project_id','project_name','ASC') as $val) { ?>
                              <option value="<?php echo $val["project_name"]; ?>"><?php echo $val["project_name"]; ?></option>
                            <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <select class="custom-select mr-sm-2" name="task_id" id="task_id">
                           <?php foreach (getDropDownList('tbl_task','title,id','title','ASC') as $val) { ?>
                              <option value="<?php echo $val["title"]; ?>"><?php echo $val["title"]; ?></option>
                            <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="date" class="form-control" id="start_date" name="start_date" >
                </div>
                <div class="form-group col-md-6">
                    <label id="clockin">&nbsp;</label>
                    <input type="hidden" class="form-control" id="clock_in" name="clock_in">
                </div>
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="submit_attendance()">Submit</button>
      </div>
    </div>
  </div>
</div>
