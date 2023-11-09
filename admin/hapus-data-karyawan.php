<?php
include("config.php");
if (isset($_GET['id_user'])){
    $id = $_GET['id_user'];
    $sql = "DELETE FROM users where id_user = $id";
    $query = mysqli_query($db, $sql);

    if ($query){
        header('Location: data-karyawan.php?status=sukses-hapus');
    } else{
        header('Location: data-karyawan.php?status=gagal-hapus');
    }
} else {
    die("Akses dilarang...");
}
?>