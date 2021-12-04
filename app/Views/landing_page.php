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
$mentor = 'homepage/mentor';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berbaring | Landing Page</title>

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

    <script>
        $(function() {
            $('a[href*=\\#]:not([href=\\#])').on('click', function() {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.substr(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 10000);
                    return false;
                }
            });
        });
    </script>
</head>

<body>
    <div id="app">
        <!--pastiin include global nav di semua page! -->
        <?php include('global_nav.php'); ?>
        <div id="main" class="layout-horizontal">
            <header id="showcase">
                <h1 style="color:white">Chin up, straight back, let's study with all our might</h1>
                <p style="color:white; font-size:18px">Dengan berbaring, Anda dapat mempelajari berbagai skill secara terorganisir.</p>
                <?php
                if (!$session->get('is_logged_in')) : ?>
                    <!-- Sign up kalau belum masuk akun -->
                    <a href="<?= base_url('/register'); ?>" class="btn btn-success">Start Now</a>
                <?php else : ?>
                    <!-- Scroll ke recommended  -->
                    <a href="#recommended" class="btn btn-success">Start Now</a>
                <?php endif ?>
            </header>
            <div class="content-wrapper container" style="padding-top: 60px;">
                <div id="recommended" class="page-heading">
                    <h3>Recommended For You</h3>
                </div>
                <div class="page-content">
                    <!-- Basic Tables start -->
                    <section class="content-types">
                        <div class="row row-cols-3 row-cols-md-4 g-4">
                            <?php foreach ($course as $c) : ?>
                                <div class="col">
                                    <a href="<?= base_url('course/' . $c['c_id']); ?>">
                                        <div class="card h-90">
                                            <div class="card-content">
                                                <img src="<?= '/uploads' . '/' . $c['c_id'] . '/' . $c['c_imagepath'] ?>" class="card-img-top img-fluid" alt="">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $c['c_name'] ?></h5>
                                                    <p class="card-text"><?= $c['name'] ?></p>
                                                </div>
                                                <div class="card-footer border-0">
                                                    <h6 class="card-text" style="color:#409CA6">
                                                        <?php if ($c['c_price'] == 0) : ?>
                                                            FREE
                                                        <?php else : echo 'Rp' . number_format($c['c_price'], 0, ',', '.') ?>
                                                    </h6>
                                                <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </section>
                </div>
            </div>

            <div class="content-wrapper container" style="padding-top: 60px;">
                <div class="page-heading">
                    <h3>What do people say?</h3>
                </div>
                <div class="page-content">
                    <section class="content-types">
                        <div class="row row-cols-3 row-cols-md-3 g-4">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <img src="assets/images/faces/yuri.png" class="card-comment" alt="">
                                        </div>
                                        <div style="padding-top:12px">
                                            <h5 class="card-title">Yuri Edit</h5>
                                            <p class="card-text">How to Hack Google by Using CSS</p>
                                            <p class="card-text" style="padding-top: 8px;">"Saya jadi lebih paham bagaimana menggunakan Flutter dan back-end Laravel!"</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <img src="assets/images/faces/salma.png" class="card-comment" alt="">
                                        </div>
                                        <div style="padding-top:12px">
                                            <h5 class="card-title">Safira Sama Rahma</h5>
                                            <p class="card-text">Machine Learning: Image Classification</p>
                                            <p class="card-text" style="padding-top: 8px;">"Machine Learning sangat menyenangkan"</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <img src="assets/images/faces/aziz.png" class="card-comment" alt="">
                                        </div>
                                        <div style="padding-top:12px">
                                            <h5 class="card-title">Ahmad Bustanul Aziz</h5>
                                            <p class="card-text">Complete C# Unity Game Tester</p>
                                            <p class="card-text" style="padding-top: 8px;">"Daftar Berbaring karena e-learning kampus sering down"</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="content-wrapper container" style="padding-top: 60px; padding-bottom: 60px;">
                <h1 style="color:black; text-align:center">Funfact #1:</h1>
                <p style="color:black; font-size:32px; text-align:center">"Berbaring" merupakan singkatan dari Belajar Bersama Daring</p>
            </div>
        </div>
        <?php include('footer.php') ?>
        <!-- <footer>
            <div class="container">
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </div>
        </footer> -->
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