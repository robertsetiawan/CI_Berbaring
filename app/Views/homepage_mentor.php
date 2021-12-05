<?php
//untuk keperluan card homepage mentor
function displayMentorCard($title="judul", $content="content", $published, $anchor, $picture="/assets/images/samples/banana.jpg"){
    if (strlen($content)>50){
        $deskripsi = substr($content, 0, 50);
        $deskripsi .= "...";
    }else{
        $deskripsi = $content;
    }
    $publish = "Published";
    if ($published == NULL){
        $publish = "Unpublished";
    }
    echo '
    <div class="col">
    <a href='.base_url('/course'.'/'.$anchor.'/info').'>
    <div class="card" style="max-width: 20rem; max-height: 25rem;">
        <div class="card-content style: \'position: relative;\'">
            <img class="img-fluid w-100" src="'.$picture.'" style: "object-fit= cover; height: 12vw" alt="image" style= "object-fit: cover; height: 12vw">
            <span 
            style="position: absolute; 
            bottom: 0px; right: 0px; 
            background: #3C64B1;
            opacity: 0.5; color: white; 
            padding-left: 16px; padding-right: 16px;">'.$publish.'</span>
        </div>
        <div class="card-body">
            <h4 class="card-title">'.$title.'</h4>
            <p class="card-text">
                '.$deskripsi.'
            </p>
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
    <title>Homepage Mentor</title>
    
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
            position: relative; bottom: 0; width: 100%; margin-top: 200px;
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
                    <h4>Create New Course</h4>
                </div>  
                
                <div class="page-content">
                    <section class="row row-cols-3 row-cols-md-4 g-4">
                            <div class="col">
                                <a href="<?= base_url('/course')?>">
                                <div class="card" style="max-width: 20rem; max-height: 25rem;">
                                    <div class="card-content style: 'position: relative;'">
                                        <img class="img-fluid w-100" src="<?= base_url('assets/images/addcourse.png') ?>" style= "object-fit: cover" alt="image">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">New Course</h4>
                                    </div>
                                </div>
                                </a>
                            </div>

                            <?php
                            //created course
                            foreach ($courses as $course){
                                displayMentorCard(
                                    $course['c_name'], 
                                    $course['c_desc'], 
                                    $course['published_date'], 
                                    $course['c_id'], 
                                    '/uploads'.'/'.$course['c_id'].'/'.$course['c_imagepath']);
                            }
                            ?>
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
