<?php
class Service_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getNotification($key = "") {
        $result = "No notification found";
        if (!empty($key)) {
            $query = $this->db->get_where(TBL_LANGUAGE_KEY, array('is_active' => 1,'key' => $key));
            $notificationData = $query->row_array();
            if(!empty($notificationData)){
                $result = $notificationData['value_en'];
            }
        }
        return $result;
    }

    //for get site setting value
    public function getSiteSetting($key = "") {
        $result = "";
        if (!empty($key)) {
            $query = $this->db->get_where(TBL_SETTING, array('is_active' => 1, 'is_delete' => 0, 'settingKey' => $key));
            $resultData = $query->row_array();
            if (!empty($resultData)) {
                $result = $resultData['settingValue'];
            }
        }       
        return $result;
    }


    function generateUniqueId() {
        $characters = 'event';
        $event_id = $characters.mt_rand(10000,99999);
        $exitsdata = $this->Service->get_row(TBL_EVENT,'id',array('unique_id' => $event_id));
        if(!empty($exitsdata)){
            $this->generateUniqueId();
        }
        return $event_id;
    }

    function generateUniqueIdMenu() {
        $characters = 'menu';
        $event_id = $characters.mt_rand(10000,99999);
        $exitsdata = $this->Service->get_row(TBL_STORE,'id',array('id' => $event_id));
        if(!empty($exitsdata)){
            $this->generateUniqueId();
        }
        return $event_id;
    }

    public function getSetting($key = "") {
        $result = "";
        if (!empty($key)) {
            $this->db->select('*');
            $this->db->where('setting_id',1);
            $dd = $this->db->get(TBL_SETTING)->row_array();
            $result = $dd[$key];
        }
        return $result;
    }

    //for get current currency data

    public function getCurrency() {
        return $this->getSiteSetting('currency');
    }

    public function rand_string($length = 8) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars), 0, $length);
    }

    public function rand_code($length = 4) {
        $chars = "0123456789";
        return substr(str_shuffle($chars), 0, $length);
    }

    //for send push notification to User
    public function sendPushNotification($deviceId, $title="", $message="",$user_id="",$betID="") {
        $time = date('Y-m-d H:i:s');
        $unreadcount = 0;
        $fcmApiKey = $this->getSiteSetting('fcm_api_key');
        if(empty($fcmApiKey)){
            $fcmApiKey = "";
        }
        //Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';
        $msg = array(
            "title" => $title,
            'body' => $message,
            'alert' => $message,
            'time' => $time,
            'status' => '4',
            'badge' => (int) $unreadcount,
            'friendID' => $user_id,
            'betID' => $betID,
            'priority' => 'high',
            'sound' => 'default'
        );
        //$pushmessage = json_encode($json, JSON_UNESCAPED_SLASHES);
        $fields = array(
            'to' => $deviceId,
            'data' => $msg,
            'notification' => $msg,
        );
        $headers = array(
            'Authorization: key=' . $fcmApiKey,
            'Content-Type: application/json'
        );
        //Open connection
        try {
            $ch = curl_init();
            //Set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //Disabling SSL Certificate support temporarly
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            //Execute post
            $result = curl_exec($ch);
            curl_close($ch);
        } catch (Exception $e) {

        }
    }

    //for send SMS
    public function sendSMS($number, $msg="") {
        //for send message content
    }

    public function get_row($table, $columns = "*", $where = '1 = 1', $order_by = null, $sort_by = 'DESC') {
        $this->db->select($columns)
        ->from($table)
        ->where($where)
        ->where('is_delete', 0);
        if($order_by != null) {
            if($order_by=='rand'){
                $this->db->order_by('RAND()');
            }else{
                $this->db->order_by($order_by, $sort_by);
            }
        }
        $this->db->limit(1);
        return $this->db->get()->row_array();
    }

    public function check_email($email, $id='') {
        if($id !=''){
            $this->db->where('user_id !=', $id);
        }
        $this->db->where('email', $email);
        $this->db->where('is_delete', 0);
        return $this->db->get(TBL_USERS)->row();
    }

    public function insert_row($table, $data) {
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;  
    }
    
    public function update_row($table, $data, $where) {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function insert_update_betch($table, $data, $where='') {
        if(!empty($where)){
            return $this->db->update_batch($table, $data, $where); 
        }else{
            return $this->db->insert_batch($table, $data); 
        }
    }
    
    public function set_delete($table, $where) {
        $this->db->where($where)
        ->update($table, ['is_delete' => 1]);
        return $this->db->affected_rows();
    }

    public function checkExists($table,$where = '1=1'){
        if($this->db->select("*")->from($table)->where($where)->get()->num_rows() > 0){
            return true;
        }
        return false;
    }
   
    /*public function generateSlug($table, $columns, $string, $lang = ''){
        $result = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        $result = trim($result, '-');
        $result = strtolower($result);
        if(!empty($lang)){
            $where = " (JSON_EXTRACT(".$columns.", '$.".$lang."') in ('".$result."')) ";
            $checkExists = $this->get_row($table, $columns, $where);
        }else{
            $checkExists = $this->get_row($table, '*', array($columns => $result));
        }
        if(!empty($checkExists)){
            $string = $string.rand(10,99);
            $result = $this->generateSlug($table, $columns, $string, $lang);
        }
        return $result; 
    }*/

    public function generateSlug($table, $string,$unique_id="")
    {
        $result = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        $result = trim($result, '-');
        $result = strtolower($result);
        if($unique_id != ""){
            $checkExists = $this->Service->get_all($table, '*', array('slug' => $result,'unique_id !='=>$unique_id));
        }else{
            $checkExists = $this->Service->get_all($table, '*', array('slug' => $result));
        }
        if (!empty($checkExists)) {
            $string = $string . rand(10, 99);
            $result = $this->Service->generateSlug($table, $string);
        }
        return $result;
       
    }
  
    public function generateRandomString($alpha = true, $nums = true, $usetime = false, $string = '', $length = 10) {
        $alpha = ($alpha == true) ? 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' : '';
        // $alpha = ($alpha == true) ? 'abcdefghijklmnopqrstuvwxyz' : '';
        $nums = ($nums == true) ? '1234567890' : '';
        
        if ($alpha == true || $nums == true || !empty($string)) {
            if ($alpha == true) {
                $alpha = $alpha;
                $alpha .= strtoupper($alpha);
            } 
        }
        $randomstring = '';
        $totallength = $length;
            for ($na = 0; $na < $totallength; $na++) {
                    $var = (bool)rand(0,1);
                    if ($var == 1 && $alpha == true) {
                        $randomstring .= $alpha[(rand() % mb_strlen($alpha))];
                    } else {
                        $randomstring .= $nums[(rand() % mb_strlen($nums))];
                    }
            }
        if ($usetime == true) {
            $randomstring = $randomstring.time();
        }
        return($randomstring);
    }
    
    public function get_all($table, $columns = '*', $where = '1 = 1', $order_by = null, $sort_by = 'DESC', $limit="",$offset="",$group_by = '',$no_of_row=false,$searchQuery='',$where_in="", $join='') {
        $this->db->select($columns) 
        ->from($table);
        if(!empty($join) && !empty($join['table'])){
            if(!empty($join['where'])){
                $this->db->join($join['table'],$join['where'],$join['type']);
            }
        }
        $this->db->where($where);
        // ->where('is_active', 1);
        if(!empty($join)){
            $this->db->where($table.'.is_delete', 0);
        }else{
            $this->db->where('is_delete', 0);
        }
        if($where_in != '')
        $this->db->where_in($where_in);

        if($searchQuery != '')
        $this->db->where($searchQuery);

        if($order_by != null) {
            if($order_by=='rand'){
                $this->db->order_by('RAND()');
            }else{
                $this->db->order_by($order_by, $sort_by);
            }
        }
        if($limit!="" && $offset!=""){
            $this->db->limit($limit, $offset);
        }elseif($limit!=""){
            $this->db->limit($limit);
        }
        if($group_by != "") {
            $this->db->group_by($group_by);
        }
        $result =  $this->db->get()->result_array();
        if ($no_of_row) {
            $result = count($result);
        }
        // echo "<pre>"; pr($this->db->last_query()); 
        return $result;
    }

    public function multiple_insert($table, $data,$whr='') {
        if(!empty($whr)){
            // pr($data);die;
            $this->db->update_batch($table, $data, $whr);
        }else{
            $this->db->insert_batch($table, $data);
         }
        return true;
    }
    
    public function getCustomName($table, $column, $where) {
        $result = "";
        $this->db->where($where);
        $rowData = $this->db->get($table)->row();
        if(!empty($rowData)){
            $result = (!empty($column))?$rowData->$column:"";
        }
        return $result;
    }

    public function do_in_background($url, $params=array())
    {
        $post_string = http_build_query($params);
        $parts = parse_url($url);
        $errno = 0;
        $errstr = "";

        //Use SSL & port 443 for secure servers
        //Use otherwise for localhost and non-secure servers
        //For secure server
        // $fp = fsockopen('ssl://' . $parts['host'], isset($parts['port'])  ? $parts['port'] : 443, $errno, $errstr, 30);
        //For localhost and un-secure server
        // $fp = fsockopen($parts['host'], isset($parts['port']) ? $parts['port'] : 80, $errno, $errstr, 30);

        if ($this->config->item('ssl_enable') == 'Y') {
            $fp = fsockopen('ssl://' . $parts['host'], isset($parts['port']) ? $parts['port'] : 443, $errno, $errstr, 30);
        } else {
            $fp = fsockopen($parts['host'], isset($parts['port']) ? $parts['port'] : 80, $errno, $errstr, 30);
        }
        $out = '';
        if (!$fp) {
            $out .=  "Some thing Problem". "\r\n";
        }
        $out .= "POST " . $parts['path'] . " HTTP/1.1\r\n";
        $out .= "Host: " . $parts['host'] . "\r\n";
        $out .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $out .= "Content-Length: " . strlen($post_string) . "\r\n";
        $out .= "Connection: Close\r\n\r\n";
        if (isset($post_string)) {
            $out .= $post_string;
        }

        fwrite($fp, $out);
        fclose($fp);

        // generate log
        $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL;
        $log .= "URL: ".$url.PHP_EOL;
        $log .= $out;
        $log .= "--------------------------------------------------".PHP_EOL.PHP_EOL;
        file_put_contents('application/logs/curl_log_'.date("d_M_Y").'.log', $log, FILE_APPEND);
    }

    public function send_web_push_notification($title, $msg, $notification_data, $is_scheduled='', $schedule='') {
        $onesignal_app_id = !empty($this->setting_data['onesignal_app_id'])? $this->setting_data['onesignal_app_id']:"";
        $onesignal_auth_key = !empty($this->setting_data['onesignal_auth_key'])? $this->setting_data['onesignal_auth_key']:"";
        $site_logo = (isset($this->setting_data['site_logo']) && !empty($this->setting_data['site_logo'])) ?  base_url() . UPLOAD . $this->setting_data['site_logo'] : ADMIN_ASSETS_PATH . "img/logo.png";
        $favicon = (isset($this->setting_data['favicon']) && !empty($this->setting_data['favicon']))?  base_url().UPLOAD.$this->setting_data['favicon']:ADMIN_ASSETS_PATH."img/favicon.ico";

        $content = array(
            "en" => $msg
        );
        $fields = array(
            'app_id' => $onesignal_app_id,
            'contents' => $content,
            'web_url' => base_url(),
            'big_picture' => $site_logo,
            'chrome_web_image' => $site_logo,
            'chrome_web_icon' => $favicon,
            'small_icon' => $favicon,
            'headings' => array("en" => $title)
        );
        if($notification_data['type']=='users'){
            $fields['include_player_ids'] = (is_array($notification_data['device_id']))? $notification_data['device_id']:array($notification_data['device_id']);
        }else{
            $fields['included_segments'] = array('Active Users', 'Inactive Users', 'Subscribed Users');
        }

        if($is_scheduled==true && !empty($schedule)){
            // Convert datetime to Unix timestamp
            $timestamp = strtotime($schedule);
            $time = ($timestamp - (1 * 60));

            // $fields['send_after'] = date('Y-m-d H:i:s', $time).' UTC-0400';
            $fields['data'] = array(
                'isScheduled' => $is_scheduled,
                'scheduledTime' => $schedule,
            );
            $fields['send_after'] = date('Y-m-d H:i:s TO', $time);
            $fields['delayed_option'] ='timezone';
            $fields['delivery_time_of_day'] = date('H:i', $timestamp)."";
        }
        $fields = json_encode($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            "Authorization: Basic ".$onesignal_auth_key.""
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        
        $error_msg = "";
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
        }
        curl_close($ch);
        // pr($error_msg); pr($response); die;
        return $response;
    }

    // for send pushsafer notification
    public function send_pushsafer_notification($title, $message, $device){
        $private_key = !empty($this->setting_data['pushsafer_key'])? $this->setting_data['pushsafer_key']:"9bOpGRfmHFUoM5FcAceO ";
        $url = base_url();
        $urltitle = "Open Link";
        $ch = curl_init();
        $data = array(
            't' => urlencode($title),
            'm' => urlencode($message),
            's' => '',
            'v' => '',
            'i' => '1',
            'c' => '',
            'd' => $device,
            'u' => urlencode($url),
            'ut' => urlencode($urltitle),
            // 'p' => $picture,
            'k' => $private_key
        );
        $postString = http_build_query($data, '', '&');
        curl_setopt($ch, CURLOPT_URL, 'https://www.pushsafer.com/api' );
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false );
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }


    public function getUserPermission($role_id){
        $sql = "SELECT ps.*,rp.url, rp.name as permission_name FROM ".TBL_PERMISSION." rp
        JOIN ".TBL_USER_PERMISSION." ps ON ps.permission_id = rp.permissionid AND ps.is_active =1 AND ps.is_delete =0
        WHERE ps.role_id='" . $role_id . "' AND rp.is_active =1 AND rp.is_delete =0 ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    public function getEventRegisterList($event_id=""){
        $query=" SELECT SQL_CALC_FOUND_ROWS event.event_form,event.event_name,event.start_date,event.end_date,event.venue, tblevent_user.id, tblevent_user.ip_address, 
        tblevent_user.name, tblevent_user.email, tblevent_user.mobile, tblevent_user.payment_amount,tblevent_user.paid,tblevent_user.remaining, event.custom_form,
        tblevent_user.custom_form as user_custom_form, tblevent_user.address as user_address, tblevent_user.survey_questions FROM tblevent_user
        LEFT JOIN tblevent AS event ON event.id=tblevent_user.event_id AND event .is_active= 1  AND event .is_delete = 0 
        WHERE  tblevent_user.is_delete = 0 AND tblevent_user.event_id =".$event_id." group by tblevent_user.id ";
        return $this->db->query($query)->result_array();
    }
 
    public function getuserList($event_id=""){
        $query=" SELECT SQL_CALC_FOUND_ROWS ev.*,user.picture as user_picture
        FROM tblevent as ev
        LEFT JOIN tbluser AS user ON user.user_id=ev.user_id AND user.is_active= 1  AND user.is_delete = 0 
        WHERE  ev.id='" . $event_id . "' AND ev.is_delete = 0 AND ev.is_active = 1 group by ev.id ";
        return $this->db->query($query)->row_array();
    }  

    public function getuserListmenu($menu_id=""){
        $query=" SELECT SQL_CALC_FOUND_ROWS ev.*,user.picture as user_picture
        FROM tblstore as ev
        LEFT JOIN tbluser AS user ON user.user_id=ev.user_id AND user.is_active= 1  AND user.is_delete = 0 
        WHERE  ev.id='" . $menu_id . "' AND ev.is_delete = 0 AND ev.is_active = 1 group by ev.id ";
        return $this->db->query($query)->row_array();
    }
    
    public function getUserEvent($slug=""){
        $query=" SELECT SQL_CALC_FOUND_ROWS ev.*,user.picture as user_picture
        FROM tblevent as ev
        LEFT JOIN tbluser AS user ON user.user_id=ev.user_id AND user.is_active = 1 AND user.is_delete = 0 
        WHERE  ev.slug='" . $slug . "' AND ev.is_delete = 0 group by ev.id ";
        return $this->db->query($query)->row_array();
    }

    public function getUserEventByuniqueID($unique_id=""){
        $query=" SELECT SQL_CALC_FOUND_ROWS ev.*,user.picture as user_picture
        FROM tblevent as ev
        LEFT JOIN tbluser AS user ON user.user_id=ev.user_id AND user.is_active = 1 AND user.is_delete = 0 
        WHERE  ev.unique_id='" . $unique_id . "' AND ev.is_delete = 0 group by ev.id ";
        return $this->db->query($query)->row_array();
    }

    public function getStoreProducts($store_id = "", $categoryID="", $subcategoryID=""){
        $query = " SELECT SP.* FROM ".TBL_STORE_PRODUCT." SP 
            JOIN ".TBL_STORE_CATEGORY." SC ON FIND_IN_SET(SC.id, SP.category_id) AND SC.is_active = 1 AND SC.is_delete = 0 ";
        if(!empty($subcategoryID)){
            $query .= " JOIN ".TBL_STORE_CATEGORY." SC2 ON FIND_IN_SET(SC2.id, SP.sub_category_id) AND SC2.is_active = 1 AND SC2.is_delete = 0 ";
        }
        $query .= " WHERE SP.is_delete = 0 ";
        if(!empty($store_id)){
            $query .= " AND SP.store_id=".$store_id." ";
        }

        if(!empty($categoryID)){
            $query .= " AND FIND_IN_SET(".$categoryID.", SP.category_id) "; 
        }
        
        if(isset($subcategoryID)){
            if($subcategoryID != null){
                $query .= " AND FIND_IN_SET(".$subcategoryID.", SP.sub_category_id) "; 
            }elseif($subcategoryID == '0'){
                $query .= " AND (SP.sub_category_id = 0 OR SP.sub_category_id = '' OR SP.sub_category_id IS NULL) "; 
            }
        }
        $query .= " GROUP BY SP.id ORDER BY SP.custom_order ASC";
        return $this->db->query($query)->result_array();
    }

    public function getSubCategory($store_id="", $category_id=""){
        $query=" SELECT * FROM ".TBL_STORE_CATEGORY." WHERE `store_id` = '".$store_id."' AND parent_category_id IN (".$category_id.") AND `is_active` = 1 AND `is_delete` =0 order by parent_category_id DESC ";
        return $this->db->query($query)->result_array();
    }
    
} ?>
