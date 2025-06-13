<?php
include '../koneksi.php';

// Pastikan ID tersedia di URL
if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan!'); window.location='lensa.php';</script>";
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM produk_kaca WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='lensa.php';</script>";
    exit;
}

if (isset($_POST['submit'])) {
    $produk = $_POST['produk'];
    $tittle = $_POST['tittle'];
    $brand = $_POST['brand'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $sql = "UPDATE produk_kaca SET 
                produk = '$produk', 
                tittle = '$tittle', 
                brand = '$brand', 
                harga = '$harga', 
                deskripsi = '$deskripsi' 
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data berhasil diupdate!'); window.location='lensa.php';</script>";
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Lensa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2 class="mb-4">Edit Produk Lensa</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Produk</label>
            <input type="text" class="form-control" name="produk" value="<?= htmlspecialchars($data['produk']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tittle</label>
            <input type="text" class="form-control" name="tittle" value="<?= htmlspecialchars($data['tittle']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Brand</label>
            <input type="text" class="form-control" name="brand" value="<?= htmlspecialchars($data['brand']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" value="<?= htmlspecialchars($data['harga']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="4" required><?= htmlspecialchars($data['deskripsi']) ?></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Update</button>
        <a href="lensa.php" class="btn btn-secondary">Batal</a>
    </form>
</body>

</html>