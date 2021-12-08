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
                        <?php if (session()->getFlashData('published_message')) : ?>
                            <div class="ms-auto w-25 pt-3">
                                <div class="alert alert-danger">
                                    <p class="alert-heading"><?= session()->getFlashdata('published_message'); ?></p>
                                </div>
                            </div>
                        <?php endif ?>
                        <div class="d-flex justify-content-between mt-5 subtitle mb-3">
                            <h4><b>Info Course: </b> Course Summary</h4>
                            <a href="<?= base_url('course/' . $course['c_id'] . '/edit') ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Course</a>
                        </div>
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Course Name</label>
                            <div class="col-sm-10">
                                <p><?= $course['c_name'] ?></p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="category" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <p><?= $course['name'] ?></p>
                            </div>

                        </div>

                        <div class="mb-3 row">
                            <label for="desc" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <?= $course['c_desc'] ?>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Is it paid?</label>
                            <div class="col-sm-10">
                                <?php if ($course['c_price'] > 0) : ?>
                                    <?php echo '<p>Yes</p>' ?>
                                <?php else : ?>
                                    <?php echo '<p>No</p>' ?>
                                <?php endif ?>
                            </div>
                        </div>

                        <?php if ($course['c_price'] > 0) : ?>
                            <div class="mb-3 row">
                                <label for="price" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <p><?= 'Rp' . number_format($course['c_price'], 0, ',', '.') ?></p>
                                </div>
                            </div>
                        <?php endif ?>

                        <div class="mb-3 row">
                            <label for="course_picture" class="col-sm-2 col-form-label">Course Picture Profile</label>
                            <div class="col-sm-10">
                                <a target="_blank" href="<?= base_url('uploads/' . $course['c_id'] . '/' . $course['c_imagepath']) ?>">Click to Preview</a>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-5 mb-3">
                            <h4><b>Course Content</h4>
                            <a href="<?= base_url('course/' . $course['c_id'] . '/detail') ?>" class="btn btn-primary">Add Chapter</a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-center fw-normal">
                                    <p hidden>Empty course content</p>
                                </div>

                                <ul class="list-group list-group-flush">
                                    <?php foreach ($subchapters as $subchapter) : ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center"><?= $subchapter['sc_name'] ?>
                                            <div class="d-flex justify-content-start">
                                                <a href="<?= base_url('course/' . $course['c_id'] . '/' . 'detail/' . $subchapter['sc_id'] . '/edit') ?>" class="btn btn-success mx-1" type="button" title="Edit"><i class="fa fa-edit"></i></a>
                                                <button class="btn btn-danger" type="button" title="Delete" data-bs-toggle="modal" data-bs-backdrop="false" data-bs-target="<?= '#delete_' . preg_replace('/[^A-Za-z0-9\-]/', '_', $subchapter['sc_name'] . '_' . $subchapter['sc_id']) ?>"><i class="fa fa-trash"></i></button>
                                                <div class="modal fade text-left" id="<?= 'delete_' . preg_replace('/[^A-Za-z0-9\-]/', '_', $subchapter['sc_name'] . '_' . $subchapter['sc_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel1">Konfirmasi Hapus "<?= $subchapter['sc_name'] ?>"?</h5>
                                                                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    Apa Anda yakin untuk menghapus chapter ini?<br>
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn" data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <a href="<?= base_url('course/' . $course['c_id'] . '/' . 'detail' . '/' . $subchapter['sc_id'] . '/delete') ?>" class="btn btn-danger ml-1">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Confirm</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                        <?php if ($course['published_date'] == null) : ?>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
                                <a href="<?= base_url('course/' . $course['c_id'] . '/publish') ?>" class="btn btn-primary" type="button">Publish</a>
                            </div>
                        <?php else : ?>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
                                <p>Already Published</p>
                            </div>
                        <?php endif ?>
                    </section>
                </div>
            </div>

            <?php include('footer.php') ?>

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