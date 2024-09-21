<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
        $this->load->model('product_model');
    } 

    public function getAjaxcategory()
    {
        $filter = array();
        $this->get_table_data('category', $filter); 
    }

    public function category_detail()
    {
        $data['arrow'] = $this->Service->get_all(TBL_CATEGORY, '*', array('category' => 0));

        $this->load->view('backend/category/form', $data);
    }

    public function category_table()
    {
        $data['datares'] = $this->Service->get_all(TBL_CATEGORY, '*', array('is_active' => 1));

        $data['menu'] = "Category";
        $data['title'] = "Category";
        $data['view'] = 'backend/category/table';
        $this->renderAdmin($data);
    }

    public function category_insert()
    {
        if ($this->input->post('submit')) {
            $id = $this->input->post('id');
            $data = array(
                'category' => $this->input->post('Category'),
                'name' => $this->input->post('name'), 
                'description' => $this->input->post('description'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            );

            if (!empty($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $temp_file = $_FILES['image']['tmp_name'];
                $img_name = "image_" . mt_rand(10000, 999999999) . time();
                $path = $_FILES['image']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $data['image'] = $img_name . "." . $ext;
                $fileurl = UPLOAD . $data['image'];
                if (isset($data['image']) && $data['image'] != "" && file_exists(UPLOAD . $data['image'])) {
                    unlink(UPLOAD . $data['image']);
                }
            }
            move_uploaded_file($temp_file, $fileurl);

            if ($id != "") {
                $this->db->where('id', $id);
                $this->db->update(TBL_CATEGORY, $data);
            } else {
                $this->Service->insert_row(TBL_CATEGORY, $data);
            } 
        }
        redirect('backend/category/category_table');
    }

    public function edit_category_ajax()
    {
        $id = $this->input->post('id');
        $data['rowData'] = $this->Service->get_row(TBL_CATEGORY, '*', array('id' => $id));
        $data['arrow'] = $this->Service->get_all(TBL_CATEGORY, '*', array('category' => 0));
        $this->load->view('backend/category/form', $data);
    }

    public function category_delete()
    {
        $id = $this->input->post('id');

        if ($this->Service->update_row(TBL_CATEGORY, array('is_delete' => 1, 'updated_at' => date("Y-m-d H:i:s")), array('id' => $id))) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function change_status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');

        if ($this->Service->update_row(TBL_CATEGORY, array('is_active' => $status), array('id' => $id))) {
            echo '1';
        } else {
            echo '0';
        }
    }
}
