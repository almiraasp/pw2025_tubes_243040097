<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {
    $produk = $_POST['produk'];
    $tittle = $_POST['tittle'];
    $brand = $_POST['brand'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $sql = "INSERT INTO produk_kaca (produk, tittle, brand, harga, deskripsi)
            VALUES ('$produk', '$tittle', '$brand', '$harga', '$deskripsi')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='lensa.php';</script>";
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Lensa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2 class="mb-4">Tambah Produk Lensa</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="produk" class="form-label">Produk</label>
            <input type="text" class="form-control" name="produk" required>
        </div>
        <div class="mb-3">
            <label for="jenis_kaca" class="form-label">Tittle</label>
            <input type="text" class="form-control" name="tittle" required>
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" class="form-control" name="brand" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="4" required></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <a href="lensa.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>

</html>