<?php
require "session.php";
require "../koneksi.php";

$queryKacamataHitam = mysqli_query($conn, "SELECT * FROM produk_kacamata_hitam");
$jumlahKacamataHitam = mysqli_num_rows($queryKacamataHitam);

// Ambil kata kunci pencarian dari input form
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

// Buat query dengan filter jika ada kata kunci
if (!empty($cari)) {
    $queryKacamataHitam = "SELECT * FROM produk_kacamata_hitam 
            WHERE nama_barang LIKE '%$cari%' 
               OR brand LIKE '%$cari%' 
               OR model LIKE '%$cari%'
               OR gender LIKE '%$cari%'";
} else {
    $queryKacamataHitam = "SELECT * FROM produk_kacamata_hitam";
}

// Eksekusi query
$result = mysqli_query($conn, $queryKacamataHitam);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kacamata Hitam</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- Bootstrap Icons (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


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

                <li class="breadcrumb-item active" aria-current="page">Kacamata Hitam</li>
            </ol>
        </nav>

        <!-- Tabel Kacamata -->
        <div class="mt-3">
            <h2>List Kacamata Hitam</h2>

            <div class="d-flex align-items-center mt-3">
                <a href="tambah_kacamata_hitam.php" class="btn btn-primary mt-3">+ Tambah Produk</a>

                <form class="d-flex ms-auto" method="GET" action="">
                    <input type="text" name="cari" class="form-control me-2" placeholder="Cari produk..." value="<?= isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : '' ?>">
                    <button type="submit" class="btn btn-outline-secondary">Cari</button>
                </form>

            </div>

            <div class="tabel-responsive table-striped mt-5 text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Tittle</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Model</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Price</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        if ($jumlahKacamataHitam == 0) {
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
                                    <td><?php echo $data['nama_barang']; ?></td>
                                    <td><?php echo $data['brand']; ?></td>
                                    <td><?php echo $data['model']; ?></td>
                                    <td><?php echo $data['gender']; ?></td>
                                    <td><?php echo $data['harga']; ?></td>
                                    <td>
                                        <img src="../uploads/kacamata_hitam/<?= $data['gender'] ?>/<?= $data['model']; ?>/<?= $data['gambar']; ?>" width="100">
                                    </td>
                                    <td>
                                        <a href="edit_kacamata_hitam.php?id=<?= $data['id']; ?>" class="btn btn-sm btn-warning m-1 fw-bold">Edit</a>

                                        <a href="hapus_kacamata_hitam.php?id=<?= $data['id']; ?>" class="btn btn-sm btn-danger m-1 fw-bold" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>