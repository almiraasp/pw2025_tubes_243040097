<?php
require "koneksi.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID produk tidak ditemukan.";
    exit;
}

// ambil data produk dari database
$query = mysqli_query($conn, "SELECT * FROM produk_kaca WHERE id = $id");
$data = mysqli_fetch_assoc($query);

// jika data tidak ditemukan
if (!$data) {
    echo "Produk tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lensa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
    <!-- Navbar -->
    <?php require "navbar_utama.php"; ?>
    <!-- Akhir Navbar -->

    <!-- Produk Detail -->
    <div class="section" id="detail-lensa">
        <div class="container mt-3">

            <!-- breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="index.php" class="text-decoration-none text-muted">
                            <i class="bi bi-house"></i> Beranda
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Lensa</li>
                </ol>
            </nav>

            <div class="container-fluid">
                <div class="d-flex custom-section">
                    <h1><?= $data['produk'] ?></h1>
                    <h3><?= $data['tittle'] ?></h3>
                    <!-- Gambar -->
                    <div class="image-container w-50">
                        <img src="" class="img-fluid h-100 w-100 object-fit-cover">
                    </div>

                    <!-- Konten -->
                    <div class="text-container w-50 d-flex align-items-center bg-beige px-5 py-4">
                        <div>
                            <p class="mt-3"><?= nl2br($data['deskripsi']) ?></p>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

</body>

</html>