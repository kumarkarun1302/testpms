<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">notification add</h1>
        <div class="card mb-4">
            <div class="card-body">
            <form method="POST" action="<?php echo base_url('admin/addNotification'); ?>">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="small mb-1" for="inputFirstName">notification name</label>
                            <input class="form-control py-4" name="title" id="title" type="text"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">massage</label>
                    <textarea class="form-control py-4" name="massage" id="massage"></textarea>
                </div>
                
                <div class="form-group mt-4 mb-0">
                    <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Create notification">
                </div>
                </form>
            </div>
        </div>
    </div>
</main>
</div>

