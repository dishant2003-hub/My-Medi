<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orderdetails extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
        $this->load->model('product_model');
    }

    public function getAjaxorder()
    {
        $filter = array();
        $this->get_table_data('detail', $filter);
    }

    public function order_detail()
    {
        $data['result'] = $this->Service->get_all(TBL_ORDER_DETAILS, '*', array('is_active' => 1));

        $data['menu'] = "Order Detail";
        $data['title'] = "Order Detail";
        $data['view'] = 'backend/order/details';
        $this->renderAdmin($data);
    }

    public function view_ajax()
    {
        $id = $this->input->post('id');
        $data['result'] = $this->Service->get_row(TBL_ORDER_DETAILS, '*', array('id' => $id));

        $this->load->view('backend/order/customer_order', $data);
    }

    public function cart($id)
    {
        $data['result'] = $this->Service->get_row(TBL_ORDER_DETAILS, '*', array('id' => $id));

        $this->load->view('backend/order/customer_order_print', $data);
    }

    public function delete()
    {
        $id = $this->input->post('id');

        if ($this->Service->update_row(TBL_ORDER_DETAILS, array('is_delete' => 1, 'update_at' => date("Y-m-d H:i:s")), array('id' => $id))) {
            echo '1';
        } else {
            echo '0';
        }

        if ($this->Service->update_row(TBL_ORDER_ITEM, array('is_delete' => 1, 'updated_at' => date("Y-m-d H:i:s")), array('order_id' => $id))) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function insert_edit()
    {
        if ($this->input->post('submit')) {

            $id = $this->input->post('id');

            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'zipcode' => $this->input->post('zipcode'),
                'country' => $this->input->post('country'),
                'note' => $this->input->post('note'),
            );

            if ($id != "") {
                $this->db->where('id', $id);
                $this->db->update(TBL_ORDER_DETAILS, $data);
            }
        }
        redirect('backend/orderdetails/order_detail');
    }
}
