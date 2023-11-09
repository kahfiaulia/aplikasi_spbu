<?php
include("config.php");
if (isset($_GET['id_bbm'])){
    $id = $_GET['id_bbm'];
    $sql = "DELETE FROM bensin where id_bbm = $id";
    $query = mysqli_query($db, $sql);

    if ($query){
        header('Location: stok-bbm.php?status=sukses-hapus');
    } else{
        header('Location: stok-bbm.php?status=gagal-hapus');
    }
} else {
    die("Akses dilarang...");
}
?>