<?php
include("config.php");
if (isset($_GET['no_penjualan'])){
    $no_penjualan = $_GET['no_penjualan'];
    $sql = "DELETE FROM penjualan where no_penjualan = '$no_penjualan'";
    $query = mysqli_query($db, $sql);

    if ($query){
        header('Location: data-penjualan.php?status=sukses-hapus');
    } else{
        header('Location: data-penjualan.php?status=gagal-hapus');
    }
} else {
    die("Akses dilarang...");
}
?>