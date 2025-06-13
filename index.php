<?php
require "koneksi.php";


?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Optik Mirogril</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            background-color: #eeebe7;
        }
    </style>


</head>

<!-- SwiperJS JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>


<body>

    <!-- Navbar -->
    <?php require "navbar_utama.php"; ?>
    <!-- Akhir Navbar -->

    <!-- Beranda -->
    <section id="beranda">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" style="heigth: 100vh; background-size: cover; background-position: center;">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/beranda/jeno.png" class="d-block w-100" alt="..." style="width: 100vw; heigth:100vh; object-fit: cover; ">
                            </div>
                            <div class="carousel-item">
                                <img src="img/beranda/jisung.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/beranda/irene.png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Beranda -->

    <!-- Kategori -->
    <section id="kategori">
        <div class="container-fluid py-5">
            <div class="row text-center g-4 justify-content-center">
                <div class="col-6 col-md-4">
                    <a href="kacamata_hitam.php" class="text-decoration-none text-dark">
                        <div class="bg-white p-3 shadow-sm rounded">
                            <img src="img/belanja/sunglass.png" alt="Sunglasses" class="img-fluid mb-2">
                            <h6 class="fw-bold">Kacamata Hitam</h6>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4">
                    <a href="kacamata.php" class="text-decoration-none text-dark">
                        <div class="bg-white p-3 shadow-sm rounded">
                            <img src="img/belanja/frame.png" alt="Eyeglasses" class="img-fluid mb-2">
                            <h6 class="fw-bold">Kacamata</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Kategori -->

    <!-- Promo Section-->
    <section>
        <div class="container-fluid my-5">
            <h2 class="fw-bold mb-4">Promo</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">

                <!-- Card Produk -->
                <div class="col">
                    <div class="card h-100 position-relative">
                        <span class="badge bg-danger position-absolute top-0 start-0 m-2">-50%</span>
                        <img src="img/kacamata/wanita/plastik_frame/EDGY_BROWNBLACK_DEPAN.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h6 class="card-title fw-semibold"></h6>
                            <p class="text-muted mb-0"><s></s></p>
                            <p class="text-danger fw-bold mb-0"></p>
                        </div>
                    </div>
                </div>


                <!-- Tambahkan lebih banyak card dengan struktur yang sama -->

            </div>
        </div>

    </section>
    <!-- Akhir Produk -->


    <!-- kacamata Section -->
    <section id="kacamata" class="py-5">
        <div class="container my-5">
            <h2 class="fw-bold mb-1">Kacamata</h2>
            <a href="kacamata_hitam.php" class="text-decoration-none small text-primary mb-4 d-block text-sm text-warning">Selengkapnya &rarr;</a>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">

                <?php
                $queryKacamata = mysqli_query($conn, "SELECT * FROM produk_kacamata ORDER BY id DESC LIMIT 10");
                while ($data = mysqli_fetch_assoc($queryKacamata)) :
                ?>

                    <div class="col">
                        <div class="card h-100 position-relative">
                            <a href="detail_kacamata.php?id=<?= $data['id'] ?>">
                                <img src="uploads/kacamata/<?= $data['gender'] ?>/<?= $data['model']; ?>/<?= $data['foto']; ?>" class="card-img-top" alt="<?= $data['nama_barang'] ?>" width="100">
                            </a>

                            <div class="card-body text-center">
                                <h6 class="card-title fw-semibold"><?= $data['nama_barang'] ?></h6>
                                <p class=" fw-bold mb-0">Rp<?= number_format($data['harga']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        </div>
    </section>

    <!-- kacamata Hitam Section -->
    <section id="kacamatahitam" class="py-5">
        <div class="container my-5">
            <h2 class="fw-bold mb-1">Kacamata Hitam</h2>
            <a href="kacamata_hitam.php" class="text-decoration-none small text-primary mb-4 d-block text-sm text-warning">Selengkapnya &rarr;</a>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">

                <?php
                $queryKacamata = mysqli_query($conn, "SELECT * FROM produk_kacamata_hitam ORDER BY id DESC LIMIT 8");
                while ($k = mysqli_fetch_assoc($queryKacamata)) :
                ?>

                    <div class="col">
                        <div class="card h-100 position-relative">
                            <a href="detail_kacamata.php?id=<?= $data['id'] ?>">
                                <img src="uploads/kacamata_hitam/<?= $k['gender'] ?>/<?= $k['model']; ?>/<?= $k['gambar']; ?>" class="card-img-top" alt="<?= $k['nama_barang'] ?>" width="100">
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
    </section>

    <!-- Card Produk -->

    <!-- Tambahkan lebih banyak card dengan struktur yang sama -->

    </div>
    </div>

    </section>
    <!-- Akhir Produk -->

    <!-- Promo -->
    <div class="container my-5">
        <h4 class="mb-4 fw-bold">Promosi Terbaru</h4>
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm">
                    <img src="img/promo/newmem.png" class="card-img-top" alt="Promo 1">
                    <div class="card-body">
                        <h5 class="card-title">Diskon Hingga 80% Untuk Member Baru</h5>
                        <p class="card-text">5 Juni, 2025</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm">
                    <img src="img/promo/Promo Couple.png" class="card-img-top" alt="Promo 2">
                    <div class="card-body">
                        <h5 class="card-title">Beli 2 Produk & Hemat hingga 25%: Promo Couple</h5>
                        <p class="card-text">13 Juni, 2025</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm">
                    <img src="img/promo/Akhir.png" class="card-img-top" alt="Promo 3">
                    <div class="card-body">
                        <h5 class="card-title">Promo Akhir Bulan </h5>
                        <p class="card-text">20 Juni, 2025</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Akhir Promo -->

    <!-- Footer -->
    <?php require "footer.php"; ?>
    <!-- Akhir Footer -->

</body>

</html>