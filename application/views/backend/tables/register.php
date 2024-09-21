<?php
defined('BASEPATH') or exit('No direct script access allowed');
$sTable = TBL_REGISTER;
$aColumns = [
    $sTable . '.id',
    "CONCAT_WS(' '," . $sTable . ".fname, " . $sTable . ".lname) as user_fullname",
    $sTable . '.email',
    $sTable . '.dob',
    $sTable . '.mobile',
    $sTable . '.updated_at',
    $sTable . '.is_active',
];
$sIndexColumn = 'id';
$join = [
];
 
$where = [];
array_push($where, $sTable . '.is_delete = 0');

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
    $row[] = $aRow['id'];
    $row[] = $aRow['user_fullname'];
    $row[] = $aRow['email'];
    $row[] = $aRow['mobile'];
    $row[] = $aRow['dob'];
    $row[] = $aRow['updated_at'];

    $checked = (isset($aRow['is_active']) && $aRow['is_active'] == 1) ? 'checked' : '';
    $row[] = '<label class="switch switch-primary" for="customSwitch' . $key . '">
                <input type="checkbox" name="is_active" value="' . $id . '" class="switch-input user_status" id="customSwitch' . $key . '" ' . ($aRow['is_active'] == 1 ? 'checked' : '') . ' >
                <span class="switch-toggle-slider"><span class="switch-on"> <i class="bx bx-check"></i></span><span class="switch-off"> <i class="bx bx-x"></i></span></span>
            </label>';
     

    $option = '<div class="d-inline-block text-nowrap">
            <a href="' . base_url('backend/view/' . $id) . '" data-toggle="tooltip" title="" class="btn btn-sm btn-icon"><i class="bx bx-show"></i></a>&nbsp;';

    if (check_permission('users', 'can_edit', $this->user_permission)) {
        $option .= '<a  href="javascript:void(0);" class="edit_user" data-bs-toggle="modal" data-id="' . $id . '" data-bs-target="#user_edit_ajax"><i class="bx bx-edit"></i></a>';
    }
    if (check_permission('users', 'can_delete', $this->user_permission)) {
        $option .= '<a href="javascript:void(0);" data-id="' . $id . '" data-toggle="tooltip" title="" class="btn btn-sm btn-icon delete_user"><i class="bx bx-trash"></i></a>&nbsp';
    }
    $row[] = $option;
    $output['aaData'][] = $row;
}
