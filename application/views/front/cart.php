<div class="ps-shopping">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="<?= base_url('') ?>">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page"><a href="<?= base_url('cart') ?>">cart</a></li>
        </ul>
        <h3 class="ps-shopping__title">Shopping cart<sup>(3)</sup></h3>
        <div class="ps-shopping__content">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-9">
                    <div class="ps-shopping__table">
                        <table class="table ps-table ps-table--product">
                            <thead>
                                <tr>
                                    <th class="ps-product__remove"></th>
                                    <th class="ps-product__thumbnail"></th>
                                    <th class="ps-product__name">Product name</th>
                                    <th class="ps-product__meta">Price</th>
                                    <th class="ps-product__quantity">Quantity</th>
                                    <th class="ps-product__subtotal">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                        <tr>
                                            <td class="ps-product__remove"> <a href="<?= base_url('home/session_remove_cart/' . $result['id']); ?>"><i class="icon-cross"></i></a></td>
                                            <td class="ps-product__thumbnail">
                                                <a class="ps-product__image" href="<?= base_url('home/product/' . $result['id']) ?>">
                                                    <figure><img src="<?= base_url(UPLOAD . $result['image']) ?>" alt></figure>
                                                </a>
                                            </td>
                                            <td class="ps-product__name"><a href="<?= base_url('home/product/' . $result['id']) ?>"><?= $result['name'] ?></a></td>
                                            <td class="ps-product__meta"><span class="ps-product__price">$<?= $result['price'] ?></span></td>

                                            <td class="ps-product__quantity">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus_quantity" value="<?= $result['id'] ?>" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                    <input class="quantity" min="0" name="quantity" value="<?= $result['quantity'] ?>" type="number">
                                                    <button class="plus_quantity" value="<?= $result['id'] ?>" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                                </div>
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
                    <div class="ps-shopping__footer">
                        <div class="ps-shopping__coupon">
                            <input class="form-control ps-input" type="text" placeholder="Coupon code">
                            <button class="ps-btn ps-btn--primary" type="button">Apply coupon</button>
                        </div>
                        <?php
                        if (!empty($_SESSION['addcart'])) {
                        ?>
                            <div class="ps-shopping__button">
                                <a href="<?= base_url('home/clear_all'); ?>" class="ps-btn ps-btn--primary">Clear All</a>
                                <a href="<?= base_url('cart'); ?>" class="ps-btn ps-btn--primary">Update cart</a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-3">
                    <div class="ps-shopping__label">Cart totals</div>
                    <div class="ps-shopping__box">
                        <?php
                        if (!empty($_SESSION['addcart'])) {
                        ?>
                            <div class="ps-shopping__row">
                                <div class="ps-shopping__label">Subtotal</div>
                                <div class="ps-shopping__price">$<?= $sub_total ?></div>
                            </div>
                            <?php
                            if ($sub_total >= 200) {
                            ?>
                                <div class="ps-shopping__row">
                                    <div class="ps-shopping__label">Free Shipping </div>
                                    <div class="ps-shopping__price">$0</div>
                                </div>
                            <?php } else { ?>
                                <div class="ps-shopping__row">
                                    <div class="ps-shopping__label">Shipping charges</div>
                                    <div class="ps-shopping__price">$<?= $charges ?></div>
                                </div>
                            <?php } ?>

                            <div class="ps-shopping__row">
                                <div class="ps-shopping__label">Total</div>
                                <div class="ps-shopping__price">$<?= $total ?></div>
                            </div>
                        <?php
                        }
                        if (!empty($_SESSION['addcart'])) {
                        ?>
                            <div class="ps-shopping__checkout"><a class="ps-btn ps-btn--warning" href="<?= base_url('checkout') ?>">Proceed to checkout</a></div>
                        <?php
                        } else {
                        ?>
                            <div class="ps-shopping__checkout"><a class="ps-btn ps-btn--warning" href="<?= base_url('') ?>">Proceed to checkout</a></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var baseUrl = $('#frontbase_url').val();

        $(document).delegate(".minus_quantity", "click", function(event) {
            var id = $(this).val();
            $.ajax({
                type: 'POST',
                url: baseUrl + 'home/quantity_minus',
                data: {
                    id: id
                },
                success: function(result) {

                }
            });
        });

        $(document).delegate(".plus_quantity", "click", function(event) {
            var id = $(this).val();
            $.ajax({
                type: 'POST',
                url: baseUrl + 'home/quantity_plus',
                data: {
                    id: id
                },
                success: function(result) {

                }
            });
        });
    });
</script>