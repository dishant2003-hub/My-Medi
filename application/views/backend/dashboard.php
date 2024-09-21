<div class="col-lg-12 col-12 mb-4">
    <div class="row">
        <div class="col-12 col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <a href="<?= base_url('backend/user') ?>">
                        <div class="avatar mx-auto mb-2">
                            <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-user fs-4"></i></span>
                        </div>
                        <span class="d-block text-nowrap text-dark">Users</span>
                        <h2 class="mb-0"><?= (isset($userCount)) ? $userCount : 0 ?></h2>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <a href="<?= base_url('backend/category_table') ?>">
                        <div class="avatar mx-auto mb-2">
                            <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-user fs-4"></i></span>
                        </div>
                        <span class="d-block text-nowrap text-dark">Category</span>
                        <h2 class="mb-0"><?= (isset($categoryCount)) ? $categoryCount : 0 ?></h2>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <a href="<?= base_url('backend/product_table') ?>">
                        <div class="avatar mx-auto mb-2">
                            <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-user fs-4"></i></span>
                        </div>
                        <span class="d-block text-nowrap text-dark">Product</span>
                        <h2 class="mb-0"><?= (isset($productCount)) ? $productCount : 0 ?></h2>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <a href="<?= base_url('backend/order_detail') ?>">
                        <div class="avatar mx-auto mb-2">
                            <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-user fs-4"></i></span>
                        </div>
                        <span class="d-block text-nowrap text-dark">Orderlist</span>
                        <h2 class="mb-0"><?= (isset($orderCount)) ? $orderCount : 0 ?></h2>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <a href="#">
                        <div class="avatar mx-auto mb-2">
                            <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-user fs-4"></i></span>
                        </div>
                        <span class="d-block text-nowrap text-dark">Monthly Product Sales</span>
                        <h2 class="mb-0"><?= (isset($monthCount['total'])) ? $monthCount['total'] : 0 ?></h2>
                    </a>
                </div>
            </div>
        </div>
        <!--<div class="col-12 col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <a href="#">
                        <div class="avatar mx-auto mb-2">
                            <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-user fs-4"></i></span>
                        </div>
                        <span class="d-block text-nowrap text-dark">Yearly Product Sales</span>
                        <h2 class="mb-0"><?= (isset($yearCount['total'])) ? $yearCount['total'] : 0 ?></h2>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <a href="<?= base_url('backend/banner_table') ?>">
                        <div class="avatar mx-auto mb-2">
                            <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-user fs-4"></i></span>
                        </div>
                        <span class="d-block text-nowrap text-dark">Banner</span>
                        <h2 class="mb-0"><?= (isset($bannerCount)) ? $bannerCount : 0 ?></h2>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <a href="<?= base_url('backend/blog_table') ?>">
                        <div class="avatar mx-auto mb-2">
                            <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-user fs-4"></i></span>
                        </div>
                        <span class="d-block text-nowrap text-dark">Blog</span>
                        <h2 class="mb-0"><?= (isset($blogCount)) ? $blogCount : 0 ?></h2>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <a href="<?= base_url('backend/portfolio_table') ?>">
                        <div class="avatar mx-auto mb-2">
                            <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-user fs-4"></i></span>
                        </div>
                        <span class="d-block text-nowrap text-dark">Portfolio</span>
                        <h2 class="mb-0"><?= (isset($portfolioCount)) ? $portfolioCount : 0 ?></h2>
                    </a>
                </div>
            </div>
        </div>  -->
    </div>
</div>





