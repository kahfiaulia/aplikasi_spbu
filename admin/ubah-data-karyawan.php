<?php
include("config.php");

if (!isset($_GET['id_user'])){
    header('Location: data-karyawan.php');
}

$id = $_GET['id_user'];
$sql = "SELECT * FROM users WHERE id_user=$id";
$query = mysqli_query($db, $sql);
$karyawan = mysqli_fetch_assoc($query);

if(mysqli_num_rows($query) < 1){
    die ("Data tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Aplikasi SPBU
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
</head>

<body class="">
  <style media="screen">
    .button {
      width: 100%;
      height: 50px;
    }

    .left {
      float: left;
      display: block;
    }

    .right {
      float: right;
      display: block;
    }

    .button ul a {
      padding: 10px;
      background: rgb(116, 181, 12);
      color: white;
    }

    .main-panel {
      margin-top: 20px;
    }

    #tambah{
      width:100%;
    }

    .form-check, label {
    font-size: 14px;
    line-height: 1.42857;
    color: #b627b0;
    font-weight: 400;
}

  </style>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          Aplikasi SPBU
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="stok-bbm.php">
              <p>Stok BBM</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="data-penjualan.php">
              <p>Data Penjualan</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="data-karyawan.php">
              <p>Data Karyawan</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="logout.php">
              <p>Keluar</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Data Karyawan</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        ID Karyawan
                      </th>
                      <th>
                        Nama Karyawan
                      </th>
                      <th>
                        Alamat
                      </th>
                      <th>
                        Bagian
                      </th>
                      <th>
                        Gaji
                      </th>
                      <th>
                        Username
                      </th>
                      <th>
                        Password
                      </th>
                      <th>
                        Level User
                      </th>
                      <th>
                        Tindakan
                      </th>
                    </thead>
                    <tbody>
                    <?php
            $sql = "select * from users";
            $query = mysqli_query($db, $sql);
            while ($stok_bensin = mysqli_fetch_array($query)){
                echo "<tr>";
                echo "<td>".$stok_bensin['id_user']."</td>";
                echo "<td>".$stok_bensin['nama']."</td>";
                echo "<td>".$stok_bensin['alamat']."</td>";
                echo "<td>".$stok_bensin['bagian']."</td>";
                echo "<td>Rp. ".$stok_bensin['gaji']."</td>";
                echo "<td>".$stok_bensin['username']."</td>";
                echo "<td>".$stok_bensin['password']."</td>";
                echo "<td>".$stok_bensin['level_user']."</td>";
                echo "<td>";
                echo "<a href='ubah-data-karyawan.php?id_user=".$stok_bensin['id_user']."'>Ubah</a> | ";
                echo "<a href='hapus-data-karyawan.php?id_user=".$stok_bensin['id_user']."' class ='konfirmasi'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>   
          </div>
          <div class="main-panel" id="tambah">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Ubah Data Karyawan</h4>
                  <p class="card-category">Silakan ubah data karyawan di sini.</p>
                </div>
                <div class="card-body">
                  <form action="proses-ubah-data-karyawan.php" method="POST">
                    <div class="row">
                    <input type="hidden" name="id_user" value="<?php echo $karyawan['id_user'] ?>" />
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="text-primary">Nama Karyawan</label>
                          <input type="text" class="form-control" name ="nama" value="<?php echo $karyawan['nama'] ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="text-primary">Alamat</label>
                          <input type="text" class="form-control" name= "alamat" value="<?php echo $karyawan['alamat'] ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="text-primary">Bagian</label>
                          <input type="text" class="form-control" name ="bagian" value="<?php echo $karyawan['bagian'] ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="text-primary">Gaji</label>
                          <input type="text" class="form-control" name ="gaji" value="<?php echo $karyawan['gaji'] ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="text-primary">Username</label>
                          <input type="text" class="form-control" name ="username" value="<?php echo $karyawan['username'] ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="text-primary">Password</label>
                          <input type="text" class="form-control" name ="password" value="<?php echo $karyawan['password'] ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="text-primary" >Level User</label><br>
                          <?php $level = $karyawan['level_user']; ?>
                          <label><input type="radio" name="level_user" value="admin" <?php echo ($level == 'admin') ? "checked": "" ?>>  Admin</label><br>
                          <label><input type="radio" name="level_user" value="karyawan" <?php echo ($level == 'karyawan') ? "checked": "" ?>>  Karyawan</label>
                        </div>
                      </div>                      
                    </div>
                    <div class="button">
                  <ul class="right">
                    <input type="submit" value = "Ubah Data" name="simpan" class="btn btn-outline-primary">
                </ul>
                </div>
      </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript">
    var elems = document.getElementsByClassName('konfirmasi');
    var confirmIt = function (e) {
        if (!confirm('Apakah Anda yakin?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>
</html>