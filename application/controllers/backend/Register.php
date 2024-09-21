<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
        $this->load->model('product_model');
    }

    public function getAjaxList()
    {
        $filter = array();
        $this->get_table_data('register', $filter);
    } 

    public function register_detail()
    {
        $data['datares'] = $this->Service->get_all(TBL_REGISTER);
        $data['menu'] = "Add Product";
        $this->load->view('backend/register/add');
    }

    public function register_table()
    {
        $data['result'] = $this->Service->get_all(TBL_REGISTER);
        $data['menu'] = "User";
        $data['title'] = "User";
        $data['view'] = 'backend/register/list';
        $this->renderAdmin($data);
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data['rowData'] = $this->Service->get_row(TBL_REGISTER, '*', array('id' => $id));
        $data['arrow'] = $this->Service->get_row(TBL_ADDRESS, '*', array('ragister_id' => $id));
        $this->load->view('backend/register/add', $data);
    }

    public function add()
    {
        if ($this->input->post('submit')) {
            pr($_POST);die;
            $id = $this->input->post('id');
            $rowData = array(
                'fname' => $this->input->post('name'),
                'lname' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'mobile' => $this->input->post('mobile'),
                'dob' => $this->input->post('dob'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'is_active' => $this->input->post('is_active'),
            );

            if ($id != "") {
                $this->db->where('id', $id);
                $this->db->update(TBL_REGISTER, $rowData);
            } else {
                $last_id = $this->Service->insert_row(TBL_REGISTER, $rowData);
            }

            if (!empty($last_id)) {
                $id = $last_id;
                $address = $this->input->post('address');
                $city = $this->input->post('city');
                $zipcode = $this->input->post('pincode');
                $state = $this->input->post('state');

                $data = array(
                    'ragister_id' => $id,
                    'address' => $address,
                    'zipcode' => $zipcode,
                    'city' => $city,
                    'state' => $state,
                );
                    $this->Service->insert_row(TBL_ADDRESS, $data);
            }

            if ($id != "") {
                $data = array(
                    'address' => $this->input->post('address'),
                    'city' => $this->input->post('city'),
                    'zipcode' => $this->input->post('pincode'),
                    'state' => $this->input->post('state'),
                );
                $this->db->where('ragister_id', $id);
                $this->db->update(TBL_ADDRESS, $data);
            } 
        }
        redirect('backend/user');
    }

    public function view($user_id)
    {
        $data['menu'] = "View";
        $data['title'] = "User";
        $data['rowData'] = $this->Service->get_row(TBL_REGISTER, '*', array('id' => $user_id));
        $data['view'] = 'backend/register/user_view';
        $this->renderAdmin($data);
    }

    public function order_show()
    {
        $id = $this->input->post('id');
        $data['rowData'] = $this->Service->get_all(TBL_ORDER_ITEM, '*', array('order_id' => $id));
        $this->load->view('backend/register/order_list', $data);
    }

    public function delete()
    {
        $id = $this->input->post('record_id');
        if ($this->Service->update_row(TBL_REGISTER, array('is_delete' => 1, 'updated_at' => date("Y-m-d H:i:s")), array('id' => $id))) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function btn_user_status()
    {
        $id = $this->input->post('record_id');
        $status = $this->input->post('status');

        if ($this->Service->update_row(TBL_ORDER_DETAILS, array('update_at' => date("Y-m-d H:i:s"),  'is_active' => $status), array('id' => $id))) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function btn_user_stat()
    {
        $id = $this->input->post('record_id');
        $status = $this->input->post('status');

        if ($this->Service->update_row(TBL_REGISTER, array('updated_at' => date("Y-m-d H:i:s"),  'is_active' => $status), array('id' => $id))) {
            echo '1';
        } else {
            echo '0';
        }
    }
}
