<?php
require "session.php";
require "../koneksi.php";

$queryKacamata = mysqli_query($conn, "SELECT * FROM produk_kacamata");
$jumlahKacamata = mysqli_num_rows($queryKacamata);

$queryKacamataHitam = mysqli_query($conn, "SELECT * FROM produk_kacamata_hitam");
$jumlahKacamataHitam = mysqli_num_rows($queryKacamataHitam);

$queryLensa = mysqli_query($conn, "SELECT * FROM produk_kaca");
$jumlahLensa = mysqli_num_rows($queryLensa);


$queryPromoProduk = mysqli_query($conn, "SELECT * FROM promo_produk");
$jumlahPromoProduk = mysqli_num_rows($queryPromoProduk);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<style>
    .kotak {
        border: solid;
    }

    .summary-card {
        border-left: 0.25rem solid;
        border-radius: 0.5rem;
        box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.05);
        padding: 1rem;
    }

    .border-blue {
        border-color: #4e73df;
    }

    .border-green {
        border-color: #1cc88a;
    }

    .border-warning {
        border-color: #f6c23e;
    }

    .border-danger {}

    .card-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        font-weight: bold;
    }

    .card-value {
        font-size: 1.25rem;
        font-weight: 600;
    }
</style>

<body>
    <!-- navbar -->
    <?php require "navbar.php"; ?>

    <div class="container mt-5">
        <!-- breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-house"></i> Beranda</li>
            </ol>
        </nav>

        <h2>Halo <?php echo $_SESSION['username']; ?> </h2>

        <!-- summary -->
        <div class="container mt-4">
            <div class="row g-4">
                <!-- Kacamata -->
                <div class="col-12 col-md-4">
                    <div class="summary-card border-blue p-3 bg-white">
                        <div class="d-flex justify-content-between align-items-center h-100">
                            <div>
                                <div class="card-label text-primary">Kacamata</div>
                                <div class="card-value text-dark"><?php echo $jumlahKacamata; ?> item</div>
                                <a href="kacamata.php" class="text-decoration-none small text-primary mt-1 d-block text-sm">Selengkapnya &rarr;</a>

                            </div>
                            <i class="bi bi-eyeglasses text-primary fs-3"></i>
                        </div>
                    </div>
                </div>

                <!-- Kacamata Hitam -->
                <div class="col-12 col-md-4">
                    <div class="summary-card border-green bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="card-label text-success">Kacamata Hitam</div>
                                <div class="card-value text-dark"><?php echo $jumlahKacamataHitam; ?> item</div>
                                <a href="kacamata_hitam.php" class="text-decoration-none small text-primary mt-1 d-block text-sm">Selengkapnya &rarr;</a>
                            </div>
                            <i class="bi bi-sunglasses text-success fs-3"></i>
                        </div>
                    </div>
                </div>

                <!-- Lensa -->
                <div class="col-12 col-md-4">
                    <div class="summary-card border-warning p-3 bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="card-label text-warning">Lensa</div>
                                <div class="card-value text-dark"><?php echo $jumlahLensa; ?> item</div>
                                <a href="lensa.php" class="text-decoration-none small text-primary mt-1 d-block text-sm">Selengkapnya &rarr;</a>

                            </div>
                            <i class="bi bi-eye text-warning fs-3"></i>
                        </div>
                    </div>
                </div>

                <!-- Promo Produk -->
                <div class="col-12 col-md-4">
                    <div class="summary-card border-danger p-3 bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="card-label text-danger">Promo Produk</div>
                                <div class="card-value text-dark"><?php echo $jumlahPromoProduk; ?> item</div>
                                <a href="promo_produk.php" class="text-decoration-none small text-primary mt-1 d-block text-sm">Selengkapnya &rarr;</a>

                            </div>
                            <i class="bi bi-percent text-danger fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>