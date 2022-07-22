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
    <title>Penyimpanan Edit Data Layanan</title>
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
            <h3 class="card-text">Edit Data Layanan</h3>
            <?php 
                if (isset($_POST["tblEdit"])) {
                    $db= dbConnect();
                    // BEGIN VALIDASI
                    $pesansalah = "";
                    //validasi Nama Layanan
                    $NamaLayanan = $db -> escape_string(trim($_POST["NamaLayanan"]));
                    if (strlen($NamaLayanan) == 0 || is_numeric($NamaLayanan)) {
                        $pesansalah .= "Nama Layanan tidak boleh kosong, dan tidak boleh angka!!<br>";
                    }
                    // validasi Harga
                    $Harga = $db -> escape_string($_POST["Harga"]);
                    if ((!is_numeric($Harga)) && ($Harga == 0)) {
                        $pesansalah .= "Harga harus berupa angka, Dan tidak boleh kosong!!<br>";
                    }
                    //SHOW PESAN SALAH
                    if ($pesansalah == "") {
                        ?>
                        <p class="card-text">Semua data valid.</p>
                        <?php
                        if ($db -> connect_errno == 0) {
                            $IdLayanan = $db -> escape_string($_POST["IdLayanan"]);
                            $sql = "UPDATE layanan SET
                                    IdLayanan = '$IdLayanan', NamaLayanan = '$NamaLayanan', Harga ='$Harga'
                                    WHERE IdLayanan = '$IdLayanan'
                                ";
                            $res = $db -> query($sql);
                            if ($res) {
                                if ($db -> affected_rows > 0) {
                                    ?>
                                    <p class="card-text">Data berhasil di update.</p>
                                    <a href="viewdata.php" class="btn btn-primary">View Data Layanan</a>
                                    <?php
                                } else {
                                    ?>
                                    <p class="card-text">Data berhasil di update, tanpa perubahan data.</p>
                                    <a href="javascript:history.back()" class="btn btn-primary">Edit Kembali</a>
                                    <a href="viewdata.php" class="btn btn-primary">View Data Layanan</a>
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
                        <p class="card-text">Terjadi kesalah berikut : <br></p>
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