<?php
define("DEVELOPMENT", TRUE);
function dbConnect() {
    $db = new mysqli("localhost", "root", "", "tubes-bd");
    return $db;
}

function session() {
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: ../index.php?error=4");
    }
}

function getListPelanggan() {
    $db = dbConnect();
    if ($db -> connect_errno == 0) {
        $res = $db -> query("SELECT * FROM pelanggan ORDER BY Nama");
        if ($res) {
            $data = $res -> fetch_all(MYSQLI_ASSOC);
            $res -> free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getListPemesanan() {
    $db = dbConnect();
    if ($db -> connect_errno == 0) {
        $res = $db -> query("SELECT * FROM pemesanan ORDER BY NoOrder");
        if ($res) {
            $data = $res -> fetch_all(MYSQLI_ASSOC);
            $res -> free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getListBarang() {
    $db = dbConnect();
    if ($db -> connect_errno == 0) {
        $res = $db -> query("SELECT * FROM barang ORDER BY IdBarang");
        if ($res) {
            $data = $res -> fetch_all(MYSQLI_ASSOC);
            $res -> free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getListLayanan() {
    $db = dbConnect();
    if ($db -> connect_errno == 0) {
        $res = $db -> query("SELECT * FROM layanan ORDER BY IdLayanan");
        if ($res) {
            $data = $res -> fetch_all(MYSQLI_ASSOC);
            $res -> free();
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getDataPemesanan($NoOrder) {
    $db = dbConnect();
    if ($db -> connect_errno == 0) {
        $res = $db -> query("SELECT p.NoOrder, p.IdPelanggan, p.TglMasuk, p.TglSelesai, p.Berat, p.TotalHarga, pl.Nama NamaPelanggan
                            FROM pemesanan p JOIN pelanggan pl
                            ON p.IdPelanggan = pl.IdPelanggan
                            WHERE p.NoOrder = '$NoOrder'
                        ");
        if ($res) {
            if ($res -> num_rows > 0) {
                $data = $res -> fetch_assoc();
                $res -> free();
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getDataPelanggan($IdPelanggan) {
    $db = dbConnect();
    if ($db -> connect_errno == 0) {
        $res = $db -> query("SELECT * FROM pelanggan WHERE IdPelanggan = '$IdPelanggan'");
        if ($res) {
            if ($res -> num_rows > 0) {
                $data = $res -> fetch_assoc();
                $res -> free();
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getDataLayanan($IdLayanan) {
    $db = dbConnect();
    if ($db -> connect_errno == 0) {
        $res = $db -> query("SELECT * FROM layanan WHERE IdLayanan = '$IdLayanan'");
        if ($res) {
            if ($res -> num_rows > 0) {
                $data = $res -> fetch_assoc();
                $res -> free();
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getDataBarang($IdBarang) {
    $db = dbConnect();
    if ($db -> connect_errno == 0) {
        $res = $db -> query("SELECT * FROM barang WHERE IdBarang = '$IdBarang'");
        if ($res) {
            if ($res -> num_rows > 0) {
                $data = $res -> fetch_assoc();
                $res -> free();
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getDataDetailBarang($Id) {
    $db = dbConnect();
    if ($db -> connect_errno == 0) {
        $res = $db -> query("SELECT * FROM detail_barang WHERE Id = '$Id'");
        if ($res) {
            if ($res -> num_rows > 0) {
                $data = $res -> fetch_assoc();
                $res -> free();
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getDataDetailLayanan($Id) {
    $db = dbConnect();
    if ($db -> connect_errno == 0) {
        $res = $db -> query("SELECT * FROM detail_layanan WHERE Id = '$Id'");
        if ($res) {
            if ($res -> num_rows > 0) {
                $data = $res -> fetch_assoc();
                $res -> free();
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function pagination($sql) {
    $db = dbConnect();
    $nDataHal = 5; // banyak data per halaman
    $result = $db -> query($sql);
    $nData = $result -> num_rows; // banyak data di tabel
    $nHal = $nData / $nDataHal; // banyak halaman di table
    $halaman = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1; // halaman aktif, diambil dati halaman yang dikirim
    $awal = $halaman * $nDataHal - $nDataHal;
    ?>
    <?php
}
?>