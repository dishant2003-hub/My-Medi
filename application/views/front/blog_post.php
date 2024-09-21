<div class="ps-post ps-post--full">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="<?= base_url('') ?>">Home</a></li>
            <li class="ps-breadcrumb__item"><a href="<?= base_url('blog') ?>">Blog</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page"><?= $rowData['line'] ?></li>
        </ul>
        <div class="ps-post__content">
            <div class="ps-post__wrapper">
                <div class="ps-blog__badge"><span class="ps-badge__item">MEDIC</span><span class="ps-badge__item">PHARMACY</span><span class="ps-badge__item">SALE</span></div>
                <h1 class="ps-post__title"><?= $rowData['line'] ?></h1>
                <div class="ps-blog__meta"> <span class="ps-blog__date"><?= $rowData['date'] ?></span><a class="ps-blog__author" href="#">Alfredo Austin</a></div>
            </div>
            <div class="ps-blog__banner"> <img src="<?= base_url(UPLOAD . $rowData['image']) ?>" alt=""></div>
            <div class="ps-post__wrapper">
                <p class="ps-blog__text-large"><?= $rowData['short_des'] ?></p>
                <p class="ps-blog__text-large"><?= $rowData['description'] ?></p>
            </div>
        </div>
    </div>
    <section class="ps-section--blog" data-background="img/related-bg.jpg">
        <div class="container">
            <h3 class="ps-section__title">Related Posts</h3>
            <div class="ps-section__carousel">
                <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="3" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="3" data-owl-duration="1000" data-owl-mousedrag="on">
                    <?php
                    $arrow = $this->Service->get_all(TBL_BLOG);
                    foreach ($arrow as $data) {
                    ?>
                        <div class="ps-section__item">
                            <div class="ps-blog--latset">
                                <div class="ps-blog__thumbnail"><a href="<?= base_url('home/blog_post/' . $data['id']) ?>"><img src="<?= base_url(UPLOAD . $data['image']) ?>" alt="alt" /></a>
                                    <div class="ps-blog__badge"><span class="ps-badge__item">MEDIC</span><span class="ps-badge__item">PHARMACY</span><span class="ps-badge__item">SALE</span>
                                    </div>
                                </div>
                                <div class="ps-blog__content">
                                    <div class="ps-blog__meta"> <span class="ps-blog__date"><?= $data['date'] ?></span><a class="ps-blog__author" href="#">Alfredo Austin</a></div><a class="ps-blog__title" href="<?= base_url('home/blog_post/' . $data['id']) ?>"><?= $data['line'] ?></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>