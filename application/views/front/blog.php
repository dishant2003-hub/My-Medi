<div class="ps-blog">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="<?= base_url('') ?>">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page"><a href="<?= base_url('home/blog') ?>">My Medi Blog</a></li>
        </ul>
        <h1 class="ps-blog__title">My Medi Blog</h1>
        <div class="ps-blog__content">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-12 col-md-8">
                    <div class="ps-blog--sidebar">
                        <?php
                        foreach ($rowData as $data) {
                        ?>
                            <div class="ps-blog--latset">
                                <div class="ps-blog__thumbnail"><a href="<?= base_url('home/blog_post/' . $data['id'])  ?>"><img src="<?= base_url(UPLOAD . $data['image']); ?>" alt="alt" /></a>
                                    <div class="ps-blog__badge"><span class="ps-badge__item">MEDIC</span><span class="ps-badge__item">PHARMACY</span><span class="ps-badge__item">SALE</span>
                                    </div>
                                </div>
                                <div class="ps-blog__content">
                                    <div class="ps-blog__meta"> <span class="ps-blog__date"><?= $data['date'] ?></span><a class="ps-blog__author" href="">Alfredo Austin</a></div><a class="ps-blog__title" href="<?= base_url('home/blog_post/' . $data['id']) ?>"><?= $data['line'] ?></a>
                                    <!-- <p class="ps-blog__desc"><?= $data['description'] ?></p> -->
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