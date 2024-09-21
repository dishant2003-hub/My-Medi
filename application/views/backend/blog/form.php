<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Blog</h5></small>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('backend/blog/insert') ?>" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="hidden" value="<?= isset($rowData['id']) ? $rowData['id'] : ''; ?>" class="id" name="id">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" required/>
                            <img src="<?= isset($rowData['image']) ? base_url(UPLOAD . $rowData['image']) : ''; ?>" id="images" width="10%" alt="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="line" value="<?= isset($rowData['line']) ? $rowData['line'] : ''; ?>" required/>
                        </div>  
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" value="<?= isset($rowData['date']) ? $rowData['date'] : ''; ?>" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Short Description</label>
                            <input type="text" class="form-control" name="short_des" value="<?= isset($rowData['short_des']) ? $rowData['short_des'] : ''; ?>" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea id="description" class="form-control" name="description" required> <?= isset($rowData['description']) ? $rowData['description'] : ''; ?></textarea>
                        </div>

                        <input type="submit" name="submit" class="btn btn-dark ">
                        <a href="<?= base_url('backend/blog_table'); ?>" name="Cancel" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // text editor
    ClassicEditor
        .create(document.querySelector('#description'))
</script>