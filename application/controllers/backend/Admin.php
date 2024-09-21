<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
    }
  
    public function access_denied()
    {
        $data['menu'] = 'Access denied';
        $data['title'] = 'Access denied';
        $data['view'] = 'backend/access_denied';
        $this->renderAdmin($data);
    }

    public function dashboard()
    {
        if (!check_permission('dashboard', 'can_view', $this->user_permission)) {
            redirect(base_url() . 'backend/access_denied'); 
        }
        $data['menu'] = 'Dashboard';
        $data['title'] = 'Dashboard';
        $data['userCount'] = $this->Service->get_all(TBL_REGISTER, '*', array('is_delete' => 0), '', '', '', '', '', TRUE);
        $data['categoryCount'] = $this->Service->get_all(TBL_CATEGORY, '*', array('is_delete' => 0), '', '', '', '', '', TRUE);
        $data['productCount'] = $this->Service->get_all(TBL_PRODUCT, '*', array('is_delete' => 0), '', '', '', '', '', TRUE);
        $data['orderCount'] = $this->Service->get_all(TBL_ORDER_DETAILS, '*', array('is_delete' => 0), '', '', '', '', '', TRUE);
        $cur_year = date("Y");  // Year data mate Y(capital) levo
        $data['yearCount'] = ($this->Service->get_row(TBL_ORDER_ITEM, 'count(*) as total', array('is_delete' => 0, 'YEAR(' . TBL_ORDER_ITEM . '.created_at)' => $cur_year, 'is_active' => 1)));
        $cur_month = date("m");
        $data['monthCount'] = ($this->Service->get_row(TBL_ORDER_ITEM, 'count(*) as total', array('is_delete' => 0, 'MONTH(' . TBL_ORDER_ITEM . '.created_at)' => $cur_month, 'is_active' => 1)));
        $data['bannerCount'] = $this->Service->get_all(TBL_DYNAMICIMG, '*', array('is_active' => 1), '', '', '', '', '', TRUE);
        $data['blogCount'] = $this->Service->get_all(TBL_BLOG, '*', array('is_active' => 1), '', '', '', '', '', TRUE);
        $data['portfolioCount'] = $this->Service->get_all(TBL_PORTFOLIO, '*', array('is_active' => 1), '', '', '', '', '', TRUE);

        $data['view'] = 'backend/dashboard';
        $this->renderAdmin($data);
    }

    //for change password
    public function change_login_password()
    {
        $data['title'] = "change password";
        $data['menu'] = "change password";
        $user_id = $this->session->userdata('admin_id'); 

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required|matches[password]');
            if ($this->form_validation->run() != FALSE) {
                $data = array(
                    'password' => md5($this->input->post('password')),
                    'updated_time' => date("Y-m-d H:i:s")
                );
                $result = $this->user->edit_user($data, $user_id);
                $this->session->set_flashdata('success_msg', $this->getNotification('recUpSuc'));
                redirect(base_url('backend/change-login-password'));
            }
        }
        $data['view'] = 'backend/users/change_login_password';
        $this->renderAdmin($data);
    }

    //for setting
    public function system_setting()
    {
        if (!check_permission('system-setting', 'can_view', $this->user_permission)) {
            redirect(base_url() . 'backend/access_denied'); 
        }
        $data['title'] = "Settings";
        $data['menu'] = "Settings";
        $data['rowData'] = $settingData = $this->Service->get_row(TBL_SETTING, '*');

        if ($this->input->post('submit')) {
            $saveData = array(
                'site_name' => $this->input->post('site_name'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'wa_number' => $this->input->post('wa_number'),
                'linkedin_link' => (isset($_POST['linkedin_link'])) ? $this->input->post('linkedin_link') : "",
                'fb_link' => (isset($_POST['fb_link'])) ? $this->input->post('fb_link') : "",
                'twitter_link' => (isset($_POST['twitter_link'])) ? $this->input->post('twitter_link') : "",
                'youtube_link' => (isset($_POST['youtube_link'])) ? $this->input->post('youtube_link') : "",
                'instagram_link' => (isset($_POST['instagram_link'])) ? $this->input->post('instagram_link') : "",
            );

            if ($_FILES['site_logo']['error'] == 0) {
                $temp_file = $_FILES['site_logo']['tmp_name'];
                $img_name = "tray_img" . mt_rand(10000, 999999999) . time();
                $path = $_FILES['site_logo']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $saveData['site_logo'] = $img_name . "." . $ext;
                $fileurl = UPLOAD . $saveData['site_logo'];
                if (isset($settingData['site_logo']) && $settingData['site_logo'] != "" && file_exists(UPLOAD . $settingData['site_logo'])) {
                    unlink(UPLOAD . $settingData['site_logo']);
                }
                move_uploaded_file($temp_file, $fileurl);
            }

            if ($_FILES['favicon']['error'] == 0) {
                $temp_file = $_FILES['favicon']['tmp_name'];
                $img_name = "tray_img" . mt_rand(10000, 999999999) . time();
                $path = $_FILES['favicon']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $saveData['favicon'] = $img_name . "." . $ext;
                $fileurl = UPLOAD . $saveData['favicon'];
                if (isset($settingData['favicon']) && $settingData['favicon'] != "" && file_exists(UPLOAD . $settingData['favicon'])) {
                    unlink(UPLOAD . $settingData['favicon']);
                }
                move_uploaded_file($temp_file, $fileurl);
            }

            $this->Service->update_row(TBL_SETTING, $saveData, array('setting_id' =>  $settingData['setting_id']));

            $this->session->set_flashdata('success_msg', $this->getNotification('recUpSuc'));
            redirect(base_url('backend/system-setting'));
        }

        $data['view'] = 'backend/setting/system_setting';
        $this->renderAdmin($data);
    }

    public function mail_setting()
    {
        $data['title'] = "Mail Setting";
        $data['menu'] = "Mail Setting";
        $data['rowData'] = $settingData = $this->Service->get_row(TBL_SETTING, '*');
        if ($this->input->post('submit')) {
            $saveData = array(
                'from_email' => (isset($_POST['from_email'])) ? $this->input->post('from_email') : "",
                'sendmail_type' => (isset($_POST['sendmail_type'])) ? $this->input->post('sendmail_type') : "",
                'smtp_host' => (isset($_POST['smtp_host'])) ? $this->input->post('smtp_host') : "",
                'smtp_username' => (isset($_POST['smtp_username'])) ? $this->input->post('smtp_username') : "",
                'smtp_password' => (isset($_POST['smtp_password'])) ? $this->input->post('smtp_password') : "",
                'smtp_secure' => (isset($_POST['smtp_secure'])) ? $this->input->post('smtp_secure') : "",
                'smtp_port' => (isset($_POST['smtp_port'])) ? $this->input->post('smtp_port') : "",
                'updated_time' => date("Y-m-d H:i:s")
            );
            $this->Service->update_row(TBL_SETTING, $saveData, array('setting_id' =>  $settingData['setting_id']));
            $this->session->set_flashdata('success_msg', $this->getNotification('recUpSuc'));
            redirect(base_url('backend/mail-setting'));
        }
        $data['view'] = 'backend/setting/mail_setting';
        $this->renderAdmin($data);
    }
}
