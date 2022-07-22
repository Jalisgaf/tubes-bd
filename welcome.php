<?php 
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php?error=4");
}

include_once("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="stylee.css">
</head>
<body class="bg-light">  
    <div class="container-fluid">
        <div class="row">
        <div class="col-2">
            <div class="list-group">
                <a href="welcome.php" class="list-group-item list-group-item-action active"><?= ($_SESSION["username"] == "admin") ? "Pak Andri" : ucfirst($_SESSION["username"]); ?></a>
                <a href="./data1/viewdata.php" class="list-group-item list-group-item-action">Data Pemesanan</a>
                <a href="./data2/viewdata.php" class="list-group-item list-group-item-action">Data Pelanggan</a>
                <a href="./data3/viewdata.php" class="list-group-item list-group-item-action">Data Layanan</a>
                <a href="./data4/viewdata.php" class="list-group-item list-group-item-action">Data Barang</a>
                <a href="./data5/viewdata.php" class="list-group-item list-group-item-action">Data Detail Barang</a>
                <a href="./data6/viewdata.php" class="list-group-item list-group-item-action">Data Detail Layanan</a>
                <a href="logout.php" class="list-group-item list-group-item-action">Keluar</a>
            </div>
        </div>
        <div class="col-10">
            <div class="jumbotron text-center bg-grey">
                <h1>Selamat Datang <?= ($_SESSION["username"] == "admin") ? "Pak Andri" : ucfirst($_SESSION["username"]); ?></h1>
            </div>
        </div>
        </div>
    </div>
</body>
</html>