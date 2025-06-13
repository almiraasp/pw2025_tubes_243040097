<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../koneksi.php';

    $id_produk = $_POST['id_produk'] ?? '';
    $harga_asli = $_POST['harga_asli'] ?? '';
    $harga_diskon = $_POST['harga_diskon'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $ekstensi = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));
    $folder = "../uploads/promo/";
    $nama_baru = uniqid() . '.' . $ekstensi;

    $valid_ekstensi = ['jpg', 'jpeg', 'png'];
    if (in_array($ekstensi, $valid_ekstensi)) {
        if (!is_dir($folder)) mkdir($folder, 0777, true);
        if (move_uploaded_file($tmp, $folder . $nama_baru)) {
            $sql = "INSERT INTO promo_produk (id_produk, harga_asli, harga_diskon, deskripsi, gambar)
                          VALUES ('$id_produk', '$harga_asli', '$harga_diskon', '$deskripsi', '$nama_baru')";
            if (mysqli_query($conn, $sql)) {
                header("Location: promo_produk.php");
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
    <title>Tambah Produk Kacamata Hitam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body class="p-4">
    <div class="container">
        <h3 class="mb-4">Tambah Produk Kacamata</h3>
        <form action="tambah_promo_produk.php" method="POST" enctype="multipart/form-data">
            <label class="mb-2">Jenis Produk:</label>
            <select name="jenis_produk" onchange="this.form.submit()" class="form-control" required>
                <option value="">-- Pilih Jenis Produk --</option>
                <option value="kacamata" <?= isset($_POST['jenis_produk']) && $_POST['jenis_produk'] == 'kacamata' ? 'selected' : '' ?>>Kacamata</option>
                <option value="kacamata_hitam" <?= isset($_POST['jenis_produk']) && $_POST['jenis_produk'] == 'kacamata_hitam' ? 'selected' : '' ?>>Kacamata Hitam</option>
            </select>
            <br>

            <label class="mb-2">id Produk:</label>
            <select name="id_produk" class="form-control" required>
                <option value="">-- Pilih Produk --</option>

                <?php
                // Produk dari kacamata
                $kacamata = mysqli_query($conn, "SELECT id, nama_barang, brand FROM produk_kacamata");
                while ($data = mysqli_fetch_assoc($kacamata)) {
                    echo "<option value='" . $data['id'] . "'> " . $data['nama_barang'] . " (" . $data['brand'] . ")</option>";
                }

                // Produk dari kacamata hitam
                $hitam = mysqli_query($conn, "SELECT id, nama_barang, brand FROM produk_kacamata_hitam");
                while ($data = mysqli_fetch_assoc($hitam)) {
                    echo "<option value='" . $data['id'] . "'> " . $data['nama_barang'] . " (" . $data['brand'] . ")</option>";
                }
                ?>
            </select>
            <br>

            <label class="mb-2">Harga Asli:</label>
            <input type="number" name="harga_asli" class="form-control" required><br>

            <label class="mb-2">Harga Diskon:</label>
            <input type="number" name="harga_diskon" class="form-control" required><br>

            <label class="mb-2">Deskripsi:</label>
            <textarea name="deskripsi" class="form-control" required></textarea><br>

            <label class="mb-2">Gambar Produk:</label>
            <input type="file" name="gambar" class="form-control" accept=".jpg,.jpeg,.png" required><br>

            <button type="submit" name="submit" class="btn btn-primary">Tambah Produk</button>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>