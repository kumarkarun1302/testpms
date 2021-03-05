<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Projects Add</h1>
        <a href="<?php echo base_url('admin'); ?>" class="btn">Back</a>
        <div class="card mb-4">
            <div class="card-body">
            <form method="POST" action="<?php echo base_url('admin/addProjects'); ?>">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputFirstName">project name</label>
                            <input class="form-control py-4" name="project_name" id="project_name" type="text"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputLastName">client Name</label>
                            <input class="form-control py-4" id="client_id" type="text" name="client_id" />
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputFirstName">start date</label>
                            <input class="form-control py-4" id="start_date" type="date" aria-describedby="emailHelp" name="start_date" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputLastName">deadline date</label>
                            <input class="form-control py-4" id="deadline" type="date" name="deadline" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="inputEmailAddress">project description</label>
                    <textarea class="form-control py-4" name="project_description" id="project_description"></textarea>
                </div>
                
                <div class="form-group mt-4 mb-0">
                    <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Create Project">
                </div>
                </form>
            </div>
        </div>
    </div>
</main>
</div>

