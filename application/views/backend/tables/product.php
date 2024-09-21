<?php
defined('BASEPATH') or exit('No direct script access allowed');
$sTable = TBL_PRODUCT;
$aColumns = [
    $sTable . '.id',
    'UR.name as category',
    'AR.name as subcategory',
    // $sTable . '.category',
    // $sTable . '.subcategory',
    $sTable . '.name',
    'IMG.image as mul_image', 
    $sTable . '.price',
    $sTable . '.description', 
    $sTable . '.is_active',
]; 
 
$sIndexColumn = 'id';

$where = []; 
array_push($where, $sTable . '.is_delete = 0');
  
$join = [
    "JOIN " . TBL_CATEGORY . " UR ON UR.id = " . $sTable . ".category AND UR.`is_delete` = 0",
    "JOIN " . TBL_CATEGORY . " AR ON AR.id = " . $sTable . ".subcategory AND AR.`is_delete` = 0",
    "JOIN " . TBL_PRODUCT_IMAGE . " IMG ON IMG.product_id = " . $sTable . ".id AND IMG.`is_delete` = 0",
];
// pr($this->db->last_query());die;

$filter = [];
$result = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, $where, [], ' group by ' . $sTable . '.id');

$output = $result['output'];
$rResult = $result['rResult'];
// pr($rResult);die;
$CI = &get_instance();
$output['token'] = $CI->security->get_csrf_hash();

foreach ($rResult as $key => $aRow) {
    $id = $aRow['id']; 
    $row = [];

    $row[] = $aRow['id'];
    $row[] = $aRow['category'];
    $row[] = $aRow['subcategory'];
    $row[] = $aRow['name'];
    if ($aRow['mul_image']) {
        $option_img = '<img src="' . base_url(UPLOAD  . $aRow['mul_image']) . '" width="100%">'; 
    }
    $row[] = $option_img;
    $row[] = $aRow['price'];
    $row[] = $aRow['description'];
    
    $checked = (isset($aRow['is_active']) && $aRow['is_active'] == 1) ? 'checked' : '';
    $row[] = '<label class="switch switch-primary" for="customSwitch' . $key . '">
                <input type="checkbox" name="is_active" value="' . $id . '" class="switch-input btn_product_status" id="customSwitch' . $key . '" ' . ($aRow['is_active'] == 1 ? 'checked' : '') . ' >
                <span class="switch-toggle-slider"><span class="switch-on"> <i class="bx bx-check"></i></span><span class="switch-off"> <i class="bx bx-x"></i></span></span>
            </label>';

    $option = '<div class="d-inline-block text-nowrap"> 
        <a href="' . base_url('#' . $id) . '" </a>&nbsp;'; 

    if (check_permission('product', 'can_edit', $this->user_permission)) {
        $option .= '<a href="' . base_url('backend/product/product_update/' . $id) . '" data-toggle="tooltip" title="" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></a>&nbsp;';
    }
    if (check_permission('product', 'can_delete', $this->user_permission)) {
        $option .= '<a href="javascript:void(0);" data-id="'. $id .'" data-toggle="tooltip" title="" class="btn btn-sm btn-icon delete_product"><i class="bx bx-trash"></i></a>&nbsp';
    }
    $row[] = $option;
    $output['aaData'][] = $row;
}
