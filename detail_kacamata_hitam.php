<?php
require 'koneksi.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo 'ID dari URL: ' . ($_GET['id'] ?? 'tidak ada') . '<br>';
    exit;
}

// ambil data dari database
$query = mysqli_query($conn, "SELECT * FROM produk_kacamata_hitam WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Produk tidak ditemukan.";
    exit;
}

$pesan = "Halo, saya ingin memesan produk: " . $data['nama_barang'];
$link_wa = "https://wa.me/6287714471318?text=" . urlencode($pesan);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>

    <!-- Bootstrap Icons (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .product-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 15px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <?php require "navbar_utama.php"; ?>
    <!-- Akhir Navbar -->

    <!-- Produk Detail -->
    <div class="section" id="detail-kacamata-hitam">
        <div class="container mt-3">

            <!-- breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="index.php" class="text-decoration-none text-muted">
                            <i class="bi bi-house"></i> Beranda
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="kacamata.php" class="text-decoration-none text-muted">
                            Kacamata
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="index.php" class="text-decoration-none text-muted">
                            <?= $data['model'] ?> - <?= $data['nama_barang'] ?>
                        </a>
                    </li>
                </ol>
            </nav>

            <div class="box">

                <div class="container my-5">
                    <div class="row align-items-center">
                        <!-- Gambar Produk -->
                        <div class="col-md-6 mb-4">
                            <img src="uploads/kacamata_hitam/<?= $data['gender'] ?>/<?= $data['model']; ?>/<?= $data['gambar']; ?>" alt="<?= $data['nama_barang'] ?>" class="product-image shadow">
                        </div>

                        <!-- Detail Produk -->
                        <div class="col-md-6 ps-md-5 d-flex flex-column justify-content-center gap-3 py-4">
                            <h2><?= $data['nama_barang'] ?></h2>
                            <p class="text-muted"><?= $data['brand'] ?> - <?= $data['model'] ?> (<?= $data['gender'] ?>)</p>
                            <h4 class="text-success">Rp<?= number_format($data['harga'], 0, ',', '.') ?></h4>
                            <p><?= nl2br($data['deskripsi']) ?></p>

                            <a href="<?= $link_wa ?>" target="_blank" class="btn btn-success mt-3">
                                <i class="bi bi-whatsapp"></i> Pemesanan via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <!-- Footer -->
    <?php require "footer.php"; ?>
    <!-- Akhir Footer -->
    </div>

</body>

</html>