<div class="ps-portfolio">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="<?= base_url('') ?> ">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Portfolio</li>
        </ul>
        <div class="ps-portfolio__content">
            <h1 class="ps-portfolio__title">Portfolio</h1>
            <div class="ps-portfolio__tabs">
                <div class="tab-content" id="productContent">
                    <div class="tab-pane fade show active" id="portfolio-all-content" role="tabpanel" aria-labelledby="portfolio-all-tab">
                        <div class="row">
                            <?php
                            foreach ($result as $data) {
                            ?>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="ps-blog--latset">
                                        <div class="ps-blog__thumbnail"><a href="<?= base_url('portfolio_details/' . $data['id']) ?>"><img src="<?= base_url(UPLOAD . $data['image']); ?>" alt="alt" /></a>
                                            <div class="ps-blog__badge"><span class="ps-badge__item">Design</span><span class="ps-badge__item">Management</span>
                                            </div>
                                        </div>
                                        <div class="ps-blog__content"> <a class="ps-blog__title" href="<?= base_url('portfolio_details/' . $data['id']) ?>"><?= $data['title'] ?></a></div>
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
                </div>
            </div>
        </div>
    </div>
</div>