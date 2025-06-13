<?php
require "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>

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
    <div class="section" id="detail-kacamata">
        <div class="container mt-3">

            <!-- breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="index.php" class="text-decoration-none text-muted">
                            <i class="bi bi-house"></i> Beranda
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Kacamata</li>
                </ol>
            </nav>

            <div class="box">

                <div class="container my-5">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">

                        <?php
                        $queryKacamata = mysqli_query($conn, "SELECT * FROM produk_kacamata ORDER BY id DESC LIMIT 10");
                        while ($k = mysqli_fetch_assoc($queryKacamata)) :
                        ?>

                            <div class="col">
                                <div class="card h-100 position-relative">
                                    <a href="detail_kacamata.php?id=<?= $data['id'] ?>">
                                        <img src="uploads/kacamata/<?= $k['gender'] ?>/<?= $k['model']; ?>/<?= $k['foto']; ?>" class="card-img-top" alt="<?= $k['nama_barang'] ?>" width="100">
                                    </a>

                                    <div class="card-body text-center">
                                        <h6 class="card-title fw-semibold"><?= $k['nama_barang'] ?></h6>
                                        <p class=" fw-bold mb-0">Rp<?= number_format($k['harga']) ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>

</body>

</html>