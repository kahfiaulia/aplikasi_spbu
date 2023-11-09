<?php
    include("config.php");
    if (isset($_POST['tambah-karyawan'])){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $bagian = $_POST['bagian'];
        $gaji = $_POST['gaji'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level_user'];

        $sql = "INSERT INTO users (nama, alamat, bagian, gaji, username, password, level_user) VALUES ('$nama', '$alamat', '$bagian', $gaji, '$username', '$password', '$level')";
        $query = mysqli_query($db, $sql);

        if ($query){
            header('Location: data-karyawan.php?status=sukses-tambah');
        } else{
            header('Location: data-karyawan.php?status=gagal-tambah');
        }
    } else{
        die("Akses dilarang...");
    }
?>