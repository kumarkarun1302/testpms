<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">template add</h1>
        <div class="card mb-4">
            <div class="card-body">
            <form method="POST" action="<?php echo base_url('admin/addEmailtemplates'); ?>">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="small mb-1" for="inputFirstName">template name</label>
                            <input class="form-control py-4" name="template_name" id="template_name" type="text"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="small mb-1" for="inputFirstName">email subject</label>
                            <input class="form-control py-4" id="email_subject" type="text" name="email_subject" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">Email description</label>
                    <textarea class="form-control py-12" rows="10" cols="50" name="custom_message" id="custom_message" style="width: 100%;"></textarea>
                </div>
                <div class="form-group mt-4 mb-0">
                    <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Create Email Template">
                </div>
                </form>
            </div>
        </div>
    </div>
</main>
</div>

