<?php

//untuk keperluan card homepage pelajar
function displayCard($title="judul", $content="content", $picture="/assets/images/samples/banana.jpg", $anchor= "#", $anchorName="START COURSE"){
    if (strlen($content)>63){
        $deskripsi = substr($content, 0, 60);
        $deskripsi .= "...";
    }else{
        $deskripsi = $content;
    }
    echo '
    <div class="card" style="max-width: 20rem; max-height: 25rem;">
        <div class="card-content">
            <img class="img-fluid w-100" src="'.$picture.'" alt="image">
            <div class="card-body">
                <h4 class="card-title">'.$title.'</h4>
                <p class="card-text">
                    '.$deskripsi.'
                </p>
                <a href="'.$anchor.'">'.$anchorName.'</a>
            </div>
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