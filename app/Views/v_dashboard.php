<!DOCTYPE html>
<html lang="en">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<body>
<div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Table Aktual</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?=base_url('Table/tableAktual')?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Table Stake Out</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?=base_url('Table/tableStakeout')?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Map Aktual</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?=base_url('Map/viewMapAktual')?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <!-- CHART -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Map Stakeout</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?=base_url('Map/viewMapStakeout')?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Progres Pengukuran Aktual
                                    </div>
                                    <div class="card-body"><canvas id="chart1" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Progres Pengukuran Stake Out
                                    </div>
                                    <div class="card-body"><canvas id="chart2" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
</div>
</body>
<!-- START PHP FOR AKTUAL -->
<?php foreach ($AKTUAL as $key => $akt) {
    $db = \Config\Database::connect();
    $akt_bmo = $db->table('AKTUAL')
    ->where('site','BMO')
    ->countAllResults();

    $akt_gmo = $db->table('AKTUAL')
    ->where('site','GMO')
    ->countAllResults();

    $akt_pmo = $db->table('AKTUAL')
    ->where('site','PMO')
    ->countAllResults();

    $akt_lmo = $db->table('AKTUAL')
    ->where('site','LMO')
    ->countAllResults();

    $akt_gt = $db->table('AKTUAL')
    ->where('site','GUNTA')
    ->countAllResults();

    $akt_pnn = $db->table('AKTUAL')
    ->where('site','PUNAN')
    ->countAllResults();
}?>
<!-- END PHP FOR AKTUAL -->

<!-- START PHP FOR STAKEOUT -->
<?php foreach ($STAKEOUT as $key => $sto) {
    $db = \Config\Database::connect();
    $sto_bmo = $db->table('STAKEOUT')
    ->where('site','BMO')
    ->countAllResults();

    $sto_gmo = $db->table('STAKEOUT')
    ->where('site','GMO')
    ->countAllResults();

    $sto_pmo = $db->table('STAKEOUT')
    ->where('site','PMO')
    ->countAllResults();

    $sto_lmo = $db->table('STAKEOUT')
    ->where('site','LMO')
    ->countAllResults();

    $sto_pnn = $db->table('STAKEOUT')
    ->where('site','PUNAN')
    ->countAllResults();
}?>
<!-- END PHP FOR STAKEOUT -->

<!-- START PHP FOR SUMMARY SURVEYOR -->
<?php foreach ($STAKEOUT as $key => $sto) {
    $db = \Config\Database::connect();
    $sto_bmo = $db->table('STAKEOUT')
    ->where('site','BMO')
    ->countAllResults();

    $sto_gmo = $db->table('STAKEOUT')
    ->where('site','GMO')
    ->countAllResults();

    $sto_pmo = $db->table('STAKEOUT')
    ->where('site','PMO')
    ->countAllResults();

    $sto_lmo = $db->table('STAKEOUT')
    ->where('site','LMO')
    ->countAllResults();

    $sto_pnn = $db->table('STAKEOUT')
    ->where('site','PUNAN')
    ->countAllResults();
}?>

<!-- END PHP FOR SUMMARY SURVEYOR -->



<script>
const chart1 = document.getElementById('chart1');
var myLineChart = new Chart(chart1, {
  type: 'pie',
  data: {
    labels: ["BMO", "GMO", "PMO", "LMO","GUNTA","PUNAN"],
    datasets: [{
      data: [<?= $akt_bmo?>, <?= $akt_gmo?>, <?= $akt_pmo?>, <?= $akt_lmo?>,<?= $akt_gt?>, <?= $akt_pnn?>],
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745','#28a760','#28a5a0' ],
    }],
  },
});

const chart2 = document.getElementById('chart2');
var myLineChart = new Chart(chart2, {
  type: 'pie',
  data: {
    labels: ["BMO", "GMO", "PMO", "LMO", "PUNAN"],
    datasets: [{
      data: [<?= $sto_bmo?>, <?= $sto_gmo?>, <?= $sto_pmo?>, <?= $sto_lmo?>, <?= $sto_pnn?>],
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
    }],
  },
});
</script>