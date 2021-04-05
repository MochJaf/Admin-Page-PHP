<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login");
	exit;
}
include "navbar.php";
include '../bot_bottle/koneksi.php';
$salesforce = query("SELECT * FROM akun");
$jumlah = count($salesforce);
?>
    
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Akun Karyawan</h1>
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
                                    <th>Nomor</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>KCONTACT</th>
                                    <th>Datel</th>
                                    <th>Agency</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($salesforce as $row) :
                                ?>
                                    <tr align=center>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row["username"]; ?></td>
                                        <td><?php echo $row["nama_lengkap"]; ?></td>
                                        <td><?php echo $row["kcontact"]; ?></td>
                                        <td><?php echo $row["datel"]; ?></td>
                                        <td><?php echo $row["agency"]; ?></td>
                                        <td>
                                            <a href="ubah?username=<?= $row["username"];?>">
                                                <button type="button" class="btn btn-warning">Ubah</button>
                                            </a>
                                            <a href="hapus?username=<?= $row["username"];?>">
                                                <button type="button" class="btn btn-danger" onclick="return confirm('Hapus data yang dipilih?');">Hapus</button>
                                            </a>
                                        </td>
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