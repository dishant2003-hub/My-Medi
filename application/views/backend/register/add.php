<div class="row ">
    <div class="col-lg-12">
        <div class="card ">
            <div class="card-body bg-dark mb-0">
                <h4 class="text-white card-title mb-0"> User Form </h4>
            </div>
            <div class="card-body">
                <span id="msg"></span>
                <form id="userForm" action="<?= base_url('backend/register/add'); ?>" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= isset($rowData['id']) ? $rowData['id'] : ''; ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <h5>User Detail </h5>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row mb-2">
                                        <label for="name" class="control-label">Name</label>
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="<?= isset($rowData['fname']) ? $rowData['fname'] : ''; ?>" required/>
                                            <div class="invalid-feedback"> Please enter your name. </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group row mb-2">
                                        <label for="name" class="control-label">Last Name</label>
                                        <div class="form-group">
                                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name" value="<?= isset($rowData['lname']) ? $rowData['lname'] : ''; ?>" required/>
                                            <div class="invalid-feedback"> Please enter your Last name. </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row mb-2">
                                        <label for="email" class="control-label">Email</label>
                                        <div class="form-group">
                                            <input type="email" class="form-control " name="email" id="email" placeholder="Enter email" value="<?= isset($rowData['email']) ? $rowData['email'] : ''; ?>" required>
                                            <div class="invalid-feedback"> Please enter a valid email </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group row mb-2">
                                        <label for="password" class="control-label">Password</label>
                                        <div class="form-group">
                                            <input type="password" class="form-control" value="<?= isset($rowData['password']) ? $rowData['password'] : ''; ?>" name="password" id="password" placeholder="Enter password" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row mb-2">
                                        <label for="mobile" class="control-label">Mobile</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control ctsNumber" name="mobile" id="mobile" maxlength="12" placeholder="Enter Mobile" value="<?= isset($rowData['mobile']) ? $rowData['mobile'] : ''; ?>" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row mb-2">
                                        <label for="dob" class="control-label">DOB</label>
                                        <div class="form-group">
                                            <input type="date" class="form-control" name="dob" id="dob" value="<?= isset($rowData['dob']) ? $rowData['dob'] : ''; ?>" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row mb-2">
                                <label for="address" class="control-label">Address</label>
                                <div class="form-group">
                                    <textarea class="form-control" name="address" id="address" placeholder="Enter Address" required><?= isset($arrow['address']) ? $arrow['address'] : ''; ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row mb-2">
                                        <label for="city" class="control-label">City</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter City" value="<?= isset($arrow['city']) ? $arrow['city'] : ''; ?>" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row mb-2">
                                        <label for="pincode" class="control-label">Zipcode</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Enter Zipcode" value="<?= isset($arrow['zipcode']) ? $arrow['zipcode'] : ''; ?>" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row mb-2">
                                        <label for="alocation" class="control-label">State</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="state" id="alocation" placeholder="Enter" value="<?= isset($arrow['state']) ? $arrow['state'] : ''; ?>" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row mb-2">
                                        <label for="is_active" class="control-label">Status</label>
                                        <div class="form-group">
                                            <select class="form-control" id="is_active" name="is_active" required>
                                                <option value="1" <?= (isset($rowData['is_active']) && $rowData['is_active'] == 1) ? 'selected' : ''; ?>> Active </option>
                                                <option value="0" <?= (isset($rowData['is_active']) && $rowData['is_active'] == 0) ? 'selected' : ''; ?>> Inactive </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 pt-2">
                            <div class="form-group row">
                                <hr>
                                <div class="d-flex">
                                    <button type="submit" name="submit" value="Submit" class="btn btn-dark waves-effect waves-light">Submit </button>&nbsp;
                                    <!-- <div class=" col-sm-3">
                                        <a href="<?php echo base_url('backend/users'); ?>"><button type="button" class="btn btn-danger waves-effect waves-light"> Cancel</button></a>
                                    </div> -->
                                </div>
                            </div> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--  -->

<script>
    (function($) {

    })(jQuery);
</script>