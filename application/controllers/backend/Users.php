<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
        $this->load->model('product_model');
    }

    public function index()
    {
        if (!check_permission('users', 'can_view', $this->user_permission)) {
            redirect(base_url() . 'backend/access_denied');
        }
        $data['title'] = "Users";
        $data['menu'] = "Users";
        $data['user_role_list'] = $this->Service->get_all(TBL_REGISTER);
        $data['postArr'] = isset($_GET) ? $_GET : '';
        $data['view'] = 'backend/users/user_list';
        $this->renderAdmin($data);
    }

    public function getAjaxListData()
    {
        $filter = array(
            'user_role' => isset($_REQUEST['user_role']) ? $_REQUEST['user_role'] : '',
            'status' => isset($_REQUEST['status']) ? $_REQUEST['status'] : '',
        );
        $this->get_table_data('user', $filter); //table name
    }

    public function add_ajax()
    {
        $this->load->view('backend/users/user_edit');
    }

    // public function user_ajax()
    // {
    //     $id = $this->input->post('id');
    //     $user_id = decrypt_String($id);

    //     $data['rowData'] = $rowData = $this->Service->get_row(TBL_USERS, '*', array('user_id' => $user_id));

    //     $this->load->view('backend/users/user_view', $data);
    // }

    public function edit()
    {

        $id = $this->input->post('id');

        $data['rowData'] = $userData = $this->Service->get_row(TBL_REGISTER, '*', array('id' => $id));
        $data['arrow'] = $userData = $this->Service->get_row(TBL_ADDRESS, '*', array('ragister_id' => $id));

        $this->load->view('backend/users/user_edit', $data);
    }

    public function add()
    {
        if ($this->input->post('submit')) {
            $id = $this->input->post('id');
            $rowData = array(
                'fname' => $this->input->post('name'),
                'lname' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'mobile' => $this->input->post('mobile'),
                'dob' => $this->input->post('dob'),
                'created_at' => date('Y-m-d H:m:i'),
                'updated_at' => date('Y-m-d H:i:s'),
                'is_active' => $this->input->post('is_active'),
            );
            // pr($rowData);die;

            if ($id != "") {
                $this->db->where('id', $id);
                $this->db->update(TBL_REGISTER, $rowData);
            } else {
                $last_id = $this->Service->insert_row(TBL_REGISTER, $rowData);
            }

            if (!empty($last_id)) {
                $id = $last_id;
                $address = $this->input->post('address');
                $zipcode = $this->input->post('city');
                $city = $this->input->post('pincode');
                $state = $this->input->post('state');

                // $count = count($address);
                // pr($count);die;

                // for ($i = 0; $i < $count; $i++) {
                    $data = array(
                        'ragister_id' => $id,
                        'address' => $address,
                        'zipcode' => $zipcode,
                        'city' => $city,
                        'state' => $state,
                    );
                    $this->Service->insert_row(TBL_ADDRESS, $data);
                // }
            }
        }
        redirect('backend/users');
    }

    public function adasasd($user_id = "")
    {
        $user_id = decrypt_String($user_id);

        if ($user_id != "") {
            if (!check_permission('users', 'can_edit', $this->user_permission)) {
                redirect(base_url() . 'backend/access_denied');
            }
            $data['title'] = "Edit User";
            $data['menu'] = "edit User";
            $data['rowData'] = $userData = $this->Service->get_row(TBL_USERS, '*', array('user_id' => $user_id));
        } else {
            $data['title'] = "Add User";
            $data['menu'] = "Add User";
            if (!check_permission('users', 'can_create', $this->user_permission)) {
                redirect(base_url() . 'backend/access_denied');
            }
        }
        $data['user_role_list'] = $this->Service->get_all(TBL_USER_ROLE, '*', array('id !=' => 1, 'is_active' => 1));

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');

            // $ip = $this->input->ip_address();
            // pr($ip);die;

            if ($this->form_validation->run() != FALSE) {
                $saveData = array(
                    'name' => $this->input->post('name'),
                    'last_name' => $this->input->post('last_name'),
                    'email' => $this->input->post('email'),
                    'mobile' => $this->input->post('mobile'),
                    'address' => $this->input->post('address'),
                    'dob' => $this->input->post('dob'),
                    'pincode' => $this->input->post('pincode'),
                    'city' => $this->input->post('city'),
                    'is_active' => $this->input->post('is_active'),
                    'last_login' => date("Y-m-d H:i:s"),
                    'updated_time' => date("Y-m-d H:i:s"),
                );

                $emailExits = $this->user->check_email($saveData['email'], $user_id);
                if (!empty($usernameExits)) {
                    $this->session->set_flashdata('error_msg', $this->getNotification('usernameExist'));
                } elseif (!empty($emailExits)) {
                    $this->session->set_flashdata('error_msg', $this->getNotification('emailExist'));
                } else {

                    if (!empty($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
                        $temp_file = $_FILES['picture']['tmp_name'];
                        $img_name = "picture_" . mt_rand(10000, 999999999) . time();
                        $path = $_FILES['picture']['name'];
                        $ext = pathinfo($path, PATHINFO_EXTENSION);
                        $saveData['picture'] = $img_name . "." . $ext;
                        $fileurl = PICTURE . $saveData['picture'];

                        if (isset($userData['picture']) && $userData['picture'] != "" && file_exists(PICTURE . $userData['picture'])) {
                            unlink(PICTURE . $userData['picture']);
                        }
                        move_uploaded_file($temp_file, $fileurl);
                    }

                    if ($user_id != "") {
                        if ($this->input->post('password') != "") {
                            $password = $this->input->post('password');
                            $saveData['password'] = md5($password);
                        }
                        $this->user->edit_user($saveData, $user_id);
                        $this->session->set_flashdata('success_msg', $this->getNotification('recUpSuc'));
                    } else {
                        $password = (!empty($_POST['password'])) ? $this->input->post('password') : $this->Service->generateRandomString();
                        $saveData['password'] = md5($password);
                        $saveData['created_time'] = date("Y-m-d H:i:s");
                        $user_id = $this->user->add_user($saveData);
                        $this->session->set_flashdata('success_msg', $this->getNotification('recAddSuc'));
                    }
                }
                redirect(base_url('backend/users'));
            }
        }
        $data['view'] = 'backend/users/user_edit';
        $this->renderAdmin($data);
    }

    public function view($user_id)
    {
        $data['rowData'] = $this->Service->get_row(TBL_REGISTER, '*', array('id' => $user_id));
        $data['arrow'] = $this->Service->get_row(TBL_ADDRESS, '*', array('ragister_id' => $user_id));

        $data['view'] = 'backend/users/user_view';
        $this->renderAdmin($data);
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

    // public function change_user_status()
    // {
    //     $id = $this->input->post('record_id');
    //     $status = $this->input->post('status');

    //     pr($id);
    //     pr($status);

    //     if ($this->Service->update_row(TBL_REGISTER, array('updated_at' => date("Y-m-d H:i:s"), 'id' => $id, 'is_active' => $status))) {
    //         echo '1';
    //     } else {
    //         echo '0';
    //     }
    // }
}
