<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../koneksi.php';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan di URL.");
}

$id = intval($_GET['id']);
$query = mysqli_query($conn, "SELECT * FROM promo_produk WHERE id = $id");
$data = mysqli_fetch_assoc($query);

$kacamata = mysqli_query($conn, "SELECT id, nama_barang FROM produk_kacamata");
$kacamata_hitam = mysqli_query($conn, "SELECT id, nama_barang FROM produk_kacamata_hitam");


if (!$data) {
    die("Data tidak ditemukan di database.");
}

if (isset($_POST['submit'])) {
    $jenis = $_POST['jenis_produk'];
    $id_produk = $_POST['id_produk'];
    $harga_asli = $_POST['harga_asli'];
    $harga_diskon = $_POST['harga_diskon'];

    $update = mysqli_query($conn, "UPDATE promo_produk SET 
        id_produk = '$id_produk', 
        jenis_produk = '$jenis',
        harga_diskon = '$harga_diskon'
        WHERE id = $id");

    if ($update) {
        echo "<script>alert('Data berhasil diupdate'); window.location='promo_produk.php';</script>";
    } else {
        echo "<script>alert('Gagal update data');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Promo Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container py-4">
    <h2>Edit Promo Produk</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Jenis Produk</label>
            <select name="jenis_produk" class="form-select" required>
                <option value="kacamata" <?= $data['jenis_produk'] == 'kacamata' ? 'selected' : ''; ?>>Kacamata</option>
                <option value="kacamata_hitam" <?= $data['jenis_produk'] == 'kacamata_hitam' ? 'selected' : ''; ?>>Kacamata Hitam</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Harga Asli</label>
            <input type="number" name="harga_asli" class="form-control" value="<?= $data['harga_asli']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Harga Diskon</label>
            <input type="number" name="harga_diskon" class="form-control" value="<?= $data['harga_diskon']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required><?= $data['deskripsi']; ?></textarea>
        </div>

        <button type="submit" name="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="promo_produk.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>

</html>