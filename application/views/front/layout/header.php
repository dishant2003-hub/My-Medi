<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from nouthemes.net/html/mymedi/home14.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 May 2022 03:30:30 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="<?= FRONTEND_ASSETS_PATH; ?>img/favicon.png" rel="apple-touch-icon-precomposed">
    <link href="<?= FRONTEND_ASSETS_PATH; ?>img/favicon.png" rel="shortcut icon" type="image/png">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>MyMedi - eCommerce HTML Template</title>
    <link rel="stylesheet" href="<?= FRONTEND_ASSETS_PATH; ?>plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= FRONTEND_ASSETS_PATH; ?>fonts/Linearicons/Font/demo-files/demo.css">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:400,500,600,700&amp;display=swap&amp;ver=1607580870">
    <link rel="stylesheet" href="<?= FRONTEND_ASSETS_PATH; ?>plugins/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= FRONTEND_ASSETS_PATH; ?>plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="<?= FRONTEND_ASSETS_PATH; ?>plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="<?= FRONTEND_ASSETS_PATH; ?>plugins/lightGallery/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="<?= FRONTEND_ASSETS_PATH; ?>plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="<?= FRONTEND_ASSETS_PATH; ?>plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?= FRONTEND_ASSETS_PATH; ?>plugins/lightGallery/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="<?= FRONTEND_ASSETS_PATH; ?>plugins/noUiSlider/nouislider.css">
    <link rel="stylesheet" href="<?= FRONTEND_ASSETS_PATH; ?>css/style.css">
    <link rel="stylesheet" href="<?= FRONTEND_ASSETS_PATH; ?>css/assets.css">
    <link rel="stylesheet" href="<?= FRONTEND_ASSETS_PATH; ?>css/home-14.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body>

    <?php
    $cur_tab = $this->uri->segment(2) == '' ? '' : $this->uri->segment(2);
    ?>
    <input type="hidden" id="frontbase_url" value="<?= base_url(); ?>" />

    <div class="ps-page">
        <header class="ps-header ps-header--13">
            <div class="ps-noti">
                <div class="container">
                    <p class="m-0">Due to the <strong>COVID 19 </strong>epidemic, orders may be processed with a slight delay</p>
                </div><a class="ps-noti__close"><i class="icon-cross"></i></a>
            </div>
            <div class="ps-header__top">
                <div class="container">
                    <div class="ps-header__text">Need help? <strong>0020 500 - MYMEDI - 000</strong></div>
                </div>
            </div>
            <div class="ps-header__middle">
                <div class="container">
                    <div class="ps-logo"><a href="<?= base_url('') ?>"> <img src="<?= FRONTEND_ASSETS_PATH; ?>img/logo-green.png" alt><img class="sticky-logo" src="<?= FRONTEND_ASSETS_PATH; ?>img/logo-green.png" alt></a></div><a class="ps-menu--sticky" href="#"><i class="fa fa-bars"></i></a>
                    <div class="ps-header__right">
                        <ul class="ps-header__icons">
                            <li><a class="ps-header__item open-search" href="#"><i class="icon-magnifier"></i></a></li>

                            <?php
                            if (empty($_SESSION['sign'])) {
                            ?>
                                <li><a class="ps-header__item" href="<?= base_url('sign_in') ?>" id="login-modal" title="Account"><i class="icon-user"></i></a></li>
                            <?php } else { ?>
                                <li>
                                    <a class="ps-header__item" href="<?= base_url('account') ?>" id="login-modal" title="Account"><i class="icon-user"></i></a>
                                </li>
                            <?php } ?>

                            <?php
                            if (!empty($_SESSION['sign'])) {
                                $userdata = $this->session->userdata('sign');
                                $use_id = $userdata['id'];

                                if(!empty($data = $this->product_model->countuser($use_id))){
                            ?>
                                    <li><a class="ps-header__item" href="<?= base_url('wishlist'); ?>" title="Wishlist"><i class="fa fa-heart-o"></i><span class="badge"><?= $data ?></span></a></li>
                                <?php } else { ?>
                                    <li><a class="ps-header__item" href="<?= base_url('wishlist'); ?>" title="Wishlist"><i class="fa fa-heart-o"></i><span class="badge">0</span></a></li>
                                <?php }
                                if (!empty($_SESSION['addcart'])) {
                                    $this->session->userdata('addcart');
                                    $result = count($_SESSION['addcart']);
                                ?>
                                    <li><a class="ps-header__item" href="#" id="cart-mini"><i class="icon-cart-empty"></i><span class="badge"><?= $result ?></span></a>
                                    <?php } else { ?>
                                    <li><a class="ps-header__item" href="#" id="cart-mini"><i class="icon-cart-empty"></i><span class="badge">0</span></a></li>
                                <?php } ?>

                                <div class="ps-cart--mini">
                                    <ul class="ps-cart__items"> 
                                        <?php
                                        $sub_total = 0;
                                        if (!empty($_SESSION['addcart'])) {
                                            foreach ($_SESSION['addcart'] as $result) {
                                                $sub_total += $result['total'];
                                        ?>
                                                <li class="ps-cart__item ">
                                                    <div class="ps-product--mini-cart"><a class="ps-product__thumbnail" href="<?= base_url('home/product/' . $result['id']) ?>"><img src="<?= base_url(UPLOAD . $result['image']); ?>" alt="alt" /></a>
                                                        <div class="ps-product__content"><a class="ps-product__name" href="<?= base_url('home/product/' . $result['id']) ?>"><?= $result['name'] ?> x <?= $result['quantity'] ?></a>
                                                            <p class="ps-product__meta"> <span class="ps-product__price">$<?= $result['price'] ?></span><span class="ps-product__is-price">$100.00</span></p>
                                                        </div><a class="ps-product__remove" href="<?= base_url('home/session_remove_cart/' . $result['id']); ?>"><i class="icon-cross"></i></a>
                                                    </div>
                                                </li>
                                        <?php }
                                        } else {
                                            echo "Record Not Found";
                                        } ?>
                                    </ul>
                                    <?php
                                    if (!empty($_SESSION['sign'])) {
                                        if (!empty($_SESSION['addcart'])) {
                                    ?>
                                            <div class="ps-cart__total"><span>Subtotal </span><span>$<?= $sub_total ?></span></div>
                                            <div class="ps-cart__footer">
                                                <a class="ps-btn ps-btn--outline" href="<?= base_url('cart') ?>">View Cart</a>
                                                <a class="ps-btn ps-btn--warning" href="<?= base_url('checkout') ?>">Checkout</a>
                                            </div>
                                    <?php }
                                    }
                                    ?>
                                </div>
                                </li>
                            <?php } else { ?>
                                <li><a class="ps-header__item" href="<?= base_url('sign_in'); ?>" title="Wishlist"><i class="fa fa-heart-o"></i><span class="badge">0</span></a></li>
                                <li><a class="ps-header__item" href="<?= base_url('sign_in'); ?>" id="cart-mini"><i class="icon-cart-empty"></i><span class="badge">0</span></a>
                                <?php  } ?>
                        </ul>
                        <div class="ps-language-currency">
                            <a class="ps-dropdown-value" href="javascript:void(0);" data-toggle="modal" data-target="#popupLanguage">English</a>
                            <a class="ps-dropdown-value" href="javascript:void(0);" data-toggle="modal" data-target="#popupCurrency">USD</a>
                        </div>
                        <div class="ps-header__search">
                            <form action="http://nouthemes.net/html/mymedi/do_action" method="post">
                                <div class="ps-search-table">
                                    <div class="input-group">
                                        <input class="form-control ps-input" type="text" id="searchbar" placeholder="Search for products">
                                        <div class="input-group-append"><a href="#"><i class="fa fa-search"></i></a></div>
                                    </div>
                                </div>
                            </form>
                            <div class="ps-search--result">
                                <div class="ps-result__content">
                                    <div class="row m-0" id="search_data">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-navigation">
                <div class="container">
                    <div class="ps-navigation__left">
                        <nav class="ps-main-menu">
                            <ul class="menu">
                                <li class="has-mega-menu"><a href=""> <i class="fa fa-bars"></i>Products<span class="sub-toggle "><i class="fa fa-chevron-down"></i></span></a>
                                    <div class="mega-menu">
                                        <div class="container">
                                            <div class="mega-menu__row">
                                                <div class="col-3">
                                                    <div class="mega-menu__column">
                                                        <a href="<?= base_url('all_product') ?>" class="product_all">Product</a>
                                                        <?php
                                                        $data = $this->Service->get_all(TBL_PRODUCT);
                                                        foreach ($data as $result) {
                                                        ?>
                                                            <ul class="sub-menu--mega">
                                                                <li><a href="<?= base_url('product/' . $result['id']); ?>"><?= $result['name']; ?></a></li>
                                                            </ul>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="has-mega-menu"><a href="">Category<span class="sub-toggle"><i class="fa fa-chevron-down"></i></span></a>
                                    <div class="mega-menu">
                                        <div class="container">
                                            <div class="mega-menu__row">
                                                <?php
                                                $rowData = $this->Service->get_all(TBL_PRODUCT);
                                                $_arrow = array();
                                                foreach ($rowData as $item) {
                                                    $_arrow[$item['category']][$item['subcategory']][$item['id']] =  $item['name'];
                                                }
                                                foreach ($_arrow as $category => $subcategory) {
                                                    $data = $this->Service->get_row(TBL_CATEGORY, '*', array('id' => $category));
                                                ?>
                                                    <div class="mega-menu__column">
                                                        <h4><?= $data['name'] ?></h4>
                                                        <?php
                                                        foreach ($subcategory as $subcat => $id) {
                                                            $arrow = $this->Service->get_row(TBL_CATEGORY, '*', array('id' => $subcat));
                                                        ?>
                                                            <ul class="sub-menu--mega">
                                                                <li><a href="<?= base_url('home/grid?cat_id=' . $category . '&subcat_id=' . $subcat) ?>"><?= $arrow['name'] ?></a></li>
                                                            </ul>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="<?php echo ($cur_tab == 'blog') ? 'active' : '' ?> has-mega-menu segment_active"><a href="<?= base_url('home/blog') ?>">Blog</a></li>
                                <li class="<?php echo ($cur_tab == 'contact_us') ? 'active' : '' ?> has-mega-menu segment_active"><a href="<?= base_url('home/contact_us') ?>">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="ps-navigation__right">Need help? <strong>0020 500 - MYMEDI - 000</strong></div>
                </div>
            </div>
        </header>
        <header class="ps-header ps-header--13 ps-header--mobile">
            <div class="ps-noti">
                <div class="container">
                    <p class="m-0">Due to the <strong>COVID 19 </strong>epidemic, orders may be processed with a slight delay</p>
                </div><a class="ps-noti__close"><i class="icon-cross"></i></a>
            </div>
            <div class="ps-header__middle">
                <div class="container">
                    <div class="ps-header__left">
                        <ul class="ps-header__icons">
                            <li><a class="ps-header__item open-search" href="#"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                    <div class="ps-logo"><a href="index.html"> <img src="<?= FRONTEND_ASSETS_PATH; ?>img/logo-green.png" alt></a></div>
                    <div class="ps-header__right">
                        <ul class="ps-header__icons">
                            <li><a class="ps-header__item" href="#"><i class="icon-cart-empty"></i><span class="badge">2</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <style>
            .segment_active.active {
                background-color: lightsteelblue;
            }
        </style>

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