<div class="ps-categogy--grid">
    <div class="row">
        <?php
        foreach ($student as $data) {
        ?>
            <div class="col-6 col-lg-4 col-xl-3 p-0">
                <div class="ps-product ps-product--standard">
                    <div class="ps-product__thumbnail">
                        <a class="ps-product__image" href="<?= base_url('products/' . $data['id']) ?>">
                            <figure><img src="<?= base_url(UPLOAD . $data['image']); ?>" alt="alt" /></figure>
                        </a>
                        <div class="ps-product__actions">
                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="<?= base_url('wishlist_sessions/' . $data['id']) ?>"><i class="fa fa-heart-o"></i></a></div>
                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="<?= base_url('direct_carts/' . $data['id']) ?>"><i class="fa fa-shopping-basket"></i></a></div>
                        </div>
                        <div class="ps-product__badge">
                        </div>
                    </div>
                    <div class="ps-product__content">
                        <h5 class="ps-product__title"><a href="<?= base_url('products/' . $data['id']) ?>"><?= $data['description'] ?></a></h5>
                        <div class="ps-product__meta"><span class="ps-product__price sale">$<?= $data['price'] ?></span><span class="ps-product__del">$38.24</span>
                        </div>
                        <div class="ps-product__actions ps-product__group-mobile">
                            <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div>
                            <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="compare.html"><i class="fa fa-align-left"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="ps-pagination">
        <ul class="pagination">
            <li class="active"><?= $links; ?></li>
        </ul>
    </div>
</div>