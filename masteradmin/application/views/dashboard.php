           
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card  mb-4">
                                    <div class="card-body">Total Project / <?php echo $total_projects; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small stretched-link" href="#">View Details</a>
                                        <div class="small"><i class="fas fa-angle-right"></i>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">Total Tasks / <?php echo $total_task; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small stretched-link" href="#">View Details</a>
                                        <div class="small"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">Total Users / <?php echo $total_users; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small stretched-link" href="#">View Details</a>
                                        <div class="small"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">Total Role / <?php echo $total_role; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small stretched-link" href="#">View Details</a>
                                        <div class="small"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Technology use to projects 
                                    </div>
                                    <div class="card-body" id="lasttenProjectChart" width="100%" height="40"></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Organization type wise users
                                    </div>
                                    <div class="card-body" id="myBarChart" width="100%" height="40"></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </main>
               <footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between small">
        <div class="text-muted">Copyright &copy; ANJPMS <?php echo date('Y'); ?></div>
        <div>
            <a href="#">Privacy Policy</a>
            &middot;
            <a href="#">Terms &amp; Conditions</a>
        </div>
    </div>
</div>
</footer>
</div>

 </div>
       
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/demo/datatables-demo.js'); ?>"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>

<script type="text/javascript">

$(document).ready(function() {

var cht_cloumn_data = JSON.parse(`<?php echo $chart_data_cloumn; ?>`);
var cht_cloumn_data_project = JSON.parse(`<?php echo $cht_cloumn_data_project; ?>`);

Highcharts.chart('lasttenProjectChart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Technology use to projects'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent users'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: "Browsers",
            colorByPoint: true,
            data: cht_cloumn_data_project
        }
    ],
});

Highcharts.chart('myBarChart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Organization type wise users'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent users'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: "Browsers",
            colorByPoint: true,
            data: cht_cloumn_data
        }
    ],
});

});
</script>
</body>
</html>
       
