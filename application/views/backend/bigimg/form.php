<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Banner</h5></small>
                </div>
                <div class="card-body">

                    <form method="POST" action="<?= base_url('backend/banner/insert') ?>" enctype="multipart/form-data">

                        <div class="mb-3">
                            <input type="hidden" value="<?= isset($rowData['id']) ? $rowData['id'] : ''; ?>" class="id" name="id">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Product" value="<?= isset($rowData['name']) ? $rowData['name'] : ''; ?>" required/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="images" required/>
                            <img src="<?= isset($rowData['image']) ? base_url(UPLOAD . $rowData['image']) : ''; ?>" id="images" width="30%" alt="">
                        </div>

                        <input type="submit" name="submit" class="btn btn-dark">
                        <a href="<?= base_url('backend/banner_table'); ?>" name="Cancel" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        // ------ form ma mltiple image show ------- 
        var imgUpload = document.getElementById('mul_images'),
            imgPreview = document.getElementById('img-preview'),
            imgUploadForm = document.getElementById('form-upload'),
            totalFiles, previewTitle, previewTitleText, img;

        imgUpload.addEventListener('change', previewImgs, true);

        function previewImgs(event) {
            totalFiles = imgUpload.files.length;

            if (!!totalFiles) {
                imgPreview.classList.remove('img-thumbs-hidden');
            }

            for (var i = 0; i < totalFiles; i++) {
                wrapper = document.createElement('div');
                wrapper.classList.add('wrapper-thumb');
                removeBtn = document.createElement("span");
                nodeRemove = document.createTextNode('x');
                removeBtn.classList.add('remove-btn');
                removeBtn.appendChild(nodeRemove);
                img = document.createElement('img');
                img.src = URL.createObjectURL(event.target.files[i]);
                img.classList.add('img-preview-thumb');
                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                imgPreview.appendChild(wrapper);

                $('.remove-btn').click(function() {
                    $(this).parent('.wrapper-thumb').remove();
                });
            }
        }
    });
</script>

<style>
    .remove-btn {
        color: black;
        background-color: #ede8e8;
        padding: 5px 9px;
        padding-top: 2px;
        border-radius: 100%;
    }

    .img-preview-thumb {
        width: 35%;
    }

    .remove-btn:hover {
        background-color: #cdd1db;
        color: white;
    }
</style>