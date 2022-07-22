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
    <title>Tambah Data Detail Barang</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="../stylee.css">
</head>
<body class="bg-light">
    <div class="container border bg-grey p-3 mx-auto my-5">
        <h3 class="text-center">Tambah Data Detail Barang</h3>
        <div class="row">
            <div class="col">
                <a href="viewdata.php" class="btn btn-primary">View Data Detail Barang</a>
                <form method="POST" name="form" action="simpantambah.php">
                    <div class="form-row">
                        <!-- Id Barang -->
                        <div class="form-group col-md-4">
                            <label for="NoOrder">No Order</label>
                            <select class="form-control" id="NoOrder" name="NoOrder">
                                <option value="">Pilih No Order</option>
                                <?php
                                    $dataPemesanan = getListPemesanan();
                                    foreach ($dataPemesanan as $data) {
                                        echo "<option value=\"" . $data["NoOrder"] . "\">" . $data["NoOrder"] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <!-- Nama Barang -->
                        <div class="form-group col-md-4">
                            <label for="IdBarang">Nama Barang</label>
                            <select class="form-control" id="IdBarang" name="IdBarang">
                                <option value="">Pilih Nama Barang</option>
                                <?php
                                    $dataBarang = getListBarang();
                                    foreach ($dataBarang as $data) {
                                        echo "<option value=\"" . $data["IdBarang"] . "\">" . $data["NamaBarang"] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Jumlah">Jumlah</label>
                            <input type="text" class="form-control" id="Jumlah" name="Jumlah" placeholder="0">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="tblTambah">Tambah</button>
                </form>
            </div>
        </div>  
    </div>
</body>
</html>