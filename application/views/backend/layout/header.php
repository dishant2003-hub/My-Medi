<?php
$favicon = (isset($this->setting_data['favicon']) && !empty($this->setting_data['favicon'])) ?  base_url() . UPLOAD . $this->setting_data['favicon'] : ADMIN_ASSETS_PATH . "img/favicon.ico";
$site_title = (!empty($this->setting_data['site_name'])) ? $this->setting_data['site_name'] : SITE_TITLE;
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="<?php echo ADMIN_ASSETS_PATH; ?>" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title><?= (isset($title)) ? $title . ' | ' . $site_title : $site_title; ?></title>
    <!-- Canonical SEO -->
    <link rel="canonical" href="<?= base_url() ?>">
    <link rel="manifest" href="manifest.json">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo $favicon; ?>" />
    <link rel="apple-touch-icon" href="<?= base_url('pwa/icons/icon-192x192.png') ?>" />
    <meta name=theme-color content="#d6272b" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/jquery/jquery.js"></script>

    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/css/rtl/theme-semi-dark.css" class="template-customizer-theme-css" type="text/css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>css/demo.css" />

    <!-- responsive datatable -->
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <!--end  responsive datatable -->

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/tagify/tagify.css" />
    <link rel="stylesheet" type="text/css" href="<?= ADMIN_ASSETS_PATH ?>vendor/libs/simpleLightbox/simpleLightbox.min.css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_PATH; ?>plugins/summernote/summernote-bs4.css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/toastr/toastr.css" />

    <!-- Helpers -->
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/js/helpers.js"></script>
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>js/config.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_PATH; ?>css/custom-theme.css?v=<?= date("YmdH"); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_PATH; ?>css/custom.css?v=<?= date("YmdHi"); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_PATH; ?>css/style.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>


</head>

<body>
    <input type="hidden" id="base" value="<?= base_url(); ?>" />
    <input type="hidden" id="defaultImagePath" value="<?= ADMIN_ASSETS_PATH . 'img/avatars/9.png' ?>" />
    <script>
        var defaultImagePath = $('#defaultImagePath').val();

        function imgError(image) {
            image.onerror = "";
            image.src = defaultImagePath;
            return true;
        }
    </script>
    <div class="site_loading d-none">Loading…</div>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">