<?php
$cur_tab = $this->uri->segment(2) == '' ? '' : $this->uri->segment(2);
?>

<div class="ps-home ps-home--14">
    <div class="ps-home__content">
        <div class="container">
            <section class="ps-section--banner">
                <div class="row">
                    <?php
                    if (!empty($assassin['0'])) {
                        $_arrow = array();
                        foreach ($assassin['0'] as $id) {
                            $data = $this->Service->get_row(TBL_DYNAMICIMG, '*', array('id' => $id));
                    ?>
                            <div class="col-12 col-md-8">
                                <div class="ps-banner"><img class="ps-banner__imagebg" src="<?= base_url(UPLOAD . $data['image']); ?>" alt>
                                    <div class="ps-banner__block">
                                        <div class="ps-banner__content">
                                            <h2 class="ps-banner__title text-white"><?= $data['name'] ?></h2>
                                            <div class="ps-banner__desc text-white">Only in this week. Don’t misss!</div>
                                            <div class="ps-banner__price"> <span class="text-warning">$15.99</span>
                                                <del>$29.99</del>
                                            </div><a class="ps-banner__shop bg-warning" href="#">Add to cart</a>
                                        </div>
                                        <div class="ps-banner__thumnail"></div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                    <?php
                    if (!empty($assassin['1'])) {
                        $_arrow = array();
                        foreach ($assassin['1'] as $id) {
                            $rowData = $this->Service->get_row(TBL_DYNAMICIMG, '*', array('id' => $id));
                    ?>
                            <div class="col-12 col-md-4">
                                <div class="ps-promo">
                                    <div class="ps-promo__item"><img class="ps-promo__banner" src="<?= base_url(UPLOAD . $rowData['image']); ?>" alt>
                                        <div class="ps-promo__content"><span class="ps-promo__badge bg-white">New</span>
                                            <h4 class="ps-promo__name text-white"><?= $rowData['name']; ?></h4>
                                            <div class="ps-promo__sale">-30%</div>
                                            <div class="ps-promo__image"><img src="<?= FRONTEND_ASSETS_PATH ?>img/icon/icon9.png" alt=""></div><a class="ps-promo__btn btn-green" href="#">Shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </section>

            <div class="ps-promo ps-promo--home">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="ps-promo__item"><img class="ps-promo__banner" src="<?= FRONTEND_ASSETS_PATH ?>img/promotion/bg-promo1.jpg" alt="alt" />
                            <div class="ps-promo__content"><span class="ps-promo__badge">New</span>
                                <h4 class="text-dark ps-promo__name">Power Effect <br />Pro Series</h4>
                                <div class="ps-promo__image"><img src="<?= FRONTEND_ASSETS_PATH ?>img/icon/icon10.png" alt="" /></div><a class="btn-green ps-promo__btn" href="#">More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="ps-promo__item"><img class="ps-promo__banner" src="<?= FRONTEND_ASSETS_PATH ?>img/promotion/bg-promo2.jpg" alt="alt" />
                            <div class="ps-promo__content">
                                <h4 class="text-white ps-promo__name">Eczema <br />Treatment CBD <br />Ointement</h4>
                                <div class="ps-promo__sale text-white">-30%</div><a class="btn-green ps-promo__btn" href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="ps-promo__item"><img class="ps-promo__banner" src="<?= FRONTEND_ASSETS_PATH ?>img/promotion/bg-promo3.jpg" alt="alt" />
                            <div class="ps-promo__content">
                                <h4 class="text-white ps-promo__name">SFP 50+ <br />Suncream</h4>
                                <div class="ps-promo__meta">
                                    <p class="ps-promo__price text-warning">$6.99</p>
                                    <p class="ps-promo__del text-white">$19.99</p>
                                </div><a class="btn-green ps-promo__btn" href="#">Buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="ps-product--type">
            <div class="container">
                <h3 class="ps-section__title">Popular categories</h3>
                <form action="" method="get">
                    <div class="ps-category__content">
                        <?php
                        $_arrow = array();
                        foreach ($flex as $item) {
                            $_arrow[$item['category']][$item['id']] =  $item['name'];
                        }
                        foreach ($_arrow as $category => $id) {
                            $data = $this->Service->get_row(TBL_CATEGORY, '*', array('id' => $category));
                        ?>
                            <a class="ps-category__item" href="<?= base_url('all_product') ?>">
                                <h6 class="ps-category__name"><?= $data['name'] ?></h6>
                            </a>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </section>

        <!-- Latest products -->
        <section class="ps-section--latest-horizontal">
            <div class="container">
                <h3 class="ps-section__title">Latest products</h3>
                <div class="ps-section__content">
                    <div class="row m-0">
                        <?php
                        foreach ($array as $data) {
                            $id = $data['id'];
                            $arrow = $this->Service->get_row(TBL_PRODUCT_IMAGE, '*', array('product_id' => $id));
                        ?>
                            <div class="col-6 col-md-4 col-lg-2dot4 p-0">
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail">
                                            <a class="ps-product__image" href="<?= base_url('product/' . $data['id']); ?>">
                                                <figure><img src="<?= base_url(UPLOAD  . $arrow['image']); ?>" alt="alt" /></figure>
                                            </a>
                                            <?php
                                            if (!empty($_SESSION['sign'])) {
                                                $userdata = $this->session->userdata('sign');
                                                $get_data = $this->Service->get_row(TBL_WISHLIST, '*', array('pid' => $id, 'user_id' => $userdata['id']));

                                                $class = "";
                                                if (!empty($get_data)) {
                                                    $class = "jacks";
                                                }
                                            }
                                            ?>
                                            <div class="ps-product__actions">
                                                <?php
                                                if (!empty($_SESSION['sign'])) {
                                                ?>
                                                    <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="<?= base_url('home/wishlist_session/?pro_id=' . $data['id'] . '&user_id=' . $userdata['id']) ?>" class="<?= $class; ?>"><i class="fa fa-heart-o"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="<?= base_url('direct_cart/' . $data['id']) ?>"><i class="fa fa-shopping-basket"></i></a></div>
                                                <?php } else { ?>
                                                    <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="<?= base_url('sign_in') ?>"><i class="fa fa-heart-o"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="<?= base_url('sign_in') ?>"><i class="fa fa-shopping-basket"></i></a></div>
                                                <?php } ?>
                                            </div>
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--sale">Sale</div>
                                            </div>
                                        </div>

                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="<?= base_url('product/' . $data['id']); ?>"><?= $data['description'] ?></a></h5>
                                            <div class="ps-product__meta"><span class="ps-product__price sale">$<?= $data['price'] ?></span><span class="ps-product__del">$100.45</span></div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4" selected="selected">4</option>
                                                    <option value="5">5</option>
                                                </select><span class="ps-product__review">(Reviews)</span>
                                            </div>
                                        </div>
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
        </section>

        <div class="container">
            <div class="ps-promo ps-promo--home">
                <h3 class="ps-promo__title">This week deals</h3>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="ps-promo__item"><img class="ps-promo__banner" src="<?= FRONTEND_ASSETS_PATH; ?>img/promotion/bg-banner20.jpg" alt="alt" />
                            <div class="ps-promo__content"><span class="ps-promo__badge">New</span>
                                <h4 class="text-white ps-promo__name">FaceWash <br />up to -20%</h4>
                                <div class="ps-promo__image"><img src="<?= FRONTEND_ASSETS_PATH; ?>img/icon/icon19.png" alt="" /><a class="btn-green ps-promo__btn" href="#">More</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="ps-promo__item"><img class="ps-promo__banner" src="<?= FRONTEND_ASSETS_PATH; ?>img/promotion/bg-banner21.jpg" alt="alt" />
                            <div class="ps-promo__content">
                                <h4 class="text-white ps-promo__name">PREHCU <br />Workout</h4>
                                <div class="ps-promo__meta">
                                    <p class="ps-promo__price text-warning">$6.99</p>
                                    <p class="ps-promo__del text-white">$19.99</p>
                                </div><a class="btn-green ps-promo__btn" href="#">Buy now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="ps-promo__item"><img class="ps-promo__banner" src="<?= FRONTEND_ASSETS_PATH; ?>img/promotion/bg-banner22.jpg" alt="alt" />
                            <div class="ps-promo__content">
                                <h4 class="text-dark ps-promo__name">Neauthy <br />creams</h4>
                                <div class="ps-promo__meta">
                                    <p class="ps-promo__price text-warning">$12.99</p>
                                    <p class="ps-promo__del text-dark">$19.99</p>
                                </div><a class="btn-green ps-promo__btn" href="#">Buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ps-promo--horizontal">
                    <div class="col-12 col-md-3">
                        <div class="ps-promo__item"><img class="ps-promo__banner" src="<?= FRONTEND_ASSETS_PATH; ?>img/promotion/bg-banner23.jpg" alt="alt" />
                            <div class="ps-promo__content">
                                <h4 class="text-dark ps-promo__name">PowerUp <br />Lemon</h4>
                                <div class="ps-promo__meta">
                                    <p class="ps-promo__price text-warning">$38.24</p>
                                    <p class="ps-promo__del text-dark">$48.24</p>
                                </div><a class="btn-green ps-promo__btn" href="#">Buy now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="ps-promo__item"><img class="ps-promo__banner" src="<?= FRONTEND_ASSETS_PATH; ?>img/promotion/bg-banner24.jpg" alt="alt" />
                            <div class="ps-promo__content">
                                <h4 class="text-dark ps-promo__name">TwoEXP+ <br />Areozol</h4>
                                <div class="ps-promo__meta">
                                    <p class="ps-promo__price text-warning">$8.24</p>
                                    <p class="ps-promo__del text-dark">$12.24</p>
                                </div><a class="btn-green ps-promo__btn" href="#">Buy now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="ps-promo__item"><img class="ps-promo__banner" src="<?= FRONTEND_ASSETS_PATH; ?>img/promotion/bg-banner25.jpg" alt="alt" />
                            <div class="ps-promo__content">
                                <h4 class="text-dark ps-promo__name">Cranberry <br />Brand</h4>
                                <div class="ps-promo__meta">
                                    <p class="ps-promo__price text-warning">$13.24</p>
                                    <p class="ps-promo__del text-dark">$18.24</p>
                                </div><a class="btn-green ps-promo__btn" href="#">Buy now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="ps-promo__item"><img class="ps-promo__banner" src="<?= FRONTEND_ASSETS_PATH; ?>img/promotion/bg-banner26.jpg" alt="alt" />
                            <div class="ps-promo__content">
                                <h4 class="text-dark ps-promo__name">Recoup <br />Recovery</h4>
                                <div class="ps-promo__meta">
                                    <p class="ps-promo__price text-warning">$8.24</p>
                                    <p class="ps-promo__del text-dark">$12.24</p>
                                </div><a class="btn-green ps-promo__btn" href="#">Buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="ps-section--deals">
                <div class="ps-section__header">
                    <h3 class="ps-section__title">Best Deals of the week!</h3>
                    <div class="ps-countdown">
                        <div class="ps-countdown__content">
                            <div class="ps-countdown__block ps-countdown__days">
                                <div class="ps-countdown__number"><span class="first-1st">0</span><span class="first">0</span><span class="last">0</span></div>
                                <div class="ps-countdown__ref">Days</div>
                            </div>
                            <div class="ps-countdown__block ps-countdown__hours">
                                <div class="ps-countdown__number"><span class="first">0</span><span class="last">0</span></div>
                                <div class="ps-countdown__ref">Hours</div>
                            </div>
                            <div class="ps-countdown__block ps-countdown__minutes">
                                <div class="ps-countdown__number"><span class="first">0</span><span class="last">0</span></div>
                                <div class="ps-countdown__ref">Mins</div>
                            </div>
                            <div class="ps-countdown__block ps-countdown__seconds">
                                <div class="ps-countdown__number"><span class="first">0</span><span class="last">0</span></div>
                                <div class="ps-countdown__ref">Secs </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ps-section__carousel">

                    <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                        <?php
                        foreach ($result as $data) {
                            $jack = $this->Service->get_row(TBL_PRODUCT_IMAGE, '*', array('product_id' => $data['id']));
                        ?>
                            <div class="ps-section__product">
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail">
                                        <a class="ps-product__image" href="<?= base_url('product/' . $data['id']); ?>">
                                            <figure><img src="<?= base_url(UPLOAD . $jack['image']) ?>" alt="alt" /></figure>
                                        </a>
                                        <?php
                                        if (!empty($_SESSION['sign'])) {
                                            $userdata = $this->session->userdata('sign');
                                            $sets_data = $this->Service->get_row(TBL_WISHLIST, '*', array('pid' => $jack['product_id'], 'user_id' => $userdata['id']));

                                            $class = "";
                                            if (!empty($sets_data)) {
                                                $class = "jacks";
                                            }
                                        }
                                        ?>
                                        <div class="ps-product__actions">
                                            <?php
                                            if (!empty($_SESSION['sign'])) {
                                            ?>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="<?= base_url('home/wishlist_session/?pro_id=' . $data['id'] . '&user_id=' . $userdata['id']) ?>" class="<?= $class; ?>"><i class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="<?= base_url('direct_cart/' . $data['id']) ?>"><i class="fa fa-shopping-basket"></i></a></div>
                                            <?php } else { ?>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="<?= base_url('sign_in') ?>"><i class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="<?= base_url('sign_in') ?>"><i class="fa fa-shopping-basket"></i></a></div>
                                            <?php } ?>
                                        </div>
                                        <div class="ps-product__badge">
                                        </div>
                                        <div class="ps-product__percent">-20%</div>
                                    </div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title"><a href="<?= base_url('product/' . $data['id']); ?>"><?= $data['description'] ?></a></h5>
                                        <div class="ps-product__meta"><span class="ps-product__price sale">$<?= $data['price'] ?></span><span class="ps-product__del">$89.74</span>
                                        </div>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5" selected="selected">5</option>
                                            </select><span class="ps-product__review">(Reviews)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        </div>
        <section class="ps-section--latest">
            <div class="container">
                <h3 class="ps-section__title">Bestsellers</h3>
                <div class="ps-section__carousel">
                    <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                        <?php
                        foreach ($arr as $arrow) {
                            $id = ($arrow['id']);
                            $data = $this->Service->get_row(TBL_PRODUCT, '*', array('id' => $id));
                            $john = $this->Service->get_row(TBL_PRODUCT_IMAGE, '*', array('product_id' => $data['id']));
                        ?>
                            <div class="ps-section__product">
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail">
                                        <a class="ps-product__image" href="<?= base_url('product/' . $data['id']); ?>">
                                            <figure><img src="<?= base_url(UPLOAD . $john['image']) ?>" alt="alt"/></figure>
                                        </a>
                                        <?php
                                        if (!empty($_SESSION['sign'])) {
                                            $userdata = $this->session->userdata('sign');
                                            $gets_data = $this->Service->get_row(TBL_WISHLIST, '*', array('pid' => $id, 'user_id' => $userdata['id']));

                                            $class = "";
                                            if (!empty($gets_data)) {
                                                $class = "jacks";
                                            }
                                        }
                                        ?>
                                        <div class="ps-product__actions">
                                            <?php
                                            if (!empty($_SESSION['sign'])) {
                                            ?>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="<?= base_url('home/wishlist_session/?pro_id=' . $data['id'] . '&user_id=' . $userdata['id']) ?>" class="<?= $class; ?>"><i class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="<?= base_url('direct_cart/' . $data['id']) ?>"><i class="fa fa-shopping-basket"></i></a></div>
                                            <?php } else { ?>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="<?= base_url('sign_in') ?>"><i class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="<?= base_url('sign_in') ?>"><i class="fa fa-shopping-basket"></i></a></div>
                                            <?php } ?>
                                        </div>
                                        <div class="ps-product__badge">
                                            <div class="ps-badge ps-badge--sale">Sale</div>
                                        </div>
                                    </div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title"><a href="<?= base_url('product/' . $data['id']) ?>"><?= $data['description'] ?></a></h5>
                                        <div class="ps-product__meta"><span class="ps-product__price sale">$<?= $data['price'] ?></span><span class="ps-product__del">$100.00</span>
                                        </div>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4" selected="selected">4</option>
                                                <option value="5">5</option>
                                            </select><span class="ps-product__review">(Reviews)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="ps-home__block">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="ps-blog--latset">
                            <div class="ps-blog__thumbnail"><a href="#"><img src="<?= FRONTEND_ASSETS_PATH; ?>img/blog/blog13-496x262.jpg" alt="alt" /></a>
                                <div class="ps-blog__badge"><span class="ps-badge__item">MEDIC</span><span class="ps-badge__item">PHARMACY</span><span class="ps-badge__item">SALE</span>
                                </div>
                            </div>
                            <div class="ps-blog__content">
                                <div class="ps-blog__meta"> <span class="ps-blog__date">May 18, 2021</span><a class="ps-blog__author" href="#">Alfredo Austin</a></div><a class="ps-blog__title" href="#">The latest tests of popular masks in accordance with CV2s standards</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <section class="ps-section--newsletter">
                            <h3 class="ps-section__title">Join our newsletter and get <br>$20 discount for your first order</h3>
                            <p class="ps-section__text">Only for the first order.</p>
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
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>