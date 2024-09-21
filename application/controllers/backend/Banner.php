
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
        $this->load->model('product_model');
    }

    public function bannerimg()
    {
        $filter = array();
        $this->get_table_data('banner', $filter);
        // table list and controller same name apvu(banner) banner name database nai
    }

    public function form()
    {
        $data['view'] = 'backend/bigimg/form';
        $data['menu'] = "Add Banner";
        $data['title'] = "Banner";
        $this->renderAdmin($data);
    } 

    public function table()
    {
        $data['view'] = 'backend/bigimg/table';

        $data['menu'] = "Banner";
        $data['title'] = "Banner";
        $this->renderAdmin($data);
    }

    public function insert($id = '')
    {
        if ($this->input->post('submit')) {
            $id = $this->input->post('id'); 
            $data['name'] = $this->input->post('name');

            if (!empty($_FILES['images']) && $_FILES['images']['error'] == 0) {
                $temp_file = $_FILES['images']['tmp_name'];
                $img_name = "images" . mt_rand(10000, 999999999) . time();
                $path = $_FILES['images']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $data['image'] = $img_name . "." . $ext;
                $fileurl = UPLOAD . $data['image'];

                move_uploaded_file($temp_file, $fileurl);
            }

            if ($id != "") {
                $this->db->where('id', $id);
                $this->db->update(TBL_DYNAMICIMG, $data);
            } else {
                $this->Service->insert_row(TBL_DYNAMICIMG, $data);
            }
        }
        redirect('backend/banner/table');
    }
  
    public function banner_update($id)
    {
        $data['rowData'] = $this->Service->get_row(TBL_DYNAMICIMG, '*', array('id' => $id));

        $data['menu'] = "Edit Banner";
        
        $data['view'] = 'backend/bigimg/form';
        $this->renderAdmin($data);
    }

    public function banner_delete()
    {
        $id = $this->input->post('id');

        if ($this->Service->update_row(TBL_DYNAMICIMG, array('is_delete' => 1), array('id' => $id))) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function change_status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');

        if ($this->Service->update_row(TBL_DYNAMICIMG, array('is_active' => $status), array('id' => $id))) {
            echo '1';
        } else {
            echo '0';
        }
    }
}
