<?php
    include("config.php");
    if (isset($_POST['tambah-stok'])){
        $nama = $_POST['nama_bbm'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['stok_bbm'];

        $sql = "INSERT INTO bensin (nama_bbm, harga, stok_bbm) VALUES ('$nama', $harga, $jumlah)";
        $query = mysqli_query($db, $sql);

        if ($query){
            header('Location: stok-bbm.php?status=sukses-tambah');
        } else{
            header('Location: stok-bbm.php?status=gagal-tambah');
        }
    } else{
        die("Akses dilarang...");
    }
?>