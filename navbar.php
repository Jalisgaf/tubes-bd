<div id="navbar" class="list-group">
    <!-- <a href="../welcome.php" class="list-group-item list-group-item-action"><?= ($_SESSION["username"] == "admin") ? "Pak Andri" : ucfirst($_SESSION["username"]); ?></a> -->
    <a href="../laporan/viewdata.php" class="list-group-item list-group-item-action <?php if ($_SESSION["current_page"] == "Laporan") { echo "active"; } else { echo "inactive"; } ?>">Laporan</a>
    <a href="../pemesanan/viewdata.php" class="list-group-item list-group-item-action <?php if ($_SESSION["current_page"] == "Pemesanan") { echo "active"; } else { echo "inactive"; } ?>">Data Pemesanan</a>
    <a href="../pelanggan/viewdata.php" class="list-group-item list-group-item-action <?php if ($_SESSION["current_page"] == "Pelanggan") { echo "active"; } else { echo "inactive"; } ?>">Data Pelanggan</a>
    <a href="../layanan/viewdata.php" class="list-group-item list-group-item-action <?php if ($_SESSION["current_page"] == "Layanan") { echo "active"; } else { echo "inactive"; } ?>">Data Layanan</a>
    <a href="../barang/viewdata.php" class="list-group-item list-group-item-action <?php if ($_SESSION["current_page"] == "Barang") { echo "active"; } else { echo "inactive"; } ?>">Data Barang</a>
    <a href="../detail-barang/viewdata.php" class="list-group-item list-group-item-action <?php if ($_SESSION["current_page"] == "Detail Barang") { echo "active"; } else { echo "inactive"; } ?>">Data Detail Barang</a>
    <a href="../detail-layanan/viewdata.php" class="list-group-item list-group-item-action <?php if ($_SESSION["current_page"] == "Detail Layanan") { echo "active"; } else { echo "inactive"; } ?>">Data Detail Layanan</a>
    <a href="../logout.php" class="list-group-item list-group-item-action logout"><i class="fa fa-right-from-bracket"></i> Keluar</a>
</div>