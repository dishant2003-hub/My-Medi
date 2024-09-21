<?php
$site_logo = (isset($this->setting_data['site_logo']) && !empty($this->setting_data['site_logo'])) ?  base_url() . UPLOAD . $this->setting_data['site_logo'] : ADMIN_ASSETS_PATH . "img/logo.png";
$uri_segment = $this->uri->segment(2);
$loginUsername = $this->session->userdata('name');
$dashboardUrl = base_url('backend/' . $uri_segment);

if ($this->session->has_userdata('is_user_login')) {
  $dashboardUrl = base_url('dashboard');
  $loginUsername = $this->session->userdata('login_username');
}

$loginUserdata = $this->login_user_data;
if (!empty($this->user_permission)) {
  $getUserPermission = $this->user_permission;
} else {
  $getUserPermission = $this->Service->getUserPermission($loginUserdata['user_role']);
}
?>
<div class="layout-page">
  <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="container-fluid">
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="bx bx-menu bx-sm"></i>
        </a>
      </div>

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center ms-auto">
          <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
            <ul class="dropdown-menu dropdown-menu-end py-0">
              <li class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                  <h5 class="text-body mb-0 me-auto">Notifications</h5>
                </div>
              </li>
              <li class="dropdown-notifications-list scrollable-container ps">
                <ul class="list-group list-group-flush">

                </ul>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                  <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                  <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                </div>
              </li>
            </ul>
          </li>

          <!--/ Language -->
          <li> <strong class="user-name"><?= $loginUsername; ?></strong></li>

          <!-- User -->
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                <img src="<?php echo $site_logo ?>" alt class="rounded-circle">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="pages-account-settings-account.html">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar avatar-online">
                        <img src="<?php echo $site_logo ?>" alt class="rounded-circle">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <span class="fw-semibold d-block lh-1"><?= $loginUsername; ?></span> 
                    </div>
                  </div>
                </a>
              </li>
              <li> 
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="<?= base_url('backend/system-setting'); ?>">
                  <i class="bx bx-user me-2"></i>
                  <span class="align-middle">My Profile</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="<?= base_url('backend/change-login-password'); ?>">
                  <i class="bx bx-key me-2"></i> 
                  <span class="align-middle">Change Password</span>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="<?php echo base_url('backend/logout'); ?>">
                  <i class="bx bx-power-off me-2"></i>
                  <span class="align-middle">Log Out</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>  
    </div>
  </nav>

  <div class="content-wrapper">
    <div class="container-fluid flex-grow-1 container-p-y">
      <h5 class="py-3 breadcrumb-wrapper mb-2">
        <span class=" fw-light"> <a href="<?= $dashboardUrl ?>"> Home </a> | </span> <?php echo isset($menu) ? $menu : ''; ?>
      </h5>
      <?php 
      $this->load->view('flash_messages');
      
      if (!empty($this->user_notifications)) {
        $color_arr = array('dark');
        foreach ($this->user_notifications as $notification) { ?>
          <div class="alert alert-solid-<?= $color_arr[array_rand($color_arr)] ?> alert-dismissible d-flex align-items-center" role="alert">
            <i class="bx bx-xs bx-bell me-2"></i>
            <?= (isset($notification['notification_string'])) ? $notification['notification_string'] : "-" ?>
            <a href="<?= $notification['redirect_url'] ?>" class="btn-close btn btn-sm btn-default text-white my_alert_button read_notification" data-id="<?= $notification['id'] ?>" aria-label="Show"><i class="bx bx-show"></i> </a>
            <button type="button" class="btn-close read_notification" data-id="<?= $notification['id'] ?>" data-bs-dismiss="alert" aria-label="Close"> </button>
          </div>
        <?php }
      } ?>