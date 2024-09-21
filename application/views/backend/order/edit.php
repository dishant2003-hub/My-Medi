<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl">
            <div class="card mb-8">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Details</h5></small>
                </div>
                <div class="card-body">

                    <form method="POST" action="<?= base_url('backend/orderdetails/insert_edit') ?>" enctype="multipart/form-data">

                        <div class="mb-3">
                            <input type="hidden" value="<?= isset($result['id']) ? $result['id'] : ''; ?>" class="id" name="id">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?= isset($result['fname']) ? $result['fname'] : ''; ?>" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label"> Last Name</label>
                            <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?= isset($result['lname']) ? $result['lname'] : ''; ?>" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label"> Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email" value="<?= isset($result['email']) ? $result['email'] : ''; ?>" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Company</label>
                            <input type="text" class="form-control" name="company" placeholder="Company" value="<?= isset($result['company']) ? $result['company'] : ''; ?>" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?= isset($result['phone']) ? $result['phone'] : ''; ?>" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Address" value="<?= isset($result['address']) ? $result['address'] : ''; ?>" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" name="city" placeholder="City" value="<?= isset($result['city']) ? $result['city'] : ''; ?>" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Zipcode</label>
                            <input type="text" class="form-control" name="zipcode" placeholder="Zipcode" value="<?= isset($result['zipcode']) ? $result['zipcode'] : ''; ?>" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">County</label>
                            <input type="text" class="form-control" name="country" placeholder="County" value="<?= isset($result['country']) ? $result['country'] : ''; ?>" />
                        </div>

                        <input type="submit" name="submit" class="btn btn-primary">
                        <a href="<?= base_url('backend/order_detail'); ?>" name="Cancel" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

