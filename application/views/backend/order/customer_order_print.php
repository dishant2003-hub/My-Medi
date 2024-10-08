<!DOCTYPE html>

<!-- beautify ignore:start -->
<html lang="en" class="light-style " dir="ltr" data-theme="theme-default" data-assets-path="<?= BACKEND_ASSETS_PATH; ?>" data-template="vertical-menu-template">

  
<!-- Mirrored from pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/vertical-menu-template/app-invoice-print.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 May 2022 09:41:22 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Invoice (Print version) - Pages | Frest - Bootstrap Admin Template</title>
    
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 admin, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->   
    <link rel="canonical" href="https://1.envato.market/frest_admin">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="<?= BACKEND_ASSETS_PATH; ?>vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?= BACKEND_ASSETS_PATH; ?>vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?= BACKEND_ASSETS_PATH; ?>vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= BACKEND_ASSETS_PATH; ?>vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= BACKEND_ASSETS_PATH; ?>vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= BACKEND_ASSETS_PATH; ?>css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= BACKEND_ASSETS_PATH; ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= BACKEND_ASSETS_PATH; ?>vendor/libs/typeahead-js/typeahead.css" />
    

    <!-- Page CSS -->
    
<link rel="stylesheet" href="<?= BACKEND_ASSETS_PATH; ?>vendor/css/pages/app-invoice-print.css" />
    <!-- Helpers -->
    <script src="<?= BACKEND_ASSETS_PATH; ?>vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="<?= BACKEND_ASSETS_PATH; ?>vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= BACKEND_ASSETS_PATH; ?>js/config.js"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'GA_MEASUREMENT_ID');
    </script>
    <!-- Custom notification for demo -->
    <!-- beautify ignore:end -->

</head>

<body>

    <!-- Content -->
    <div class="invoice-print p-5">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="d-flex justify-content-between flex-row">
                    <div class="mb-4">
                        <div class="d-flex svg-illustration mb-3 gap-2">

                            <svg width="26px" height="26px" viewBox="0 0 26 26" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>icon</title>
                                <defs>
                                    <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-1">
                                        <stop stop-color="#5A8DEE" offset="0%"></stop>
                                        <stop stop-color="#699AF9" offset="100%"></stop>
                                    </linearGradient>
                                    <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="linearGradient-2">
                                        <stop stop-color="#FDAC41" offset="0%"></stop>
                                        <stop stop-color="#E38100" offset="100%"></stop>
                                    </linearGradient>
                                </defs>
                                <g id="Pages" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Login---V2" transform="translate(-667.000000, -290.000000)">
                                        <g id="Login" transform="translate(519.000000, 244.000000)">
                                            <g id="Logo" transform="translate(148.000000, 42.000000)">
                                                <g id="icon" transform="translate(0.000000, 4.000000)">
                                                    <path d="M13.8863636,4.72727273 C18.9447899,4.72727273 23.0454545,8.82793741 23.0454545,13.8863636 C23.0454545,18.9447899 18.9447899,23.0454545 13.8863636,23.0454545 C8.82793741,23.0454545 4.72727273,18.9447899 4.72727273,13.8863636 C4.72727273,13.5423509 4.74623858,13.2027679 4.78318172,12.8686032 L8.54810407,12.8689442 C8.48567157,13.19852 8.45300462,13.5386269 8.45300462,13.8863636 C8.45300462,16.887125 10.8856023,19.3197227 13.8863636,19.3197227 C16.887125,19.3197227 19.3197227,16.887125 19.3197227,13.8863636 C19.3197227,10.8856023 16.887125,8.45300462 13.8863636,8.45300462 C13.5386269,8.45300462 13.19852,8.48567157 12.8689442,8.54810407 L12.8686032,4.78318172 C13.2027679,4.74623858 13.5423509,4.72727273 13.8863636,4.72727273 Z" id="Combined-Shape" fill="#4880EA"></path>
                                                    <path d="M13.5909091,1.77272727 C20.4442608,1.77272727 26,7.19618701 26,13.8863636 C26,20.5765403 20.4442608,26 13.5909091,26 C6.73755742,26 1.18181818,20.5765403 1.18181818,13.8863636 C1.18181818,13.540626 1.19665566,13.1982714 1.22574292,12.8598734 L6.30410592,12.859962 C6.25499466,13.1951893 6.22958398,13.5378796 6.22958398,13.8863636 C6.22958398,17.8551125 9.52536149,21.0724191 13.5909091,21.0724191 C17.6564567,21.0724191 20.9522342,17.8551125 20.9522342,13.8863636 C20.9522342,9.91761479 17.6564567,6.70030817 13.5909091,6.70030817 C13.2336969,6.70030817 12.8824272,6.72514561 12.5388136,6.77314791 L12.5392575,1.81561642 C12.8859498,1.78721495 13.2366963,1.77272727 13.5909091,1.77272727 Z" id="Combined-Shape2" fill="url(#linearGradient-1)"></path>
                                                    <rect id="Rectangle" fill="url(#linearGradient-2)" x="0" y="0" width="7.68181818" height="7.68181818"></rect>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <span class="app-brand-text h3 mb-0 fw-bold">Frest</span>
                        </div>
                        <?php
                        // pr($result);die;
                        $id = $result['id'];

                        $data = $this->Service->get_all(TBL_ORDER_ITEM, '*', array('order_id' => $id));
                        // pr($data);die;
                        ?>
                        <p class="mb-1" style="font-weight: bold;"><?= $result['fname'] ?> <?= $result['lname'] ?></p>
                        <p class="mb-1"><?= $result['address']  ?></p>
                        <p class="mb-1"><?= $result['city']  ?> <?= $result['zipcode']  ?></p>
                        <p class="mb-0"><?= $result['phone']  ?></p>
                    </div>
                    <div>
                        <h4>Invoice #3492</h4>
                        <div class="mb-2">
                            <span>Date Issues:</span>
                            <span class="fw-semibold">April 12, 2024</span>
                        </div>
                        <div>
                            <span>Date Due:</span>
                            <span class="fw-semibold">May 25, 2024</span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table border-top m-0">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Image</th>
                                <th>Cost</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $sub_total = 0;
                                foreach ($data as $product) {
                                    $sub_total += $product['total'];
                                    if ($sub_total >= 200) {
                                        $total = $sub_total;
                                    } else {
                                        $charges = $sub_total * 10 / 100;
                                        $total = $sub_total + $charges;
                                    }
                                ?>
                                    <td><?= $product['name'] ?></td>
                                    <td><img src="<?php echo base_url(UPLOAD . $product['image']); ?>" width="15%"></td>
                                    <td>$<?= $product['price'] ?></td>
                                    <td><?= $product['quantity'] ?></td>
                                    <td>$<?= $product['total'] ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="3" class="align-top px-4 py-3">
                                <p class="mb-2">
                                    <span class="me-1 fw-bold">Salesperson:</span>
                                    <span>Alfie Solomons</span>
                                </p>
                                <span>Thanks for your business</span>
                            </td>
                            <td class="text-end px-4 py-3">
                                <p class="mb-2">Subtotal:</p>
                                <p class="mb-2">Tax:</p>
                                <p class="mb-0">Total:</p>
                            </td>
                            <td class="px-4 py-3">
                                <p class="fw-semibold mb-2">$<?php echo $sub_total; ?></p>

                                <?php
                                if ($sub_total >= 200) {
                                ?>
                                    <p class="fw-semibold mb-2">$0</p>
                                <?php } else { ?>
                                    <p class="fw-semibold mb-2">$<?php echo $charges; ?></p>
                                <?php } ?>

                                <p class="fw-semibold mb-0">$<?php echo $total; ?></p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-12">
                        <span class="fw-semibold">Note:</span>
                        <span>It was a pleasure working with you and your team. We hope you will keep us in mind for future
                            freelance projects. Thank You!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- / Content -->


    <div class="buy-now">
        <a href="https://1.envato.market/frest_admin" target="_blank" class="btn btn-danger btn-buy-now">Buy Now</a>
    </div>




    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= BACKEND_ASSETS_PATH; ?>vendor/libs/jquery/jquery.js"></script>
    <script src="<?= BACKEND_ASSETS_PATH; ?>vendor/libs/popper/popper.js"></script>
    <script src="<?= BACKEND_ASSETS_PATH; ?>vendor/js/bootstrap.js"></script>
    <script src="<?= BACKEND_ASSETS_PATH; ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?= BACKEND_ASSETS_PATH; ?>vendor/libs/hammer/hammer.js"></script>


    <script src="<?= BACKEND_ASSETS_PATH; ?>vendor/libs/i18n/i18n.js"></script>
    <script src="<?= BACKEND_ASSETS_PATH; ?>vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="<?= BACKEND_ASSETS_PATH; ?>vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->



    <!-- Main JS -->
    <script src="<?= BACKEND_ASSETS_PATH; ?>js/main.js"></script>

    <!-- Page JS -->
    <script src="<?= BACKEND_ASSETS_PATH; ?>js/app-invoice-print.js"></script>
</body>


<!-- Mirrored from pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/vertical-menu-template/app-invoice-print.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 May 2022 09:41:23 GMT -->

</html>