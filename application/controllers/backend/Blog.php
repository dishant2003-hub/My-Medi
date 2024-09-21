
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
        $this->load->model('product_model');
    } 
  

    public function blogimg()
    {
        $filter = array();
        $this->get_table_data('blog', $filter);
        // table list and controller same name apvu(banner) banner name database nai
    }

    public function form()
    {
        $data['view'] = 'backend/blog/form';
        $data['menu'] = "Add Blog";
        $data['title'] = "Blog";
        $this->renderAdmin($data);
    }

    public function table()
    { 
        $data['view'] = 'backend/blog/table';

        $data['menu'] = "Blog";
        $data['title'] = "Blog";
        $this->renderAdmin($data);
    }

    public function insert($id = '')
    {
        if ($this->input->post('submit')) {
            $id = $this->input->post('id');
            $data['line'] = $this->input->post('line');
            $data['date'] = $this->input->post('date');
            $data['short_des'] = $this->input->post('short_des');
            $data['description'] = $this->input->post('description');

            if (!empty($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $temp_file = $_FILES['image']['tmp_name'];
                $img_name = "image" . mt_rand(10000, 999999999) . time();
                $path = $_FILES['image']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $data['image'] = $img_name . "." . $ext;
                $fileurl = UPLOAD . $data['image'];

                move_uploaded_file($temp_file, $fileurl);
            }

            if ($id != "") {
                $this->db->where('id', $id);
                $this->db->update(TBL_BLOG, $data);
            } else {
                $this->Service->insert_row(TBL_BLOG, $data);
            }
        }  
        redirect('backend/blog_table');
    }

    public function blog_update($id)
    {
        $data['rowData'] = $this->Service->get_row(TBL_BLOG, '*', array('id' => $id));

        $data['menu'] = "Edit Blog";
        $data['view'] = 'backend/blog/form';
        $this->renderAdmin($data);
    }

    public function blog_delete()
    {
        $id = $this->input->post('id');

        if ($this->Service->update_row(TBL_BLOG, array('is_delete' => 1), array('id' => $id))) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function change_status(){
        $id = $this->input->post('id');
        $status = $this->input->post('status');

        if ($this->Service->update_row(TBL_BLOG, array('is_active' => $status), array('id' => $id))) {
            echo '1';
        } else {
            echo '0';
        }
    }
}
