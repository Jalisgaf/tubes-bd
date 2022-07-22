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
    <title>Tambah Data Barang</title>
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
        <h3 class="text-center">Edit Data Barang</h3>
        <div class="row">
            <div class="col">
                <?php
                if (isset($_GET["IdBarang"])) {
                    $db = dbConnect();
                    $IdBarang = $db -> escape_string($_GET["IdBarang"]);
                    if ($dataBarang = getDataBarang($IdBarang)) {
                        ?>
                        <a href="viewdata.php" class="btn btn-primary">View Data Barang</a>
                        <form method="POST" name="form" action="simpanupdate.php">
                            <div class="form-row">
                                <!-- Id Barang -->
                                <div class="form-group col-md-4">
                                    <label for="IdBarang">Id Barang</label>
                                    <input type="text" class="form-control" id="IdBarang" name="IdBarang" placeholder="Id Barang" value="<?= $dataBarang["IdBarang"]; ?>" readonly>
                                </div>
                                <!-- Nama Barang -->
                                <div class="form-group col-md-4">
                                    <label for="NamaBarang">Nama Barang</label>
                                    <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" placeholder="Nama Barang" value="<?= $dataBarang["NamaBarang"]; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblEdit">Update</button>
                        </form>
                        <?php
                    } else {
                        ?>
                        <p class="text-center">Barang dengan Id Barang : <?$IdBarang;?> tidak ditemukan. Edit Batal!</p>
                        <?php
                    }
                } else {
                    ?>
                    <p class="text-center">Id Layanan tidak ada. Edit Batal!</p>
                    <?php
                }
                ?>
            </div>
        </div>  
    </div>
</body>
</html>