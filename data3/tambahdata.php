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
    <title>Tambah Data Layanan</title>
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
        <h3 class="text-center">Tambah Data Layanan</h3>
        <div class="row">
            <div class="col">
                <a href="viewdata.php" class="btn btn-primary">View Data Layanan</a>
                <form method="POST" name="form" action="simpantambah.php">
                    <div class="form-row">
                        <!-- Id Layanan -->
                        <div class="form-group col-md-4">
                            <label for="IdLayanan">Id Layanan</label>
                            <input type="text" class="form-control" id="IdLayanan" name="IdLayanan" placeholder="Id Layanan">
                        </div>
                        <!-- Nama Layanan -->
                        <div class="form-group col-md-4">
                            <label for="NamaLayanan">Nama Layanan</label>
                            <input type="text" class="form-control" id="NamaLayanan" name="NamaLayanan" placeholder="Nama Layanan">
                        </div>
                        <!-- Harga -->
                        <div class="form-group col-md-4">
                            <label for="Harga">Harga</label>
                            <input type="text" class="form-control" id="Harga" name="Harga" placeholder="0">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="tblTambah">Tambah</button>
                </form>
            </div>
        </div>  
    </div>
</body>
</html>