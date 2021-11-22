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
<div id="header" class="layout-horizontal">
    <header class="mb-5">
        <div class="header-top-right">
            <!-- Burger button responsive -->
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </div>
        <nav class="main-navbar">
            <div class="container">
                <ul class="d-flex justify-content-around">
                    <li class="menu-item">
                        <div class="container">
                            <div class="logo">
                                <a href="index.html"><img src="/assets/images/logo/logo.png" width="100" height="30" class="d-inline-block align-top" alt="Logo" srcset=""></a>
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
                        <a href="<?= base_url($learnings)?>" class='menu-link'>
                            <span>My Learnings</span>
                        </a>
                    </li>

                    <li class="menu-item w-25">
                        <form method="GET">
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control" placeholder="Search ">
                                <div class="form-control-icon">
                                    <i class="bi bi-search"></i>
                                </div>
                            </div>
                        </form>
                    </li>

                    <!-- code php untuk mengubah global nav saat user login -->
                    <?php
                    if (!$session->get('is_logged_in')):?>
                        <li class="menu-item">
                            <a href="/register" class='btn btn-success'>
                                <span>Sign Up</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="<?= base_url('/login')?>" class='menu-link'>
                                <span>Login</span>
                            </a>
                        </li>
                    <?php else: ?>
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