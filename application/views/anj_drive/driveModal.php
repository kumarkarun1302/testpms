<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-keyboard="true" data-backdrop="static" style="position: absolute;float: left;left: 50%;top: 50%;transform: translate(-50%, -50%);"><div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header" style="text-align: center;">Enter decryption key</div><div class="modal-body"> <div class="instruction-message" style="color: rgb(119, 119, 119);line-height: 24px;padding: 0px 0px 10px;">To access this folder/file, you will need its <b>Decryption key</b>.If you do not have the key, contact the creator of the link.</div><input type="text" name="password" id="password" class="form-control" placeholder="Decryption key" autocomplete="disabled"> </div><div class="modal-footer"> </div></div></div></div>

   </div>
</div>


<div class="modal fade" id="abcdModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="trialModalLabel" aria-hidden="true"><div class="modal-dialog-centered modal-dialog modal-md" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="trialModalLabel">ANJ DRIVE – key to your files</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div><div class="modal-body"> <div class=""> <div class="text-container"> <p>No more looking for software, long installations and time consuming updates.</p><p>Open any text document, spreadsheet, presentation, e-book, illustration or archive with ease just from your browser.</p><p style="margin-top: 10px;"><strong>★ Documents:</strong> Microsoft Word files: doc, docx; Rich Text files: rtf; OpenOffice Writer files: odt; Word Perfect files: wpd; PDFs and others</p><p><strong>★ Spreadsheets:</strong> Microsoft Excel files: xls, xlsx; OpenOffice Calc files: ods, ots; Comma-Separated Values files: csv</p><p><strong>★ Presentations:</strong> Microsoft PowerPoint files: ppt, pptx, pps, ppsx; OpenOffice Impress files: odp, otp</p><p><strong>★ eBooks:</strong> epub, fb2, djvu and others</p><p><strong>★ ZIP, RAR and other archives</strong></p><p><strong>★ Graphics:</strong> jpg, png, bmp, gif, svg, tiff and many others including Adobe Photoshop’s psd and Adobe Illustrator’s ai</p><p><strong>★ Diagrams:</strong> Microsoft Visio files: vsd and others like dia, fig</p><p><strong>★ Publishing systems files:</strong> Adobe Illustrator files: ai; Scribus files: scd, sla; PostScript: eps, ps and others</p><p style="margin-top: 10px;">Overall <strong>more than 500 different file types</strong> are supported. And more to come!</p></div><div class="clearfix"></div></div></div></div></div></div><div id="permanentlyModal" class="modal fade" role="dialog"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button> <h4 class="modal-title">Permanently Items</h4> </div><div class="modal-body"> Are you sure you want to permanently delete the file? <hr> <button type="button" class="btn btn-primary" onclick="permanently_items()">Restore</button> </div></div></div></div>


   <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="createNewFolderModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="createNewFolderModalLabel">Share File</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
          <div class="modal-body" data-simplebar>
            <form action="<?php echo base_url('anj_drive/other_share'); ?>" method="post">
                <div class="form-row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Link</label>
                            <div class="input-group input-group-lg input-with-icon">
                                <span class="input-group-addon mergeicon">
                                    <span class="icn-folder-small"></span>
                                </span>
                                <input class="form-control mergeInputfield w-100" id="anj_link_url" name="anj_link_url" readonly>
                                <input type="hidden" name="modaldummy_cryptcode" id="modaldummy_cryptcode">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Send this link to</label>
                            <div class="input-group input-group-lg input-with-icon">
                                <span class="input-group-addon mergeicon">
                                    <span class="icn-folder-small"></span>
                                </span>
                                <input autocomplete="off" class="form-control" id="share_other_people" name="share_other_people" placeholder="Enter email address" type="email">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Massage</label>
                            <div class="input-group input-group-lg input-with-icon">
                                <span class="input-group-addon mergeicon">
                                    <span class="icn-folder-small"></span>
                                </span>
                                <textarea autocomplete="off" class="form-control" id="massage_link" name="massage_link" placeholder="Enter your massage name" required></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
          </div>
       <div class="modal-footer">
         <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
         <button type="submit" class="btn btn-primary">Submit</button> -->
       </div>
      </div>
      </div>
   </div>

   <div class="modal fade" id="linkModal" tabindex="-1" role="dialog" aria-labelledby="createNewFolderModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="createNewFolderModalLabel">Link File</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
          <div class="modal-body" data-simplebar>
                <div class="form-row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Link</label>
                            <div class="input-group input-group-lg input-with-icon">
                                <span class="input-group-addon mergeicon">
                                    <span class="icn-folder-small"></span>
                                </span>
                                <input class="form-control mergeInputfield w-100" id="anjlinkurl" name="anjlinkurl" readonly>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
       </div>
      </div>
      </div>
   </div>

   <!--Begin Drive Create Upload Folder Modal -->
    <div class="modal fade" id="createUploadFolderModal" tabindex="-1" role="dialog" aria-labelledby="createUploadFolderModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createUploadFolderModalLabel">Upload Folder</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" data-simplebar>
            <form action="<?php echo base_url('anj_drive/upload_file'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <input type="file" class="custom-file-input mergeInputfield" id="userfolder" name="userfile[]" onchange="getfolder(event)" webkitdirectory mozdirectory msdirectory odirectory directory multiple allowdirs required>
                            <label class="custom-file-label" for="userfolder">Choose File</label>
                            <input id="userfolderOLD" type="hidden" name="userfolderOLD" value="">
                            <input type="hidden" name="foldername" id="foldername" style="">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
          <div class="modal-footer">
              <div id="uploadStatusMsgfolder"></div> 
          </div>
        </div>
      </div>
    </div>
    <!-- End Drive Create Upload Folder Modal -->

   <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-keyboard="true" data-backdrop="static">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLongTitle">View Items</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> 
            </div>
            <div class="modal-body" id="viewimage">
            </div>
            <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> </div>
         </div>
      </div>
   </div>

   <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="createNewFolderModalLabel" aria-hidden="true" data-keyboard="true" data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="createNewFolderModalLabel">Delete items</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
          <div class="modal-body" data-simplebar>
                <div class="form-row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                     <input type='hidden' id='delete_id'>
                        Confirm that you want to delete 1 items. 
                    </div>
                </div>
          </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
         <button type="button" class="btn btn-primary" onclick="delete_files()">delete</button>
       </div>
      </div>
      </div>
   </div>

   <div class="modal fade" id="copyModal" tabindex="-1" role="dialog" aria-labelledby="createNewFolderModalLabel" aria-hidden="true" data-keyboard="true" data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="createNewFolderModalLabel">Copy items</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
          <div class="modal-body" data-simplebar>
                <div class="form-row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                      <input type='hidden' id='copy_id'> 
                    </div>
                </div>
          </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
         <button type="button" class="btn btn-primary" onclick="copy_files()">Copy</button>
       </div>
      </div>
      </div>
   </div>

   <!--Begin Drive Cretae New Folder Modal -->
    <div class="modal fade" id="createNewFolderModal" tabindex="-1" role="dialog" aria-labelledby="createNewFolderModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createNewFolderModalLabel">New Folder</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" data-simplebar>
            <form method="post">
                <div class="form-row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Enter name of new folder</label>
                            <div class="input-group input-group-lg input-with-icon">
                                <span class="input-group-addon mergeicon">
                                    <span class="icn-folder-small"></span>
                                </span>
                                <input type="text" id="create_folder_textbox" class="form-control mergeInputfield w-100" placeholder="Folder name">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" onclick="submit_new_folder()">Submit</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Drive Create New Folder Modal -->

    <!--Begin Drive Create Upload Link Modal -->`
    <div class="modal fade" id="createUploadLinkModal" tabindex="-1" role="dialog" aria-labelledby="createUploadLinkModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createUploadLinkModalLabel">Upload Link</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" data-simplebar>
            <form>
                <div class="form-row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Paste a URL below to upload a link or a file.</label>
                            <input type="text" id="upload_url" name="upload_url" class="form-control w-100" placeholder="Enter URL">
                            <span class="upload_url_error"></span>
                        </div>
                    </div>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="submitupload_url" onclick="ValidURL()">Upload</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Drive Create Upload Link Modal -->

    <!--Begin Drive Create Upload Files Modal -->
    <div class="modal fade" id="foldercreateUploadFilesModal" tabindex="-1" role="dialog" aria-labelledby="createUploadFilesModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createUploadFilesModalLabel">Upload Files</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" data-simplebar>

            <form action="<?php //echo base_url('anj_drive/folder_upload_file'); ?>" method="post" enctype="multipart/form-data">

                <div class="form-row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group mb-0">
                            <input type="hidden" name="new_foldername" id="new_foldername" value="<?php echo $this->uri->segment(2); ?>">
                            <input type="hidden" name="tbl_anjdrive_id" id="drive_id" value="<?php echo $this->uri->segment(3); ?>">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <input type="file" class="custom-file-input" id="one_file" name="userfile" onchange="ValidateSize(this)" required multiple>
                            <label class="custom-file-label" for="one_file">Choose File</label>
                        </div>
                    </div>
                </div>
               <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </form> 
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="progress progress-percent" style="display: none;">
                <div class="progress-bar progress-bar-striped progress-bar-animated"></div>
              </div>
            </div>
            </div>
          </div>
          <div class="modal-footer">
            <div id="uploadStatusMsg1"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Drive Create Upload Files Modal -->

    <!--Begin Drive Create Upload Files Modal -->
    <div class="modal fade" id="createUploadFilesModal" tabindex="-1" role="dialog" aria-labelledby="createUploadFilesModalLabel" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createUploadFilesModalLabel">Upload Files</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closedima()">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" data-simplebar>
            <!-- <form action="<?php echo base_url('anj_drive/one_to_one_file'); ?>" method="post" enctype="multipart/form-data"> -->
                <div class="form-row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <input type="file" class="custom-file-input" id="one_file_f" name="one_file" onchange="ValidateSize(this)" required/>
                            <label class="custom-file-label" for="one_file">Choose File</label>
                            <input id="one_fileOLD" type="hidden" name="one_fileOLD" value="">
                        </div>
                    </div>
                </div>
<!--                 <button type="submit" class="btn btn-primary" id="one_to_one_file">Submit</button>
 -->
            <!-- </form> -->
            
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="progress progress-percent" style="display: none;">
                <div class="progress-bar progress-bar-striped progress-bar-animated"></div>
              </div>
            </div>
            </div>

          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> 
            -->
            <div id="uploadStatusMsg"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Drive Create Upload Files Modal -->

