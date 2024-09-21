<?php
/* -------DATABASE RELATED FUNCTION [START] ------- */

// PRINT ARRAY WITH FORMATTING
function pr($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}
function oldhumanTiming($time)
{
    $time = time() - $time; // to get the time since that moment    
    //echo '1. '.date('Y-m-d H:i:s', time() ) .'---';
    //echo '2. ' .date('Y-m-d H:i:s', $time)  .'---';
    $time = ($time < 1) ? 1 : $time;
    $tokens = array(
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );
    foreach ($tokens as $unit => $text) {
        if ($time < $unit)
            continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '') . ' ago';
    }
}
function newhumanTiming($time)
{
    $CI = &get_instance();
    $tt = $CI->session->userdata('currentTime');
    //echo '1. '.date('Y-m-d H:i:s', $time ) .'---';
    //echo '2. ' .date('Y-m-d H:i:s', $tt)  .'---';
    //die;
    if ($tt == '') {
        $tt = time();
    }
    $time = $tt - $time; // to get the time since that moment    
    //echo '1. '.date('Y-m-d H:i:s', time() ) .'---';
    //echo '2. ' .date('Y-m-d H:i:s', $time)  .'---';
    $time = ($time < 1) ? 1 : $time;
    $tokens = array(
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );
    foreach ($tokens as $unit => $text) {
        if ($time < $unit)
            continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '') . ' ago';
    }
}
function humanTiming($time)
{
    $yourDate = strtotime(date('Y-m-d', $time));
    $todayDate = strtotime(date('Y-m-d'));
    if ($yourDate == $todayDate) {
        return 'Today';
    } elseif (strtotime("-1 day", $todayDate) == $yourDate) {
        return 'Yesterday';
    } else {
        return date('M d', $yourDate);
    }
}

function getIPAddress()
{
    // return (isset($_SERVER["HTTP_CF_CONNECTING_IP"]))?$_SERVER["HTTP_CF_CONNECTING_IP"]:$_SERVER['REMOTE_ADDR'];
    if (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && !empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    } elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function getCurrentCountryCode()
{
    $result = "";
    /*if(isset($_SESSION['countryCode']) && $_SESSION['countryCode']!=""){
        $result = $_SESSION['countryCode'];
    }else{
        $ip = getIPAddress(); //$_SERVER['REMOTE_ADDR'];
        $dataArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
        $result = (isset($dataArray->geoplugin_countryCode))?$dataArray->geoplugin_countryCode:"IN";
        $_SESSION['countryCode'] = $result;
    }*/
    return $result;
}

function currency()
{
    $country = getCurrentCountryCode();
    if ($country == 'IN') {
        return '$';
    } else {
        return '€';
    }
}

function priceFormat($price)
{
    $country = getCurrentCountryCode();
    if ($country == 'IN') {
        return currency() . $price;
    } else {
        return currency() . $price;
    }
}

function numberTowords($num)
{
    if ($num) {
        $ones = array(
            0 => "ZERO",
            1 => "ONE",
            2 => "TWO",
            3 => "THREE",
            4 => "FOUR",
            5 => "FIVE",
            6 => "SIX",
            7 => "SEVEN",
            8 => "EIGHT",
            9 => "NINE",
            10 => "TEN",
            11 => "ELEVEN",
            12 => "TWELVE",
            13 => "THIRTEEN",
            14 => "FOURTEEN",
            15 => "FIFTEEN",
            16 => "SIXTEEN",
            17 => "SEVENTEEN",
            18 => "EIGHTEEN",
            19 => "NINETEEN"
        );
        $tens = array(
            0 => "ZERO",
            1 => "TEN",
            2 => "TWENTY",
            3 => "THIRTY",
            4 => "FORTY",
            5 => "FIFTY",
            6 => "SIXTY",
            7 => "SEVENTY",
            8 => "EIGHTY",
            9 => "NINETY"
        );
        $hundreds = array(
            "HUNDRED",
            "THOUSAND",
            "MILLION",
            "BILLION",
            "TRILLION",
            "QUARDRILLION"
        );
        $num = str_replace(',', '', $num);
        $num = number_format($num, 2, ".", ",");
        $num_arr = explode(".", $num);
        $wholenum = $num_arr[0];
        $decnum = $num_arr[1];
        $whole_arr = array_reverse(explode(",", $wholenum));
        krsort($whole_arr, 1);
        $rettxt = "";
        foreach ($whole_arr as $key => $i) {
            while (substr($i, 0, 1) == "0")
                $i = substr($i, 1, 5);
            if ($i < 20) {
                $rettxt .= $ones[$i];
            } elseif ($i < 100) {
                if (substr($i, 0, 1) != "0")  $rettxt .= $tens[substr($i, 0, 1)];
                if (substr($i, 1, 1) != "0") $rettxt .= " " . $ones[substr($i, 1, 1)];
            } else {
                if (substr($i, 0, 1) != "0") $rettxt .= $ones[substr($i, 0, 1)] . " " . $hundreds[0];
                if (substr($i, 1, 1) != "0") $rettxt .= " " . $tens[substr($i, 1, 1)];
                if (substr($i, 2, 1) != "0") $rettxt .= " " . $ones[substr($i, 2, 1)];
            }
            if ($key > 0) {
                $rettxt .= " " . $hundreds[$key] . " ";
            }
        }
        if ($decnum > 0) {
            $rettxt .= " and ";
            if ($decnum < 20) {
                $rettxt .= $ones[$decnum];
            } elseif ($decnum < 100) {
                $rettxt .= $tens[substr($decnum, 0, 1)];
                $rettxt .= " " . $ones[substr($decnum, 1, 1)];
            }
        }
        return $rettxt;
    }
}

function array_sort_by_column(&$arr, $col, $dir = SORT_ASC)
{
    $sort_col = array();
    foreach ($arr as $key => $row) {
        $sort_col[$key] = $row[$col];
    }
    array_multisort($sort_col, $dir, $arr);
}

function merge_same_key_array_and_sum($arr, $arr_key, $sum_column)
{
    $result = array();
    if (!empty($arr)) {
        $temp = [];
        foreach ($arr as $value) {
            if (!array_key_exists($value[$arr_key], $temp)) {
                $temp[$value[$arr_key]] = 0;
            }
            $temp[$value[$arr_key]] += $value[$sum_column];
        }
        // for re-create array
        $result = array();
        foreach ($temp as $key => $value) {
            $result[] = array($arr_key =>  $key, $sum_column => $value);
        }
    }
    return $result;
}

function format_date($date)
{
    return date('Y-m-d H:i:s', strtotime($date));
}

function encrypt_String($string)
{
    return base64_encode($string);
}

function decrypt_String($string)
{
    return base64_decode($string);
}

function find_role_permission_columns($myarray, $field, $value)
{
    foreach ($myarray as $key => $row) {
        if ($row['url'] == $field) {
            return (isset($row[$value])) ? $row[$value] : '';
        }
    }
    return false;
}

function check_permission($key, $permision, $permission_data = array())
{
    $result = false;
    $CI = &get_instance();
    $user_role = $CI->session->userdata('user_type');
    if ($user_role == 1) {
        $result = true;
    } else {
        if (!empty($permission_data)) {
            $result = find_role_permission_columns($permission_data, $key, $permision);
        } else {
            $sQuery = "SELECT ps.*, rp.name as permission_name FROM " . TBL_PERMISSION . " rp
            JOIN " . TBL_USER_PERMISSION . " ps ON ps.permission_id = rp.permissionid AND rp.url = '" . $key . "' AND ps.is_active =1 AND ps.is_delete=0
            WHERE ps.role_id='" . $user_role . "' AND rp.is_active =1 AND rp.is_delete=0 ";
            $_query = $CI->db->query($sQuery)->row_array();

            if (!empty($_query)) {
                $result = $_query[$permision];
            }
        }
    }
    return $result;
}

function check_timeline_permission($permision)
{
    $result = false;
    $CI = &get_instance();
    $user_role = $CI->session->userdata('user_type');
    if ($user_role == 1) {
        $result = true;
    } else {
        $sQuery = "SELECT tp.* FROM " . TBL_TIMELINE_PERMISSIONS . " tp
        WHERE tp.role_id='" . $user_role . "' AND tp.is_active = 1 AND tp.is_delete=0 ";
        $_query = $CI->db->query($sQuery)->row_array();
        if (!empty($_query)) {
            $result = (isset($_query[$permision])) ? $_query[$permision]: false;
        }
    }
    return $result;
}

function getLatlongFromPincode($pincode)
{
    $result = array();
    $CI = &get_instance();
    $setting_data = $CI->setting_data;
    $geonames_username = (!empty($setting_data['geonames_username'])) ? $setting_data['geonames_username'] : "";

    $apiUrl = "http://api.geonames.org/postalCodeLookupJSON?formatted=true&postalcode=" . $pincode . "&country=BE&username=" . $geonames_username;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    if (!empty($output)) {
        $output_arr = json_decode($output, true);
        $result = array(
            'lng' => (isset($output_arr['postalcodes'][0]['lng'])) ? $output_arr['postalcodes'][0]['lng'] : "",
            'lat' => (isset($output_arr['postalcodes'][0]['lat'])) ? $output_arr['postalcodes'][0]['lat'] : "",
        );
    }
    return $result;
}

function search_multiarray($search_data, $search_key, $search_column, $return_column = '')
{
    $result = "";
    $key = array_search($search_key, array_column($search_data, $search_column));
    if ($key != "" || $key == 0) {
        if (!empty($return_column)) {
            $result = (isset($search_data[$key][$return_column])) ? $search_data[$key][$return_column] : "";
        } else {
            $result = $key;
        }
    }
    return $result;
}

function get_user_madaform_answer($search_data, $search_key)
{
    return search_multiarray($search_data, $search_key, 'question_id', 'answer');
}

function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


function nl2listview($str, $tag = 'ul', $class = '')
{
    $bits = explode("\n", $str);
    $class_string = $class ? ' class="' . $class . '"' : false;
    $newstring = '<' . $tag . $class_string . '>';
    if(!empty($bits)){
        foreach ($bits as $bit) {
            $newstring .= "<li>" . $bit . "</li>";
        }
    }
    return $newstring . '</' . $tag . '>';
}

function getAddressFromLatlong($lat, $long)
{
    /*$result = "";
    $CI = &get_instance();
    $setting_data = $CI->setting_data;
    $geocode_apikey = (!empty($setting_data['geocode_apikey'])) ? $setting_data['geocode_apikey'] : "";
    $dataArray = json_decode(@file_get_contents("https://geocode.xyz/".$lat.",".$long."?json=1&authcode=".$geocode_apikey), true);
    if(!empty($dataArray)){
        // if(isset($dataArray['alt']['loc'][0]['staddress'])){
        //     $address[] = $dataArray['alt']['loc'][0]['staddress'];
        // }
        if(isset($dataArray['staddress'])){
            $address[] = $dataArray['staddress'];
        }
        if(isset($dataArray['city'])){
            $address[] = $dataArray['city'];
        }
        if(isset($dataArray['state'])){
            $address[] = $dataArray['state'];
        }
        if(isset($dataArray['country'])){
            $address[] = $dataArray['country'];
        }
        if(!empty($address)){
            $result = implode(', ', $address);
        }
    }
    return $result;*/

    $result = "";
    $apiUrl = "https://nominatim.openstreetmap.org/reverse?lat=".$lat."&lon=".$long."&format=json&email=".FROM_EMAIL;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($output, true);
    if(!empty($response)){
        $result = (isset($response['display_name']))? $response['display_name']:"";
    }
    return $result;
}

function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function removeCustomFormArrElements($dataarray){
    $skipArr = array('required', 'toggle', 'inline', 'other', 'selected','multiple', 'access');
    if(!empty($dataarray)){
        foreach($dataarray as $key => &$value){
            if (is_array($value)) {
                $value = removeCustomFormArrElements($value);
            }else{
                if(in_array($key, $skipArr) && ($value=='false' && $value!='1')){
                    if(isset($dataarray[$key])){
                        unset($dataarray[$key]);
                    }
                }
            }
        }
    }
    return $dataarray;
}

function getCustomFormElements($dataarray){
    $result = array();
    $skipArr = array('event_id', 'name', 'email', 'mobile', 'address','payment_amount', 'paid', 'remaining', 'submit');
    if(!empty($dataarray)){
        foreach($dataarray as $key => &$value){
            if(!in_array($key, $skipArr)){
                $result[$key] = (is_array($value)) ? implode(', ', $value) : $value;
            }
        }
    }
    return (!empty($result)) ? json_encode($result, true) : "";
}

function textLimit($string, $limit = 200)
{
    if (strlen($string) > $limit) {
        $stringCut = substr($string, 0, $limit);
        $endPoint = strrpos($stringCut, ' ');
        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
        $string = strip_tags($stringCut);
    }
    return $string;
}


