<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Details</h5></small>
                </div>
                <div class="card-body">

                    <form method="POST" action="<?= base_url('backend/setting/updata') ?>" enctype="multipart/form-data">
                      
                        <div class="mb-3">
                            <input type="hidden" value="<?= isset($rowData['setting_id']) ? $rowData['setting_id'] : ''; ?>" class="id" name="id">
                        </div>
                       
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="site_name" placeholder="name" value="<?= isset($rowData['site_name']) ? $rowData['site_name'] : ''; ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Logo</label>
                            <input type="file" class="form-control" name="site_logo" placeholder="Logo" />
                            <img src="<?= isset($rowData['site_logo']) ? base_url(UPLOAD . $rowData['site_logo']) : ''; ?>" id="images" width="10%" alt="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Favicon</label>
                            <input type="file" class="form-control" name="favicon" placeholder="Favicon"/>
                            <img src="<?= isset($rowData['favicon']) ? base_url(UPLOAD . $rowData['favicon']) : ''; ?>" id="images" width="10%" alt="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Header</label>
                            <input type="text" class="form-control" name="header" placeholder="Header" value="<?= isset($rowData['header']) ? $rowData['header'] : ''; ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Footer</label>
                            <input type="text" class="form-control" name="footer" placeholder="Footer" value="<?= isset($rowData['footer']) ? $rowData['footer'] : ''; ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="<?= isset($rowData['email']) ? $rowData['email'] : ''; ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Number</label>
                            <input type="text" class="form-control" name="wa_number" placeholder="Number" value="<?= isset($rowData['wa_number']) ? $rowData['wa_number'] : ''; ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Facebook</label>
                            <input type="text" class="form-control" name="fb_link" placeholder="Facebook" value="<?= isset($rowData['fb_link']) ? $rowData['fb_link'] : ''; ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Twitter</label>
                            <input type="text" class="form-control" name="twitter_link" placeholder="Twitter" value="<?= isset($rowData['twitter_link']) ? $rowData['twitter_link'] : ''; ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Linkdin</label>
                            <input type="text" class="form-control" name="linkedin_link" placeholder="Linkdin" value="<?= isset($rowData['linkedin_link']) ? $rowData['linkedin_link'] : ''; ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Instagram</label>
                            <input type="text" class="form-control" name="instagram_link" placeholder="Instagram" value="<?= isset($rowData['instagram_link']) ? $rowData['instagram_link'] : ''; ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Youtube</label>
                            <input type="text" class="form-control" name="youtube_link" placeholder="Youtube" value="<?= isset($rowData['youtube_link']) ? $rowData['youtube_link'] : ''; ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?= isset($rowData['phone']) ? $rowData['phone'] : ''; ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Address" value="<?= isset($rowData['address']) ? $rowData['address'] : ''; ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Form email</label>
                            <input type="text" class="form-control" name="from_email" placeholder="email" value="<?= isset($rowData['from_email']) ? $rowData['from_email'] : ''; ?>" />
                        </div>
                       
                        <input type="submit" name="submit" class="btn btn-dark">
                        <a href="<?= base_url('backend/settings'); ?>" name="Cancel" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



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
