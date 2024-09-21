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
                    <h4>Hey <?= $arrow['fname']; ?> <?= $arrow['lname']; ?></h4>
                    <h6><?= $arrow['email']; ?></h6>
                    <div class="goku">
                        <a href="<?= base_url('account') ?>">Order History</a>
                        <hr>
                        <a href="<?= base_url('profile') ?>">Profile</a>
                        <hr>
                        <a href="<?= base_url('address') ?>">Address</a>
                        <hr>
                        <?php if (isset($arrow['id'])) { ?>
                            <a href="<?= base_url('logout/' . $arrow['id']); ?>">Log Out</a>
                        <?php } else { ?>
                            <a href="#">Log Out</a>
                        <?php } ?>
                        <hr>
                        <div class="gohan">Need Help?</div>
                        <p>Info@mail.com</p>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-8 mb-5 saturo">
                    <div class="ps-shopping__table">
                        <table class="table ps-table ps-table--product">
                            <thead>
                                <tr>
                                    <th class="ps-product__thumbnail"></th>
                                    <th class="ps-product__name">Product name</th>
                                    <th class="ps-product__meta">Price</th>
                                    <th class="ps-product__quantity">Quantity</th>
                                    <th class="ps-product__subtotal">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($order)) {
                                    foreach ($order as $result) {
                                ?>
                                        <tr>
                                            <td class="ps-product__thumbnail">
                                                <a class="ps-product__image" href="#">
                                                    <figure><img src="<?= base_url(UPLOAD . $result['image']); ?>" alt></figure>
                                                </a>
                                            </td>
                                            <td class="ps-product__name"> <a href="#"><?= $result['name'] ?></a></td>
                                            <td class="ps-product__meta"> <span class="ps-product__price">$<?= $result['price'] ?></span></td>

                                            <td class="ps-product__quantity">
                                                <div class="quantity"><?= $result['quantity'] ?></div>
                                            </td>
                                            <td class="ps-product__subtotal">$<?= $result['total'] ?></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Account page end -->
</div>
<!-- main wrapper end -->.