<?php
$site_logo = (isset($this->setting_data['site_logo']) && !empty($this->setting_data['site_logo'])) ?  base_url() . UPLOAD . $this->setting_data['site_logo'] : ADMIN_ASSETS_PATH . "img/logo.png";
$cur_tab = $this->uri->segment(2) == '' ? '' : $this->uri->segment(2);
$curr_action = $this->uri->segment(3) == '' ? '' : $this->uri->segment(3);
$curr_id = $this->uri->segment(4) == '' ? '' : $this->uri->segment(4);

$loginUserdata = $this->login_user_data;
$profile_logo = (!empty($loginUserdata['picture'])) ? base_url(PICTURE . '/' . $loginUserdata['picture']) : $site_logo;

if (!empty($this->user_permission)) {
  $getUserPermission = $this->user_permission;
} else {
  $getUserPermission = $this->Service->getUserPermission($loginUserdata['user_role']);
}
$today = date('Y-m-d');
?>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme"> 
  <div class="app-brand pt-3">
    <a href="<?= base_url('backend'); ?>" class="app-brand-link">
      <span class="app-brand-logo">
        <img class="round" src="<?php echo $site_logo ?>" alt="<?= SITE_TITLE ?> Logo" />
      </span>
    </a>
  </div>  

  <ul class="menu-inner py-1">
    <li class="menu-header small text-uppercase"><span class="menu-header-text">MENU</span></li>

    <li class="<?php echo ($cur_tab == 'dashboard') ? 'active' : '' ?> menu-item <?= (check_permission('dashboard', 'can_view', $getUserPermission)) ? '' : 'd-none' ?> ">
      <a href="<?= base_url('backend/dashboard'); ?>" class="menu-link"> <i class="menu-icon tf-icons bx bx-home-circle"></i><span class="menu-title">Dashboard</span></a>
    </li>

    <li class="<?php echo ($cur_tab == 'category_table') ? 'active' : '' ?> <?php echo ($cur_tab == 'category_detail') ? 'active' : '' ?> <?php echo ($curr_action == 'category_update') ? 'active' : '' ?> menu-item <?= (check_permission('category', 'can_view', $getUserPermission)) ? '' : 'd-none' ?> ">
      <a href="<?= base_url('backend/category_table'); ?>" class="menu-link"> <i class="menu-icon tf-icons  fa-solid fa-store"></i><span class="menu-title">Category</span></a>
    </li>

    <li class="<?php echo ($cur_tab == 'product_table') ? 'active' : '' ?> <?php echo ($cur_tab == 'product_detail') ? 'active' : '' ?> <?php echo ($curr_action == 'product_update') ? 'active' : '' ?>  menu-item <?= (check_permission('product', 'can_view', $getUserPermission)) ? '' : 'd-none' ?> ">
      <a href="<?= base_url('backend/product_table'); ?>" class="menu-link"> <i class="menu-icon tf-icons  fa-solid fa-store"></i><span class="menu-title">Product</span></a>
    </li>

    <li class="<?php echo ($cur_tab == 'order_detail') ? 'active' : '' ?>  <?php echo ($curr_action == 'detail_update') ? 'active' : '' ?> <?php echo ($curr_action == 'detail_view') ? 'active' : '' ?> menu-item <?= (check_permission('orderlist', 'can_view', $getUserPermission)) ? '' : 'd-none' ?> ">
      <a href="<?= base_url('backend/order_detail'); ?>" class="menu-link"> <i class="menu-icon tf-icons  fa-solid fa-store"></i><span class="menu-title">Orderlist</span></a>
    </li> 

    <li class="<?php echo ($cur_tab == 'user') ? 'active' : '' ?> <?php echo ($cur_tab == 'view') ? 'active' : '' ?> menu-item <?= (check_permission('users', 'can_view', $getUserPermission)) ? '' : 'd-none' ?> ">
      <a href="<?= base_url('backend/user'); ?>" class="menu-link"> <i class="menu-icon tf-icons fa fa-users"></i><span class="menu-title">Users</span></a>
    </li>

    <li class="<?php echo ($cur_tab == 'banner_table') ? 'active' : '' ?> <?php echo ($cur_tab == 'banner_form') ? 'active' : '' ?> <?php echo ($curr_action == 'banner_update') ? 'active' : '' ?>  menu-item <?= (check_permission('banner', 'can_view', $getUserPermission)) ? '' : 'd-none' ?> ">
      <a href="<?= base_url('backend/banner_table'); ?>" class="menu-link"> <i class="menu-icon tf-icons  fa-solid fa-store"></i><span class="menu-title">Banner</span></a>
    </li>

    <li class="<?php echo ($cur_tab == 'blog_table') ? 'active' : '' ?> <?php echo ($cur_tab == 'blog_form') ? 'active' : '' ?> <?php echo ($curr_action == 'blog_update') ? 'active' : '' ?>  menu-item <?= (check_permission('blog', 'can_view', $getUserPermission)) ? '' : 'd-none' ?> ">
      <a href="<?= base_url('backend/blog_table'); ?>" class="menu-link"> <i class="menu-icon tf-icons  fa-solid fa-store"></i><span class="menu-title">Blog</span></a>
    </li>

    <li class="<?php echo ($cur_tab == 'portfolio_table') ? 'active' : '' ?> <?php echo ($cur_tab == 'portfolio_form') ? 'active' : '' ?> <?php echo ($curr_action == 'portfolio_update') ? 'active' : '' ?>  menu-item <?= (check_permission('portfolio', 'can_view', $getUserPermission)) ? '' : 'd-none' ?> ">
      <a href="<?= base_url('backend/portfolio_table'); ?>" class="menu-link"> <i class="menu-icon tf-icons  fa-solid fa-store"></i><span class="menu-title">Portfolio</span></a>
    </li>

<!-- 
    <li class="menu-item <?php echo ($cur_tab == 'blog_form' || $cur_tab == 'category_detail') ? 'active open' : '' ?>">
      <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon fa-solid fa-store"></i>
        <div data-i18n="Ragister"> Ragister </div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item <?php echo ($cur_tab == 'blog_form') ? 'active' : '' ?>"> 
          <a href="<?= base_url('backend/blog_form'); ?>" class="menu-link">
            <div data-i18n="User"> User </div>
          </a>
        </li>
        <li class="menu-item <?php echo ($cur_tab == 'category_detail') ? 'active' : '' ?>">
          <a href="<?= base_url('backend/category_detail'); ?>" class="menu-link">
            <div data-i18n="Address"> Address</div>
          </a>
        </li>
      </ul>  
    </li>   -->

    <li class="menu-header small text-uppercase"><span class="menu-header-text">SETTING</span></li>
    <?php 
    // if ($loginUserdata['user_role'] == 1) { 
    ?>
    <li class="<?php echo ($cur_tab == 'settings') ? 'active' : '' ?> <?php echo ($cur_tab == 'setting_form') ? 'active' : '' ?> menu-item <?= (check_permission('setting', 'can_view', $getUserPermission)) ? '' : 'd-none' ?> ">
      <a href="<?= base_url('backend/settings'); ?>" class="menu-link"> <i class="menu-icon tf-icons  fa-solid fa-store"></i><span class="menu-title">Setting</span></a>
    </li>
    <?php
    //  } 
    ?>
    <li class="menu-item"><a href="<?= base_url('backend/logout'); ?>" class="menu-link"><i class="menu-icon bx bxs-log-out"></i><span class="menu-title">Logout</span></a></li>
  </ul>
</aside>