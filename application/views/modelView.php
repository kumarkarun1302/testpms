    
    <div class="modal fade" id="trialModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="trialModalLabel" aria-hidden="true">
      <div class="modal-dialog-centered modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="trialModalLabel">Your ANJ PMS month expires in 1 day</h5>
          </div>
          <div class="modal-body">
               <div class="form-row">
                  <p>Your 1-day trial has ended.Don't worry, all your data is safely preserved in ANJ PMS. You may continue using ANJ PMS powerful collaboration features by purchasing, or your plan to access your data. If you have any questions,please contact our <a class="customer-support-link" href="https://anjwebtech.com/contact-us/" target="_blank"> Customer Support</a>.</p>
               </div>
               <div class="form-row">
                  <a href="<?php echo base_url('#pricing-table'); ?>" target="_blank" class="btn btn-purchase_subscription">Purchase</a>
               </div>
            </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="addanotheraccountModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="moveCardModalLabel" aria-hidden="true"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="moveCardModalLabel">Add Another Account</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div><div class="modal-body"> <form name="contact-form" method="post" autocomplete="off"> <div class="form-row"> <div class="form-group col-md-12"> <input type="text" class="form-control" name="addaccountemail" id="addaccountemail" placeholder="Enter Email ID"> </div></div></form> </div><div class="modal-footer"> <button type="button" class="btn btn-primary" onclick="addaccountemail()">Add</button> </div></div></div></div>

<!-- BEGIN Edit Task MODAL -->

<!-- BEGIN TASK DETAIL MODAL -->
<div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="taskDetailModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header" style="padding-bottom: 0; border-bottom: none;">
            <!-- <h5 class="modal-title" id="taskDetailModalLabel">Task Details</h5> -->
            <nav class="taskDetails_Nav w-100">
               <div class="w-100 nav nav-tabs" id="nav-tab" role="tablist" style="border-bottom: 1px solid #f0eff5;">
                  <a class="w-25 text-center nav-item nav-link active" id="nav-task_information-tab" data-toggle="tab" href="#nav-task_information" role="tab" aria-controls="nav-task_information" aria-selected="true">Edit Task</a>
                  <a class="w-25 text-center nav-item nav-link" id="nav-attachment-tab" data-toggle="tab" href="#nav-attachment" role="tab" aria-controls="nav-attachment" aria-selected="false">Attachment File</a>
                  <a class="w-25 text-center nav-item nav-link" id="nav-comment-tab" data-toggle="tab" href="#nav-comment" role="tab" aria-controls="nav-comment" aria-selected="false">Comment</a>
               </div>
            </nav>
<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="edittask_close()">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <input type="hidden" name="edit_task_id" id="edit_task_id">
         <div class="modal-body" data-simplebar>
          
          <div id="loading-overlay">
            <img src="https://www.anjpms.com/assets/loader.gif">
          </div>
          
            <div class="tab-content" id="nav-tabContent">
               <div class="tab-pane fade show active" id="nav-task_information" role="tabpanel" aria-labelledby="nav-task_information-tab">
                  <form>
                     <div class="form-row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                           <div class="form-group">
                              <label>Task Name</label>
                              <input class="form-control" type="text" name="edit_task_title" id="edit_task_title" placeholder="Task Name">
                           </div>
                           <div class="form-group">
                              <label>Task Description</label>
                              <textarea class="form-control" id="edit_task_description" name="edit_task_description" rows="3"></textarea>
                           </div>

                           <div class="form-row">
                             <div class="col-6">
                                <div class="form-group"> 
                                  <label>Priority Status</label>
                                  <select class="custom-select mr-sm-2" id="edit_task_priority" name="edit_task_priority">
                                     <option selected="">Select Priority</option>
                                      <option value="1">Low</option>
                                      <option value="2">Medium</option>
                                      <option value="3">High</option>
                                      <option value="4">Urgent</option>
                                  </select>
                                </div>
                             </div>
                             <div class="col-6">
                                <div class="form-group">
                                  <label>Task Status</label>
                                  <select class="custom-select mr-sm-2" id="edit_task_status" name="edit_task_status">
                                    <option value="">select task status</option>
                                  </select>
                               </div>
                             </div>
                          </div>

                          <div class="form-row">
                             <div class="col-6">
                                <div class="form-group"> 
                                  <label>Start Date</label>
                                  <input type="text" class="datetimepicker form-control hasDatepicker" name="edit_task_start_date" id="start_date">
                                </div>
                             </div>
                             <div class="col-6">
                                <div class="form-group"> 
                                  <label>Due Date</label>
                                  <input type="text" class="datetimepicker form-control hasDatepicker" name="edit_task_due_date" id="due_date">
                                </div>
                             </div>
                          </div>

                           <div class="form-group">
                              <label>Assign To</label>
                              <select class="custom-select mr-sm-2" id="edit_task_assigned_to" name="edit_task_assigned_to" multiple>
                                <option selected="0">Select Assigned To Task</option>
                                <?php 
                                if($project_assgin_to_user){
                                $qry = $this->db->query("select user_id,email,username from tbl_users where user_id!=1 and user_id IN ($project_assgin_to_user)");
                                $result = $qry->result_array(); 
                                foreach ($result as $key => $val) { ?>
                                <option value="<?php echo $val['user_id']; ?>"><?php echo $val['username'].' ('.$val['email'].')'; ?></option>
                                <?php } } ?>
                              </select>
                           </div>
                           
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                           <button type="button" class="btn btn-primary" id="edit_task_submit">Save changes</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="tab-pane fade" id="nav-attachment" role="tabpanel" aria-labelledby="nav-attachment-tab">
                  <div class="attachment_block">
                     <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form-row" id="image_preview"></div>
                        <div class="form-row">
                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                              <input type="file" class="custom-file-input" id="edit_task_file" name="edit_task_file" multiple/>
                              <label class="custom-file-label" for="edit_task_file">Choose File</label>
                              <input id="edit_task_fileOLD" type="hidden" name="edit_task_fileOLD" value="">
                           </div>
                        </div>
                     </form>
                  </div>
                  <div id="uploadFile_box" class="row mt-3">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                       <div id="uploadedimages" class="mb-3"></div>
                     </div>

                     <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h5 class="card-title m-b-20">Uploaded files</h5>
                        <div class="table-responsive">
                          <span id="successalertsuccess"></span>
                           <table class="table table-bordered" style="">
                              <tbody id="uploaded_images" class="">
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="nav-comment" role="tabpanel" aria-labelledby="nav-comment-tab">
                  <div class="coment_block">
                     
                        <div class="form-row">
                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="form-group">
                                 <textarea class="form-control" type="text" name="comment_p" id="comment_p" placeholder="Add a Comment" required=""></textarea>
                              </div>
                           </div>
                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="post-toolbar-b">
                                 <!-- <button class="btn btn-warning"><i class="fas fa-paperclip"></i></button>
                                 <button class="btn btn-warning"><i class="fas fa-camera"></i></button> -->
                                 <button class="btn btn-primary" id="submitButton">Add</button>
                              </div>
                              
                           </div>
                        </div>
                     
                  </div>
                  <div id="showloading"></div>
                  
                  <div class="comment_box" id="output_comment">
                    
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer" style="border-top: none;">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               <button type="button" class="btn btn-primary">Save changes</button> -->
         </div>
      </div>
   </div>
</div>
<!-- END TASK DETAIL MODAL -->

<!-- END Edit task MODAL -->

<div class="modal fade" id="addCommentModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addcommentLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addcommentLabel">add comment in project</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> 
         </div>
         <div class="modal-body">
            <div class="form-row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="form-group"> <input type="hidden" name="comment_id" id="commentId"/> <textarea class="form-control" type="text" name="comment_p" id="comment_p" placeholder="Add a Comment" required></textarea> </div>
               </div>
            </div>
            <div class="form-row">
               <div class="form-group"> <button type="button" class="btn btn-primary" id="submitButton">Add Comments</button> </div>
            </div>
            
         </div>
         <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> </div>
      </div>
   </div>
</div>

<!-- BEGIN TASK DETAIL MODAL -->
<div class="modal fade" id="viewTaskDetailModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="viewTaskDetailModalLabel" aria-hidden="true"> <div class="modal-dialog modal-lg" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="viewTaskDetailModalLabel">View Task Details</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div><div class="modal-body" data-simplebar> <div id="viewTaskInfo"> <div class="form-row"> <input type="hidden" name="edit_task_idview" id="edit_task_idview"> <div class="col-lg-8 col-md-8 col-sm-12 col-12"> <div class="form-group"> <h3 class="headingTask">Task Name</h3> <p class="headingTaskName"></p></div><div class="form-group"> <h3 class="headingTask">Task Description</h3> <p class="headingTaskDescription"></p></div><div class="form-group"> <h3 class="headingTask">Priority</h3> <p class="headingTaskPriority"></p></div><div class="form-group"> <h3 class="headingTask">Due Date</h3> <p class="headingTaskDueDate" id="headingTaskDueDate"></p></div><div class="form-group"> <h3 class="headingTask">Assign To Person Name</h3> <p class="headingTaskAssignToPersonName"></p></div></div><div class="col-lg-4 col-md-4 col-sm-12 col-12"> <div class="form-group"> <h3 class="headingTask">Attachment File</h3> <ul> <li id="headingTaskAttachment"> </li></ul> </div>

<!-- <div class="form-group">
<button data-toggle="modal" data-target="#addCommentModal">Show Comment</button>
</div>
<div class="form-group" id="countdown"> </div> -->

 </div></div></div></div><div class="modal-footer"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> </div></div></div></div>
<!-- END TASK DETAIL MODAL -->

<div class="modal fade" id="removeTeamMemberModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="showAllTeamModalLabel" aria-hidden="true"> <div class="modal-dialog modal-lg" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="showAllTeamModalLabel">all team member in project</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div><div class="modal-body" id="ajax_showAllTeamModal"> </div><div class="modal-footer"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> </div></div></div></div>

<!--Begin Hold Project Card -->
    <div class="modal fade" id="holdProjectCardModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="holdProjectCardModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="holdProjectCardModalLabel">Hold Project</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="hold_project_name">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="hold_project_name('<?php echo anj_decode($this->uri->segment(2)); ?>')" id="buttonnamechange_hold">Hold</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Hold Project Card -->

    <div class="modal fade" id="completedProjectCardModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="completedProjectCardModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="completedProjectCardModalLabel">Completed Project</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="completed_project_name">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="completed_project('<?php echo anj_decode($this->uri->segment(2)); ?>')">Completed</button>
          </div>
        </div>
      </div>
    </div>

    <!--Begin Delete Project Card -->
    <div class="modal fade" id="deleteProjectCardModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="deleteProjectCardModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteProjectCardModalLabel">All actions will be removed from the activity feed. There is no undo.</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="delete_project_name">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="delete_project('<?php echo anj_decode($this->uri->segment(2)); ?>')">Delete</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Delete Project Card -->
    <!--Begin ADD Project Card -->
    <div class="modal fade" id="addProjectCardModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addProjectCardModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addProjectCardModalLabel">Add New Project</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="<?php echo base_url('projects/addProjects'); ?>" autocomplete="off" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputFirstName">Project Name</label>
                            <input class="form-control py-4" name="project_name" id="project_name" type="text" required/>
                            <input name="website_addProject" id="website_addProject" type="hidden" value="dashboard" />
                             <input name="pms_user_id" id="pms_user_id" type="hidden" value="<?php echo getProfileName('user_id'); ?>" />
                             <input name="edit_project_id" id="edit_project_id" type="hidden"/>
                             <input type="hidden" name="editprojectCombo_id" id="editprojectCombo_id" value="<?php echo $projectCombo_id; ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="client_id">Client Name</label>
                            <input class="form-control py-4" id="client_id" type="text" name="client_id" required/>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="small mb-1" for="category">Technology</label>
                            <input class="form-control py-4" id="category" type="text" name="category" required autocomplete="off" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="small mb-1" for="StartDate">Start Date</label>
                            <input class="form-control py-4" id="StartDate" type="text" name="start_date" required autocomplete="off" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="small mb-1" for="EndDate">Deadline Date</label>
                            <input class="form-control py-4" id="EndDate" type="text" name="deadline" autocomplete="off" required/>
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="project_documentation">Project Documentation</label>
                            <input class="form-control py-4" id="project_documentation" type="file" name="project_documentation">
                            <input type="hidden" id="project_documentationOLD" name="project_documentationOLD">
                        </div>
                    </div> -->
                </div>

                <div class="form-row">
                    
                </div>
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="small mb-1" for="inputEmailAddress">Project Description</label>
                      <textarea class="form-control py-4" name="project_description" id="project_description" required></textarea>
                    </div>
                  </div>
                </div>
                
                <div class="form-group mt-4 mb-0">
                    <!-- <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Create Project" onclick="check_date()"> -->
                    <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block" onclick="check_date()">Create Project</button>
                </div>
                </form>
          </div>
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div> -->
        </div>
      </div>
    </div>
    <!-- End ADD Project Card -->
    

  <!--Begin Invite Team Modal -->
    <div class="modal fade" id="permissionModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="permissionModalLabel" aria-hidden="true"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="permissionModalLabel">Permission Role</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div><div class="modal-body"> <div class="form-row" id="permission_ajax"> </div></div><div class="modal-footer"> <button type="button" class="btn btn-primary" onclick="submit_permission()">Submit</button> </div></div></div></div>
    <!-- End Invite Team Modal -->

<div class="modal fade" id="inviteaddTeamModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="inviteaddTeamModalLabel" aria-hidden="true"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="inviteaddTeamModalLabel">Invite people</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div><div class="modal-body"> 

  <div class="form-row"> 
    <div class="form-group col-md-12"> 
  <input type="hidden" id="inviteCopyLink"> 
  <select class="js-select2 " multiple="multiple" name="txt_search[]" id="txt_search" required> 
  </select> 
  <ul id="searchResult"></ul> 
  <div class="clear"></div>
  <input type="hidden" id="user_id_userDetail"> 
  <input type="hidden" id="username_userDetail"> 
</div>
<div class="inviteTeamGroup form-group col-md-12 mb-0"> </div></div></div><div class="modal-footer"> <button type="button" class="btn btn-primary" onclick="submit_inviteTeam()">Invite</button> </div></div></div></div>

<div class="modal fade" id="addTeamModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addTeamModalLabel" aria-hidden="true"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="addTeamModalLabel">Add people</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div><div class="modal-body"> <div class="form-row"> <div class="form-group col-md-12 mb-0"> <div class="input-group mb-3"> <input type="text" id="inviteCopyLink" class="form-control"> <div class="input-group-append"> <button class="btn btn-outline-secondary inviteCopyLink" type="button" data-clipboard-action="copy" data-clipboard-target="#inviteCopyLink"><i class="fas fa-link"></i> Copy Link</button> </div></div></div><div class="inviteTeamGroup1 form-group col-md-12 mb-0"><div class="form-check inviteTeamCheck"><input class="form-check-input" type="checkbox" id="defaultcheck" name="checkbox_addteam" value="5"><label class="form-check-label" for="defaultcheck"></label></div></div></div></div><div class="modal-footer"> <button type="button" class="btn btn-primary" onclick="submit_addTeam()">Add</button> </div></div></div></div>

<div class="modal fade" id="newstatusModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="anotherListModalLabel" aria-hidden="true"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="anotherListModalLabel">Add Label</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div><div class="modal-body"> <form name="frm_addstatus" method="post"> <div class="form-row"> <div class="form-group col-md-12"> <input type="text" class="form-control" id="status_name_new" placeholder="Enter Label..." name="status_name_new" autocomplete="off"> </div></div></form> </div><div class="modal-footer"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> <button type="button" class="btn btn-primary" onclick="submit_new_status()">Submit</button> </div></div></div></div>

<!-- End Add Another List -->

    <!--Begin Add Another Card -->
    <div class="modal fade" id="anotherCardModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="anotherCardModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
          <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="anotherCardModalLabel">Add Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
             </div>
             <div class="modal-body">
                <form method="post" name="contact-form" autocomplete="off">
                   <div class="form-row">
                      <div class="form-group col-md-12"> <input type="text" class="form-control" id="title_new" name="title_new" placeholder="enter task..." autocomplete="off"> <input type="hidden" name="status_id_first" id="status_id_first"> </div>
                   </div>
                </form>
             </div>
             <div class="modal-footer"> <button type="button" class="btn btn-primary" onclick="submit_title_new()">Submit</button> </div>
          </div>
       </div>
    </div>
    <!-- End Add Another Card -->

    <!--Begin Add Another List -->
    <div class="modal fade" id="anotherListModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="anotherListModalLabel" aria-hidden="true"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="anotherListModalLabel">Rename Label</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div><div class="modal-body"> <div class="form-row"> <div class="form-group col-md-12"> <input type="text" class="form-control" id="status_name" placeholder="Enter List Title..." name="status_name" autocomplete="off"> <input type="hidden" id="status_id_rename" name="status_id_rename"> <input type="hidden" id="tablenameStatus" name="tablenameStatus"> </div></div></div><div class="modal-footer"> <button type="button" class="btn btn-primary" onclick="submit_rename_to_status()">Submit</button> </div></div></div></div>
    <!-- End Add Another List -->

    <!--Begin Card Move -->
    <div class="modal fade" id="moveCardModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="moveCardModalLabel" aria-hidden="true"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="moveCardModalLabel">Move Card</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div><div class="modal-body"> <h5>SELECT DESTINATION</h5> <div class="form-row"> <div class="form-group col-md-12"> <select class="custom-select mr-sm-2" name="mainstatusOrderBY" id="mainstatusOrderBY"> <option selected>Choose...</option> </select> <input type="hidden" name="orderBY" id="orderBY"> <input type="hidden" name="status_id" id="status_id"> </div></div></div><div class="modal-footer"> <button type="button" class="btn btn-primary" onclick="submit_move_to_status()">Move</button> </div></div></div></div>
    <!-- End Card Move -->

    <!--Begin Card Delete Modal -->
    <div class="modal fade" id="deleteCardModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="deleteCardModalLabel" aria-hidden="true"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="deleteCardModalLabel">Delete Card?</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div><div class="modal-body"> <p>All actions will be removed from the activity feed and you won’t be able to re-open the card. There is no undo.</p><input type="hidden" name="status_id_delete" id="status_id_delete"> <input type="hidden" name="tablename" id="tablename"> </div><div class="modal-footer"> <button type="button" class="btn btn-primary d-block" onclick="submit_delete_to_status()">Delete</button> </div></div></div></div>
    <!-- End Card Delete Modal -->

<!-- BEGIN PROFILE MODAL -->
<div class="modal fade" id="userProfileModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="userProfileModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="userProfileModalLabel"><?php $usertype = get_by_id('tbl_user_type', 'user_type', 'user_type_id', getProfileName('user_type'));
      echo ucfirst($usertype['user_type']); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" data-simplebar>
        <form method="POST" action="#" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo getProfileName('username'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="display_name-input">Display Name</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo getProfileName('username'); ?>" disabled>
                        <small>This could be your first name, or a nickname — however you’d like people to refer to you in ANJ Webtech Panel.</small>
                    </div>
                    <div class="form-group">
                        <label for="email_address-input">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo getProfileName('email'); ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="phone_number-input">Phone Number</label>
                        <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="<?php echo getProfileName('mobile_no'); ?>" required>
                        <small>Enter a phone number.</small>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="profile_photo-input">Profile photo</label>
                        <div class="userProfilePreview">
                            <img src="<?php echo getProfileName('picture_url'); ?>" id="onChangeImg" class="img-fluid">
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="picture" name="picture" onchange="showImg(this)">
                            <input type="hidden" id="pictureOLD" name="pictureOLD" value="<?php echo getProfileName('picture'); ?>">
                            <label class="custom-file-label" for="picture">Upload an Image</label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div id="showprofileloading"></div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="upload">Save changes</button>
    </div>
</div>
</div>
</div>
<!-- END PROFILE MODAL -->

    <!-- BEGIN CHNAGE PASSWORD MODAL -->
    <div class="modal fade" id="userChangePWModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="userChangePWModalLabel" aria-hidden="true"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="userChangePWModalLabel">Change password</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div><div class="modal-body" data-simplebar> <div id="form1_box" class="alert hidden" role="alert" style="display: none;"></div>
    <div class="row"> 
      <div class="col-lg-12 col-md-12 col-sm-12 col-12"> 
        <div class="form-group"> 
          <label>Current password</label> 
          <input id="old_password" type="password" class="form-control" name="old_password" placeholder="********" required="required" autocomplete="off"> 
          <i class="fa fa-fw fa-eye toggle-password field-icon" onclick="myFunction_old_password()"></i> 
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-12"> <div class="form-group"> <label>New password</label> 
        <input id="password" type="password" class="form-control" name="password" placeholder="********" required="required" autocomplete="off"> 
        <i class="fa fa-fw fa-eye toggle-password field-icon" onclick="myFunction_password()"></i> 
      </div></div><div class="col-lg-12 col-md-12 col-sm-12 col-12"> <div class="form-group"> <label>Repeat New password</label> 
        <input id="confirm_password" type="password" class="form-control" name="confirm_password" placeholder="********" required="required" autocomplete="off"> 
        <i class="fa fa-fw fa-eye toggle-password field-icon" onclick="myFunction_confirm_password()"></i>
         </div></div></div></div><div class="modal-footer"> <button type="button" class="btn btn-primary d-block" onclick="change_password()">Change Password</button> </div></div></div></div>
    <!-- END CHANGE PASSWORD MODAL -->

    <!-- BEGIN PROFILE MODAL -->
<div class="modal fade" id="userChangebgModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="userProfileModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="userProfileModalLabel">Change Background</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" data-simplebar>
        <form method="POST" action="#" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-group" id="background_image_hs">
                        <label for="profile_photo-input">Background photo</label>
                        <div class="userProfilePreview">
                            <?php if(bg(anj_decode($this->uri->segment(2)))==''){
                                $imaname = base_url('').'uploads/trello-bodyBg.jpg';
                            } else { $imaname = base_url('').'uploads/'.bg(anj_decode($this->uri->segment(2))); } ?>
<img src="<?php echo $imaname; ?>" id="onChangeImg1" class="img-fluid" style="height:200px;width:100%;">
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="background_image_name" name="background_image_name" onchange="validateImage(this)">
                            <input type="hidden" id="background_image_nameOLD" name="background_image_nameOLD" value="<?php echo bg(anj_decode($this->uri->segment(2))); ?>">
                            <label class="custom-file-label" for="picture">Upload an Image</label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div id="showupload_background"></div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="upload_background">Change Background</button>
    </div>
</div>
</div>
</div>
<!-- END PROFILE MODAL -->