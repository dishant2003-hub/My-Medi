<div class="bs-stepper-content pt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-3"></div>
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
                        <h2 class="ps-form__title">Login Account</h2>
                        <div class="row">    
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="ps-form__group">
                                    <label class="ps-form__label alice">Username or Email Address</label>
                                    <input class="form-control ps-form__input" type="text" name="email" id="user_fullname" class="form-control" placeholder="" aria-label="john.doe" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="ps-form__group">
                                    <label class="ps-form__label alice">Password</label>
                                    <input class="form-control ps-form__input" type="password" name="password" id="user_email" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multiStepsPass2" required>
                                </div>
                            </div>

                        </div>
                        <div class="ps-form__submit borderland">
                            <button type="submit" name="submit" value="submit" class="ps-btn ps-btn--warning">Log in</button><br>
                            <a class="regiter_account " style="margin-left: 50px;" href="<?= base_url('register'); ?>">Regiter Account</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-lg-3"></div>
        </div>
    </div>
</div>

