<?php
include("config.php");

if (isset($_POST['simpan'])){
    $id = $_POST['id_user'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $bagian = $_POST['bagian'];
    $gaji = $_POST['gaji'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level_user'];

    $sql = "UPDATE users SET nama = '$nama', alamat='$alamat', bagian='$bagian', gaji = '$gaji', username = '$username', password = '$password', level_user = '$level' WHERE id_user='$id'";
    $query = mysqli_query($db, $sql);

    if($query){
        header('Location: data-karyawan.php?status=sukses-ubah');
    } else{
        header('Location: data-karyawan.php?status=gagal-ubah');
    }
} else {
    die("Akses dilarang...");
}