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
    <title>Data Pemesanan</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="../stylee.css">
</head>
<body class="bg-light">  
    <div class="container-fluid">
        <div class="row">
        <div class="col-2">
            <div class="list-group">
                <a href="../welcome.php" class="list-group-item list-group-item-action"><?= ($_SESSION["username"] == "admin") ? "Pak Andri" : ucfirst($_SESSION["username"]); ?></a>
                <a href="viewdata.php" class="list-group-item list-group-item-action active">Data Pemesanan</a>
                <a href="../data2/viewdata.php" class="list-group-item list-group-item-action">Data Pelanggan</a>
                <a href="../data3/viewdata.php" class="list-group-item list-group-item-action">Data Layanan</a>
                <a href="../data4/viewdata.php" class="list-group-item list-group-item-action">Data Barang</a>
                <a href="../data5/viewdata.php" class="list-group-item list-group-item-action">Data Detail Barang</a>
                <a href="../data6/viewdata.php" class="list-group-item list-group-item-action">Data Detail Layanan</a>
                <a href="../logout.php" class="list-group-item list-group-item-action">Keluar</a>
            </div>
        </div>
        <div class="col-10">
            <div class="col border kolom2">
                <h3 class="text-center">Data Pemesanan</h3>
                <?php 
                    $db = dbConnect();
                    if ($db -> connect_errno == 0) {
                        if (isset($_POST["tblCari"])) {
                            $dicari = $_POST["keyword"];
                        } else {
                            $dicari = "";
                        }

                        $sql = "SELECT pem.NoOrder, pel.Nama NamaPelanggan, pem.TglMasuk, pem.TglSelesai, pem.Berat, pem.TotalHarga
                                FROM pemesanan pem JOIN pelanggan pel
                                ON pem.IdPelanggan = pel.IdPelanggan
                                WHERE pem.NoOrder LIKE '%$dicari%' OR
                                pel.Nama LIKE '%$dicari%' OR
                                pem.TglMasuk LIKE '%$dicari%' OR
                                pem.TglSelesai LIKE '%$dicari%' OR
                                pem.Berat LIKE '%$dicari%' OR
                                pem.TotalHarga LIKE '%$dicari%'
                            ";

                        $res = $db -> query($sql);
                        if ($res) {
                            ?>
                            <form action="" method="POST">
                                <div class="form-group row float-right mr-1 mb-1">
                                    <div class="col-xs-4">
                                        <input type="text" name="keyword" class="form-control" placeholder="Cari ...">
                                    </div>
                                    <button type="submit" class="btn btn-info" name="tblCari">Cari</button>
                                </div>
                            </form>
                            <a href="tambahdata.php" class="btn btn-primary">Tambah Data</a>
                            <table class="table table-hover table-bordered">
                                <thead class="thead-light text-center">
                                    <tr>
                                        <th>No</th><th>No Order</th><th>Nama Pelanggan</th><th>Tanggal Masuk</th><th>Tanggal Selesai</th><th>Berat</th><th>Total Harga</th><th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $data = $res -> fetch_all(MYSQLI_ASSOC);
                                    foreach($data as $row) {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?>.</td>
                                            <td><?php echo $row["NoOrder"]; ?></td>
                                            <td><?php echo $row["NamaPelanggan"]; ?></td>
                                            <td class="text-center"><?php echo $row["TglMasuk"]; ?></td>
                                            <td class="text-center"><?php echo $row["TglSelesai"]; ?></td>
                                            <td class="text-right"><?php echo $row["Berat"]; ?> gram</td>
                                            <td class="text-right">Rp. <?php echo number_format($row["TotalHarga"],0,",","."); ?></td>
                                            <td class="text-center">
                                                <a href="edit.php?NoOrder=<?= $row["NoOrder"]?>" class="btn btn-primary btn-flat btn-xs">Edit</a>  
                                                <a href="hapus.php?NoOrder=<?= $row["NoOrder"]?>" class="btn btn-danger btn-flat btn-xs">Hapus</a></td>
                                        </tr>
                                        <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            $res -> free();
                        } else {
                            echo "Gagal Eksekusi SQL" . (DEVELOPMENT ? " : " . $db -> error : "") . "<br>";
                        }
                    } else {
                        echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db -> connect_error : "") . "<br>";
                    }
                ?>
            </div>
        </div>
        </div>
    </div>
</body>
</html>