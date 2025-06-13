<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {
    $nama_barang = $_POST['nama_barang'];
    $brand = $_POST['brand'];
    $model = str_replace('_', ' ', $_POST['model']);
    $gender = $_POST['gender'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    $nama_baru = time() . '_' . preg_replace("/[^a-zA-Z0-9.]/", "_", $gambar);

    $ekstensi = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));
    $folder = "../uploads/kacamata/$gender/$model/";
    $nama_baru = uniqid() . '.' . $ekstensi;

    $valid_ekstensi = ['jpg', 'jpeg', 'png'];
    if (in_array($ekstensi, $valid_ekstensi)) {
        if (!is_dir($folder)) mkdir($folder, 0777, true);
        if (move_uploaded_file($tmp, $folder . $nama_baru)) {

            $sql = "INSERT INTO produk_kacamata (nama_barang, brand, model, gender, harga, deskripsi, foto)
                    VALUES ('$nama_barang', '$brand', '$model', '$gender', '$harga', '$deskripsi', '$nama_baru')";
            if (mysqli_query($conn, $sql)) {
                header("Location: kacamata.php");
                exit;
            } else {
                echo "Gagal menambahkan produk: " . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('Gagal mengupload gambar.');</script>";
        }
    } else {
        echo "<script>alert('Format gambar harus JPG, JPEG, atau PNG.');</script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Produk Kacamata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body class="p-4">
    <div class="container">
        <h3 class="mb-4">Tambah Produk Kacamata</h3>
        <form action="tambah_kacamata.php" method="POST" enctype="multipart/form-data">
            <label class="mb-2">Nama Barang:</label>
            <input type="text" name="nama_barang" class="form-control" required><br>

            <label class="mb-2">Brand:</label>
            <input type="text" name="brand" class="form-control" required><br>
            </select><br>

            <label class="mb-2">Model:</label>
            <input type="text" name="model" class="form-control" required><br>
            </select><br>

            <label class="mb-2">Gender:</label>
            <select name="gender" class="form-control" required>
                <option value="">-- Pilih Gender --</option>
                <option value="Anak">Anak</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </select><br>

            <label class="mb-2">Harga:</label>
            <input type="number" name="harga" class="form-control" required><br>

            <label class="mb-2">Deskripsi:</label>
            <textarea name="deskripsi" class="form-control" required></textarea><br>

            <label class="mb-2">Foto Produk:</label>
            <input type="file" name="gambar" class="form-control" accept=".jpg,.jpeg,.png" required><br>

            <button type="submit" name="submit" class="btn btn-primary">Tambah Produk</button>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>