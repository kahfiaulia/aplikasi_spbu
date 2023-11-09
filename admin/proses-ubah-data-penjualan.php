<?php
include("config.php");

if (isset($_POST['simpan'])){
    $no = $_POST['no_penjualan'];
    $tgl = $_POST['tgl_penjualan'];
    $id = $_POST['id_bbm'];
    $terjual = $_POST['bbm_terjual'];
    $total = $_POST['total_penjualan'];

    $sql = "UPDATE penjualan SET tgl_penjualan=STR_TO_DATE('$tgl','%Y-%m-%d'), id_bbm=$id, bbm_terjual=$terjual, total_penjualan = $total WHERE no_penjualan='$no'";
    $query = mysqli_query($db, $sql);

    if($query){
        header('Location: data-penjualan.php?status=sukses-ubah');
    } else{
        header('Location: data-penjualan.php?status=gagal-ubah');
    }
} else {
    die("Akses dilarang...");
}