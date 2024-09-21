<?php
defined('BASEPATH') or exit('No direct script access allowed');
$sTable = TBL_ORDER_DETAILS;
$aColumns = [
    $sTable . '.id',
    $sTable . '.fname',
    $sTable . '.lname',
    $sTable . '.email',
    $sTable . '.company',
    $sTable . '.phone',
    $sTable . '.address',
    $sTable . '.city',
    $sTable . '.zipcode',
    $sTable . '.country',
];

$sIndexColumn = 'id';
$where = [];
array_push($where, $sTable . '.is_delete = 0');

$join = [];
$filter = [];

$result = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, $where);

$output = $result['output'];
$rResult = $result['rResult'];
$CI = &get_instance();
$output['token'] = $CI->security->get_csrf_hash();

foreach ($rResult as $key => $aRow) {
    $id = $aRow['id'];


    $data = $this->Service->get_all(TBL_ORDER_ITEM, '*', array('order_id' => $id));
    // pr($this->db->last_query($data));die;

    $sub_total = 0;
    foreach ($data as $result) {
        $sub_total += $result['total'];
        if ($sub_total >= 200) {
            $total = $sub_total;
        } else {
            $charges = $sub_total * 10 / 100;
            $total = $sub_total + $charges;
        }
    }
    $grand_total = sprintf("%.2f", $total);
    // point pachhi 2 word ave

    $row = [];
    $row[] = $aRow['id'];
    $row[] = $aRow['fname'];
    $row[] = $aRow['lname'];
    $row[] = $aRow['email'];
    $row[] = $grand_total;
    $row[] = $aRow['company'];
    $row[] = $aRow['phone'];
    $row[] = $aRow['address'];
    $row[] = $aRow['city'];
    $row[] = $aRow['zipcode'];
    $row[] = $aRow['country'];


    $option = '<div class="d-inline-block text-nowrap">
        <a href="javascript:void(0);" class="detail_ajax"  data-id="'.$id.'" data-bs-toggle="modal" data-bs-target="#orderdetail"> <i class="bx bx-show"></i> </a>';

    // if (check_permission('detail', 'can_edit', $this->user_permission)) {
    //     $option .= '<a href="' . base_url('backend/orderdetails/detail_update/' . $id) . '" data-toggle="tooltip" title="" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></a>&nbsp;';
    // }
    if (check_permission('detail', 'can_delete', $this->user_permission)) {
        $option .= '<a href="javascript:void(0);" data-id="'.$id.'" data-toggle="tooltip" title="" class="btn btn-sm btn-icon details_ajax_delete"><i class="bx bx-trash"></i></a>&nbsp';
    }

    $row[] = $option;
    $output['aaData'][] = $row;
}
?>

