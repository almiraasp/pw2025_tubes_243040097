<?php
require "../koneksi.php";
$queryPromoProduk = mysqli_query($conn, "SELECT * FROM promo_produk");
$jumlahPromoProduk = mysqli_num_rows($queryPromoProduk);

// Ambil kata kunci pencarian dari input form
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

// Buat query dengan filter jika ada kata kunci
if (!empty($cari)) {
    $queryPromoProduk = "SELECT * FROM promo_produk 
            WHERE jenis_produk LIKE '%$cari%' 
               OR nama_produk LIKE '%$cari%'";
} else {
    $queryPromoProduk = "SELECT * FROM promo_produk";
}

// Eksekusi query
$result = mysqli_query($conn, $queryPromoProduk);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Promo Produk</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- Bootstrap Icons (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        img {
            max-width: 100px;
            height: auto;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
            border-collapse: collapse;
            padding: 10px;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <?php require "navbar.php"; ?>

    <div class="container mt-5">
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

        <!-- Tabel Promo -->
        <div class="mt-3">
            <h2>List Promo</h2>

            <div class="d-flex align-items-center mt-3">
                <a href="tambah_promo_produk.php" class="btn btn-primary mb-3">+ Tambah Promo</a>

                <form class="d-flex ms-auto" method="GET" action="">
                    <input type="text" name="cari" class="form-control me-2" placeholder="Cari promo..." value="<?= isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : '' ?>">
                    <button type="submit" class="btn btn-outline-secondary">Cari</button>
                </form>
            </div>

            <div class="tabel-responsive table-striped mt-5 text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Produk</th>
                            <th>Harga Asli</th>
                            <th>Harga Diskon</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php $i = 1;
                    if ($jumlahPromoProduk == 0) {
                    ?>
                        <tr colspan=8 class="text-center">
                            <td>Tidak Ada Data</td>
                        </tr>
                        <?php
                    } else {
                        while ($data = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['jenis_produk']; ?></td>
                                <td>Rp<?= number_format($data['harga_asli']) ?></td>
                                <td>Rp<?= number_format($data['harga_diskon']) ?></td>
                                <td><?= $data['deskripsi'] ?></td>
                                <td>
                                    <img src="../uploads/promo/<?= $data['gambar']; ?>">
                                </td>
                                <td>
                                    <a href="edit_promo_produk.php?id=<?= $data['id']; ?>" class="btn btn-sm btn-warning m-1 fw-bold">Edit</a>

                                    <a href="hapus_promo_produk.php?id=<?= $data['id']; ?>" class="btn btn-sm btn-danger m-1 fw-bold" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>

            <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>