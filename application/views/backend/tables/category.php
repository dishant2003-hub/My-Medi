<?php
defined('BASEPATH') or exit('No direct script access allowed');
$sTable = TBL_CATEGORY;
$aColumns = [
    $sTable . '.id',
    'UR.name as category',
    $sTable . '.name',
    $sTable . '.image',
    $sTable . '.description',
];

$sIndexColumn = 'id';
   
$where = []; 
array_push($where, $sTable . '.is_delete = 0');  
 
$join = [
    "LEFT JOIN " . TBL_CATEGORY . " UR ON UR.id = " . $sTable . ".category AND UR.`is_delete` = 0",
];
// pr($this->db->last_query());die;
  
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
    $row[] = $aRow['category'];
    $row[] = $aRow['name'];

    if ($aRow['image']) {
        $option_img = '<img src="' . base_url(UPLOAD  . $aRow['image']) . '" width="50%">';
    }
    $row[] = $option_img;

    $row[] = $aRow['description'];

    // $checked = (isset($aRow['is_active']) && $aRow['is_active'] == 1) ? 'checked' : '';
    // $row[] = '<label class="switch switch-primary" for="customSwitch' . $key . '">
    //             <input type="checkbox" name="is_active" value="' . $id . '" class="switch-input btn_category_status" id="customSwitch' . $key . '" ' . ($aRow['is_active'] == 1 ? 'checked' : '') . ' >
    //             <span class="switch-toggle-slider"><span class="switch-on"> <i class="bx bx-check"></i></span><span class="switch-off"> <i class="bx bx-x"></i></span></span>
    //         </label>';
    
    $option = '<div class="d-inline-block text-nowrap">
        <a href="' . base_url('#' . $id) . '" </a>&nbsp;';

    if (check_permission('product', 'can_edit', $this->user_permission)) {
        $option .=  '<a  href="javascript:void(0);" class="category_ajax" data-id="'.$id.'" data-bs-toggle="modal" data-bs-target="#category_target"> <i class="bx bx-edit"></i> </a>';
    }
    if (check_permission('product', 'can_delete', $this->user_permission)) {
        $option .= '<a href="javascript:void(0);" class="category_ajax_delete" data-id="'.$id.'" data-toggle="tooltip" title="" class="btn btn-sm btn-icon"><i class="bx bx-trash"></i></a>&nbsp';
    }
    $row[] = $option;
    $output['aaData'][] = $row;
}
