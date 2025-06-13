<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../koneksi.php';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan di URL.");
}

$id = intval($_GET['id']);
$query = mysqli_query($conn, "SELECT * FROM produk_kacamata WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data tidak ditemukan di database.");
}

if (isset($_POST['submit'])) {
    $nama_barang = $_POST['nama_barang'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $gender = $_POST['gender'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    // Cek apakah user upload gambar baru
    if ($_FILES['foto']['name'] != "") {
        $folder = "uploads/kacamata/";
        $tmp = $_FILES['foto']['tmp_name'];
        $nama_file = basename($_FILES['foto']['name']);
        move_uploaded_file($tmp, $folder . $nama_file);
        $foto = $folder . $nama_file;

        // Update dengan foto
        $update = mysqli_query($conn, "UPDATE produk_kacamata SET 
            nama_barang='$nama_barang', 
            brand='$brand', 
            model='$model', 
            gender='$gender', 
            harga='$harga', 
            deskripsi='$deskripsi', 
            foto='$foto' 
            WHERE id=$id");
    } else {
        // Update tanpa foto
        $update = mysqli_query($conn, "UPDATE produk_kacamata SET 
            nama_barang='$nama_barang', 
            brand='$brand', 
            model='$model', 
            gender='$gender', 
            harga='$harga', 
            deskripsi='$deskripsi' 
            WHERE id=$id");
    }

    if ($update) {
        echo "<script>alert('Data berhasil diupdate!'); window.location='kacamata.php';</script>";
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Kacamata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container py-4">
    <h2>Edit Produk Kacamata</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="<?= $data['nama_barang']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Brand</label>
            <input type="text" name="brand" class="form-control" value="<?= $data['brand']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Model</label>
            <input type="text" name="model" class="form-control" value="<?= $data['model']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Gender</label>
            <select name="gender" class="form-select" required>
                <option value="Pria" <?= $data['gender'] == 'Pria' ? 'selected' : ''; ?>>Pria</option>
                <option value="Wanita" <?= $data['gender'] == 'Wanita' ? 'selected' : ''; ?>>Wanita</option>
                <option value="Anak" <?= $data['gender'] == 'Anak' ? 'selected' : ''; ?>>Anak</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="<?= $data['harga']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required><?= $data['deskripsi']; ?></textarea>
        </div>
        <div class="mb-3">
            <label>Foto Saat Ini (biarkan kosong jika tidak ingin mengubah)</label></br>
            <img src="../uploads/kacamata/<?= $data['gender'] ?>/<?= $data['model']; ?>/<?= $data['foto']; ?>" width="120" class="my-2">
            <input type="file" name="foto" class="form-control">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="kacamata.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>

</html>