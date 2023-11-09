<?php
include("config.php");

if (isset($_POST['simpan'])){
    $id = $_POST['id_bbm'];
    $nama = $_POST['nama_bbm'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok_bbm'];
    
    $sql = "UPDATE bensin SET nama_bbm='$nama', harga=$harga, stok_bbm=$stok WHERE id_bbm=$id";
    $query = mysqli_query($db, $sql);

    if($query){
        header('Location: stok-bbm.php?status=sukses-ubah');
    } else{
        header('Location: stok-bbm.php?status=gagal-ubah');
    }
} else {
    die("Akses dilarang...");
}