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
    <title>Tambah Data Detail Layanan</title>
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
        <h3 class="text-center">Tambah Data Detail Layanan</h3>
        <div class="row">
            <div class="col">
                <a href="viewdata.php" class="btn btn-primary">View Data Detail Layanan</a>
                <form method="POST" name="form" action="simpantambah.php">
                    <div class="form-row">
                        <!-- Id Layanan -->
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
                        <!-- Nama Layanan -->
                        <div class="form-group col-md-4">
                            <label for="IdLayanan">Nama Layanan</label>
                            <select class="form-control" id="IdLayanan" name="IdLayanan">
                                <option value="">Pilih Nama Layanan</option>
                                <?php
                                    $dataLayanan = getListLayanan();
                                    foreach ($dataLayanan as $data) {
                                        echo "<option value=\"" . $data["IdLayanan"] . "\">" . $data["NamaLayanan"] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>  
                    </div>
                    <button type="submit" class="btn btn-primary" name="tblTambah">Tambah</button>
                </form>
            </div>
        </div>  
    </div>
</body>
</html>
