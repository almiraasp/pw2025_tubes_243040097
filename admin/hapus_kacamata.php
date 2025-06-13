<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // pastikan integer

    $hapus = mysqli_query($conn, "DELETE FROM produk_kacamata WHERE id = $id");

    if ($hapus) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='kacamata.php';</script>";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan di URL.";
}
