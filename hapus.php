<?php
require '../bot_bottle/koneksi.php';

$username = $_GET["username"];

if(hapus($username)>0){
    echo "
    <script>
        alert('Data berhasil dihapus!');
        document.location.href = 'akun';
    </script>
    ";
}else{
    echo "
    <script>
        alert('Data gagal dihapus!');
        document.location.href = 'akun';
    </script>
    ";
}

?>