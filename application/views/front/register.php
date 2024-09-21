<div class="bs-stepper-content pt-4">
    <div class="container">
        <div class="row">
        <div class="col-lg-3"></div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <?php
          if (isset($msg) || validation_errors() !== '') : ?>
            <div class="alert alert-danger alert-dismissible">
              <?= validation_errors(); ?>
              <?= isset($msg) ? $msg : ''; ?>
            </div>
          <?php endif; ?>
                <form method="POST" id="multiStepsForm" enctype="multipart/form-data">
                    <div class="ps-form--review elite">
                        <h2 class="ps-form__title">Ragister Account</h2>
                        <div class="row">     
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="ps-form__group">
                                    <label class="ps-form__label alice">First Name</label> 
                                    <input class="form-control ps-form__input" type="text" name="user_firstname" id="user_fullname" class="form-control" placeholder="First Name" aria-label="john.doe" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="ps-form__group">
                                    <label class="ps-form__label alice">Last Name</label>
                                    <input class="form-control ps-form__input" type="text" name="user_lastname" id="user_last_name" class="form-control" placeholder="Last name" aria-label="john.doe" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="ps-form__group">
                                    <label class="ps-form__label alice">Email</label>
                                    <input class="form-control ps-form__input" type="email" name="user_email" id="user_email" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="ps-form__group">
                                    <label class="ps-form__label alice">Date of Birth</label>
                                    <input class="form-control ps-form__input" type="text" name="user_dob" id="user_dob" class="form-control" placeholder="D-O-B" aria-label="john.doe" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="ps-form__group">
                                    <label class="ps-form__label alice">mobile</label>
                                    <input class="form-control ps-form__input" type="text" name="user_mobile" id="phone" class="form-control" placeholder="123456789" aria-label="john.doe" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 ">
                                <div class="ps-form__group">
                                    <label class="ps-form__label alice">Gender</label>
                                    <input class="form-control ps-form__input" type="text" name="user_gender" id="user_email" class="form-control" placeholder="Gender" aria-label="john.doe" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-5">
                                <div class="ps-form__group">
                                    <label class="ps-form__label alice">Address1</label>
                                    <input class="form-control ps-form__input" type="text" name="user_address[0]" id="user_last_name" class="form-control" placeholder="address" aria-label="john.doe" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-5">
                                <div class="ps-form__group">
                                    <label class="ps-form__label alice">City</label>
                                    <input class="form-control ps-form__input" type="text" name="user_city[0]" id="user_last_name" class="form-control" placeholder="city" aria-label="john.doe" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="ps-form__group">
                                    <label class="ps-form__label alice">Zipcode</label>
                                    <input class="form-control ps-form__input" type="text" name="user_zipcode[0]" id="user_last_name" class="form-control" placeholder="zipcode" aria-label="john.doe" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="ps-form__group">
                                    <label class="ps-form__label alice">State</label>
                                    <input class="form-control ps-form__input" type="text" name="user_state[0]" id="user_last_name" class="form-control" placeholder="State" aria-label="john.doe" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-5">
                                <div class="ps-form__group">
                                    <label class="ps-form__label alice">Address2</label>
                                    <input class="form-control ps-form__input" type="text" name="user_address[1]" id="user_last_name" class="form-control" placeholder="address" aria-label="john.doe" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-5">
                                <div class="ps-form__group">
                                    <label class="ps-form__label alice">City</label>
                                    <input class="form-control ps-form__input" type="text" name="user_city[1]" id="user_last_name" class="form-control" placeholder="city" aria-label="john.doe" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="ps-form__group">
                                    <label class="ps-form__label alice">Zip code</label>
                                    <input class="form-control ps-form__input" type="text" name="user_zipcode[1]" id="user_last_name" class="form-control" placeholder="zipcode" aria-label="john.doe" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="ps-form__group">
                                    <label class="ps-form__label alice">State</label>
                                    <input class="form-control ps-form__input" type="text" name="user_state[1]" id="user_last_name" class="form-control" placeholder="State" aria-label="john.doe" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="ps-form__group">
                                    <label class="ps-form__label alice">Password</label>
                                    <input class="form-control ps-form__input" type="password" name="user_password" id="user_email" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multiStepsPass2" required>
                                </div>
                            </div>
                        </div>
                        <div class="ps-form__submit borderland">
                            <button type="submit" name="submit" value="submit" class="ps-btn ps-btn--warning">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>