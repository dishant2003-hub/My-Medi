<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
        $this->load->model('product_model'); 
    }

    public function getAjaxitem()
    {
        $filter = array();
        $this->get_table_data('setting', $filter);  
    }

    public function settings()
    {
        $data['result'] = $this->Service->get_all(TBL_SETTING);

        $data['menu'] = "Setting";
        $data['title'] = "Setting";
        $data['view'] = 'backend/setting/item';
        $this->renderAdmin($data);
    }

    public function setting_form($id)
    {
        $data['rowData'] = $this->Service->get_row(TBL_SETTING, '*', array('setting_id' => $id));

        $data['menu'] = "Edit Setting";
        $data['view'] = 'backend/setting/form';
        $this->renderAdmin($data);
    }

    public function updata()
    {
        $id = $this->input->post('id');
        $data['site_name'] = $this->input->post('site_name');
        $data['header'] = $this->input->post('header');
        $data['footer'] = $this->input->post('footer');
        $data['email'] = $this->input->post('email');
        $data['wa_number'] = $this->input->post('wa_number');
        $data['fb_link'] = $this->input->post('fb_link');
        $data['twitter_link'] = $this->input->post('twitter_link');
        $data['linkedin_link'] = $this->input->post('linkedin_link');
        $data['instagram_link'] = $this->input->post('instagram_link');
        $data['youtube_link'] = $this->input->post('youtube_link');
        $data['phone'] = $this->input->post('phone');
        $data['address'] = $this->input->post('address');
        $data['from_email'] = $this->input->post('from_email');

        if (!empty($_FILES['site_logo']) && $_FILES['site_logo']['error'] == 0) {
            $temp_file = $_FILES['site_logo']['tmp_name'];
            $img_name = "site_logo_" . mt_rand(10000, 999999999) . time();
            $path = $_FILES['site_logo']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $data['site_logo'] = $img_name . "." . $ext;
            $fileurl = UPLOAD . $data['site_logo'];
            if (isset($data['site_logo']) && $data['site_logo'] != "" && file_exists(UPLOAD . $data['site_logo'])) {
                unlink(UPLOAD . $data['site_logo']);
            }
        }
        move_uploaded_file($temp_file, $fileurl);

        if (!empty($_FILES['favicon']) && $_FILES['favicon']['error'] == 0) {
            $temp_file = $_FILES['favicon']['tmp_name'];
            $img_name = "favicon_" . mt_rand(10000, 999999999) . time();
            $path = $_FILES['favicon']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $data['favicon'] = $img_name . "." . $ext;
            $fileurl = UPLOAD . $data['favicon'];
            if (isset($data['favicon']) && $data['favicon'] != "" && file_exists(UPLOAD . $data['favicon'])) {
                unlink(UPLOAD . $data['favicon']);
            }
        }
        move_uploaded_file($temp_file, $fileurl);

        if ($id != "") {
            $this->db->where('setting_id', $id);
            $this->db->update(TBL_SETTING, $data);
        } 
        redirect('backend/settings');
    }
    
}
