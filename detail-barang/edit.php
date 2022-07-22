<?php
include_once("../functions.php");
session();
$_SESSION["current_page"] = "Detail Barang";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "../head.php" ?>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php include_once "../navbar.php" ?>
            </div>
            <div class="col">
                <h3 class="text-center">Edit Data Detail Barang</h3>
                <?php
                if (isset($_GET["id"])) {
                    $db = dbConnect();
                    $id = $db->escape_string($_GET["id"]);
                    if ($dataDetailBarang = getDataDetailBarang($id)) {
                ?>
                        <a href="viewdata.php" class="btn btn-primary mb-3">View Data Detail Barang</a>
                        <form method="POST" name="form" action="simpanupdate.php">
                            <input type="hidden" name="id" value="<?= $dataDetailBarang["id"]; ?>">
                            <div class="form-row">
                                <!-- No Order -->
                                <div class="form-group col-md-4">
                                    <label for="NoOrder">No Order</label>
                                    <select class="form-control" id="NoOrder" name="NoOrder">
                                        <option value="">Pilih No Order</option>
                                        <?php
                                        $dataPemesanan = getListPemesanan();
                                        foreach ($dataPemesanan as $data) {
                                            echo "<option value=\"" . $data["NoOrder"] . "\"";
                                            if ($data["NoOrder"] == $dataDetailBarang["NoOrder"]) {
                                                echo " selected";
                                            }
                                            echo ">" . $data["NoOrder"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- Id Barang -->
                                <div class="form-group col-md-4">
                                    <label for="IdBarang">Id Barang</label>
                                    <select class="form-control" id="IdBarang" name="IdBarang">
                                        <option value="">Pilih No Order</option>
                                        <?php
                                        $dataBarang = getListBarang();
                                        foreach ($dataBarang as $data) {
                                            echo "<option value=\"" . $data["IdBarang"] . "\"";
                                            if ($data["IdBarang"] == $dataDetailBarang["IdBarang"]) {
                                                echo " selected";
                                            }
                                            echo ">" . $data["NamaBarang"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- Jumlah -->
                                <div class="form-group col-md-4">
                                    <label for="Jumlah">Jumlah</label>
                                    <input type="text" class="form-control" id="Jumlah" name="Jumlah" placeholder="0" value="<?= $dataDetailBarang["Jumlah"]; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblEdit">Update</button>
                        </form>
                    <?php
                    } else {
                    ?>
                        <p class="text-center">Barang dengan Nama Barang : <? $IdBarang; ?> tidak ditemukan. Edit Batal!</p>
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