<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login");
	exit;
}
include "navbar.php";
include '../bot_bottle/koneksi.php';
$bulan       = query("SELECT waktu FROM history order by idmessage asc");
$jumlah = query("SELECT idmessage FROM history WHERE waktu='2020-08-22' order by idmessage asc");
?>
    <script src="js/Chart.bundle.js"></script>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Statisktik</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Bar Chart On Progress
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                             <div class="col-lg-10">
                                <canvas id="myChart" width="100" height="100"></canvas>
                            </div>
                            <script>
                                var ctx = document.getElementById("myChart");
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: [<?php foreach($bulan as $row) { echo '"' . $row['waktu'] . '",';}?>],
                                        datasets: [{
                                                label: '# of Votes',
                                                data: [<?php foreach($jumlah as $row) { echo '"' . $row['idmessage'] . '",';}?>],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)',
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgba(255,99,132,1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)',
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)'
                                                ],
                                                borderWidth: 1
                                            }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                        <!-- /.panel -->
               <!-- /.row -->
                </div>
            <!-- /#page-wrapper -->
            </div>
        </div>
    </div>
<?php include "footer.php"; ?>