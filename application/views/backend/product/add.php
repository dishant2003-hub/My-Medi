
<style>
    .remove-btn{
        color: black;
        background-color: #ede8e8;
        padding: 5px 9px;
        padding-top: 2px;
        border-radius: 100%;
    }
    .img-preview-thumb{
        width: 35%;
    }

    .remove-btn:hover{
        background-color: #cdd1db;
        color: white;
    }
  
</style>


<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Product</h5></small>
                </div>
                <div class="card-body">

                    <form method="POST" action="<?= base_url('backend/product/product_insert') ?>" enctype="multipart/form-data">
                        <?php
                        if (!empty($rowData['id'])) {
                            $img_id = $rowData['id'];
                            $get_product_img = $this->Service->get_all(TBL_PRODUCT_IMAGE, '*', array('product_id' => $img_id));
                        }
                        ?>  
                        <div class="mb-3">
                            <input type="hidden" value="<?= isset($rowData['id']) ? $rowData['id'] : ''; ?>" class="id" name="id">
                        </div> 
 
                        <div class="mb-3">
                            <label for="exampleFormControlSelect" class="form-label">Category</label>
                            <select class="form-select menu_change " name="Category" aria-label="Default select example">
                                <option>select Menu</option>
                                <?php  
                                foreach ($datares as $data) {
                                ?>
                                    <option value="<?= isset($data['id']) ? $data['id'] : ''; ?>">
                                        <?= isset($data['name']) ? $data['name'] : ''; ?>
                                    </option>   
                                <?php 
                                }  
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlSelect" class="form-label">Sub Category</label>
                            <select class="form-select" name="Subcategory" aria-label="Default select example" id="category_change">
                                <option selected>select Menu</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Product" value="<?= isset($rowData['name']) ? $rowData['name'] : ''; ?>" required/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="images[]" id="mul_images" multiple required/>
                            <div class="row ">
                                <?php
                                if (isset($get_product_img)) {
                                    foreach ($get_product_img as $data) {
                                        // pr($data);die;
                                ?>
                                        <div class="col-sm-3">
                                            <img src="<?= isset($data['image']) ? base_url(UPLOAD . $data['image']) : ''; ?>" id="images" width="50%" alt="">
                                            <a href="javascript:void(0);" data-img-id="<?php echo ($data['id']) ?>" class="btn btn-danger btn-sm delete_img"><i class="fa fa-trash"></i></a>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                            <div class="img-thumbs img-thumbs-hidden" id="img-preview"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"> Price</label>
                            <input type="text" class="form-control" name="Productprice" placeholder="Price" value="<?= isset($rowData['price']) ? $rowData['price'] : ''; ?>" required/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" > <?= isset($rowData['description']) ? $rowData['description'] : ''; ?></textarea>
                        </div>
                        <input type="submit" name="submit" class="btn btn-dark">
                        <a href="<?= base_url('backend/product_table'); ?>" name="Cancel" class="btn btn-danger">Cancel</a>
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

    $(document).ready(function() {
        $('.menu_change').change(function() {
            var id = $(this).val();
            // alert(id);

            $.ajax({
                type: "POST",
                url: "<?= base_url("backend/product/sub_menu_change") ?>",
                data: {
                    id: id,
                },
                success: function(data) {
                    var obj = JSON.parse(data);
                    console.log(obj);
                    var html = "";
                    obj.forEach(function myFunction(item, index, arr) {
                        html += '<option value="' + item.id + '">' + item.name + '</option>';
                    });
                    $('#category_change').html(html);
                }
            });
        });
    });
</script>
