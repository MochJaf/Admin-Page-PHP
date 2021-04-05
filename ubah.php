<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
} 

include "navbar.php";
include '../bot_bottle/koneksi.php';

//ambil data
$username = $_GET["username"];
$dataAkun = query("SELECT * FROM akun WHERE username ='$username'")[0];

if(isset($_POST["submit"]) > 0){
    if(ubah($_POST)>0){
        echo "
        <script>
            alert('Data berhasil diubah!');
            document.location.href = 'akun';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('Data gagal diubah!');
            document.location.href = 'akun';
        </script>
        ";
    }
}
?>
    
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ubah Data</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
        <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Silahkan isi form dengan benar
                </div>
                <div class="panel-body">
                    <form action="" method="POST" class="col-md-6">
                      <div class="form-group float-right">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" readonly value="<?= $dataAkun["username"]; ?>">
                      </div>
                      <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $dataAkun["nama_lengkap"]; ?>">
                      </div>
                      <div class="form-group">
                        <label for="kcontact">Kcontact</label>
                        <input type="text" class="form-control" name="kcontact" id="kcontact" value="<?= $dataAkun["kcontact"]; ?>">
                      </div>
                      <label for="datel">Datel</label>
                      <select name="datel" class="form-control form-group">
                        <option><?= $dataAkun["datel"]; ?></option>
                        <option>INNER KWA</option>
                        <option>SUBANG</option>
                        <option>PWK</option>
                      </select>
                      <label for="agency">Agency</label>
                      <select name="agency" class="form-control form-group">
                        <option><?= $dataAkun["agency"]; ?></option>
                        <option> AIS INNER KWA </option>
                        <option> AIS PWK </option>
                        <option> BMS INNER KWA </option>
                        <option> CKW A PWK </option>
                        <option> CKW B PWK </option>
                        <option> GBK INNER KWA </option>
                        <option> GBK PWK </option>
                        <option> GML INNER KWA </option>
                        <option> HARKAT A SUBANG </option>
                        <option> HARKAT B SUBANG </option>
                        <option> IMD A INNER KWA </option>
                        <option> IMD B INNER KWA </option>
                        <option> IMD C PWK </option>
                        <option> IMD D SUBANG </option>
                        <option> KSP </option>
                        <option> MCP A INNER KWA </option>
                        <option> MCP B CKP </option>
                        <option> MCP C INNER KWA </option>
                        <option> MCP D PWK </option>
                        <option> MCP E SUBANG </option>
                        <option> RAR INNER KWA </option>
                      </select>
                      <button type="submit" class="btn btn-primary pull-right" style=margin:8px; name="submit">Submit</button>
                    </form>  
                </div>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
<!-- /#page-wrapper -->
</div>
<?php include "footer.php"; ?>