<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="<?= base_url('/course/add') ?>" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Course Name</label>
            <input type="text" name="c_name" class="form-control" id="name" aria-describedby="emailHelp" value="<?= old('c_name') ?>">
        </div>
        <div class="mb-3">
            <label for="category">Category</label>
            <select class="form-select" name="category_id" id="category">
                <option value="0">Pilih Kategori</option>
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
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <textarea class="form-control" name="c_desc" id="desc" cols="30" rows="10"><?= old('c_desc') ?></textarea>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="paid_check" id="paid_check_yes" value="1" <?php if (old('paid_check') == 1) : ?> <?= 'checked' ?> <?php endif ?>>
            <label class="form-check-label" for="paid_check_yes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="paid_check" id="paid_check_no" value="0" <?php if (old('paid_check') == 0) : ?> <?= 'checked' ?> <?php endif ?>>
            <label class="form-check-label" for="paid_check_no">No</label>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" value="<?= old('c_price') ?>" name="c_price" class="form-control" id="price">
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="course_picture">Gambar Buku</label>
                <p>Jenis File Image: png, jpg, atau jpeg. Maksimal ukuran file 2 mb
                </p>
                <input type="file" id="course_picture" name="course_picture" class="form-control" accept="image/*">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save as draft</button>
        <button type="button">Publish</button>
    </form>
</body>

</html>