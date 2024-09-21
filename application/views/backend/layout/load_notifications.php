  <?php
  $login_user_id = $this->session->userdata('admin_id');
  $user_type = $this->session->userdata('user_type');
  $where = " AND (n.user_id = '".$login_user_id."' OR n.user_roles LIKE '%".$user_type."%' ) ";
  $user_notifications = $this->Service->getUserNotifications($where, $user_type);
  if (!empty($user_notifications)) {
    foreach ($user_notifications as $notification) {
      $notification_time =  time_elapsed_string($notification['created_time']);
      ?>
      <li class="list-group-item list-group-item-action dropdown-notifications-item">
        <div class="d-flex">
          <div class="flex-grow-1">
            <a href="<?= $notification['redirect_url'] ?>" class="read_notification" data-id="<?= $notification['id'] ?>">
              <h6 class="mb-1"><?= (isset($notification['notification_string'])) ? $notification['notification_string'] : "-" ?></h6>
              <!-- <p class="mb-0">Won the monthly best seller gold badge</p> -->
              <small class="text-muted"><?= $notification_time ?></small>
            </a>
          </div>
          <div class="flex-shrink-0 dropdown-notifications-actions">
            <!-- <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a> -->
            <a href="javascript:void(0)" class="dropdown-notifications-archive read_notification" data-id="<?= $notification['id'] ?>"><span class="bx bx-x"></span></a>
          </div>
        </div>
      </li>
    <?php }
  } else { ?>
    <li class="list-group-item list-group-item-action"> No any notification! </li>
  <?php } ?>
