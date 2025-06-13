<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

</head>

<body class="p-5">
    <h2>Tambah Produk</h2>
    <form action="tambah_produk.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
                <option value="produk_kacamata">Kacamata</option>
                <option value="produk_kacamata_hitam">Kacamata Hitam</option>
                <option value="produk_kaca">Lensa</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control">
        </div>

        <div class="mb-3">
            <label>Brand</label>
            <input type="text" name="brand" class="form-control">
        </div>

        <div class="mb-3">
            <label>Model</label>
            <input type="text" name="model" class="form-control">
        </div>

        <div class="mb-3">
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
                <option value="anak">Anak</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Tambah Produk</button>
    </form>
</body>

</html>