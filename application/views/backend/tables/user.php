<?php
defined('BASEPATH') or exit('No direct script access allowed');
$sTable = TBL_REGISTER;
$aColumns = [
    $sTable . '.id',
    "CONCAT_WS(' '," . $sTable . ".fname, " . $sTable . ".lname) as user_fullname",
    $sTable . '.email',
    $sTable . '.dob',
    $sTable . '.mobile',
    // 'UR.name as user_role_name',
    $sTable . '.updated_at',
    $sTable . '.is_active',
];
$sIndexColumn = 'id';
$join = [
    // "JOIN " . TBL_USER_ROLE . " UR ON UR.id = " . $sTable . ".user_role AND UR.`is_delete` = 0",
];

$where = [];
array_push($where, $sTable . '.is_delete = 0');
// array_push($where, 'AND ' . $sTable . '.user_role != 1');

// if (isset($user_role) && $user_role != '') {
//     $user_role = implode(',', $user_role);
//     array_push($where, 'AND ' . $sTable . '.user_role IN  (' . $user_role . ')');
// }
// if (isset($status) && $status != '') {
//     array_push($where, ' AND ' . $sTable . '.is_active = ' . $status);
// }

$filter = [];
$result = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, $where);

$output = $result['output'];
$rResult = $result['rResult'];
// pr($rResult);die;
$CI = &get_instance();
$output['token'] = $CI->security->get_csrf_hash();

foreach ($rResult as $key => $aRow) {

    $id = $aRow['id'];
    $row = [];
    // $userPic = (!empty($aRow['picture'])) ? base_url(PICTURE . '/' . $aRow['picture']) : ADMIN_ASSETS_PATH . "img/avatars/9.png";

    // $userhtml = '<div class="d-flex justify-content-start align-items-center user-name">
    //                 <div class="avatar-wrapper"><div class="avatar avatar-sm me-3">
    //                     <a href="' . base_url('backend/users/view/' . $id) . '"><img src="' . $userPic . '" alt="Avatar" class="rounded-circle" onerror="imgError(this);"></a>
    //                 </div></div>
    //                 <div class="d-flex flex-column"><a href="' . base_url('backend/users/view/' . $id) . '" class="text-body text-truncate">
    //                     <span class="fw-semibold">' . $aRow['user_fullname'] . '</span></a></div>
    //             </div>';
    // $row[] = $userhtml;
    $row[] = $aRow['id'];
    $row[] = $aRow['user_fullname'];
    $row[] = $aRow['email'];
    $row[] = $aRow['mobile'];
    $row[] = $aRow['dob'];
    $row[] = $aRow['updated_at'];

    // $row[] = '<span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2">  
    //             <i class="bx bx-user bx-xs"></i></span>' . $aRow['user_role_name'] . '</span>';
    // $row[] = $aRow['last_login'];


    $checked = (isset($aRow['is_active']) && $aRow['is_active'] == 1) ? 'checked' : '';
    $row[] = '<label class="switch switch-primary" for="customSwitch' . $key . '">
                <input type="checkbox" name="is_active" value="' . $id . '" class="switch-input btn_user_status" id="customSwitch' . $key . '" ' . ($aRow['is_active'] == 1 ? 'checked' : '') . ' >
                <span class="switch-toggle-slider"><span class="switch-on"> <i class="bx bx-check"></i></span><span class="switch-off"> <i class="bx bx-x"></i></span></span>
            </label>';
    

    $option = '<div class="d-inline-block text-nowrap">
            <a href="' . base_url('backend/users/view/' . $id) . '" data-toggle="tooltip" title="" class="btn btn-sm btn-icon"><i class="bx bx-show"></i></a>&nbsp;';

    if (check_permission('users', 'can_edit', $this->user_permission)) {
        $option .= '<a  href="javascript:void(0);" class="edit_user" data-bs-toggle="modal" data-id="' . $id . '" data-bs-target="#user_edit_ajax"><i class="bx bx-edit"></i></a>';
    }
    if (check_permission('users', 'can_delete', $this->user_permission)) {
        $option .= '<a href="javascript:void(0);" data-id="' . $id . '" data-toggle="tooltip" title="" class="btn btn-sm btn-icon delete_user"><i class="bx bx-trash"></i></a>&nbsp';
    }
    $row[] = $option;
    $output['aaData'][] = $row;
}
