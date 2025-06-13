<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eyeglasses</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- Bootstrap Icons (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#beranda">OPTIK MIROGRIL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">KACAMATA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-3" href="#">KACAMATA HITAM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-3" href="#">LENSA KONTAK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-3" href="#">LENSA</a>
                    </li>
                </ul>

                <ul class="nav justify-content-end ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active btn-lg me-3" aria-current="page" href="#"><i class="bi bi-search"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-heart"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-cart2"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-person"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Breadcrumb -->
    <div class="container mt-4">
        <div class="d-flex justify-content-start">
            <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Frames</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Akhir Breadcrumb -->

    <div class="container my-5">
        <!-- Filter Dropdowns -->
        <div class="row mb-4 filters g-3 align-items-end">
            <div class="col-md-2">
                <label class="form-label" style="display: none;">Brand</label>
                <select class="form-select">
                    <option selected>Brand</option>
                    <option>Jaguar</option>
                    <option>Spyder</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label" style="display: none;">Model</label>
                <select class="form-select">
                    <option selected>Plastic Sunglasses</option>
                    <option>Round</option>
                    <option>Square</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label" style="display: none;">Color</label>
                <select class="form-select">
                    <option selected>Color</option>
                    <option>Black</option>
                    <option>Brown</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label" style="display: none;">Gender</label>
                <select class="form-select">
                    <option selected>Men</option>
                    <option>Women</option>
                    <option>Kids</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label" style="display: none;">Price</label>
                <select class="form-select">
                    <option selected>Price</option>
                    <option>Under Rp1.000.000</option>
                    <option>Rp1.000.000 - Rp2.000.000</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-dark w-100">Search</button>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="row row-cols-2 row-cols-md-4 g-4">
            <!-- Product Card -->
            <div class="col">
                <div class="card border-0 text-center product-card">
                    <img src="/img/kacamata/wanita/plastik_frame/AGNESB_BLACK_DEPAN.jpg" class="card-img-top" alt="product 1">
                    <div class="card-body p-2">
                        <p class="product-title mb-1">JAGUAR ; 39723 ; 6101 (SBLK) - 56</p>
                        <p class="product-price">Rp2.900.000</p>
                    </div>
                </div>
            </div>

            <!-- Repeat for other products -->
            <div class="col">
                <div class="card border-0 text-center product-card">
                    <img src="" class="card-img-top" alt="product 2">
                    <div class="card-body p-2">
                        <p class="product-title mb-1">SPYDER ; SMITH 2 ; S3080 (BLK) - 00</p>
                        <p class="product-price">Rp1.150.000</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card border-0 text-center product-card">
                    <img src="https://via.placeholder.com/200x150?text=Kacamata+3" class="card-img-top" alt="product 3">
                    <div class="card-body p-2">
                        <p class="product-title mb-1">PROGEAR ; S 1282 ; C1 (BLK) - 69</p>
                        <p class="product-price">Rp2.450.000</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card border-0 text-center product-card">
                    <img src="https://via.placeholder.com/200x150?text=Kacamata+4" class="card-img-top" alt="product 4">
                    <div class="card-body p-2">
                        <p class="product-title mb-1">SPYDER ; MOTION ; S3042 (GREY) - 00</p>
                        <p class="product-price">Rp1.350.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>