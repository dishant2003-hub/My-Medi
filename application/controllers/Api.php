<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends MY_Controller {
    /*
    * Status codes :
    * 0 - Fail/ No data
    * 1 - Success
    * 2 - Invalid accesstoken
    */
    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('Api_model','api');
    }
    
    //for get splash screen data
    public function splashScreen(){
        $response['status'] = 1;
        $data = array();
        $data['occupation'] = $this->Service->get_all(TBL_OCCUPATION,['id','name'],array('is_active'=>1));
        $response['data'] = $data;
        $response['message'] = $this->getNotification('recListSuc');
        $this->response($response);
    }
    
    //check user authentication by user id and access access_token
    public function checkUserAuth() {
        $result = array();
        if (!isset($_POST['user_id']) || empty($_POST['user_id'])) {
            $response['message'] = $this->getNotification('passUserId');
            $this->response($response);
        }
        if (!isset($_POST['access_token']) || empty($_POST['access_token'])) {
            $response['message'] = $this->getNotification('passToken');
            $this->response($response);  
        }
        $user_id = $this->input->post('user_id');
        $access_token = $this->input->post('access_token');
        $user_role = (isset($_POST['user_role']))?$this->input->post('user_role'):"";
        if ($user_id != "" && $access_token != "") {
            if(!empty($user_role)){
                $checkUserAvailable = $this->user->get_users(array('user_id' => $user_id,'user_role'=>$user_role), TRUE);
            }else{
                $checkUserAvailable = $this->user->get_users(array('user_id' => $user_id), TRUE);
            }
            if (empty($checkUserAvailable)) {
                $response['status'] = 0;
                $response['message'] = $this->getNotification('userNotFound');
                $this->response($response);
            }
            $checkLogin = $this->user->get_users(array('user_id' => $user_id, 'access_token' => $access_token), TRUE);
            if (empty($checkLogin)) {
                $response['status'] = 2;
                $response['message'] = $this->getNotification('tokenExpire');
                $this->response($response);
            } else {
                $result = $this->user->get_users(array('user_id' => $user_id), TRUE);
            }
        }
        return $result;
    }

    //for Register new User
    public function register() {
        if (!isset($_POST['first_name']) || empty($_POST['first_name'])) {
            $response['message'] = $this->getNotification('passFname');
            $this->response($response);
        }
        if (!isset($_POST['last_name']) || empty($_POST['last_name'])) {
            $response['message'] = $this->getNotification('passLname');
            $this->response($response);
        }
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            $response['message'] = $this->getNotification('passEmail');
            $this->response($response);
        }
        if (!isset($_POST['mobile']) || empty($_POST['mobile'])) {
            $response['message'] = $this->getNotification('passMobile');
            $this->response($response);
        }
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            $response['message'] = $this->getNotification('passPwd');
            $this->response($response);
        }
        $checkEmailExist = $this->user->check_email($_POST['email']);
        if (!empty($checkEmailExist)) {
            $response['message'] = $this->getNotification('emailExist');
            $this->response($response);
        }
        
        $userData = array();
        $access_token = $this->api->generateToken();
        if (isset($_POST['device_type']) && !empty($_POST['device_type'])) {
            $userData['device_type'] = $this->input->post('device_type');
        }
        if (isset($_POST['device_token']) && !empty($_POST['device_token'])) {
            $userData['device_token'] = $this->input->post('device_token');
        }
        if (isset($_POST['company_name']) && !empty($_POST['company_name'])) {
            $userData['company_name'] = $this->input->post('company_name');
        }
        if (isset($_POST['occupation_id']) && !empty($_POST['occupation_id'])) {
            $userData['occupation_id'] = $this->input->post('occupation_id');
        }
        $otp = $this->Service->rand_code(4);
        $otp = '1111';
        $userData['otp'] = $otp;
        $userData['first_name'] = $this->input->post('first_name');
        $userData['last_name'] = $this->input->post('last_name');
        $userData['email'] = $this->input->post('email');
        $userData['mobile'] = $this->input->post('mobile');
        $userData['user_role'] = 1;
        $userData['password'] = md5($this->input->post('password'));
        $userData['access_token'] = $access_token;
        $userData['created_time'] = date("Y-m-d H:i:s");
        $userData['updated_time'] = date("Y-m-d H:i:s");
        $user_id = $this->user->add_user($userData);
        
        $response['status'] = 1;
        $response['message'] = $this->getNotification('regSuccess');
        $response['data'] = $this->user->getUserResponse($user_id);
        $this->response($response);
    }

    //for Register new User
    public function socialLogin() {
        if (!isset($_POST['auth_type']) || empty($_POST['auth_type'])) {
            $response['message'] = 'Please pass authentication type';
            $this->response($response);
        }
        if (!isset($_POST['auth_id']) || empty($_POST['auth_id'])) {
            $response['message'] = 'Please pass authentication ID';
            $this->response($response);
        }

        $userData = array();
        $access_token = $this->api->generateToken();

        $auth_type = $this->input->post('auth_type');
        $auth_id = $this->input->post('auth_id');
        $checkLogin = $this->Service->get_row(TBL_USERS,'*', array('auth_type'=>$auth_type, 'auth_id'=>$auth_id));
        if(!empty($checkLogin)){
            $user_id = $checkLogin['user_id'];

            $updateUserData = array();
            if (isset($_POST['device_type']) && !empty($_POST['device_type'])) {
                $updateUserData['device_type'] = $_POST['device_type'];
            }
            if (isset($_POST['device_token']) && !empty($_POST['device_token'])) {
                $updateUserData['device_token'] = $_POST['device_token'];
            }
            $updateUserData['access_token'] = $access_token;
            $this->user->edit_user($updateUserData, $user_id);
        }else{
            $userData['auth_type'] = $_POST['auth_type'];
            $userData['auth_id'] = $_POST['auth_id'];
            if (isset($_POST['first_name']) && !empty($_POST['first_name'])) {
                $userData['first_name'] = $_POST['first_name'];
            }
            if (isset($_POST['last_name']) && !empty($_POST['last_name'])) {
                $userData['last_name'] = $_POST['last_name'];
            }
            if (isset($_POST['email']) && !empty($_POST['email'])) {
                $userData['email'] = $_POST['email'];
            }
            if (isset($_POST['mobile']) && !empty($_POST['mobile'])) {
                $userData['mobile'] = $_POST['mobile'];
            }
            if (isset($_POST['device_type']) && !empty($_POST['device_type'])) {
                $userData['device_type'] = $_POST['device_type'];
            }
            if (isset($_POST['device_token']) && !empty($_POST['device_token'])) {
                $userData['device_token'] = $_POST['device_token'];
            }
            if (isset($_POST['company_name']) && !empty($_POST['company_name'])) {
                $userData['company_name'] = $_POST['company_name'];
            }
            if (isset($_POST['occupation_id']) && !empty($_POST['occupation_id'])) {
                $userData['occupation_id'] = $_POST['occupation_id'];
            }
            $userData['first_name'] = $_POST['first_name'];
            $userData['last_name'] = $_POST['last_name'];
            $userData['email'] = $_POST['email'];
            $userData['mobile'] = $_POST['mobile'];
            $userData['user_role'] = 1;
            $userData['is_verified'] = 1;
            $userData['access_token'] = $access_token;
            $userData['created_time'] = date("Y-m-d H:i:s");
            $userData['updated_time'] = date("Y-m-d H:i:s");
            $user_id = $this->user->add_user($userData);
        }
        
        $response['status'] = 1;
        $response['message'] = $this->getNotification('regSuccess');
        $response['data'] = $this->user->getUserResponse($user_id);
        $this->response($response);
    }

    //for login User
    public function login() {
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            $response['message'] = $this->getNotification('passEmail');
            $this->response($response);
        }
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            $response['message'] = $this->getNotification('passPwd');
            $this->response($response);
        }
        $checkUser = $this->user->get_users(array('email'=>$_POST['email']),true);
        if (empty($checkUser)) {
            $response['message'] = $this->getNotification('userNotFound');
            $this->response($response);
        }
        $checkLogin = $this->user->get_users(array('email' => $_POST['email'],'password' => md5($_POST["password"])),true);
        if (empty($checkLogin)) {
            $response['message'] = $this->getNotification('invalidLogin');
            $this->response($response);
        }
        
        $access_token = $this->api->generateToken();
        $otp = $this->Service->rand_code(4);
        $updateUserData = array();
        // $updateUserData['otp'] = $otp;
        if (isset($_POST['device_type']) && !empty($_POST['device_type'])) {
            $updateUserData['device_type'] = $_POST['device_type'];
        }
        if (isset($_POST['device_token']) && !empty($_POST['device_token'])) {
            $updateUserData['device_token'] = $_POST['device_token'];
        }
        $updateUserData['access_token'] = $access_token;
        $user_id = $checkLogin['user_id'];
        $this->user->edit_user($updateUserData, $user_id);
        /*if (empty($checkLogin['isVerified'])) {
            $message = "your Log in verification code".$otp;
            $this->Service->mailsend($checkUser['email'],'Verification Code',$message);

            $response['status'] = 3;
            $response['message'] = $this->getNotification('verifyAccount');
            $response['data'] = $this->user->getUserResponse($user_id);
            $this->response($response);
        }*/
        
        $response['status'] = 1;
        $response['message'] = $this->getNotification('loginSuccess');
        $response['data'] = $this->user->getUserResponse($user_id, true);
        $this->response($response);
    }

    //for verify user
    public function verifyUser() {
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            $response['message'] = $this->getNotification('passEmail');
            $this->response($response);
        }
        if (!isset($_POST['otp']) || empty($_POST['otp'])) {
            $response['message'] = $this->getNotification('passVerifyCode');
            $this->response($response);
        }
        $email = $_POST['email'];
        $userData = $this->user->get_users(array('email' => $email),true);
        if (empty($userData)) {
            $response['message'] = $this->getNotification('userNotFound');
            $this->response($response);
        }
        $user_id = $userData['user_id'];
        if(isset($userData['otp']) && $userData['otp']!="" && $userData['otp']==$_POST['otp']){
            $updateUserData = array();
            $updateUserData['otp'] = '';
            $updateUserData['is_verified'] = 1;
            $updateUserData['is_active'] = 1;
            $this->user->edit_user($updateUserData, $user_id);
            
            $response['status'] = 1;
            $response['message'] = $this->getNotification('userVerifySuccess');
            $response['data'] = $this->user->getUserResponse($user_id, true);
            $this->response($response);
        }else{
            $response['message'] = $this->getNotification('codeNotMatch');
            $this->response($response);
        }
    }

    //for change password
    public function changePassword() {
        $this->checkUserAuth();
        $user_id = $this->input->post('user_id');
        if (!isset($_POST['oldPassword']) || empty($_POST['oldPassword'])) {
            $response['message'] = $this->getNotification('passOldPwd');
            $this->response($response);
        }
        if (!isset($_POST['newPassword']) || empty($_POST['newPassword'])) {
            $response['message'] = $this->getNotification('passNewPwd');
            $this->response($response);
        }

        $oldPwd = $_POST['oldPassword'];
        $newPwd = $_POST['newPassword'];
        $checkPassword = $this->user->get_users(array('user_id' => $user_id,'password' => md5($oldPwd)), TRUE);
        if (empty($checkPassword)) {
            $response['message'] = $this->getNotification('passwordNotMatch');
            $this->response($response);
        }
        $this->user->edit_user(array('password' => md5($newPwd)), $user_id);
        
        $response['status'] = 1;
        $response['message'] = $this->getNotification('pwdChangeSuccess');
        $this->response($response);
    }

    // for logout
    public function logout() {
        $this->checkUserAuth();
        $user_id = $this->input->post('user_id');

        $updateUserData = array(
            'access_token' => '',
            'device_type' => '',
            'device_token' => ''
        );
        $this->Service->update_row(TBL_USERS, $updateUserData, ['user_id' => $user_id]);
        
        $response['status'] = 1;
        $response['message'] = $this->getNotification('logoutSuccess');
        $this->response($response);
    }

    //for Update user profile
    public function updateProfile() {
        $userData = $this->checkUserAuth();
        $user_id = $this->input->post('user_id');

        $saveData = array();
        if (isset($_POST['first_name']) && !empty($_POST['first_name'])) {
            $saveData['first_name'] = $_POST['first_name'];
        }
        if (isset($_POST['last_name']) && !empty($_POST['last_name'])) {
            $saveData['last_name'] = $_POST['last_name'];
        }
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $checkEmailAlreadyExist = $this->user->check_update_email($_POST['email'], $user_id);
            if (!empty($checkEmailAlreadyExist)) {
                $response['message'] = $this->getNotification('emailExist');
                $this->response($response);
            } else {
                $saveData['email'] = $_POST['email'];
            }
        }

        if (isset($_FILES['picture']['name']) && $_FILES['picture']['error'] == 0) {
            $temp_file = $_FILES['picture']['tmp_name'];
            $img_name = "tray_img" . mt_rand(10000, 999999999) . time();
            $path = $_FILES['picture']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $saveData['picture'] = $img_name . "." . $ext;
            $fileurl = PROFILE . $saveData['picture'];
            if (isset($userData['picture']) && $userData['picture'] != "" && file_exists(PROFILE . $userData['picture'])) {
                unlink(PROFILE . $userData['picture']);
            }
            move_uploaded_file($temp_file, $fileurl);
        }

        if (isset($_POST['mobile']) && !empty($_POST['mobile'])) {
            $saveData['mobile'] = $_POST['mobile'];
        }
        if (isset($_POST['company_name']) && !empty($_POST['company_name'])) {
            $saveData['company_name'] = $_POST['company_name'];
        }
        if (isset($_POST['occupation_id']) && !empty($_POST['occupation_id'])) {
            $saveData['occupation_id'] = $_POST['occupation_id'];
        }
        $saveData['updated_time'] = date("Y-m-d H:i:s");
        $this->Service->update_row(TBL_USERS, $saveData, ['user_id' => $user_id]);

        $response['status'] = 1;
        $response['message'] = $this->getNotification('profileUpdateSuccess');
        $response['data'] = $this->user->getUserResponse($user_id, true);
        $this->response($response);
    }

    //for get user profile
    public function getUserProfile() {
        $this->checkUserAuth();
        $user_id = $this->input->post('user_id');
        
        $response['status'] = 1;
        $response['message'] = $this->getNotification('recListSuc');
        $response['data'] = $this->user->getUserResponse($user_id);
        $this->response($response);
    }

}
