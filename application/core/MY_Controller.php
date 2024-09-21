<?php
require_once 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MY_Controller extends CI_Controller {

    public $setting_data;
    public $language_list;
    public $site_title;
    public $login_user_data;
    public $user_permission; 
    public $user_notifications;
    function __construct() {
        parent::__construct();
        $this->load->library('upload');

        $this->setting_data = $this->Service->get_row(TBL_SETTING,'*', array('setting_id' => 1));
        $this->language_list = $this->Service->get_all(TBL_LANGUAGE,'*', array('is_active' => 1));
        $this->site_title = (!empty($this->setting_data['site_name']))? $this->setting_data['site_name']:SITE_TITLE;
        
        // for get login user data
        if ($this->session->has_userdata('user_type')) {
            $user_type = $this->session->userdata('user_type');
            $role_type = $this->Service->getCustomName(TBL_USER_ROLE, 'role_type', array('id'=>$user_type));
          
            // if(in_array($user_type, $backend_userroles)){
            if($role_type==1 || $user_type==1){
                $login_user_id = $this->session->userdata('admin_id');
              
                // $where = " AND n.is_read = 0 AND (n.user_id = '".$login_user_id."' OR n.user_roles LIKE '%".$user_type."%' ) ";
                // $this->user_notifications = $this->Service->getUserNotifications($where, $user_type);
            }else{
                $login_user_id = $this->session->userdata('user_id');
            }
            
            $this->login_user_data = $this->Service->get_row(TBL_USERS, "*,  CONCAT_WS(' ',name, last_name) as fullname", array('user_id' => $login_user_id));
            if(!empty($login_user_id)){
                $this->user_permission = $this->Service->getUserPermission($user_type);
            }
        }
    }
    
    public function getNotification($key=""){
        $result = "No notification found";
        if(!empty($key)){
            $query = $this->db->get_where(TBL_LANGUAGE_KEY, array('is_active' => 1,'key' => $key));
            $notificationData = $query->row_array();
            if(!empty($notificationData)){
                $result = $notificationData['value_en'];
            }
        }
        return $result;
    }

    protected function get_table_data($table, $params = [], $is_front=false)
    {
        foreach ($params as $key => $val) {
            $$key = $val;
        }
        $customFieldsColumns = [];
        if($is_front){
            $path = VIEWPATH . 'front/tables/' . $table . '.php';
            if (file_exists(VIEWPATH . 'front/tables/my_' . $table . '.php')) {
                $path = VIEWPATH . 'front/tables/my_' . $table . '.php';
            }
        }else{
            $path = VIEWPATH . 'backend/tables/' . $table . '.php';
            if (file_exists(VIEWPATH . 'backend/tables/my_' . $table . '.php')) {
                $path = VIEWPATH . 'backend/tables/my_' . $table . '.php';
            }
        }
        include_once($path);
        echo json_encode($output);
        exit;
    }

    public function generateLog($response=""){
        //$requestParameter = file_get_contents('php://input');
        $requestParameter = $_REQUEST;
        $requestUrl = base_url(uri_string());
        //echo "<pre>"; print_r($requestParameter); die();
        $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL;
        $log .= "URL: ".$requestUrl.PHP_EOL;
        $log .= "Parameter: ".json_encode($requestParameter).PHP_EOL;
        if(!empty($response)){
            //$log .= "Response: ".json_encode($response).PHP_EOL;
        }
        $log .= "--------------------------------------------------".PHP_EOL.PHP_EOL;
        file_put_contents('application/logs/log_'.date("d_M_Y").'.log', $log, FILE_APPEND);
    }

    public function response($response) {
        if(empty($response['data'])){
            $response['data'] = null;
        }
        if(empty($response['status'])){
            $response['status'] = 0;
        }
        if(empty($response['message'])){
            $response['message'] = "No Message found.";
        }
        header('Content-Type:application/json');
        echo json_encode($response);
        // $this->generateLog($response);
        exit();
    }

    public function renderPartial($data=""){
        if(!empty($data['view'])){
            if(is_array($data['view'])){
                foreach($data['view'] as $view){
                    $this->load->view($view, $data);
                }
            }else{
                $this->load->view($data['view'], $data);
            }
        }
    }

    public function render($data=""){
        $this->load->view('front/layout/header', $data);
        if(!empty($data['view'])){
            if(is_array($data['view'])){
                foreach($data['view'] as $view){
                    $this->load->view($view, $data);
                }
            }else{
                $this->load->view($data['view'], $data);
            }
        }
        $this->load->view('front/layout/footer', $data);
    }
    
    public function renderAdmin($data=""){
        $this->load->view('backend/layout/header', $data);
        $this->load->view('backend/layout/sidebar', $data);
        $this->load->view('backend/layout/navbar', $data);
        if(!empty($data['view'])){
            if(is_array($data['view'])){
                foreach($data['view'] as $view){
                    $this->load->view($view, $data);
                }
            }else{
                $this->load->view($data['view'], $data);
            }
        }
        $this->load->view('backend/layout/footer', $data);
    }
    
    //for get site setting value
    public function getSiteSetting($key=""){
        $result = "";
        if(!empty($key)){
            $query = $this->db->get_where(TBL_SITE_SETTING, array('is_active' => 1,'is_delete' => 0,'settingKey' => $key));
            $resultData = $query->row_array();
            if(!empty($resultData)){
                $result = $resultData['settingValue'];
            }
        }
        return $result;
    }

    public function callApi($method,$apiName,$params=array(),$data=""){
        // $params["access_key"] = ACCESS_KEY;
        $params["web"] = 1;
        $url = API_URL.$apiName;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
            break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
            break;
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
	    curl_close($curl);
        return $result;
    }
  
    /**
     *
     * @param string $to email to
     * @param string $subject email subject
     * @param string $message email message
     * @param array $attachments email attachments
     * @return boolean
     */
    public function sendMail($to, $subject, $message, $attachments = null) {
        $mail = new PHPMailer(true);

        $from_email = (!empty($this->setting_data['from_email']))?$this->setting_data['from_email']:$this->config->item('from_email');
        $smtp_host = (!empty($this->setting_data['smtp_host']))?$this->setting_data['smtp_host']:'smtp.gmail.com';
        $smtp_username = (!empty($this->setting_data['smtp_username']))?$this->setting_data['smtp_username']:$from_email;
        $smtp_password = (!empty($this->setting_data['from_email']))?$this->setting_data['from_email']:'';
        $smtp_secure = (!empty($this->setting_data['smtp_secure']))?$this->setting_data['smtp_secure']:'tls';
        $smtp_port = (!empty($this->setting_data['smtp_port']))?$this->setting_data['smtp_port']:'587';

        try {
            if(isset($this->config->item('mail')['protocol']) && $this->config->item('mail')['protocol']=='smtp'){
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Mailer = "smtp";
                $mail->SMTPAuth = true;
                $mail->Host = $smtp_host;
                $mail->Username = $smtp_username;
                $mail->Password = $smtp_password;
                $mail->SMTPSecure = $smtp_secure;
                $mail->Port = $smtp_port;
            }

            $mail->setFrom($from_email, SITE_TITLE);
            if(strpos($to, ",") == false ) {
                $mail->addAddress($to);
            } else {
                $toEmailArray = explode(",",$to);
                $mail->addAddress($mail->Username);
                foreach($toEmailArray as $toEmail) {
                    $mail->addBCC($toEmail);
                }
            }

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = $subject;
            $mail->Body    = $message;
            if(is_array($attachments)) {
                foreach($attachments as $attachment) {
                    if(file_exists($attachment)) {
                        $mail->addAttachment($attachment);
                    }
                }
            }
            
            if(!$mail->send()) {
                $this->generateLog($mail->ErrorInfo);
            }
        } catch (Exception $e) {
            $this->generateLog($e->getMessage());
        }
        $mail->clearAddresses();
        $mail->clearAttachments();
        return true;
    }

} ?>