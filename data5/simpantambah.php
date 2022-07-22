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
    <title>Penyimpanan Tambah Data Detail Barang</title>
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
            <h3 class="card-text">Penyimpanan Data Detail Barang</h3>
            <?php 
                if (isset($_POST["tblTambah"])) {
                    $db= dbConnect();
                    // BEGIN VALIDASI
                    $pesansalah = "";
                    //validasi NoOrder
                    $NoOrder = $db -> escape_string($_POST["NoOrder"]);
                    if ($NoOrder == "") {
                        $pesansalah .= "Harus memilih No Order!!<br>";
                    }

                    //Validasi NamaBarang
                    $IdBarang = $db -> escape_string($_POST["IdBarang"]);
                    if ($IdBarang == "") {
                        $pesansalah .= "Harus memilih Nama Barang!!<br>";
                    }

                    // validasi Jumlah
                    $Jumlah = $db -> escape_string($_POST["Jumlah"]);
                    if ((!is_numeric($Jumlah)) && ($Jumlah == 0)) {
                        $pesansalah .= "Jumlah harus berupa angka, Dan tidak boleh kosong!!<br>";
                    }
                    
                    //SHOW PESAN SALAH
                    if ($pesansalah == "") {
                        ?>
                        <p class="card-text">Semua data valid.</p>
                        <?php
                        if ($db -> connect_errno == 0) {
                            $sql = "INSERT INTO detail_barang(NoOrder, IdBarang, Jumlah)
                                    VALUES('$NoOrder', '$IdBarang', '$Jumlah')
                                ";
                            $res = $db -> query($sql);
                            if ($res) {
                                if ($db -> affected_rows > 0) {
                                    ?>
                                    <p class="card-text">Data berhasil di simpan.</p>
                                    <a href="viewdata.php" class="btn btn-primary">View Data Detail Barang</a>
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
                    <a href="tambahdata.php" class="btn btn-primary">Tambah Data Detail Barang</a>
                    <?php
                }
            ?>
        </div>
    </div>
</body>
</html>