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
    <title>Penyimpanan Edit Data Detail Layanan</title>
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
            <h3 class="card-text">Edit Data Detail Layanan</h3>
            <?php 
                if (isset($_POST["tblEdit"])) {
                    $db= dbConnect();
                    // BEGIN VALIDASI
                    $pesansalah = "";
                    $NoOrder = $db -> escape_string($_POST["NoOrder"]);
                    if ($NoOrder == "") {
                        $pesansalah .= "Harus memilih No Order!!<br>";
                    }

                    //Validasi NamaBarang
                    $IdLayanan = $db -> escape_string($_POST["IdLayanan"]);
                    if ($IdLayanan == "") {
                        $pesansalah .= "Harus memilih Nama Layanan!!<br>";
                    }

                    //SHOW PESAN SALAH
                    if ($pesansalah == "") {
                        ?>
                        <p class="card-text">Semua data valid.</p>
                        <?php
                        if ($db -> connect_errno == 0) {
                            $NoOrder = $db -> escape_string($_POST["NoOrder"]);
                            $IdLayanan = $db -> escape_string($_POST["IdLayanan"]);
                            $id = $db -> escape_string($_POST["id"]);
                            $sql = "UPDATE detail_Layanan SET
                                    NoOrder = '$NoOrder', IdLayanan = '$IdLayanan'
                                    WHERE id = '$id'
                                ";
                            $res = $db -> query($sql);
                            if ($res) {
                                if ($db -> affected_rows > 0) {
                                    ?>
                                    <p class="card-text">Data berhasil di update.</p>
                                    <a href="viewdata.php" class="btn btn-primary">View Data Detail Layanan</a>
                                    <?php
                                } else {
                                    ?>
                                    <p class="card-text">Data berhasil di update, tanpa perubahan data.</p>
                                    <a href="javascript:history.back()" class="btn btn-primary">Edit Kembali</a>
                                    <a href="viewdata.php" class="btn btn-primary">View Data Detail Layanan</a>
                                    <?php
                                }
                            } else {
                                ?>
                                <p class="card-text">Data gagal di simpan.</p>
                                <a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
                                <?php
                                echo "Error : " . $db -> error;
                            }
                        } else {
                            echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db -> connect_error : "") . "<br>";
                        }
                    } else {
                        ?>
                        <p class="card-text">Terjadi kesalahan berikut : <br></p>
                        <p class="card-text"><?= $pesansalah; ?></p>
                        <a href="javascript:history.back()" class="btn btn-primary">Kembali Ke Form</a>
                        <?php
                    }
                    // END VALIDASI
                } else {
                    ?>
                    <p class="card-text">Isi data melalui form!!!</p>
                    <?php
                }
            ?>
        </div>
    </div>
</body>
</html>