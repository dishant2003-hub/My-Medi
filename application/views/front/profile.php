<?php
// pr($this->setting_data);die;
$fb_link = isset($this->setting_data['fb_link']) ? $this->setting_data['fb_link'] : '';
$twitter_link = isset($this->setting_data['twitter_link']) ? $this->setting_data['twitter_link'] : '';
$linkedin_link = isset($this->setting_data['linkedin_link']) ? $this->setting_data['linkedin_link'] : '';
$instagram_link = isset($this->setting_data['instagram_link']) ? $this->setting_data['instagram_link'] : '';
$youtube_link = isset($this->setting_data['youtube_link']) ? $this->setting_data['youtube_link'] : '';
?>

<div class="ps-page--product ps-page--product1">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="<?= base_url('') ?>">Home</a></li>
            <li class="ps-breadcrumb__item"><a href="<?= base_url('home/product/' . $rowData['id']); ?>">Product</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page"><?= $rowData['name']; ?></li>
        </ul>
        <div class="ps-page__content">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="ps-product--detail">
                        <form method="POST" action="<?= base_url('home/cart') ?>" enctype="multipart/form-data">

                            <input type="hidden" name="id" value="<?= $rowData['id'] ?>">

                            <div class="row">
                                <div class="col-12 col-xl-7">
                                    <div class="ps-product--gallery">
                                        <div class="ps-product__thumbnail">
                                            <?php foreach ($arrow as $order) { ?>
                                                <div class="slide"><img src="<?= base_url(UPLOAD . $order['image']); ?>" width="50px" alt="alt"/>
                                                    <input type="hidden" name="image" value="<?= $order['image'] ?>">
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="ps-gallery--image">
                                            <?php foreach ($arrow as $inside) { ?>
                                                <div class="slide">
                                                    <div class="ps-gallery__item"><img src="<?= base_url(UPLOAD . $inside['image']); ?>" alt="alt" /></div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-5">
                                    <div class="ps-product__info">
                                        <div class="ps-product__badge"><span class="ps-badge ps-badge--outstock">OUT OF STOCK</span>
                                        </div>
                                        <div class="ps-product__branch"><a href="#">HeartRate</a></div>
                                        <div class="ps-product__title"><a href="#"><?= $rowData['name']; ?></a>
                                            <input type="hidden" name="name" value="<?= $rowData['name'] ?>">
                                        </div>
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
                                        <div class="ps-product__meta"><span class="ps-product__price">$<?= $rowData['price']; ?></span>
                                            <input type="hidden" name="price" value="<?= $rowData['price'] ?>">
                                        </div>
                                        <div class="ps-product__variations"><a class="ps-product__link" href="<?= base_url('wishlist_session/' . $rowData['id']) ?>">Add to wishlist</a></div>
                                        <div class="ps-product__type">
                                            <ul class="ps-product__list">
                                                <li> <span class="ps-list__title">Tags: </span><a class="ps-list__text" href="#">Health</a><a class="ps-list__text" href="#">Thermometer</a></li>
                                                <li> <span class="ps-list__title">SKU: </span><a class="ps-list__text" href="#">SF-006</a></li>
                                            </ul>
                                        </div>
                                        <div class="ps-product__social">
                                            <ul class="ps-social ps-social--color">
                                                <li><a class="ps-social__link facebook" href="<?= $fb_link ?>"><i class="fa fa-facebook "> </i><span class="ps-tooltip">Facebook</span></a></li>
                                                <li><a class="ps-social__link twitter" href="<?= $twitter_link ?>"><i class="fa fa-twitter"></i><span class="ps-tooltip">Twitter</span></a></li>
                                                <li class="ps-social__linkedin"><a class="ps-social__link linkedin" href="<?= $linkedin_link ?>"><i class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="submit" name="submit" value="submit" class="ps-btn ps-btn--warning">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>