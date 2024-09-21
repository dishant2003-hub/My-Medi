<?php
defined('BASEPATH') or exit('No direct script access allowed');
$sTable = TBL_SETTING;
$aColumns = [
    $sTable . '.setting_id', 
    $sTable . '.site_name',
    $sTable . '.site_logo',
    $sTable . '.favicon',
    $sTable . '.header',
    $sTable . '.footer',      
    $sTable . '.email', 
    $sTable . '.wa_number',
    $sTable . '.fb_link', 
    $sTable . '.twitter_link',
    $sTable . '.linkedin_link',
    $sTable . '.instagram_link',
    $sTable . '.youtube_link',
    $sTable . '.phone',      
    $sTable . '.address', 
    $sTable . '.from_email',   
];

$sIndexColumn = 'setting_id';
 
$where = [];
array_push($where, $sTable . '.is_delete = 0');

$filter = [];
$result = data_tables_init($aColumns, $sIndexColumn, $sTable, [], $where);

$output = $result['output'];
$rResult = $result['rResult'];
// pr($rResult);die;
$CI = &get_instance();
$output['token'] = $CI->security->get_csrf_hash();

foreach ($rResult as $key => $aRow) {
    $id = $aRow['setting_id'];
    $row = [];  

    $row[] = $aRow['setting_id'];
    $row[] = $aRow['site_name'];

    if ($aRow['site_logo']) {
        $option_logo = '<img src="' . base_url(UPLOAD  . $aRow['site_logo']) . '" width="100%">';
    }
    $row[] = $option_logo;

    if ($aRow['favicon']) {
        $option_favicon = '<img src="' . base_url(UPLOAD  . $aRow['favicon']) . '" width="80%">';
    }
    $row[] = $option_favicon;
  
    $row[] = $aRow['header'];
    $row[] = $aRow['footer'];
    $row[] = $aRow['email'];
    $row[] = $aRow['wa_number'];
    $row[] = $aRow['fb_link'];
    $row[] = $aRow['twitter_link'];
    $row[] = $aRow['linkedin_link'];  
    $row[] = $aRow['instagram_link'];
    $row[] = $aRow['youtube_link'];                 
    $row[] = $aRow['phone'];
    $row[] = $aRow['address'];
    $row[] = $aRow['from_email'];

    $option = '<div class="d-inline-block text-nowrap">
        <a href="' . base_url('#' . $id) . '" data-toggle=  "tooltip" title="" class="btn btn-sm btn-icon"></a>&nbsp;';

    if (check_permission('product', 'can_edit', $this->user_permission)) {  
        $option .= '<a href="' . base_url('backend/setting_form/' . $id) . '" data-toggle="tooltip" title="" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></a>&nbsp;';
    }
  
    $row[] = $option;
    $output['aaData'][] = $row;
}
