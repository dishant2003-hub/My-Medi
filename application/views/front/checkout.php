<div class="ps-checkout">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="<?= base_url('') ?>">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page"><a href="<?= base_url('cart') ?>">cart</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page"><a href="<?= base_url('checkout') ?>">Checkout</a></li>
        </ul>
        <h3 class="ps-checkout__title"> Checkout</h3>
        <div class="ps-checkout__content">
            <?php
            if (!empty($_SESSION['addcart'])) {
            ?>
                <form action="<?= base_url('shopping_details') ?>" method="post">
                <?php
            } else {
                ?>
                    <form action="<?= base_url('') ?>" method="post">
                    <?php } ?>
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="ps-checkout__form">
                                <h3 class="ps-checkout__heading">Billing details</h3>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Email address *</label>
                                            <input class="ps-input" type="mail" name="Email" required="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">First name *</label>
                                            <input class="ps-input" type="text" name="Fname" required="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Last name *</label>
                                            <input class="ps-input" type="text" name="Lname" required="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Company name (optional)</label>
                                            <input class="ps-input" type="text" name="Company">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Phone *</label>
                                            <input class="ps-input" type="text" name="Phone" required="">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <select class="form-select select2" id="address_1" aria-label="Default select example">
                                            <option value="0">Select Address</option>
                                            <?php
                                            $userdata = $this->session->userdata('sign');
                                            $id = $userdata['id'];

                                            $result = $this->Service->get_all(TBL_ADDRESS, '*', array('ragister_id' => $id));
                                            foreach ($result as $data) {
                                            ?>
                                                <option value="<?= $data['id'] ?>" ><?= $data['address'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Street address *</label>
                                            <input class="ps-input" type="text" id="address" name="Address" placeholder="Apartment, suite, unit, etc. " required="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Town / City *</label>
                                            <input class="ps-input" type="text" id="city" name="City" required="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Pincode *</label>
                                            <input class="ps-input" type="text" id="pincode" name="Pincode" required="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">County</label>
                                            <input class="ps-input" type="text" id="state" name="County" required="">
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="ps-checkout__order">
                                <h3 class="ps-checkout__heading">Your order</h3>
                                <div class="ps-checkout__row">
                                    <div class="ps-title">Product</div>
                                    <div class="ps-title">Subtotal</div>
                                </div>
                                <?php
                                $sub_total = 0;
                                if (!empty($_SESSION['addcart'])) {
                                    foreach ($_SESSION['addcart'] as $result) {
                                        $sub_total += $result['total'];
                                        if ($sub_total >= 200) {
                                            $total = $sub_total;
                                        } else {
                                            $charges = $sub_total * 10 / 100;
                                            $total = $sub_total + $charges;
                                        }
                                ?>
                                        <div class="ps-checkout__row ps-product">
                                            <div class="ps-product__name"><?= $result['name'] ?> x <span><?= $result['quantity'] ?></span></div>
                                            <div class="ps-product__price">$<?= $result['total'] ?></div>
                                        </div>
                                    <?php } ?>

                                    <div class="ps-checkout__row">
                                        <div class="ps-title">Subtotal</div>
                                        <div class="ps-product__price">$<?= $sub_total ?></div>
                                    </div>

                                    <?php
                                    if ($sub_total >= 200) {
                                    ?>
                                        <div class="ps-checkout__row">
                                            <div class="ps-title">Free Shipping </div>
                                            <div class="ps-product__price">$0</div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="ps-checkout__row">
                                            <div class="ps-title">Shipping charges</div>
                                            <div class="ps-product__price">$<?= $charges ?></div>
                                        </div>
                                    <?php } ?>

                                    <div class="ps-checkout__row">
                                        <div class="ps-title">Total</div>
                                        <div class="ps-product__price">$<?= $total ?></div>
                                    </div>
                                <?php
                                } else {
                                    echo "Recode Not Found";
                                }
                                ?>

                                <div class="ps-checkout__payment">
                                    <div class="check-faq">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="agree-faq" required="">
                                            <label class="form-check-label" for="agree-faq"> I have read and agree to the website terms and conditions *</label>
                                        </div>
                                    </div>
                                    <button name="submit_btn" value="submit_btn" class="ps-btn ps-btn--warning" data-target="#success">Place order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        var baseUrl = $('#frontbase_url').val(); // header url set

        $(document).delegate("#address_1", "change", function(event) {
            var id = $(this).val();

            $.ajax({
                type: 'POST',
                url: baseUrl + 'home/checkout_address',
                data: {
                    id: id
                },
                success: function(result) {
                    var obj = JSON.parse(result);
                    $('#address').val(obj.address);
                    $('#city').val(obj.city);
                    $('#pincode').val(obj.zipcode);
                    $('#state').val(obj.state);
                }
            });
        });
    });
</script>

<style>
   .select2{
    margin-top: 5px;
    border-radius: 50px;
    padding: 10px 10px;
    background-color: #F0F2F5;
    margin-bottom: 15px;
   }
</style>