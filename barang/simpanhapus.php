<?php
include_once("../functions.php");
session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "../head.php" ?>
</head>

<body class="bg-light">
    <div class="card shadow-lg bg-light kotak">
        <div class="card-body text-center">
            <h3 class="card-text">Hapus Data Barang</h3>
            <?php
            if (isset($_POST["tblHapus"])) {
                $db = dbConnect();
                if ($db->connect_errno == 0) {
                    $IdBarang = $db->escape_string($_POST["IdBarang"]);
                    $sql = "DELETE FROM barang WHERE IdBarang = '$IdBarang'";
                    $res = $db->query($sql);
                    if ($res) {
                        if ($db->affected_rows > 0) {
            ?>
                            <p class="text-center">Data berhasil di hapus!</p>
                        <?php
                        } else {
                        ?>
                            <p class="text-center">Data tidak ada. Penghapusan gagal!</p>
                        <?php
                        }
                    } else {
                        ?>
                        <p class="text-center">Data gagal di hapus!</p>
                    <?php
                    }
                    ?>
                    <a href="viewdata.php" class="btn btn-primary">View Data Barang</a>
            <?php
                } else {
                    echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
                }
            } else {
                ?>
                <p class="card-text">Belum ada data yang dipilih. <br>Hapus data melalui tombol hapus di tampilan list data barang !!!</p>
                <a href="viewdata.php" class="btn btn-primary">View Data Barang</a>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>