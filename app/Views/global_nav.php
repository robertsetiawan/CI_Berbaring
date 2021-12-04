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

<link rel="stylesheet" href="/assets/css/global_nav.css">

<div id="main" class="layout-horizontal">
    <header>
        <!-- <div class="header-top">
            <div class="container">
                <div class="logo">
                    <a href="#"><img src="/assets/images/logo/berbaring_light.png" height="50" class="d-inline-block align-top" alt="Logo" srcset=""></a>
                </div>
                <div class="header-top-right"> -->
        <!-- Burger button responsive -->
        <!-- <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </div>
            </div>
        </div> -->

        <div class="container">
            <div class="header-top-right" style="align-items: center;">
                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-1"></i>
                </a>
            </div>
        </div>
        <nav class="main-navbar" style="display: block;">
            <div class="container">
                <ul class="d-flex justify-content-around" style="align-items: center;">
                    <li class="menu-item">
                        <div class="container">
                            <div class="logo">
                                <a href="#"><img src="/assets/images/logo/berbaring_light.png" height="50" class="d-inline-block align-top" alt="Logo" srcset=""></a>
                            </div>
                        </div>
                    </li>

                    <li class="menu-item ">
                        <a href="<?= base_url('/')?>" class='menu-link'>
                            <span>Home</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="<?= base_url($mentor)?>" class='menu-link'>
                            <span>Be a Mentor</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="<?= base_url($learnings) ?>" class='menu-link'>
                            <span>My Learnings</span>
                        </a>
                    </li>

                    <li class="menu-item w-25">
                        <form action="<?= base_url('/search'); ?>" method="POST">
                            <!-- getGet('search') -->
                            <div class="form-group position-relative has-icon-left">
                                <input name="query" type="text" class="form-control" placeholder="Search ">
                                <div class="form-control-icon">
                                    <i class="bi bi-search"></i>
                                </div>
                            </div>
                        </form>
                    </li>

                    <?php
                    if (!$session->get('is_logged_in')) : ?>
                        <li class="menu-item">
                            <a href="/register" class='btn btn-success'>
                                <span>Sign Up</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="<?= base_url('/login') ?>" class='menu-link'>
                                <span>Login</span>
                            </a>
                        </li>

                    <?php else : ?>
                        <li class="menu-item">
                            <a href="<?= base_url('/logout') ?>" class='menu-link'>
                                <span><?= $session->get('email') ?></span>
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </nav>
    </header>
</div>