<?php
//untuk keperluan card homepage pelajar
function displayCard($title="judul", $content="content", $start, $anchor= "#", $picture="/assets/images/samples/banana.jpg"){
    if (strlen($content)>50){
        $deskripsi = substr($content, 0, 50);
        $deskripsi .= "...";
    }else{
        $deskripsi = $content;
    }
    $btnText = "CONTINUE COURSE";
    if ($start==NULL){
        $btnText = "START COURSE";
    }
    echo '
    <div class="card" style="max-width: 20rem; max-height: 25rem;">
        <div class="card-content">
            <img class="img-fluid w-100" src="'.$picture.'" alt="image">
        </div>
        <div class="card-body">
            <h4 class="card-title">'.$title.'</h4>
            <p class="card-text">
                '.$deskripsi.'
            </p>
            <a href="'.$anchor.'"> '.$btnText.' </a>
        </div>
    </div>
    ';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage Pelajar</title>
    
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
</head>

<body>
    <div id="app">
        <!--pastiin include global nav di semua page! -->
        <?php include('global_nav.php'); ?>
        <div id="main" class="layout-horizontal">
            <div class="content-wrapper container"> 
                <div class="page-heading">
                    <h4>Learning Activity</h4>
                </div>
                
                <div class="page-content">
                    <section class="row d-flex">
                        <?php
                        
                        $page = (int)$page;
                        foreach ($courses as $course){
                            displayCard($course['title'], $course['content'], $course['started_date']);
                        }
                        ?>
                        <div class="container d-flex justify-content-center">
                            <!-- unnecessarily complicated numbering stuff -->
                            <table>
                                <tr>
                                    <?php if ($page!=1):?>
                                        <td><a href="<?= base_url('/homepage/pelajar/'.($page-1))?>"><<</a></td>
                                    <?php endif ?>
                                    <td></td>
                                    <?php if ($page==1):?>
                                        <td>1</td>
                                    <?php else: ?>
                                        <td><a href="<?= base_url('/homepage/pelajar/1')?>">1</a></td>
                                        <?php if ($page*4 <= $totalCourses):?>
                                            <td>...</td>
                                        <?php endif?>
                                    <?php endif ?>
                                    <td></td>
                                    <?php $counter = $page?>
                                    <?php while($counter*4 <= $totalCourses and $counter<=6): ?>
                                        <td><a href="<?= base_url('/homepage/pelajar/'.($counter+1))?>"><?= $counter+1 ?></a></td>
                                        <td></td>
                                        <?php $counter++ ?>
                                    <?php endwhile ?>
                                    <td></td>
                                    <?php if (count($courses)==4 and count($courses)>3) :?>
                                        <td><a href="<?= base_url('/homepage/pelajar/'.($page+1))?>">>></a></td>
                                    <?php endif?>
                                </tr>
                            </table>
                            <!-- unnecessarily complicated numbering stuff -->
                            
                        </div>
                        <!--
                        <div class="col-12 col-lg-9">
                            <div class="row">
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon purple">
                                                        <i class="iconly-boldShow"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Profile Views</h6>
                                                    <h6 class="font-extrabold mb-0">112.000</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon blue">
                                                        <i class="iconly-boldProfile"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Followers</h6>
                                                    <h6 class="font-extrabold mb-0">183.000</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon green">
                                                        <i class="iconly-boldAdd-User"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Following</h6>
                                                    <h6 class="font-extrabold mb-0">80.000</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body px-3 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon red">
                                                        <i class="iconly-boldBookmark"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Saved Post</h6>
                                                    <h6 class="font-extrabold mb-0">112</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Profile Visit</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="chart-profile-visit"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Profile Visit</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <svg class="bi text-primary" width="32" height="32" fill="blue"
                                                            style="width:10px">
                                                            <use
                                                                xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                        </svg>
                                                        <h5 class="mb-0 ms-3">Europe</h5>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-0">862</h5>
                                                </div>
                                                <div class="col-12">
                                                    <div id="chart-europe"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <svg class="bi text-success" width="32" height="32" fill="blue"
                                                            style="width:10px">
                                                            <use
                                                                xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                        </svg>
                                                        <h5 class="mb-0 ms-3">America</h5>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-0">375</h5>
                                                </div>
                                                <div class="col-12">
                                                    <div id="chart-america"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <svg class="bi text-danger" width="32" height="32" fill="blue"
                                                            style="width:10px">
                                                            <use
                                                                xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                        </svg>
                                                        <h5 class="mb-0 ms-3">Indonesia</h5>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-0">1025</h5>
                                                </div>
                                                <div class="col-12">
                                                    <div id="chart-indonesia"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Latest Comments</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-lg">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Comment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="col-3">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-md">
                                                                        <img src="assets/images/faces/5.jpg">
                                                                    </div>
                                                                    <p class="font-bold ms-3 mb-0">Cantik</p>
                                                                </div>
                                                            </td>
                                                            <td class="col-auto">
                                                                <p class=" mb-0">Congratulations on your graduation!</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="col-3">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-md">
                                                                        <img src="assets/images/faces/2.jpg">
                                                                    </div>
                                                                    <p class="font-bold ms-3 mb-0">Ganteng</p>
                                                                </div>
                                                            </td>
                                                            <td class="col-auto">
                                                                <p class=" mb-0">Wow amazing design! Can you make another tutorial for
                                                                    this design?</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card">
                                <div class="card-body py-4 px-5">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl">
                                            <img src="assets/images/faces/1.jpg" alt="Face 1">
                                        </div>
                                        <div class="ms-3 name">
                                            <h5 class="font-bold">John Duck</h5>
                                            <h6 class="text-muted mb-0">@johnducky</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Recent Messages</h4>
                                </div>
                                <div class="card-content pb-4">
                                    <div class="recent-message d-flex px-4 py-3">
                                        <div class="avatar avatar-lg">
                                            <img src="assets/images/faces/4.jpg">
                                        </div>
                                        <div class="name ms-4">
                                            <h5 class="mb-1">Hank Schrader</h5>
                                            <h6 class="text-muted mb-0">@johnducky</h6>
                                        </div>
                                    </div>
                                    <div class="recent-message d-flex px-4 py-3">
                                        <div class="avatar avatar-lg">
                                            <img src="assets/images/faces/5.jpg">
                                        </div>
                                        <div class="name ms-4">
                                            <h5 class="mb-1">Dean Winchester</h5>
                                            <h6 class="text-muted mb-0">@imdean</h6>
                                        </div>
                                    </div>
                                    <div class="recent-message d-flex px-4 py-3">
                                        <div class="avatar avatar-lg">
                                            <img src="assets/images/faces/1.jpg">
                                        </div>
                                        <div class="name ms-4">
                                            <h5 class="mb-1">John Dodol</h5>
                                            <h6 class="text-muted mb-0">@dodoljohn</h6>
                                        </div>
                                    </div>
                                    <div class="px-4">
                                        <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Start
                                            Conversation</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Visitors Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-visitors-profile"></div>
                                </div>
                            </div>
                        </div>-->
                    </section>
                </div>
            </div>

            <footer>
                <div class="container">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2021 &copy; Mazer</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                    href="http://ahmadsaugi.com">A. Saugi</a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
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
