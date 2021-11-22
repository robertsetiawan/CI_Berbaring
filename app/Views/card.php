<?php

//untuk keperluan card homepage pelajar
function displayCard($title="judul", $content="content", $start, $picture="/assets/images/samples/banana.jpg", $anchor= "#"){
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

//untuk keperluan card homepage mentor
function displayMentorCard($title="judul", $content="content", $published=null, $picture="/assets/images/samples/banana.jpg", $anchor= "#"){
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
    <div class="card" style="max-width: 20rem; max-height: 25rem;">
        <div class="card-content style: "position: relative;">
            <img class="img-fluid w-100" src="'.$picture.'" alt="image">
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
    ';
}

?>
<!--
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card - Mazer Admin Dashboard</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>
<body>
<section id="content-types">
    <div class="row">
        <div class="col-xl-4 col-md-6 col-sm-12">
            <?php
            //card here
            //displayCard("AGUNG BAU", "TES KONTEN DAIOSNASN");
            ?>
        </div>
    </div>
</section>
</body>
</html>-->