<!-- main wrapper start -->
<div class="main-wrapper" id="main-wrapper">
    <!-- breadcrumb start -->
    <section class="section-wrapper breadcrumb-wrapper" id="breadcrumb-wrapper">
        <div class="sqaure">
            <div class="container-fluid glowIn">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="breadcrumb-block">
                            <h2>My Account</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->

    <!-- Shipping page start -->
    <section class="section-wrapper common-form shipping-page">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 mb-5 gojo">
                    <h4>Hey <?= $arrow['fname']; ?> <?= $arrow['lname']; ?></h4>
                    <h6><?= $arrow['email']; ?></h6>

                    <div class="goku">
                        <a href="<?= base_url('account') ?>">Order History</a>
                        <hr>
                        <a href="<?= base_url('profile') ?>">Profile</a>
                        <hr>
                        <a href="<?= base_url('address') ?>">Address</a>
                        <hr>
                        <?php if (isset($data['id'])) { ?>
                            <a href="<?= base_url('logout/' . $data['id']); ?>">Log Out</a>
                        <?php } else { ?>
                            <a href="#">Log Out</a>
                        <?php } ?>
                        <hr>
                        <div class="gohan">Need Help?</div>
                        <p>Info@mail.com</p>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 mb-5 gojo" style="margin-top: 70px;">
                    <div class="default-form shipping-form sanshan" data-aos="fade-left">
                        <h2>Profile</h2>
                        <div class="row gojosaturo">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-5 mb-5">
                                <a href="javascript:void(0);" data-id="<?= $arrow['id'] ?>" class="editbtn" data-toggle="modal" data-target="#profile_edit">Edit</a>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-5 alice">
                                <div class="form-group">
                                    <h5>First Name</h5>
                                    <div class="vegita"><?= $arrow['fname']; ?> </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-5 alice">
                                <div class="form-group">
                                    <h5>Last Name</h5>
                                    <div class="vegita"> <?= $arrow['lname']; ?></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 alice">
                                <div class="form-group">
                                    <h5>E-mail</h5>
                                    <div class="vegita"><?= $arrow['email']; ?></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 alice">
                                <div class="form-group">
                                    <h5>Date of Birth</h5>
                                    <div class="vegita"><?= $arrow['dob']; ?></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 alice">
                                <div class="form-group">
                                    <h5>Phone</h5>
                                    <div class="vegita"><?= $arrow['mobile']; ?> </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 alice">
                                <div class="form-group">
                                    <h5>Gender</h5>
                                    <div class="vegita"><?= $arrow['gender']; ?> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- address edit pop box  -->
                <div class="modal fade" id="profile_edit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered ps-popup--select">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="wrap-modal-slider container-fluid">
                                    <button class="close ps-popup__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div class="ps-popup__body" id="profile_data"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shipping page end -->
</div>
<!-- main wrapper end -->



<script>
    $(document).ready(function() {
        var baseUrl = $('#frontbase_url').val(); // header url set

        $(document).delegate(".editbtn", "click", function(event) {
            var id = $(this).attr('data-id');
            // alert(id);
            $.ajax({
                type: 'POST',
                url: baseUrl + 'home/profile_ajax_edit',
                data: {
                    id: id
                },
                success: function(result) {
                    console.log(result);
                    $('#profile_data').html(result);
                }
            });
        });
    });
</script>

