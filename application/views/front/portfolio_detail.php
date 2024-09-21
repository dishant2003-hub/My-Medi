<div class="ps-portfolio--detail">
            <div class="container">
                <ul class="ps-breadcrumb">
                    <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>
                    <li class="ps-breadcrumb__item"><a href="<?= base_url('portfolio') ?>">Portfolio</a></li>
                    <li class="ps-breadcrumb__item active" aria-current="page"><?= $result['title'] ?></li>
                </ul>
                <?php
                ?>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="ps-portfolio__thunmnail"> <a href=""><img src="<?= base_url(UPLOAD . $result['image']); ?>" alt=""></a>
                        </div>
                    </div> 
                    <div class="col-12 col-md-6">
                        <div class="ps-portfolio__content">
                            <h2 class="ps-portfolio__title"><?= $result['title'] ?></h2>
                            <p class="ps-portfolio__subtitle"><?= $result['short_dec'] ?></p>
                            <p class="ps-portfolio__des"><?= $result['decription'] ?></p>
                            <div class="ps-review">
                                <div class="ps-review__text">I ordered on Friday evening and on Monday at 12:30 the package was with me. I have never encountered such a fast order processing.</div>
                                <div class="ps-review__name">Mark J.</div>
                                <div class="ps-review__review">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5" selected="selected">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="ps-section--blog" data-background="<?= FRONTEND_ASSETS_PATH ?>img/related-bg.jpg">
                <div class="container">
                    <h3 class="ps-section__title">Related Projects</h3>
                    <div class="ps-section__carousel">
                        <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="3" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="3" data-owl-duration="1000" data-owl-mousedrag="on">
                           <?php 
                            foreach($arrow as $rowData){
                           ?>
                        <div class="ps-section__item">
                                <div class="ps-blog--latset">
                                    <div class="ps-blog__thumbnail"><a href="<?= base_url('portfolio_details/' . $rowData['id']) ?>"><img src="<?= base_url(UPLOAD . $rowData['image']); ?>" alt="alt" /></a>
                                        <div class="ps-blog__badge"><span class="ps-badge__item">Design</span><span class="ps-badge__item">Management</span>
                                        </div>
                                    </div>
                                    <div class="ps-blog__content">
                                        <div class="ps-blog__meta"> <span class="ps-blog__date"></span><a class="ps-blog__author" href="#"></a></div><a class="ps-blog__title" href="<?= base_url('portfolio_details/' . $rowData['id']) ?>"><?= $rowData['title'] ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>