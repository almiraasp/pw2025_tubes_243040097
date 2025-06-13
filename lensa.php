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
                    <li class="breadcrumb-item active" aria-current="page">Kacamata</li>
                </ol>
            </nav>

            <div class="box">

                <div class="container my-5">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">


                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>

</body>

</html>