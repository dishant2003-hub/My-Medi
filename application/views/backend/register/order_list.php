<div class="card">
    <div class="card-body">
        <div class="ps-shopping__table">
            <table class="table ps-table ps-table--product">
                <thead>
                    <tr>
                        <th class="ps-product__thumbnail">Image</th>
                        <th class="ps-product__name">Product name</th>
                        <th class="ps-product__meta">Price</th>
                        <th class="ps-product__quantity">Quantity</th>
                        <th class="ps-product__subtotal">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($rowData as $result) {
                    ?>
                        <tr>
                            <td class="ps-product__thumbnail">
                                <a class="ps-product__image" href="#">
                                    <figure><img src="<?= base_url(UPLOAD . $result['image']); ?>" width="50%" alt></figure>
                                </a>
                            </td>
                            <td class="ps-product__name"> <a><?= $result['name'] ?></a></td>
                            <td class="ps-product__meta"> <span class="ps-product__price">$<?= $result['price'] ?></span></td>

                            <td class="ps-product__quantity">
                                <div class="quantity"><?= $result['quantity'] ?></div>
                            </td>
                            <td class="ps-product__subtotal">$<?= $result['total'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>