<?php
    include("config.php");
    if (isset($_POST['tambah-penjualan'])){
        $no = $_POST['no_penjualan'];
        $tgl = $_POST['tgl_penjualan'];
        $id = $_POST['id_bbm'];
        $terjual = $_POST['bbm_terjual'];
        $total = $_POST['total_penjualan'];

        $sql = "INSERT INTO penjualan (no_penjualan, tgl_penjualan, id_bbm, bbm_terjual, total_penjualan) VALUES ('$no', STR_TO_DATE('$tgl', '%Y-%m-%d'), $id, $terjual, $total)";
        $query = mysqli_query($db, $sql);

        if ($query){
            header('Location: data-penjualan.php?status=sukses-tambah');
        } else{
            header('Location: data-penjualan.php?status=gagal-tambah');
        }
    } else{
        die("Akses dilarang...");
    }
?>