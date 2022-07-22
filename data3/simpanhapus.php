<?php 
include_once("../functions.php");
session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyimpanan Hapus Data Layanan</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="../stylee.css">
</head>
<body class="bg-light">
    <div class="card shadow-lg bg-light kotak">
        <div class="card-body text-center">
            <h3 class="card-text">Hapus Data Layanan</h3>
            <?php
                if(isset($_POST["tblHapus"])) {
                    $db = dbConnect();
                    if ($db -> connect_errno == 0) {
                        $IdLayanan = $db -> escape_string($_POST["IdLayanan"]);
                        $sql = "DELETE FROM layanan WHERE IdLayanan = '$IdLayanan'";
                        $res = $db -> query($sql);
                        if ($res) {
                            if ($db -> affected_rows > 0) {
                                ?>
                                <p class="text-center">Data berhasil di hapus!</p>
                                <?php
                            } else {
                                ?>
                                <p class="text-center">Data tidak ada. Penghapusan gagal!</p>
                                <?php
                            }
                        } else {
                            ?>
                            <p class="text-center">Data gagal di hapus!</p>
                            <?php
                        }
                        ?>
                        <a href="viewdata.php" class="btn btn-primary">View Data Layanan</a>
                        <?php
                    } else {
                        echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db -> connect_error : "") . "<br>";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>