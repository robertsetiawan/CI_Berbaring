<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In | Berbaring</title>

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
    <script>
        function validationForm() {
            var email = document.getElementById("email").value
            var password = document.getElementById("password").value

            if (email != "" && password != "") {
                document.getElementById("submit").disabled = false
            } else {
                document.getElementById("submit").disabled = true
            }
        }
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
                    <section class="section">
                        <div class="card mx-auto" style="width: 36rem;">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="mx-auto">LOG IN</h3>
                            </div>
                            <div class="card-body">
                                <form action="process.php" method="POST">
                                    <div class="mb-3 col-md-9 mx-auto">
                                        <label for="email" class="form-label" style="color: black;">Email</label>
                                        <input type="email" class="form-control border border-dark" id="email" placeholder="Enter your email" oninput="validationForm()">
                                    </div>
                                    <div class="mb-3 col-md-9 mx-auto">
                                        <label for="password" class="form-label" style="color: black;">Password</label>
                                        <input type="password" class="form-control border border-dark" id="password" placeholder="Enter your password" oninput="validationForm()">
                                    </div>
                                    <div class="card-text mb-3 col-md-9 mx-auto">
                                        <p class="card-text"><a href="#">Forgot password?</a></p>
                                    </div>
                                    <div class="d-grid gap-2 mb-3 col-9 mx-auto mt-5">
                                        <button class="btn btn-primary" type="submit" id="submit" disabled>Log In</button>
                                    </div>
                                    <div class="card-text mb-3 col-md-9 mx-auto">
                                        <p class="card-text text-center">Don't have an account? <a href="/register">Sign Up</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="http://ahmadsaugi.com">A. Saugi</a></p>
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