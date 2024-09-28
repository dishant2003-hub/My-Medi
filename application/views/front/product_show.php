<div class="ps-categogy ps-categogy--dark">
    <div class="container">
        <!-- <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="<?= base_url('') ?>">Home</a></li>
            <li class="ps-breadcrumb__item"><a href="<?= base_url('grid') ?>">Category</a></li>
        </ul> -->
        <h1 class="ps-categogy__name">Protective<sup>(6)</sup></h1>
        <div class="ps-categogy__content">
            <div class="row row-reverse">
                <div class="col-12 col-md-9">
                    <div class="ps-categogy__wrapper">
                        <div class="ps-categogy__type"> <a href="#"><img src="<?= FRONTEND_ASSETS_PATH ?>img/icon/bars-dark.svg" alt></a><a href="category-grid-detail.html"><img src="img/icon/gird2-dark.svg" alt></a><a class="active" href="category-grid-green.html"><img src="img/icon/gird3-dark.svg" alt></a><a href="category-grid-separate.html"><img src="img/icon/gird4-dark.svg" alt></a></div>
                        <div class="ps-categogy__onsale">
                            <form>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="onSaleProduct">
                                    <label class="custom-control-label" for="onSaleProduct">Show only products on sale</label>
                                </div>
                            </form>
                        </div>
                        <div class="ps-categogy__sort">
                            <form><span>Sort by</span>
                                <select class="form-select">
                                    <option selected>Latest</option>
                                    <option value="Price: low to high">Price: low to high</option>
                                    <option value="Price: high to low">Price: high to low</option>
                                </select>
                            </form>
                        </div>
                        <div class="ps-categogy__show">
                            <form><span>Show</span>
                                <select class="form-select">
                                    <option selected>15</option>
                                    <option value="23">23</option>
                                    <option value="35">35</option>
                                    <option value="47">47</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div id="add_data">
                        <div class="ps-categogy--grid">
                            <div class="row">
                                <?php
                                foreach ($array as $data) {
                                    $flex = $this->Service->get_row(TBL_PRODUCT_IMAGE, '*', array('product_id' => $data['id']));
                                    $userdata = $this->session->userdata('sign');
                                ?>
                                    <div class="col-6 col-lg-4 col-xl-3 p-0">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail">
                                                <a class="ps-product__image" href="<?= base_url('product/' . $data['id']) ?>">
                                                    <figure><img src="<?= base_url(UPLOAD . $flex['image']); ?>" alt="alt" /></figure>
                                                </a>
                                                <div class="ps-product__actions">
                                                    <?php
                                                    if (!empty($_SESSION['sign'])) {
                                                    ?>
                                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="<?= base_url('home/wishlist_session/?pro_id=' . $data['id'] . '&user_id=' . $userdata['id']) ?>"><i class="fa fa-heart-o"></i></a></div>
                                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="<?= base_url('direct_cart/' . $data['id']) ?>"><i class="fa fa-shopping-basket"></i></a></div>
                                                    <?php } else { ?>
                                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="<?= base_url('sign_in') ?>"><i class="fa fa-heart-o"></i></a></div>
                                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="<?= base_url('sign_in') ?>"><i class="fa fa-shopping-basket"></i></a></div>
                                                    <?php } ?>
                                                </div>
                                                <div class="ps-product__badge">
                                                </div>
                                            </div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-product__title"><a href="<?= base_url('product/' . $data['id']) ?>"><?= $data['description'] ?></a></h5>
                                                <div class="ps-product__meta"><span class="ps-product__price sale">$<?= $data['price'] ?></span><span class="ps-product__del">$100.00</span></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="ps-pagination">
                            <ul class="pagination">
                                <li class="active"> <?= $links; ?></li>
                            </ul>
                        </div>
                    </div>

                    <div class="ps-delivery ps-delivery--info" data-background="<?= FRONTEND_ASSETS_PATH ?>img/promotion/banner-delivery-3.jpg">
                        <div class="ps-delivery__content">
                            <div class="ps-delivery__text"><i class="icon-shield-check"></i><span> <strong>100% Secure delivery </strong>without contacting the courier</span></div><a class="ps-delivery__more" href="#">More</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="ps-widget ps-widget--product">
                        <div class="ps-widget__block">
                            <h4 class="ps-widget__title">Categories</h4><a class="ps-block-control" href="#"><i class="fa fa-angle-down"></i></a>
                            <div class="ps-widget__content ps-widget__category">
                                <form action="" method="get">
                                    <ul class="menu--mobile">   
                                        <?php
                                        $rowData = $this->Service->get_all(TBL_PRODUCT);

                                        $_arrow = array();
                                        foreach ($rowData as $item) {
                                            $_arrow[$item['category']][$item['subcategory']][$item['id']] =  $item['name'];
                                        }
                                        foreach ($_arrow as $category => $subcategory) {
                                            $data = $this->Service->get_row(TBL_CATEGORY, '*', array('id' => $category));
                                        ?>
                                            <li><a href=""><?= $data['name'] ?></a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                                                <?php
                                                foreach ($subcategory as $subcat => $id) {
                                                    $arrow = $this->Service->get_row(TBL_CATEGORY, '*', array('id' => $subcat));
                                                    if(!empty($arrow)){
                                                ?>
                                                    <ul class="sub-menu">
                                                        <li><a href="<?= base_url('home/grid?cat_id=' . $category . '&subcat_id=' . $subcat) ?>"><?= $arrow['name'] ?></a></li>
                                                    </ul>
                                            <?php
                                                } }
                                            }
                                            ?>
                                            </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="ps-section--newsletter ps-section--newsletter-inline">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-7">
                    <h3 class="ps-section__title">Join our newsletter and get $20 discount for your first order</h3>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="ps-section__content">
                        <form action="http://nouthemes.net/html/mymedi/do_action" method="post">
                            <div class="ps-form--subscribe">
                                <div class="ps-form__control">
                                    <input class="form-control ps-input" type="email" placeholder="Enter your email address">
                                    <button class="ps-btn ps-btn--warning">Subscribe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>