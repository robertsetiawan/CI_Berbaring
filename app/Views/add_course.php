<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>

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

                <div class="page-content">
                    <!-- Basic Tables start -->
                    <section class="section">
                        <div class="subtitle mt-3 mb-3">
                            <h4><b>Create Course: </b> Course Summary</h4>
                        </div>
                        <form method="POST" action="<?= base_url('/course/add') ?>" enctype="multipart/form-data" onsubmit="validationForm()">
                            <?= csrf_field(); ?>
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-2 col-form-label">Course Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="c_name" class="form-control" id="name" value="<?= old('c_name') ?>">
                                    <?php if (!empty(session()->getFlashdata('error_c_name'))) : ?>
                                        <div class="text-danger"><?= session()->getFlashdata('error_c_name') ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="category" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="category_id" id="category">
                                        <option value="0">Choose Category</option>
                                        <?php if (!empty($categories)) : ?>
                                            <?php foreach ($categories as $category) : ?>
                                                <?php if (old('category_id') == $category['category_id']) : ?>
                                                    <?php echo '<option value="' . $category['category_id'] . '" selected>' . $category['name'] . '</option>' ?>
                                                <?php else : ?>
                                                    <option value="<?= $category['category_id'] ?>"><?= $category['name'] ?></option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                    <?php if (!empty(session()->getFlashdata('error_category_id'))) : ?>
                                        <div class="text-danger"><?= session()->getFlashdata('error_category_id') ?></div>
                                    <?php endif; ?>
                                </div>

                            </div>

                            <div class="mb-3 row">
                                <label for="desc" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="c_desc" id="desc" cols="30" rows="10"><?= old('c_desc') ?></textarea>
                                    <?php if (!empty(session()->getFlashdata('error_c_desc'))) : ?>
                                        <div class="text-danger"><?= session()->getFlashdata('error_c_desc') ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="name" class="col-sm-2 col-form-label">Is it paid?</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="paid_check" id="paid_check_yes" value="1" <?php if (old('paid_check') == 1) : ?> <?= 'checked' ?> <?php endif ?>>
                                        <label class="form-check-label" for="paid_check_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="paid_check" id="paid_check_no" value="0" <?php if (old('paid_check') == 0) : ?> <?= 'checked' ?> <?php endif ?>>
                                        <label class="form-check-label" for="paid_check_no">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="price" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" value="<?= old('c_price') ?>" name="c_price" class="form-control" id="price">
                                    <?php if (!empty(session()->getFlashdata('error_c_price'))) : ?>
                                        <div class="text-danger"><?= session()->getFlashdata('error_c_price') ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="course_picture" class="col-sm-2 col-form-label">Course Picture Profile</label>
                                <div class="col-sm-10">
                                    <input type="file" id="course_picture" name="course_picture" class="form-control" accept="image/*">
                                    <p class="mt-2"><small>Jenis File Image: png, jpg, atau jpeg. Maksimal ukuran file 2 mb.</small></p>
                                    <?php if (!empty(session()->getFlashdata('error_course_picture_1'))) : ?>
                                        <div class="text-danger"><?= session()->getFlashdata('error_course_picture_1') ?></div>
                                    <?php endif; ?>
                                    <?php if (!empty(session()->getFlashdata('error_course_picture_2'))) : ?>
                                        <div class="text-danger"><?= session()->getFlashdata('error_course_picture_2') ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- <div class="d-flex justify-content-between mt-5 mb-3">
                                <h4><b>Course Content</h4>
                                <a href="#" class="btn btn-primary">Add Course</a>
                            </div> -->

                            <!-- <div class="card">
                                <div class="card-body">
                                    Kalau blm ada chapternya tampilin ini!
                                    <div class="d-flex justify-content-center fw-normal">
                                        <p hidden>Empty course content</p>
                                    </div>

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Chapter 1
                                            <div class="d-flex justify-content-start">
                                                <button class="btn btn-success mx-1" type="button" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-danger" type="button" title="Delete"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Chapter 2
                                            <div class="d-flex justify-content-start">
                                                <button class="btn btn-success mx-1" type="button" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-danger" type="button" title="Delete"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Chapter 3
                                            <div class="d-flex justify-content-start">
                                                <button class="btn btn-success mx-1" type="button" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-danger" type="button" title="Delete"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Chapter 4
                                            <div class="d-flex justify-content-start">
                                                <button class="btn btn-success mx-1" type="button" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-danger" type="button" title="Delete"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
                                <button type="submit" class="btn btn-primary-outline"><b>Save as Draft</b></button>
                            </div>

                        </form>

                    </section>
                </div>
            </div>
            <?php include('footer.php') ?>
            <!-- <footer>
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
            </footer> -->

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