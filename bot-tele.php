<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login");
	exit;
}
include "navbar.php";
include '../bot_bottle/koneksi.php';
$history = query("SELECT * FROM history ORDER BY waktu DESC");
?>
    
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Penggunaan Bot</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        DataTables Advanced Tables
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                               <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">Iduser</th>
                                <th scope="col">Perintah</th>
                                <th scope="col">Isi Pesan</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($history as $row) :
                                ?>
                                    <tr align=center>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row["nama"]; ?></td>
                                        <td><?php echo $row["username"]; ?></td>
                                        <td><?php echo $row["iduser"]; ?></td>
                                        <td><?php echo $row["perintah"]; ?></td>
                                        <td><?php echo $row["isi"]; ?></td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
<!-- /#page-wrapper -->

</div>
<?php include "footer.php"; ?>