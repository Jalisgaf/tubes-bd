<?php 
// session_start();
// if (!isset($_SESSION["username"])) {
//     header("Location: index.php?error=4");
// }

include_once("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("../head.php"); ?>
</head>
<body class="bg-light">  
    <div class="container-fluid">
        <div class="row">
        <div class="col-2">
            <div class="list-group">
                <!-- <a href="welcome.php" class="list-group-item list-group-item-action active"><?= ($_SESSION["username"] == "admin") ? "Pak Andri" : ucfirst($_SESSION["username"]); ?></a> -->
                <a href="./pemesanan/viewdata.php" class="list-group-item list-group-item-action">Data Pemesanan</a>
                <a href="./pelanggan/viewdata.php" class="list-group-item list-group-item-action">Data Pelanggan</a>
                <a href="./layanan/viewdata.php" class="list-group-item list-group-item-action">Data Layanan</a>
                <a href="./barang/viewdata.php" class="list-group-item list-group-item-action">Data Barang</a>
                <a href="./detail-barang/viewdata.php" class="list-group-item list-group-item-action">Data Detail Barang</a>
                <a href="./detail-layanan/viewdata.php" class="list-group-item list-group-item-action">Data Detail Layanan</a>
                <a href="logout.php" class="list-group-item list-group-item-action">Keluar</a>
            </div>
        </div>
        <div class="col-10">
            <div class="jumbotron text-center bg-grey">
                <!-- <h1>Selamat Datang <?= ($_SESSION["username"] == "admin") ? "Pak Andri" : ucfirst($_SESSION["username"]); ?></h1> -->
            </div>
        </div>
        </div>
    </div>
</body>
</html>