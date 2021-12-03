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
    <div class="col">
    <a href="'.$anchor.'">
    <div class="card" style="max-width: 20rem; max-height: 25rem;">
        <div class="card-content style: \'position: relative;\'">
            <img class="card-img-top img-fluid" src="'.$picture.'" alt="image" style= "object-fit: cover; height: 12vw">
        </div>
        <div class="card-body">
            <h4 class="card-title">'.$title.'</h4>
            <p class="card-text">
                '.$deskripsi.'
            </p>
             '.$btnText.' 
        </div>
    </div>
    </a>
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
        <div id="main" class="layout-horizontal"> 
            <div class="content-wrapper container"> 
                <br>
                <div class="page-heading">
                    <h4>Learning Activity</h4>
                </div>
                
                <div class="page-content">
                    <section class="row row-cols-3 row-cols-md-4 g-4">
                        <?php
                        
                        $page = (int)$page;
                        foreach ($courses as $course){
                            if ($course['started_date']==NULL){
                                $anchor = base_url('course/'.$course['c_id'].'/start');
                            }else{
                                $anchor = base_url('course/'.$course['c_id']);
                            }
                            displayCard($course['title'],
                             $course['content'],
                             $course['started_date'],
                             $anchor,
                             '/uploads'.'/'.$course['c_id'].'/'.$course['imgpath']);
                        }
                        if (count($courses)==0){
                            echo '
                            <div class="container">
                                <div class="my-xl-5">
                                <h5 d-flex justify-content-center style="margin-bottom: 350px"> Anda belum daftar course manapun :( </h4>
                                </div>
                            </div>
                            ';
                        }
                        ?>
                    </section>
                    <div class="row d-flex">
                        <!-- unnecessarily complicated paging stuff -->
                        <div class="container d-flex justify-content-center">
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
                    </div>
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
