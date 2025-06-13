<?php
require "session.php";
require "../koneksi.php";

$queryLensa = mysqli_query($conn, "SELECT * FROM produk_kaca");
$jumlahLensa = mysqli_num_rows($queryLensa);

// Ambil kata kunci pencarian dari input form
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

// Buat query dengan filter jika ada kata kunci
if (!empty($cari)) {
    $queryLensa = "SELECT * FROM produk_kaca 
            WHERE produk LIKE '%$cari%' 
               OR jenis_kaca LIKE '%$cari%' 
               OR brand LIKE '%$cari%'";
} else {
    $queryLensa = "SELECT * FROM produk_kaca";
}

// Eksekusi query
$result = mysqli_query($conn, $queryLensa);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lensa</title>

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

                <li class="breadcrumb-item active" aria-current="page">Kacamata</li>
            </ol>
        </nav>

        <!-- Tabel Kacamata -->
        <div class="mt-3">
            <h2>List Lensa</h2>

            <div class="d-flex align-items-center mt-3">
                <a href="tambah_lensa.php" class="btn btn-primary mt-3">+ Tambah Produk</a>

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
                            <th scope="col">Produk</th>
                            <th scope="col">Jenis Kaca</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        if ($jumlahLensa == 0) {
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
                                    <td><?php echo $data['produk']; ?></td>
                                    <td><?php echo $data['jenis_kaca']; ?></td>
                                    <td><?php echo $data['brand']; ?></td>
                                    <td><?php echo $data['harga']; ?></td>
                                    <td><?php echo $data['deskripsi']; ?></td>
                                    <td>
                                        <a href="edit_lensa.php?id=<?= $data['id']; ?>" class="btn btn-sm btn-warning m-1 fw-bold">Edit</a>

                                        <a href="hapus_lensa.php?id=<?= $data['id']; ?>" class="btn btn-sm btn-danger m-1 fw-bold" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
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