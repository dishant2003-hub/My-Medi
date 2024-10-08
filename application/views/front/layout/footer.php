<?php
// pr($this->setting_data);die;
$fb_link = isset($this->setting_data['fb_link']) ? $this->setting_data['fb_link'] : '';
$twitter_link = isset($this->setting_data['twitter_link']) ? $this->setting_data['twitter_link'] : '';
$linkedin_link = isset($this->setting_data['linkedin_link']) ? $this->setting_data['linkedin_link'] : '';
$instagram_link = isset($this->setting_data['instagram_link']) ? $this->setting_data['instagram_link'] : '';
$youtube_link = isset($this->setting_data['youtube_link']) ? $this->setting_data['youtube_link'] : '';
?>

<!-- / Layout wrapper --> 
<?php
$cur_tab = $this->uri->segment(2) == '' ? '' : $this->uri->segment(2);
$curr_action = $this->uri->segment(3) == '' ? '' : $this->uri->segment(3);
?>


<footer class="ps-footer ps-footer--13 ps-footer--14">
    <div class="ps-footer--top">
        <div class="container">
            <div class="row m-0">
                <div class="col-12 col-sm-4 p-0">
                    <p class="text-center"><a class="ps-footer__link" href="#"><i class="icon-wallet"></i>100% Money back</a></p>
                </div>
                <div class="col-12 col-sm-4 p-0">
                    <p class="text-center"><a class="ps-footer__link" href="#"><i class="icon-bag2"></i>Non-contact shipping</a></p>
                </div>
                <div class="col-12 col-sm-4 p-0">
                    <p class="text-center"><a class="ps-footer__link" href="#"><i class="icon-truck"></i>Free delivery for order over $200</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="ps-footer__middle">
            <div class="row">
                <div class="col-12 col-md-7">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="ps-footer--address">
                                <div class="ps-logo"><a href="<?= base_url(''); ?>"> <img src="<?= FRONTEND_ASSETS_PATH; ?>img/sticky-logo.png" alt><img class="logo-white" src="<?= FRONTEND_ASSETS_PATH; ?>img/logo-white.png" alt><img class="logo-black" src="<?= FRONTEND_ASSETS_PATH; ?>img/Logo-black.png" alt><img class="logo-white-all" src="<?= FRONTEND_ASSETS_PATH; ?>img/logo-white1.png" alt><img class="logo-green" src="<?= FRONTEND_ASSETS_PATH; ?>img/logo-green.png" alt></a></div>
                                <div class="ps-footer__title">Our store</div>
                                <p>1487 Rocky Horse Carrefour<br>Arlington, TX 16819</p>
                                <p><a target="_blank" href="https://www.google.com/maps/place/Arlington,+TX,+USA/@32.701968,-97.2054529,12z/data=!3m1!4b1!4m8!1m2!2m1!1s1487+Rocky+Horse+Carrefour+Arlington,+TX+16819!3m4!1s0x864e62d2e40898d3:0xb5ef6ac1fa05351!8m2!3d32.735687!4d-97.1080656">Show on map</a></p>
                                <ul class="ps-social">
                                    <li><a class="ps-social__link facebook" href="<?= $fb_link ?>"><i class="fa fa-facebook"> </i><span class="ps-tooltip">Facebook</span></a></li>
                                    <li><a class="ps-social__link instagram" href="<?= $instagram_link ?>"><i class="fa fa-instagram"></i><span class="ps-tooltip">Instagram</span></a></li>
                                    <li><a class="ps-social__link youtube" href=" <?= $youtube_link ?>"><i class="fa fa-youtube-play"></i><span class="ps-tooltip">Youtube</span></a></li>
                                    <li><a class="ps-social__link linkedin" href="<?= $linkedin_link ?>"><i class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="ps-footer--contact">
                                <h5 class="ps-footer__title">Need help</h5>
                                <div class="ps-footer__fax"><i class="icon-telephone"></i>0020 500 – MYMEDI – 000</div>
                                <p class="ps-footer__work">Monday – Friday: 9:00-20:00<br>Saturday: 11:00 – 15:00</p>
                                <hr>
                                <p><a class="ps-footer__email" href="http://nouthemes.net/cdn-cgi/l/email-protection#04676b6a7065677044617c65697468612a676b69"> <i class="icon-envelope"></i><span class="__cf_email__" data-cfemail="a7c4c8c9d3c6c4d3e7c2dfc6cad7cbc289c4c8ca">[email&#160;protected]</span> </a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title">Information</h5>
                                <ul class="ps-block__list">
                                    <li><a href="<?= base_url('about_us') ?>">About us</a></li>
                                    <li><a href="<?= base_url('privacy-policy') ?>">Privacy Policy</a></li>
                                    <li><a href="<?= base_url('portfolio') ?>">Portfolio</a></li>
                                    <li><a href="<?= base_url('terms-of-use') ?>">Terms &amp; Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title">Account</h5>
                                <ul class="ps-block__list">
                                    <li><a href="<?= base_url('account') ?>">My account</a></li>
                                    <li><a href="<?= base_url('profile') ?>">My Profile</a></li>
                                    <li><a href="<?= base_url('wishlist') ?>">Wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-footer--bottom">
            <div class="row">
                <div class="col-12 col-md-6">
                    <p>Copyright © 2021 Mymedi. All Rights Reserved</p>
                </div>
                <div class="col-12 col-md-6 text-right"><img src="<?= FRONTEND_ASSETS_PATH; ?>img/payment.png" alt><img class="payment-light" src="<?= FRONTEND_ASSETS_PATH; ?>img/payment-light.png" alt></div>
            </div>
        </div>
    </div>
</footer>
</div>
<div class="ps-search">
    <div class="ps-search__content ps-search--mobile"><a class="ps-search__close" href="#" id="close-search"><i class="icon-cross"></i></a>
        <h3>Search</h3>
        <form action="http://nouthemes.net/html/mymedi/do_action" method="post">
            <div class="ps-search-table">
                <div class="input-group">
                    <input class="form-control ps-input" type="text" id="searchbar" placeholder="Search for products">
                    <div class="input-group-append"><a href="#"><i class="fa fa-search"></i></a></div>
                </div>
            </div>
        </form>
        <div class="ps-search__result">
            <div class="ps-search__item">
                <div class="row" id="search_data">

                </div>
            </div>

        </div>
    </div>
</div>
<div class="ps-navigation--footer">
    <div class="ps-nav__item"><a href="#" id="open-menu"><i class="icon-menu"></i></a><a href="#" id="close-menu"><i class="icon-cross"></i></a></div>
    <div class="ps-nav__item"><a href="<?= base_url('') ?>"><i class="icon-home2"></i></a></div>
    <div class="ps-nav__item"><a href="<?= base_url('home/sign_in') ?>"><i class="icon-user"></i></a></div>
    <?php
    if (!empty($_SESSION['wishlist'])) {
        $this->session->userdata('wishlist');
        $data = count($_SESSION['wishlist']);
    ?>
        <div class="ps-nav__item"><a href="<?= base_url('wishlist'); ?>"><i class="fa fa-heart-o"></i><span class="badge"><?= $data ?></span></a></div>
    <?php } else { ?>
        <div class="ps-nav__item"><a href="<?= base_url('wishlist'); ?>"><i class="fa fa-heart-o"></i><span class="badge">0</span></a></div>
    <?php } ?>

    <?php
    if (!empty($_SESSION['addcart'])) {
        $this->session->userdata('addcart');
        $result = count($_SESSION['addcart']);
    ?>
        <div class="ps-nav__item"><a href="<?= base_url('cart') ?>"><i class="icon-cart-empty"></i><span class="badge"><?php $result ?> </span></a></div>
    <?php } else { ?>
        <div class="ps-nav__item"><a href="#"><i class="icon-cart-empty"></i><span class="badge">0</span></a></div>
    <?php } ?>
</div>
<div class="ps-menu--slidebar">
    <div class="ps-menu__content">
        <ul class="menu--mobile">
            <li class="menu-item-has-children"><a href="#">Products</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                <ul class="sub-menu">
                    <li><a href="<?= base_url('all_product') ?>">Product</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                        <ul class="sub-menu">
                            <?php
                            $data = $this->Service->get_all(TBL_PRODUCT);
                            foreach ($data as $result) {
                            ?>
                                <ul class="sub-menu--mega">
                                    <li><a href="<?= base_url('product/' . $result['id']); ?>"><?= $result['name']; ?></a></li>
                                </ul>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a href="#">Category</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                <ul class="sub-menu">
                    <?php
                    $rowData = $this->Service->get_all(TBL_PRODUCT);

                    $_arrow = array();
                    foreach ($rowData as $item) {
                        $_arrow[$item['category']][$item['id']] =  $item['name'];
                    }
                    foreach ($_arrow as $category => $id) {
                        $data = $this->Service->get_row(TBL_CATEGORY, '*', array('id' => $category));
                    ?>
                        <li><a href="#"><?= $data['name'] ?></a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                            <ul class="sub-menu">

                                <?php
                                $rowData = $this->Service->get_all(TBL_PRODUCT, '*', array('category' => $category));
                                foreach ($rowData as $result) {
                                ?>
                                    <ul class="sub-menu--mega">
                                        <li><a href="<?= base_url('product/' . $result['id']); ?>"><?= $result['name']; ?></a></li>
                                    </ul>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </li>
            <li class="menu-item-has-children"><a href="<?= base_url('blog') ?>">Blog</a></li>
            <li class="menu-item-has-children"><a href="<?= base_url('contact_us') ?>">Contact</a></li>
        </ul>
    </div>
    <div class="ps-menu__footer">
        <div class="ps-menu__item">
            <ul class="ps-language-currency">
                <li class="menu-item-has-children"><a href="#">English</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li><a href="#">Français</a></li>
                        <li><a href="#">Deutsch</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">USD</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li><a href="#">USD</a></li>
                        <li><a href="#">EUR</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="ps-menu__item">
            <div class="ps-menu__contact">Need help? <strong>0020 500 - MYMEDI - 000</strong></div>
        </div>
    </div>
</div>
<button class="btn scroll-top"><i class="fa fa-angle-double-up"></i></button>
<div class="ps-preloader" id="preloader">
    <div class="ps-preloader-section ps-preloader-left"></div>
    <div class="ps-preloader-section ps-preloader-right"></div>
</div>
<div class="modal fade" id="popupQuickview" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered ps-quickview">
        <div class="modal-content">
            <div class="modal-body">
                <div class="wrap-modal-slider container-fluid ps-quickview__body">
                    <button class="close ps-quickview__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="ps-product--detail">
                        <div class="row">
                            <div class="col-12 col-xl-6">
                                <div class="ps-product--gallery">
                                    <div class="ps-product__thumbnail">
                                        <div class="slide"><img src="<?= base_url(UPLOAD . $rowData['image']); ?>" alt="alt" /></div>
                                        <!-- <div class="slide"><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/047.jpg" alt="alt" /></div>
                                        <div class="slide"><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/047.jpg" alt="alt" /></div>
                                        <div class="slide"><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/008.jpg" alt="alt" /></div>
                                        <div class="slide"><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/034.jpg" alt="alt" /></div> -->
                                    </div>
                                    <div class="ps-gallery--image">
                                        <div class="slide">
                                            <div class="ps-gallery__item"><img src="<?= base_url(UPLOAD . $rowData['image']); ?>" alt="alt" /></div>
                                        </div>
                                        <!-- <div class="slide">
                                            <div class="ps-gallery__item"><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/047.jpg" alt="alt" /></div>
                                        </div>
                                        <div class="slide">
                                            <div class="ps-gallery__item"><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/047.jpg" alt="alt" /></div>
                                        </div>
                                        <div class="slide">
                                            <div class="ps-gallery__item"><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/008.jpg" alt="alt" /></div>
                                        </div>
                                        <div class="slide">
                                            <div class="ps-gallery__item"><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/034.jpg" alt="alt" /></div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="ps-product__info">
                                    <div class="ps-product__badge"><span class="ps-badge ps-badge--instock"> IN STOCK</span>
                                    </div>
                                    <div class="ps-product__branch"><a href="#">HeartRate</a></div>
                                    <div class="ps-product__title"><a href="#">Blood Pressure Monitor</a></div>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected="selected">4</option>
                                            <option value="5">5</option>
                                        </select><span class="ps-product__review">(5 Reviews)</span>
                                    </div>
                                    <div class="ps-product__desc">
                                        <ul class="ps-product__list">
                                            <li>Study history up to 30 days</li>
                                            <li>Up to 5 users simultaneously</li>
                                            <li>Has HEALTH certificate</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__meta"><span class="ps-product__price">$77.65</span>
                                    </div>
                                    <div class="ps-product__quantity">
                                        <h6>Quantity</h6>
                                        <div class="d-md-flex align-items-center">
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                                <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                            </div><a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcartV2">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="ps-product__type">
                                        <ul class="ps-product__list">
                                            <li> <span class="ps-list__title">Tags: </span><a class="ps-list__text" href="#">Health</a><a class="ps-list__text" href="#">Thermometer</a>
                                            </li>
                                            <li> <span class="ps-list__title">SKU: </span><a class="ps-list__text" href="#">SF-006</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="popupCompare" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered ps-compare--popup">
        <div class="modal-content">
            <div class="modal-body">
                <div class="wrap-modal-slider ps-compare__body">
                    <button class="close ps-compare__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="ps-compare--product">
                        <div class="ps-compare__header">
                            <div class="container">
                                <h2>Compare Products</h2>
                            </div>
                        </div>
                        <div class="ps-compare__content">
                            <div class="ps-compare__table">
                                <table class="table ps-table">
                                    <tbody>
                                        <tr>
                                            <th></th>
                                            <td>
                                                <div class="ps-product__remove"><a href="#"><i class="fa fa-times"></i></a></div>
                                                <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                                        <figure><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/001.jpg" alt></figure>
                                                    </a></div>
                                                <div class="ps-product__content">
                                                    <h5 class="ps-product__title"><a href="product1.html">Blood Pressure Monitor</a></h5>
                                                    <div class="ps-product__meta"><span class="ps-product__price">$77.65</span>
                                                    </div>
                                                    <button class="ps-btn ps-btn--warning">Add to cart</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="ps-product__remove"><a href="#"><i class="fa fa-times"></i></a></div>
                                                <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                                        <figure><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/034.jpg" alt></figure>
                                                    </a></div>
                                                <div class="ps-product__content">
                                                    <h5 class="ps-product__title"><a href="product1.html">Blood Pressure Monitor Upper Arm</a></h5>
                                                    <div class="ps-product__meta"><span class="ps-product__del">$64.65</span><span class="ps-product__price sale">$86.67</span>
                                                    </div>
                                                    <button class="ps-btn ps-btn--warning">Add to cart</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td>
                                                <ul class="ps-product__list">
                                                    <li class="ps-check-line">5 cleaning programs</li>
                                                    <li class="ps-check-line">Digital display</li>
                                                    <li class="ps-check-line">Memory for 3 user</li>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul class="ps-product__list">
                                                    <li class="ps-check-line">5 cleaning programs</li>
                                                    <li class="ps-check-line">Digital display</li>
                                                    <li class="ps-check-line">Memory for 3 user</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Availability</th>
                                            <td>
                                                <p class="ps-product__text ps-check-line">in stock</p>
                                            </td>
                                            <td>
                                                <p class="ps-product__text ps-check-line">in stock</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Weight</th>
                                            <td>
                                                <p class="ps-product__text">10 kg</p>
                                            </td>
                                            <td>
                                                <p class="ps-product__text">10 kg</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Dimensions</th>
                                            <td>
                                                <p class="ps-product__text">10 × 10 × 10 cm</p>
                                            </td>
                                            <td>
                                                <p class="ps-product__text">10 × 10 × 10 cm</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Color</th>
                                            <td>
                                                <p class="ps-product__text">Red, Navy</p>
                                            </td>
                                            <td>
                                                <p class="ps-product__text">Green</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Sku</th>
                                            <td>
                                                <p class="ps-product__text">SF-006</p>
                                            </td>
                                            <td>
                                                <p class="ps-product__text">BE-001</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td><span class="ps-product__price">$77.65</span>
                                            </td>
                                            <td><span class="ps-product__del">$64.65</span><span class="ps-product__price sale">$86.67</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="popupLanguage" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ps-popup--select">
        <div class="modal-content">
            <div class="modal-body">
                <div class="wrap-modal-slider container-fluid">
                    <button class="close ps-popup__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="ps-popup__body">
                        <h2 class="ps-popup__title">Select language</h2>
                        <ul class="ps-popup__list">
                            <li class="language-item"> <a class="active btn" href="javascript:void(0);" data-value="English">English</a></li>
                            <li class="language-item"> <a class="btn" href="javascript:void(0);" data-value="Deutsch">Deutsch</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="popupCurrency" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ps-popup--select">
        <div class="modal-content">
            <div class="modal-body">
                <div class="wrap-modal-slider container-fluid">
                    <button class="close ps-popup__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="ps-popup__body">
                        <h2 class="ps-popup__title">Select currency</h2>
                        <ul class="ps-popup__list">
                            <li class="currency-item"> <a class="active btn" href="javascript:void(0);" data-value="USD">USD</a></li>
                            <li class="currency-item"> <a class="btn" href="javascript:void(0);" data-value="EUR">EUR</a></li>
                            <li class="currency-item"> <a class="btn" href="javascript:void(0);" data-value="JPY">JPY</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="popupAddcart" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered ps-addcart">
        <div class="modal-content">
            <div class="modal-body">
                <div class="wrap-modal-slider container-fluid ps-addcart__body">
                    <button class="close ps-addcart__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p class="ps-addcart__noti"> <i class="fa fa-check"> </i>Added to cart succesfully</p>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="ps-product ps-product--standard">
                                <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                        <figure><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/015.jpg" alt="alt" /><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/040.jpg" alt="alt" />
                                        </figure>
                                    </a>
                                    <div class="ps-product__actions">
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="#" data-toggle="modal" data-target="#popupCompare"><i class="fa fa-align-left"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#" data-toggle="modal" data-target="#popupAddcart"><i class="fa fa-shopping-basket"></i></a></div>
                                    </div>
                                    <div class="ps-product__badge">
                                        <div class="ps-badge ps-badge--sale">Sale</div>
                                    </div>
                                </div>
                                <div class="ps-product__content">
                                    <h5 class="ps-product__title"><a href="product1.html">Lens Frame Professional Adjustable Multifunctional</a></h5>
                                    <div class="ps-product__meta"><span class="ps-product__price sale">$89.65</span><span class="ps-product__del">$60.65</span>
                                    </div>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5" selected="selected">5</option>
                                        </select><span class="ps-product__review">( Reviews)</span>
                                    </div>
                                    <div class="ps-product__desc">
                                        <ul class="ps-product__list">
                                            <li>Study history up to 30 days</li>
                                            <li>Up to 5 users simultaneously</li>
                                            <li>Has HEALTH certificate</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__actions ps-product__group-mobile">
                                        <div class="ps-product__quantity">
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                                <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div>
                                        <div class="ps-product__item cart" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#"><i class="fa fa-shopping-basket"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="ps-addcart__content">
                                <p>There are two items in your cart.</p>
                                <p class="ps-addcart__total">Total: <span class="ps-price">$44.00</span></p><a class="ps-btn ps-btn--border" href="#" data-dismiss="modal" aria-label="Close">Continue shopping</a><a class="ps-btn ps-btn--border" href="shopping-cart.html">View cart</a><a class="ps-btn ps-btn--warning" href="checkout.html">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="popupAddcartV2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered ps-addcart">
        <div class="modal-content">
            <div class="modal-body">
                <div class="wrap-modal-slider container-fluid ps-addcart__body">
                    <div class="ps-addcart__overlay">
                        <div class="ps-addcart__loading"></div>
                    </div>
                    <button class="close ps-addcart__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p class="ps-addcart__noti"> <i class="fa fa-check"> </i>Added to cart succesfully</p>
                    <div class="ps-addcart__product">
                        <div class="ps-product ps-product--standard">
                            <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                    <figure><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/015.jpg" alt><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/040.jpg" alt></figure>
                                </a></div>
                            <div class="ps-product__content">
                                <div class="ps-product__title"><a>Lens Frame Professional Adjustable Multifunctional</a></div>
                                <div class="ps-product__quantity"><span>x2</span></div>
                                <div class="ps-product__meta"><span class="ps-product__price">$89.65</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-addcart__header">
                        <h3>Want o add one of these?</h3>
                        <p>People who buy this product buy also:</p>
                    </div>
                    <div class="ps-addcart__content">
                        <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="15000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="3" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="3" data-owl-duration="1000" data-owl-mousedrag="on">
                            <div class="ps-product ps-product--standard">
                                <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                        <figure><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/015.jpg" alt="alt" /><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/040.jpg" alt="alt" />
                                        </figure>
                                    </a>
                                    <div class="ps-product__actions">
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="#" data-toggle="modal" data-target="#popupCompare"><i class="fa fa-align-left"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#" data-toggle="modal" data-target="#popupAddcart"><i class="fa fa-shopping-basket"></i></a></div>
                                    </div>
                                    <div class="ps-product__badge">
                                        <div class="ps-badge ps-badge--sale">Sale</div>
                                    </div>
                                </div>
                                <div class="ps-product__content">
                                    <h5 class="ps-product__title"><a href="product1.html">Lens Frame Professional Adjustable Multifunctional</a></h5>
                                    <div class="ps-product__meta"><span class="ps-product__price sale">$89.65</span><span class="ps-product__del">$60.65</span>
                                    </div>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5" selected="selected">5</option>
                                        </select><span class="ps-product__review">( Reviews)</span>
                                    </div>
                                    <div class="ps-product__desc">
                                        <ul class="ps-product__list">
                                            <li>Study history up to 30 days</li>
                                            <li>Up to 5 users simultaneously</li>
                                            <li>Has HEALTH certificate</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__actions ps-product__group-mobile">
                                        <div class="ps-product__quantity">
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                                <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div>
                                        <div class="ps-product__item cart" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#"><i class="fa fa-shopping-basket"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-product ps-product--standard">
                                <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                        <figure><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/028.jpg" alt="alt" /><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/045.jpg" alt="alt" />
                                        </figure>
                                    </a>
                                    <div class="ps-product__actions">
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="#" data-toggle="modal" data-target="#popupCompare"><i class="fa fa-align-left"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#" data-toggle="modal" data-target="#popupAddcart"><i class="fa fa-shopping-basket"></i></a></div>
                                    </div>
                                    <div class="ps-product__badge">
                                    </div>
                                </div>
                                <div class="ps-product__content">
                                    <h5 class="ps-product__title"><a href="product1.html">Digital Thermometer X30-Pro</a></h5>
                                    <div class="ps-product__meta"><span class="ps-product__price sale">$60.39</span><span class="ps-product__del">$89.99</span>
                                    </div>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected="selected">4</option>
                                            <option value="5">5</option>
                                        </select><span class="ps-product__review">( Reviews)</span>
                                    </div>
                                    <div class="ps-product__desc">
                                        <ul class="ps-product__list">
                                            <li>Study history up to 30 days</li>
                                            <li>Up to 5 users simultaneously</li>
                                            <li>Has HEALTH certificate</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__actions ps-product__group-mobile">
                                        <div class="ps-product__quantity">
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                                <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div>
                                        <div class="ps-product__item cart" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#"><i class="fa fa-shopping-basket"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-product ps-product--standard">
                                <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                        <figure><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/020.jpg" alt="alt" /><img src="<?= FRONTEND_ASSETS_PATH; ?>img/products/008.jpg" alt="alt" />
                                        </figure>
                                    </a>
                                    <div class="ps-product__actions">
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="#" data-toggle="modal" data-target="#popupCompare"><i class="fa fa-align-left"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#" data-toggle="modal" data-target="#popupAddcart"><i class="fa fa-shopping-basket"></i></a></div>
                                    </div>
                                    <div class="ps-product__badge">
                                        <div class="ps-badge ps-badge--hot">Hot</div>
                                    </div>
                                </div>
                                <div class="ps-product__content">
                                    <h5 class="ps-product__title"><a href="product1.html">Bronze Blood Pressure Monitor</a></h5>
                                    <div class="ps-product__meta"><span class="ps-product__price">$56.65 - $97.65</span>
                                    </div>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5" selected="selected">5</option>
                                        </select><span class="ps-product__review">( Reviews)</span>
                                    </div>
                                    <div class="ps-product__desc">
                                        <ul class="ps-product__list">
                                            <li>Study history up to 30 days</li>
                                            <li>Up to 5 users simultaneously</li>
                                            <li>Has HEALTH certificate</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__actions ps-product__group-mobile">
                                        <div class="ps-product__quantity">
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                                <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div>
                                        <div class="ps-product__item cart" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#"><i class="fa fa-shopping-basket"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-addcart__footer"><a class="ps-btn ps-btn--border" href="#" data-dismiss="modal" aria-label="Close">No thanks :(</a><a class="ps-btn ps-btn--warning" href="shopping-cart.html">Continue to Cart</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="<?= FRONTEND_ASSETS_PATH; ?>plugins/jquery.min.js"></script>
<script src="<?= FRONTEND_ASSETS_PATH; ?>plugins/popper.min.js"></script>
<script src="<?= FRONTEND_ASSETS_PATH; ?>plugins/bootstrap4/js/bootstrap.min.js"></script>
<script src="<?= FRONTEND_ASSETS_PATH; ?>plugins/select2/dist/js/select2.full.min.js"></script>
<script src="<?= FRONTEND_ASSETS_PATH; ?>plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="<?= FRONTEND_ASSETS_PATH; ?>plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script src="<?= FRONTEND_ASSETS_PATH; ?>plugins/lightGallery/dist/js/lightgallery-all.min.js"></script>
<script src="<?= FRONTEND_ASSETS_PATH; ?>plugins/slick/slick/slick.min.js"></script>
<script src="<?= FRONTEND_ASSETS_PATH; ?>plugins/noUiSlider/nouislider.min.js"></script>
<!-- custom code-->
<script src="<?= FRONTEND_ASSETS_PATH; ?>js/main.js"></script>
</body>


<!-- Mirrored from nouthemes.net/html/mymedi/home14.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 May 2022 03:31:06 GMT -->

</html>

<script>
    $(document).ready(function() {
        var baseUrl = $('#frontbase_url').val(); // header url set

        $(document).delegate("#searchbar", "keyup", function(event) {
            var value = $(this).val();
            // alert (value);

            $.ajax({
                type: 'POST',
                url: baseUrl + 'home/searchajax',
                data: {
                    value: value,
                },
                success: function(result) {
                    var data = jQuery.parseJSON(result);
                    $('#search_data').html(data);
                }
            });
        });
    });
</script>