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
    <title>Penyimpanan Edit Data Pelanggan</title>
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
            <h3 class="card-text">Edit Data Pelanggan</h3>
            <?php 
                if (isset($_POST["tblEdit"])) {
                    $db= dbConnect();
                    // BEGIN VALIDASI
                    $pesansalah = "";
                    //validasi Nama dan Alamat
                    $Nama = $db -> escape_string(trim($_POST["Nama"]));
                    $Alamat = $db -> escape_string(trim($_POST["Alamat"]));
                    if (strlen($Nama) == 0 || is_numeric($Nama)) {
                        $pesansalah .= "Nama tidak boleh kosong, dan tidak boleh angka!!<br>";
                    }
                    if (strlen($Alamat) == 0 || is_numeric($Alamat)) {
                        $pesansalah .= "Alamat tidak boleh kosong, dan tidak boleh angka!!<br>";
                    }
                    // validasi No Hp
                    $NoHp = $db -> escape_string(trim($_POST["NoHp"]));
                    $NoHp = str_replace(")", "", $NoHp);
                    $NoHp = str_replace(".", "", $NoHp);
                    $NoHp = str_replace(",", "", $NoHp);
                    $NoHp = str_replace("-", "", $NoHp);
                    $NoHp = str_replace(" ", "", $NoHp);
                    if (is_string($NoHp)) {
                        if (strlen($NoHp) < 10) {
                            $pesansalah .= "Digit No Hp yang dimasukkan, kurang.<br>";
                        } else if (strlen($NoHp) > 13) {
                            $pesansalah .= "Digit No Hp yang dimasukkan, lebih.<br>";
                        }
                    } else {
                        $pesansalah .= "No Hp harus berupa angka!!<br>";
                    }
                    //SHOW PESAN SALAH
                    if ($pesansalah == "") {
                        ?>
                        <p class="card-text">Semua data valid.</p>
                        <?php
                        if ($db -> connect_errno == 0) {
                            $IdPelanggan = $db -> escape_string($_POST["IdPelanggan"]);
                            $sql = "UPDATE pelanggan SET
                                    IdPelanggan = '$IdPelanggan', Nama = '$Nama', Alamat ='$Alamat', NoHp = '$NoHp'
                                    WHERE IdPelanggan = '$IdPelanggan'
                                ";
                            $res = $db -> query($sql);
                            if ($res) {
                                if ($db -> affected_rows > 0) {
                                    ?>
                                    <p class="card-text">Data berhasil di update.</p>
                                    <a href="viewdata.php" class="btn btn-primary">View Data Pelanggan</a>
                                    <?php
                                } else {
                                    ?>
                                    <p class="card-text">Data berhasil di update, tanpa perubahan data.</p>
                                    <a href="javascript:history.back()" class="btn btn-primary">Edit Kembali</a>
                                    <a href="viewdata.php" class="btn btn-primary">View Data Pelanggan</a>
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