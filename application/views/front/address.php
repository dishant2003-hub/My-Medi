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

    <!-- Account page start -->
    <section class="section-wrapper common-form shipping-page">
        <div class="container" style="margin-top: 70px;">
            <div class="row">
                <!-- Title page start -->
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 mb-5 saturo">
                    <?php
                    foreach ($arrow as $data) {
                    }
                    $id = $data['id'];
                    $addre = $this->Service->get_all(TBL_ADDRESS, '*', array('ragister_id' => $id));

                    if (isset($data)) { ?>
                        <h4>Hey <?= $data['fname']; ?> <?= $data['lname']; ?></h4>
                        <h6><?= $data['email']; ?></h6>
                    <?php
                    } else { ?>
                        <h4 style="margin-bottom: 20px;">Hey Login Account</h4>
                    <?php } ?>

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

                <div class="col-12 col-sm-12 col-md-12 col-lg-8 mb-5 saturo">
                    <div class="kushina">
                        <?php
                        foreach ($addre as $arrow) {
                        ?>
                            <div class="kushina1">
                                <a class="btn btn-success btn_edit_ajax" href="javascript:void(0);" data-id="<?= $arrow['id'] ?>" data-toggle="modal" data-target="#ajax_edit">Edit</a>
                                <a href="<?= base_url('home/remove/' . $arrow['id']); ?>" class="btn btn-danger remove">Remove</a>

                                <h6><?= $data['fname']; ?> <?= $data['lname']; ?></h6>
                                <h3><?= $arrow['address']; ?>,</h3>
                                <h3><?= $arrow['city']; ?> - <?= $arrow['zipcode']; ?>,</h3>
                                <h3><?= $arrow['state']; ?>,</h3>
                                <h5>Mobile: <?= $data['mobile']; ?></h5>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- address edit pop box  -->
                <div class="modal fade" id="ajax_edit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered ps-popup--select">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="wrap-modal-slider container-fluid">
                                    <button class="close ps-popup__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div class="ps-popup__body" id="add_data"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Account page end -->
</div>
<!-- main wrapper end -->


<script>
    $(document).ready(function() {
        var baseUrl = $('#frontbase_url').val(); // header url set

        $(document).delegate(".btn_edit_ajax", "click", function(event) {
            var id = $(this).attr('data-id');
            // alert(id);  
            // alert(baseUrl);
            $.ajax({
                type: 'POST',
                url: baseUrl + 'home/editajax',
                data: {
                    id: id
                },
                success: function(result) {
                    console.log(result);
                    $('#add_data').html(result);
                }
            });
        });
    });
</script>