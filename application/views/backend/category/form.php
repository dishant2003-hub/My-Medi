    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Category</h5></small>
                </div>
                <div class="card-body">

                    <form method="POST" action="<?= base_url('backend/category/category_insert') ?>" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="hidden" value="<?= isset($rowData['id']) ? $rowData['id'] : ''; ?>" class="id" name="id">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlSelect" class="form-label">Category</label>
                            <select class="form-select" name="Category" aria-label="Default select example">
                                <option>select Menu</option>
                                <?php 
                                foreach ($arrow as $result) {
                                ?>
                                    <option value="<?= isset($result['id']) ? $result['id'] : ''; ?>">
                                        <?= isset($result['name']) ? $result['name'] : ''; ?>
                                    </option>
                                <?php } ?> 
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="<?= isset($rowData['name']) ? $rowData['name'] : ''; ?>" required/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" required/>
                            <img src="<?= isset($rowData['image']) ? base_url(UPLOAD . $rowData['image']) : ''; ?>" id="images" width="10%" alt="">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" required> <?= isset($rowData['description']) ? $rowData['description'] : ''; ?></textarea>
                        </div>

                        <input type="submit" name="submit" class="btn btn-dark">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 