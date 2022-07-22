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
    <title>Data Detail Barang</title>
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
                <a href="../data1/viewdata.php" class="list-group-item list-group-item-action">Data Pemesanan</a>
                <a href="../data2/viewdata.php" class="list-group-item list-group-item-action">Data Pelanggan</a>
                <a href="../data3/viewdata.php" class="list-group-item list-group-item-action">Data Layanan</a>
                <a href="../data4/viewdata.php" class="list-group-item list-group-item-action">Data Barang</a>
                <a href="viewdata.php" class="list-group-item list-group-item-action active">Data Detail Barang</a>
                <a href="../data6/viewdata.php" class="list-group-item list-group-item-action">Data Detail Layanan</a>
                <a href="../logout.php" class="list-group-item list-group-item-action">Keluar</a>
            </div>
        </div>
        <div class="col-10">
            <div class="col border kolom2">
                <h3 class="text-center">Data Detail Barang</h3>
                <?php 
                    $db = dbConnect();
                    if ($db -> connect_errno == 0) {
                        if (isset($_POST["tblCari"])) {
                            $dicari = $_POST["keyword"];
                        } else {
                            $dicari ="";
                        }
                        // $nDataHal = 5; // banyak data per halaman
                        // $result = $db -> query("SELECT * FROM detail_barang");
                        // $nData = $result -> num_rows; // banyak data di tabel
                        // $nHal = ceil($nData / $nDataHal); // banyak halaman di table
                        // $halaman = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1; // halaman aktif, diambil dati halaman yang dikirim
                        // $awal = $halaman * $nDataHal - $nDataHal;

                        $sql = "SELECT db.id, db.NoOrder, b.NamaBarang NamaBarang, db.Jumlah 
                                FROM detail_barang db JOIN pemesanan p ON db.NoOrder = p.NoOrder
                                JOIN barang b ON db.IdBarang = b.IdBarang
                                WHERE db.NoOrder LIKE '%$dicari%' OR
                                b.NamaBarang LIKE '%$dicari%' OR
                                db.Jumlah LIKE '%$dicari%'
                            ";
                            // LIMIT $awal, $nDataHal
                        
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
                                        <th>No</th><th>No Order</th><th>Nama Barang</th><th>Jumlah</th><th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1 ;// + $awal;
                                    $data = $res -> fetch_all(MYSQLI_ASSOC);
                                    foreach($data as $row) {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?>.</td>
                                            <td><?php echo $row["NoOrder"]; ?></td>
                                            <td><?php echo $row["NamaBarang"]; ?></td>
                                            <td class="text-center"><?php echo $row["Jumlah"]; ?></td>
                                            <td class="text-center">
                                                <a href="edit.php?id=<?= $row["id"]?>" class="btn btn-primary btn-flat btn-xs">Edit</a>  
                                                <a href="hapus.php?id=<?= $row["id"]?>" class="btn btn-danger btn-flat btn-xs">Hapus</a></td>
                                        </tr>
                                        <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php 
                                    if ($halaman > 1) { // kondisi ketika ingin menggunakan tombol previous
                                        ?>
                                        <li class="page-item"><a class="page-link" href="?halaman=<?= $halaman - 1 ?>">Previous</a></li
                                        <?php
                                    }

                                    for ($i = 1; $i <= $nHal; $i++) { // looping banyak halaman
                                        if ($i == $halaman) { // kondisi ketika halaman diklik
                                            ?>
                                            <li class="page-item active"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
                                            <?php
                                        } else {
                                            ?>
                                            <li class="page-item"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
                                            <?php
                                        }
                                    }
                                    
                                    if ($halaman < $nHal) { // kondisi ketika ingin menggunakan tombol next
                                        ?>
                                        <li class="page-item"><a class="page-link" href="?halaman=<?= $halaman + 1 ?>">Next</a></li
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </nav> -->
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