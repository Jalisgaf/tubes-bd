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
    <title>Penyimpanan Tambah Data Pemesanan</title>
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
            <h3 class="card-text">Penyimpanan Data Pemesanan</h3>
            <?php 
                if (isset($_POST["tblTambah"])) {
                    $db= dbConnect();
                    // BEGIN VALIDASI
                    $pesansalah = "";
                    //validasi NoOrder
                    $NoOrder = $db -> escape_string(trim($_POST["NoOrder"]));
                    if ((strlen($NoOrder) < 3) || (strlen($NoOrder) > 5) || (strlen($NoOrder) == 0)) {
                        $pesansalah .= "No Order tidak sah. Dan tidak boleh kosong!!<br>";
                    } else {
                        $res = $db -> query("SELECT COUNT(*) banyakData FROM pemesanan WHERE NoOrder = '$NoOrder'");
                        if ($res) {
                            $data = $res -> fetch_assoc();
                            if ($data["banyakData"]) {
                                $pesansalah .= "No Order sudah ada dalam data.<br>";
                            } elseif (!is_numeric($NoOrder)) {
                                $pesansalah .= "No Order berupa angka!<br>";
                            }
                        } else {
                            $pesansalah .= "Data tidak ditemukan.";
                        }
                    }
                    //validasi Nama
                    $IdPelanggan = $db -> escape_string($_POST["IdPelanggan"]);
                    if ($IdPelanggan == "") {
                        $pesansalah .= "Harus memilih Nama Pelanggan!!<br>";
                    }

                    //validasi Tanggal Masuk
                    $tglMasuk = $_POST["tglMasuk"];
                    $blnMasuk = $_POST["blnMasuk"];
                    $thnMasuk = $_POST["thnMasuk"];
                    $dateMasuk = $db -> escape_string($thnMasuk . "-" . $blnMasuk . "-" . $tglMasuk);
                    if (is_numeric($tglMasuk) && is_numeric($blnMasuk) && is_numeric($thnMasuk)) {
                        if (!checkdate($blnMasuk, $tglMasuk, $thnMasuk)) {
                            $pesansalah .= "Tanggal Masuk tidak valid.<br>";
                        }
                    } else {
                        $pesansalah .= "Tanggal Masuk harus dipilih!!<br>";
                    }

                    //validasi Tanggal Selesai
                    $tglSelesai = $_POST["tglSelesai"];
                    $blnSelesai = $_POST["blnSelesai"];
                    $thnSelesai = $_POST["thnSelesai"];
                    $dateSelesai = $db -> escape_string($thnSelesai . "-" . $blnSelesai . "-" . $tglSelesai);
                    if (is_numeric($tglSelesai) && is_numeric($blnSelesai) && is_numeric($thnSelesai)) {
                        if (!checkdate($blnSelesai, $tglSelesai, $thnSelesai)) {
                            $pesansalah .= "Tanggal Selesai tidak valid.<br>";
                        }
                        if ($dateMasuk > $dateSelesai) {
                            $pesansalah .= "Tanggal Selesai harus lebih diatas!!<br>";
                        }
                    } else {
                        $pesansalah .= "Tanggal Selesai harus dipilih!!<br>";
                    }

                    // validasi Berat
                    $Berat = $db -> escape_string($_POST["Berat"]);
                    if ((!is_numeric($Berat)) && ($Berat == 0)) {
                        $pesansalah .= "Berat harus berupa angka, Dan tidak boleh kosong!!<br>";
                    }

                    //validasi TotalHarga
                    $TotalHarga = $db -> escape_string($_POST["TotalHarga"]);
                    if ((!is_numeric($TotalHarga)) && ($TotalHarga == 0)) {
                        $pesansalah .= "Total Harga harus berupa angka, Dan tidak boleh kosong!!<br>";
                    }
                    
                    //SHOW PESAN SALAH
                    if ($pesansalah == "") {
                        ?>
                        <p class="card-text">Semua data valid.</p>
                        <?php
                        if ($db -> connect_errno == 0) {
                            $sql = "INSERT INTO pemesanan(NoOrder, IdPelanggan, TglMasuk, TglSelesai, Berat, TotalHarga)
                                    VALUES('$NoOrder', '$IdPelanggan', '$dateMasuk', '$dateSelesai', $Berat, $TotalHarga)
                                ";
                            $res = $db -> query($sql);
                            if ($res) {
                                if ($db -> affected_rows > 0) {
                                    ?>
                                    <p class="card-text">Data berhasil di simpan.</p>
                                    <a href="viewdata.php" class="btn btn-primary">View Data Pemesanan</a>
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
                    <a href="tambahdata.php" class="btn btn-primary">Tambah Data Pemesanan</a>
                    <?php
                }
            ?>
        </div>
    </div>
</body>
</html>