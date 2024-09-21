
<div class="row">
    <div class="col-lg-12">
        <div class="card ">
            <div class="card-body">

                <form action="" id="userform" method="POST" class="form-horizontal p-t-20" enctype="multipart/form-data" >
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="site_name" class="col-sm-3 control-label">Site Name</label>
                                <div class="col-sm-9 mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="site_name" id="site_name" value="<?= isset($rowData['site_name']) ? $rowData['site_name']:'' ?>" placeholder="Enter Name">
                                    </div>
                                </div> 
                            </div>
   
                            <div class="form-group row">
                                <label for="ff" class="col-sm-3 control-label">Logo</label>
                                <div class="col-sm-9 mb-3">
                                    <input type="file" id="site_logo" name="site_logo" class="form-control dropify" data-default-file="" />
                                    <img src="<?= !empty($rowData['site_logo']) ? base_url(UPLOAD . $rowData['site_logo']):''; ?>" width="100" class="p-2" />
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="ff" class="col-sm-3 control-label">Favicon</label>
                                <div class="col-sm-9 mb-3">
                                    <input type="file" id="favicon" name="favicon" class="form-control dropify" data-default-file="" />
                                    <img src="<?= !empty($rowData['favicon']) ? base_url(UPLOAD . $rowData['favicon']):''; ?>" width="45" class="p-2" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9 mb-3">
                                    <div class="input-group">
                                        <input type="email" class="form-control" name="email" id="email" value="<?= isset($rowData['email']) ? $rowData['email']:'' ?>" placeholder="Enter email">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="wa_number" class="col-sm-3 control-label">Contact Number</label>
                                <div class="col-sm-9 mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?= isset($rowData['wa_number']) ? $rowData['wa_number']:'' ?>" name="wa_number" id="wa_number" placeholder="" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-lg-6">
                            <div class="form-group row" >
                                <label for="instagram_link" class="col-sm-3 control-label">Instagram</label>
                                <div class="col-sm-9 mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="instagram_link" id="instagram_link" value="<?= isset($rowData['instagram_link']) ? $rowData['instagram_link']:'' ?>" placeholder="Enter link">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row" >
                                <label for="fb_link" class="col-sm-3 control-label">Facebook</label>
                                <div class="col-sm-9 mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="fb_link" id="fb_link" value="<?= isset($rowData['fb_link']) ? $rowData['fb_link']:'' ?>" placeholder="Enter link">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row" >
                                <label for="linkedin_link" class="col-sm-3 control-label">Linkedin</label>
                                <div class="col-sm-9 mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="linkedin_link" id="linkedin_link" value="<?= isset($rowData['linkedin_link']) ? $rowData['linkedin_link']:'' ?>" placeholder="Enter link">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row" >
                                <label for="youtube_link" class="col-sm-3 control-label">Youtube</label>
                                <div class="col-sm-9 mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="youtube_link" id="youtube_link" value="<?= isset($rowData['youtube_link']) ? $rowData['youtube_link']:'' ?>" placeholder="Enter link">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="twitter_link" class="col-sm-3 control-label">Twitter</label>
                                <div class="col-sm-9 mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="twitter_link" id="twitter_link" value="<?= isset($rowData['twitter_link']) ? $rowData['twitter_link']:'' ?>" placeholder="Enter link">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 text-right">
                            <div class="form-group row m-b-0">
                                <div class=" col-sm-9">
                                    <button type="submit" name="submit" value="Submit" class="btn btn-dark waves-effect waves-light">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
