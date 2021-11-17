<form action="<?= base_url('course/' . $c_id . '/detail/add') ?>" method="post" enctype="multipart/form-data">
    <div>
        <label for="name">Chapter Name</label>
        <input type="text" id="id" name="sc_name" value="<?= old('sc_name') ?>">
    </div>

    <div>
        <label for="video_link">Video Link</label>
        <input type="text" id="video_link" name="sc_video_link" value="<?= old('sc_video_link') ?>">
    </div>

    <div>
        <label for="file">Upload File</label>
        <input type="file" name="sc_filepath" id="file" accept=".xlsx,.xls,.doc,.docx,.ppt,.pptx,.txt,.pdf">
    </div>

    <div>
        <label for="desc">Description</label>
        <textarea name="sc_desc" id="desc" cols="30" rows="10"><?= old('sc_desc') ?></textarea>
    </div>

    <button type="submit">Save</button>

</form>