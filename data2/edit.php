<?php include_once("../functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pelanggan</title>
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
        <h3 class="text-center">Edit Data Pelanggan</h3>
        <div class="row">
            <div class="col">
                <?php
                if (isset($_GET["IdPelanggan"])) {
                    $db = dbConnect();
                    $IdPelanggan = $db -> escape_string($_GET["IdPelanggan"]);
                    if ($dataPelanggan = getDataPelanggan($IdPelanggan)) {
                        ?>
                        <a href="viewdata.php" class="btn btn-primary">View Data Pelanggan</a>
                        <form method="POST" name="form" action="simpanupdate.php">
                            <div class="form-row">
                                <!-- Id Pelanggan -->
                                <div class="form-group col-md-4">
                                    <label for="IdPelanggan">Id Pelanggan</label>
                                    <input type="text" class="form-control" id="IdPelanggan" name="IdPelanggan" placeholder="Id Pelanggan" value="<?= $dataPelanggan["IdPelanggan"]; ?>" readonly>
                                </div>
                                <!-- Nama Pelanggan -->
                                <div class="form-group col-md-4">
                                    <label for="Nama">Nama Pelanggan</label>
                                    <input type="text" class="form-control" id="Nama" name="Nama" placeholder="Nama Pelanggan" value="<?= $dataPelanggan["Nama"]; ?>">
                                </div>
                                <!-- No Hp -->
                                <div class="form-group col-md-4">
                                    <label for="NoHp">No Handphone [Format : 081234xxxx]</label>
                                    <input type="text" class="form-control" id="NoHp" name="NoHp" placeholder="081234xxxx" value="<?= $dataPelanggan["NoHp"]; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <!-- Alamat Lengkap -->
                                <div class="form-group col">
                                    <label for="Alamat">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="Alamat" name="Alamat" placeholder="Alamat Lengkap" value="<?= $dataPelanggan["Alamat"]; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblEdit">Update</button>
                        </form>
                        <?php
                    } else {
                        ?>
                        <p class="text-center">Pelanggan dengan Id Pelanggan : <?$IdPelanggan;?> tidak ditemukan. Edit Batal!</p>
                        <?php
                    }
                } else {
                    ?>
                    <p class="text-center">Id Pelanggan tidak ada. Edit Batal!</p>
                    <?php
                }
                ?>
            </div>
        </div>  
    </div>
</body>
</html>