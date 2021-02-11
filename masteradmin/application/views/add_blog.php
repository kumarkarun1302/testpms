<?php
$blog_id = $this->uri->segment(3);
$query = $this->db->query("SELECT * FROM `tbl_blog` WHERE `blog_id`='$blog_id'");
$result = $query->row_array();
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="<?php echo base_url('dashboard/bloglists'); ?>" class="btn">Back</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    User add 
                </div>
                <div class="card-body">
                 <form method="POST" action="<?php echo base_url('adddb/add_blog'); ?>" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="blog_id" id="blog_id" value="<?php echo $blog_id; ?>">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">Title</label>
                                <input class="form-control" type="text" name="title" id="title" placeholder="title" value="<?php if(isset($result['title'])) { echo $result['title']; } ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">categories</label>
                                <input class="form-control" type="text" name="categories" id="categories" placeholder="categories" value="<?php if(isset($result['categories'])) { echo $result['categories']; } ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">tags</label>
                                <input class="form-control" type="text" name="tags" id="tags" placeholder="tags" value="<?php if(isset($result['tags'])) { echo $result['tags']; } ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">Blog Image</label>
                            <input class="form-control" type="file" name="blog_image" id="blog_image">
                                <input type="text" name="blog_imageOLD" id="blog_imageOLD" value="<?php if(isset($result['blog_image'])) { echo $result['blog_image']; } ?>">
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">Description</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4 mb-0">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary" value="submit">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
        