<?php
session_start();
require 'config.php';

if ( isset($_POST['username']) && isset($_POST['password']) ) {
    
    $sql_check = "SELECT nama, level_user, 
                         id_user 
                  FROM users 
                  WHERE 
                       username=? 
                       AND 
                       password=? 
                  LIMIT 1";

    $check_log = $db->prepare($sql_check);
    $check_log->bind_param('ss', $username, $password);

    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_log->execute();

    $check_log->store_result();

    if ( $check_log->num_rows == 1 ) {
        $check_log->bind_result($nama, $level_user, $id_user);

        while ( $check_log->fetch() ) {
            $_SESSION['user_login']    = $level_user;
            $_SESSION['sess_id']    = $id_user;
            $_SESSION['nama']       = $nama;
            
        }

        $check_log->close();

        header("location:$level_user/stok-bbm.php");
        exit();

    } else {
        header('location: login.php?error='.base64_encode('Usename atau Password Salah!'));
        exit();
    }

   
} else {
    header('location:login.php');
    exit();
}