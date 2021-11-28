<?php
$session = session();
//anchor My Learnings berubah bila sudah login
/* sudah pakai filters
if (!$session->get('is_logged_in')){
    $learnings = '/login';
}else{
    $learnings = '/homepage/pelajar/1';
}*/
$learnings = '/homepage/pelajar/1';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judul Course | Berbaring</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="/assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/assets/vendors/fontawesome/all.min.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/landing.css">
    <link rel="stylesheet" href="/assets/css/card.css">
    <style>
        footer {
            position: relative; bottom: 0; width: 100%; margin-top: 125px;
        }
    </style>
</head>

<body>
    <div id="app">
        <!--pastiin include global nav di semua page! -->
        <?php include('global_nav.php'); ?>
        <br>
        <div id="main" class="layout-horizontal">
            <div class="content-wrapper container">
                <div class="page-content">
                    <section class="row">
                        <!-- yang kiri -->
                        <div class="col-12 col-lg-9">
                            <h4 class="m-3">JUDUL COURSE</h4>
                            <div class="row">
                                <div class="col-6 col-lg-4 col-md-6">
                                    <div class="card" style="max-width: 20rem; max-height: 25rem;">
                                        <div class="card-content style: \'position: relative;\'">
                                            <img class="card-img-top img-fluid" src="/assets/images/samples/banana.jpg" alt="image" style= "object-fit: cover; height: 12vw">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">JUDUL COURSE</h4>
                                            <p class="card-text">
                                                dasodnosaindoasd
                                            </p>
                                            <a href="'.$anchor.'"> harga </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <h6 class="text-muted font-semibold">X videos</h6>
                                                <h6 class="text-muted font-semibold">Discuss with mentor</h6>
                                                <h6 class="text-muted font-semibold">X downloadable resources</h6>
                                                <h6 class="text-muted font-semibold">Lifetime access</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h4>Description</h4>
                                    <div>
                                        <p>deskripsideskripsideskripsideskripsideskripsideskripsideskripsidesk
                                            ripsideskripsideskripsideskripsideskripsideskripsideskripsideskripsideskripsideskripsi</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h4>Know your mentor!</h4>
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="/assets/images/faces/1.jpg" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">John Duck</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- yang kanan -->
                        <div class="col-12 col-lg-3">
                            <h4 class="m-3">Chapter</h4>
                            <div class="card">
                                <div class="row m-2">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-lock"></i>
                                        <span>Chapter 1: Introduction</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-lock"></i>
                                        <span>Chapter 2: IDE Setup</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-lock"></i>
                                        <span>Chapter 3: IDE Setup</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-lock"></i>
                                        <span>Chapter 4: IDE Setup</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-lock"></i>
                                        <span>Chapter 5: IDE Setup</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-lock"></i>
                                        <span>Chapter 6: IDE Setup</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-lock"></i>
                                        <span>Chapter 7: IDE Setup</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <?php include('footer.php') ?>
    </div>

    <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="/assets/js/pages/dashboard.js"></script>

    <script src="/assets/js/pages/horizontal-layout.js"></script>
    <script src="/assets/vendors/jquery/jquery.min.js"></script>
    <script src="/assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
    <script src="/assets/vendors/fontawesome/all.min.js"></script>
</body>

</html>