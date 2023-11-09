<?php
include("config.php");

if (!isset($_GET['id_bbm'])){
    header('Location: stok-bbm.php');
}

$id = $_GET['id_bbm'];
$sql = "SELECT * FROM bensin WHERE id_bbm=$id";
$query = mysqli_query($db, $sql);
$bbm = mysqli_fetch_assoc($query);

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
      width:200%;
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
                <h4 class="card-title ">Stok BBM</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        ID BBM
                      </th>
                      <th>
                        Nama BBM
                      </th>
                      <th>
                        Harga BBM
                      </th>
                      <th>
                        Stok BBM
                      </th>
                      <th>
                        Tindakan
                      </th>
                    </thead>
                    <tbody>
                    <?php
            $sql = "select * from bensin";
            $query = mysqli_query($db, $sql);
            while ($stok_bensin = mysqli_fetch_array($query)){
                echo "<tr>";
                echo "<td>".$stok_bensin['id_bbm']."</td>";
                echo "<td>".$stok_bensin['nama_bbm']."</td>";
                echo "<td> Rp. ".$stok_bensin['harga']."</td>";
                echo "<td>".$stok_bensin['stok_bbm']." L </td>";
                echo "<td>";
                echo "<a href='ubah-stok-bbm.php?id_bbm=".$stok_bensin['id_bbm']."'>Ubah</a> | ";
                echo "<a href='hapus-stok-bbm.php?id_bbm=".$stok_bensin['id_bbm']."' class = 'konfirmasi'>Hapus</a>";
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
                  <h4 class="card-title">Ubah Data Stok BBM</h4>
                  <p class="card-category">Silakan ubah data stok BBM di sini.</p>
                </div>
                <div class="card-body">
                  <form action="proses-ubah-stok-bbm.php" method="POST">
                    <div class="row">
                    <input type="hidden" name="id_bbm" value="<?php echo $bbm['id_bbm'] ?>" />
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="text-primary">Nama BBM</label>
                          <input type="text" class="form-control" name ="nama_bbm" value="<?php echo $bbm['nama_bbm'] ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="text-primary">Harga BBM (Rp)</label>
                          <input type="text" class="form-control" name= "harga" value="<?php echo $bbm['harga'] ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="text-primary">Stok BBM (L)</label>
                          <input type="text" class="form-control" name ="stok_bbm" value="<?php echo $bbm['stok_bbm'] ?>">
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