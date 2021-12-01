<?php
$session = session();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $course['c_name'] ?> | Berbaring</title>

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
            <!-- mode belum enroll-->
            <?php if ($mode==1) : ?>
            <div class="content-wrapper container">
                <div class="page-content">
                    <!-- Basic Tables start -->
                    <section class="section">
                        <div class="container">
                            <div class="row align-items-start">
                                <div class="col">
                                    <div class="row align-items-start">
                                        <!--Judul-->
                                        <h5 class="my-4" id="course_title"><?= $course['c_name'] ?></h5>
                                        <div class="col">
                                            <!--Card course-->
                                            <div class="card" style="width: 18rem;">
                                                <img src="<?= '/uploads'.'/'.$course['c_id'].'/'.$course['c_imagepath']?>" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h6 class="card-title"><?= $course['c_name'] ?></h6>
                                                    <p class="card-text"><?= $course['publisher'] ?></p>
                                                    <a href="#" class="card-link"><?php
                                                    if ($course['c_price']>0){
                                                        echo 'RP. '.$course['c_price'];
                                                    }else{
                                                        echo 'FREE';
                                                    }?></a>
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="col">
                                            <!--yang didapat-->
                                            <div class="card" style="width: 19rem;">
                                                <div class="card-body">
                                                    <table class="table table-borderless">
                                                        <tbody>
                                                            <tr>
                                                                <th><i class='fas fa-file-video' style='font-size:14px'></th>
                                                                <td>39 Videos</td>
                                                            </tr>
                                                            <tr>
                                                                <th><i class='fas fa-comment-alt' style='font-size:14px'></th>
                                                                <td>Discuss with the mentor</td>
                                                            </tr>
                                                            <tr>
                                                                <th><i class='fas fa-folder-open' style='font-size:14px'></th>
                                                                <td>5 Downloadable resource</td>
                                                            </tr>
                                                            <tr>
                                                                <th><i class='fas fa-clock' style='font-size:14px'></th>
                                                                <td>Lifetime access</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="enroll">
                                                <!--Enroll-->
                                                <button class="btn btn-primary">Enroll now</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h4>Description</h4>
                                        <div class="card" style="width: 40rem;">
                                            <div class="card-body">
                                                <p class="card-text"><?= $course['c_desc'] ?></p>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <h5 class="my-4" id="course_title">Know Your Mentor</h5>
                                        <!--Mentor-->
                                        <div class="row align-items-start">
                                            <div class="col">
                                                <img class="mb-1" src="https://awsimages.detik.net.id/community/media/visual/2020/03/02/2a63b94a-6c0c-4a98-bb8a-22d39ba1c449_43.jpeg?w=700&q=90" height="120" width="120" style="object-fit: cover; border-radius: 50%">
                                            </div>
                                            <div class="col">
                                                <p><b><?= $course['publisher'] ?></b></p>
                                                <p>Lecturer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <h5 class="my-4" id="course_title">Chapter</h5>
                                    <!--Card Chapter-->
                                    <div class="card" style="width: 20rem;">
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <?php
                                                    $count = 0;
                                                    foreach ($chapters as $chapter){
                                                        $count++;
                                                        echo '<tr>
                                                            <th><i class=\'fas fa-lock\' style=\'font-size:14px\'></th>
                                                            <td>Chapter '.$count.': '.$chapter['sc_name'].'</td>
                                                        </tr>';
                                                    }
                                                    if ($count==0){
                                                        echo '<tr>
                                                            <th><i class=\'fas fa-lock\' style=\'font-size:14px\'></th>
                                                            <td>Belum ada chapter</td>
                                                        </tr>';
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <?php elseif ($mode==2) : ?>
            <!-- mode sudah enroll-->
            <div class="content-wrapper container">
                <div class="page-content">
                    <!-- Basic Tables start -->
                    <section class="section">
                        <div class="container">
                            <div class="row align-items-start">
                                <div class="col">
                                    <div class="row align-items-start">
                                        <!--Judul-->
                                        <h5 class="my-4" id="course_title"><?= $course['c_name'] ?></h5>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="my-4">Description</h4>
                                            <div class="card" style="width: 40rem;">
                                                <div class="card-body">
                                                    <p class="card-text"><?= $course['c_desc'] ?></p>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h5 class="my-4" id="course_title">Chapter</h5>
                                            <!--Card Chapter-->
                                            <div class="card" style="width: 20rem;">
                                                <div class="card-body">
                                                    <table class="table table-borderless">
                                                        <tbody>
                                                            <?php
                                                            $count = 0;
                                                            foreach ($chapters as $chapter){
                                                                $count++;
                                                                echo '<tr>
                                                                    <td><a href="'.base_url('course/'.$course['c_id'].'/learn'.'/'.$count).'">Chapter '.$count.': '.$chapter['sc_name'].'</td>
                                                                </tr>';
                                                            }
                                                            if ($count==0){
                                                                echo '<tr>
                                                                    <th><i class=\'fas fa-lock\' style=\'font-size:14px\'></th>
                                                                    <td>Belum ada chapter</td>
                                                                </tr>';
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <h5 class="my-4" id="course_title">Know Your Mentor</h5>
                                        <!--Mentor-->
                                        <div class="row align-items-start">
                                            <div class="col">
                                                <img class="mb-1" src="https://awsimages.detik.net.id/community/media/visual/2020/03/02/2a63b94a-6c0c-4a98-bb8a-22d39ba1c449_43.jpeg?w=700&q=90" height="120" width="120" style="object-fit: cover; border-radius: 50%">
                                            </div>
                                            <div class="col">
                                                <p><b><?= $course['publisher'] ?></b></p>
                                                <p>Lecturer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- mode subchapter mulai belajar-->
            <?php elseif ($mode==3) : ?>
                <div class="content-wrapper container">
                <div class="page-content">
                    <!-- Basic Tables start -->
                    <section class="section">
                        <div class="container">
                            <div class="row align-items-start">
                                <div class="col">
                                    <div class="row align-items-start">
                                        <!--Judul-->
                                        <h5 class="my-4" id="course_title"><?= $course['c_name'] ?></h5>
                                        <div class="col">
                                            <!--yt vid-->
                                            <iframe width="1280" height="720"
                                            src="<?= $subchapter['sc_video_link']?>">
                                            </iframe> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="my-4">Files</h5>
                                            <!--Card Chapter-->
                                            <div class="card" style="width: 20rem;">
                                                <div class="card-body">
                                                    <table class="table table-borderless">
                                                        <tbody>
                                                            <a href="<?= base_url('uploads/' . $course['c_id'] . '/' . $subchapter['sc_id'] . '/' . $subchapter['sc_filepath']) ?>" target="_blank" rel="noopener noreferrer"><?= $subchapter['sc_filepath']?></a><br>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="my-4">Description</h4>
                                            <div class="card" style="width: 55rem;">
                                                <div class="card-body">
                                                    <p class="card-text"><?= $subchapter['sc_desc'] ?></p>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h4 class="my-4" id="course_title">Chapter</h5>
                                            <!--Card Chapter-->
                                            <div class="card" style="width: 20rem;">
                                                <div class="card-body">
                                                    <table class="table table-borderless">
                                                        <tbody>
                                                            <?php
                                                            $count = 0;
                                                            foreach ($chapters as $chapter){
                                                                $count++;
                                                                echo '<tr>
                                                                    <td><a href="'.base_url('course/'.$course['c_id'].'/learn'.'/'.$count).'">Chapter '.$count.': '.$chapter['sc_name'].'</td>
                                                                </tr>';
                                                            }
                                                            if ($count==0){
                                                                echo '<tr>
                                                                    <th><i class=\'fas fa-lock\' style=\'font-size:14px\'></th>
                                                                    <td>Belum ada chapter</td>
                                                                </tr>';
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <h5 class="my-4" id="course_title">Know Your Mentor</h5>
                                        <!--Mentor-->
                                        <div class="row align-items-start">
                                            <div class="col">
                                                <img class="mb-1" src="https://awsimages.detik.net.id/community/media/visual/2020/03/02/2a63b94a-6c0c-4a98-bb8a-22d39ba1c449_43.jpeg?w=700&q=90" height="120" width="120" style="object-fit: cover; border-radius: 50%">
                                            </div>
                                            <div class="col">
                                                <p><b><?= $course['publisher'] ?></b></p>
                                                <p>Lecturer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <?php endif?>
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