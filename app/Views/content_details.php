<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Detail</title>
    
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
    <!-- <script>
        function validationForm() {
            var chaptername = document.getElementById("sc_name").value
            var videolink = document.getElementById("sc_video_link").value
            var uploadfile = document.getElementById("sc_filepath").value
            var description = document.getElementById("sc_desc").value

            if (chaptername != "" && videolink != "" && uploadfile != "" && description != "") {
                document.getElementById("submit").disabled = false
            } else {
                document.getElementById("submit").disabled = true
            }
        } -->
    </script>
</head>

<body>
    <div id="app">
        <!--pastiin include global nav di semua page! -->
        <?php include('global_nav.php'); ?>
        <div id="main" class="layout-horizontal">

            <div class="content-wrapper container">
                
                <div class="page-heading">
                    <!--<h3>Popular Books</h3>-->
                </div>
                <div class="page-content">
                <!-- Basic Tables start -->
                <!-- Basic Vertical form layout section start -->
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="mb-3 col-md-9 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" style="color: black;" >Course 2: New Chapter</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="coursedetails.php" method="POST" class="form form-horizontal">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label style="color: black;" ><b>Chapter Name :</b></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="sc_name" class="form-control border border-dark" name="chname" style="color: black;" oninput="validationForm()">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label style="color: black;"><b>Video Link :</b></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="link" id="sc_video_link" class="form-control border border-dark" name="video-link" style="color: black;" oninput="validationForm()">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label style="color: black;"><b>Upload File :</b></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <p class="card-text" style="color: black;" >Input Your Files Here.</p>
                                                        <!-- File uploader with multiple files upload -->
                                                        <input type="file"  id="sc_filepath" class="border border-dark multiple-files-filepond" multiple style="color: black;" oninput="validationForm()">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label style="color: black;"><b>Description :</b></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="sc_desc" class="form-control border border-dark" name="description" style="color: black;" >
                                                    </div>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                    <button class="btn btn-primary" type="submit" id="submit" >Save</button>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
