<?php

use Mpdf\Tag\Em;

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public $user_type;
    public function __construct()
    {
        parent::__construct();
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('product_model');
        $this->load->library('pagination');
    }

    public function index()
    { 
        $select = array('tblproduct.id as id', 'sum(tblorder_item.order_id) as value');
        $data['arr'] = $this->db->select($select)
            ->from('tblproduct')
            ->join('tblorder_item', 'tblorder_item.product_id = tblproduct.id', 'left')
            ->group_by('tblproduct.id')
            ->order_by('value', 'DESC')
            ->limit(10)
            ->get()->result_array();

        $config["base_url"]  = base_url() . 'home/index';
        $config["total_rows"] = $this->product_model->countAll(TBL_PRODUCT);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['array'] = $this->product_model->get_pagination($config["per_page"], $page);

        $select = array('tbldynamicimg.id as id');
        $data['assassin'] = $this->db->select($select)
            ->from('tbldynamicimg')
            ->where('is_active', 1)
            // ->order_by('id', 'DESC')
            ->limit(2)
            ->get()->result_array();

        $data['result'] = $this->Service->get_all(TBL_PRODUCT, '*', array('is_active' => 1));
        $data['flex'] = $this->Service->get_all(TBL_PRODUCT);

        $data['view'] = 'front/index';
        $this->render($data);
    }

    public function allproduct()
    {
        $config["base_url"]  = base_url() . 'home/allproduct';
        $config["total_rows"] = $this->product_model->countAll(TBL_PRODUCT);
        $config["per_page"] = 12;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['array'] = $this->product_model->get_pagination($config["per_page"], $page);

        $data['view'] = 'front/product_show';
        $this->render($data);
    }

    public function grid()
    {
        $data['category'] =  $category = $this->input->get('cat_id');
        $data['subcategory'] =  $subcategory = $this->input->get('subcat_id');

        $limit_per_page = 4;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : $this->uri->segment(0);
        $total_records = $this->product_model->get_total($category, $subcategory);

        if ($total_records > 0) {
            $config['base_url'] = base_url() . 'home/grid';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
            $config['suffix'] = '?' . http_build_query($_GET, '', "&");
            $config['num_links'] = 4;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $data["student"] = $this->product_model->get_current_page_records($limit_per_page, $page + $page, $category, $subcategory);
        }

        $data['view'] = 'front/category_grid';
        $this->render($data);
    }

    public function about_us()
    {
        $data['view'] = 'front/about_us';
        $this->render($data);
    }

    public function portfolio()
    {
        $config["base_url"]  = base_url() . 'home/portfolio';
        $config["total_rows"] = $this->product_model->countData(TBL_PORTFOLIO);
        $config["per_page"] = 6;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['result'] = $this->product_model->get_pagina($config["per_page"], $page);

        $data['view'] = 'front/portfolio';
        $this->render($data);
    }
    public function portfolio_details($id)
    {
        $data['result'] = $this->Service->get_row(TBL_PORTFOLIO, '*', array('id' => $id));
        $data['arrow'] = $this->Service->get_all(TBL_PORTFOLIO, '*', array('is_active' => 1));

        $data['view'] = 'front/portfolio_detail';
        $this->render($data);
    }

    public function privacy_policy()
    {
        $data['title'] = "privacy_policy";
        $data['meta_desc'] = "privacy_policy";
        $data['view'] = 'front/privacy-policy';
        $this->render($data);
    }
    public function terms_of_use()
    {
        $data['title'] = "terms_of_use";
        $data['meta_desc'] = "terms_of_use";
        $data['view'] = 'front/terms-of-use';
        $this->render($data);
    }
    public function blog()
    {
        $config["base_url"]  = base_url() . 'home/blog';
        $config["total_rows"] = $this->product_model->countData(TBL_BLOG);
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['rowData'] = $this->product_model->get_pagi($config["per_page"], $page);

        $data['view'] = 'front/blog';
        $this->render($data);
    }
    public function blog_post($id)
    {
        $data['rowData'] = $this->Service->get_row(TBL_BLOG, '*', array('id' => $id));

        $data['view'] = 'front/blog_post';
        $this->render($data);
    }
    public function contact_us()
    {
        $data['view'] = 'front/contact_us';
        $this->render($data);
    }

    // ------- Start sign in/out ---------- 
    public function register()
    {
        if ($this->input->post('submit')) {
            $id = $this->input->post('id');
            $arrow = array(
                'fname' => $this->input->post('user_firstname'),
                'lname' => $this->input->post('user_lastname'),
                'email' => $this->input->post('user_email'),
                'dob' => $this->input->post('user_dob'),
                'mobile' => $this->input->post('user_mobile'),
                'gender' => $this->input->post('user_gender'),
                'password' => $this->input->post('user_password'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            if (!empty($arrow['email'])) {
                $rowData = $this->Service->get_row(TBL_REGISTER, '*', array('email' => $arrow['email']));
                if (!empty($rowData)) {
                    $data['msg'] = $this->getNotification('emailExist');
                    // alert(check) in email database same 6 ke nai
                }
            }

            if (empty($rowData['email'])) {
                if ($id != "") {
                    $this->db->where('id', $id);
                    $this->db->update(TBL_REGISTER, $arrow);
                } else {
                    $last_id = $this->Service->insert_row(TBL_REGISTER, $arrow);
                }

                if (!empty($last_id)) {
                    $id = $last_id;
                    $address = $this->input->post('user_address');
                    $zipcode = $this->input->post('user_zipcode');
                    $city = $this->input->post('user_city');
                    $state = $this->input->post('user_state');

                    $count = count($_POST['user_address']);

                    for ($i = 0; $i < $count; $i++) {
                        $data = array(
                            'ragister_id' => $id,
                            'address' => $address[$i],
                            'zipcode' => $zipcode[$i],
                            'city' => $city[$i],
                            'state' => $state[$i],
                        );
                        $this->Service->insert_row(TBL_ADDRESS, $data);
                    }
                }
            }
            $rowData = array(
                'id' => $id,
                'email' => $arrow['email'],
                'password' => $arrow['password'],
            );
            $this->session->set_userdata('sign', $rowData);
            redirect('');
        }
        $data['view'] = 'front/register';
        $this->render($data);
    }

    public function sign_in()
    {
        if ($this->input->post('submit')) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if (!empty($email)) {
                $data = $this->Service->get_row(TBL_REGISTER, '*', array('email' => $email));
                if (empty($data)) {
                    redirect('register');
                }
            }
            if (!empty($email) && !empty($password)) {
                $result = $this->Service->get_row(TBL_REGISTER, '*', array('email' => $email, 'password' => $password));
            }
            if (!empty($result)) {
                if (!empty($email)) {
                    $data  = $this->Service->get_row(TBL_REGISTER, '*', array('email' => $email));
                    $id = $data['id'];
                }
                $rowData = array(
                    'id' => $id,
                    'email' => $email,
                    'password' => $password,
                );
                $this->session->set_userdata('sign', $rowData);
                $this->session->userdata('sign');
                redirect('');
            } else {
                if (empty($result)) {
                    $data['msg'] = $this->getNotification('invalidLogin');
                }
            }
        }
        $data['view'] = 'front/signin';
        $this->render($data);
    }

    public function logout()
    {
        $this->session->sess_destroy('sign');
        unset($_SESSION['sign']);
        redirect('');
    }
    // ------- End sign in/out ----------


    // --------- start Account details -----------
    public function account()
    {
        $userdata = $this->session->userdata('sign');
        $email = $userdata['email'];
        $data['arrow'] = $this->Service->get_row(TBL_REGISTER, '*', array('email' => $email));
        $rock = $this->Service->get_row(TBL_ORDER_DETAILS, '*', array('sign_mail' => $email), 'id', 'desc');

        if (!empty($rock)) {
            $id = $rock['id'];
            $data['order'] = $this->Service->get_all(TBL_ORDER_ITEM, '*', array('order_id' => $id));
        }

        $data['view'] = 'front/account';
        $this->render($data);
    }

    public function profile_data()
    {
        $userdata = $this->session->userdata('sign');
        $email = $userdata['email'];
        $data['arrow'] = $this->Service->get_row(TBL_REGISTER, '*', array('email' => $email));

        $data['view'] = 'front/profile_data';
        $this->render($data);
    }
    public function address()
    {
        $userdata = $this->session->userdata('sign');
        $email = $userdata['email'];
        $data['arrow'] = $this->Service->get_all(TBL_REGISTER, '*', array('email' => $email));

        $data['view'] = 'front/address';
        $this->render($data);
    }

    public function editajax()
    {
        $id = $this->input->post('id');
        $data['result'] = $this->Service->get_row(TBL_ADDRESS, '*', array('id' => $id)); 

        $this->load->view('front/edit_address', $data); 
    }

    public function profile_ajax_edit()
    {
        $id = $this->input->post('id');
        $data['result'] = $this->Service->get_row(TBL_REGISTER, '*', array('id' => $id));
 
        $this->load->view('front/edit_profile', $data);
    }

    public function profile_edit()
    {
        if ($this->input->post('submit')) {
            $id = $this->input->post('id');
            $arrow = $this->Service->get_row(TBL_REGISTER, '*', array('id' => $id));

            $data = array(
                'fname' => $this->input->post('user_firstname'),
                'lname' => $this->input->post('user_lastname'),
                'email' => $this->input->post('user_email'),
                'dob' => $this->input->post('user_dob'),
                'mobile' => $this->input->post('user_mobile'),
                'gender' => $this->input->post('user_gender'),
                'password' => $this->input->post('user_password'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ); 

            if (!empty($data['email'] == $arrow['email'])) {
                if ($id != "") {
                    $this->db->where('id', $id);
                    $this->db->update(TBL_REGISTER, $data);
                }
            } else {
                $rowData = array(
                    'id' => $id,
                    'email' => $data['email'],
                    'password' => $arrow['password'],
                );
                $this->session->set_userdata('sign', $rowData);

                if ($id != "") {
                    $this->db->where('id', $id);
                    $this->db->update(TBL_REGISTER, $data);
                }
                redirect('home/sign_in');
            }
            redirect('home/profile_data');
        }
    }

    public function insert_edit()
    {
        if ($this->input->post('submit')) {
            $id = $this->input->post('id');
            $data = array(
                'address' => $this->input->post('user_address'),
                'city' => $this->input->post('user_city'),
                'zipcode' => $this->input->post('user_zipcode'),
                'state' => $this->input->post('user_state'),
            );

            if ($id != "") {
                $this->db->where('id', $id);
                $this->db->update(TBL_ADDRESS, $data);
            }
            redirect('home/address');
        }
    }

    public function remove($id)
    {
        $this->db->delete(TBL_ADDRESS, ['id' => $id]);

        redirect('home/address');
    }
    // --------- End Account details -----------


    // ------ Start product profile, cart, checkout -----------


    // -------- search bar ----------
    public function searchajax()
    {
        $value = $this->input->post('value');
        $html = "";
        $result = $this->db->select('*')->from(TBL_PRODUCT)->where("name LIKE '%$value%'")->get()->result_array();
        if (!empty($result)) {
            foreach ($result as $data) {
                $id = $data['id'];
                $rowData  = $this->Service->get_row(TBL_PRODUCT_IMAGE, '*', array('product_id' => $id));
                $html .=
                    '<div class="col-12 col-lg-4">
                        <div class="ps-product ps-product--horizontal">                    
                            <div class="ps-product__thumbnail">
                                <a class="ps-product__image" href=" ' . base_url('home/product/' . $id) . '">
                                    <figure><img src=' . base_url(UPLOAD . $rowData['image']) . ' alt="alt" /></figure>
                                </a>
                            </div>
                            <div class="ps-product__content">
                                <h5 class="ps-product__title"><a href="' . base_url('home/product/' . $id) . '">' . $data['name'] . '</a></h5>
                                <div class="ps-product__meta"><span class="ps-product__price">$' . $data['price'] . '</span></div>
                            </div>
                        </div>
                    </div>';
            }
            echo json_encode($html);
        }
    }

    public function wishlist()
    {
        $userdata = $this->session->userdata('sign');
        $use_id = $userdata['id'];
        $data['rowData'] = $this->Service->get_all(TBL_WISHLIST, '*', array('user_id' => $use_id));

        $data['view'] = 'front/wishlist';
        $this->render($data);
    }

    public function wishlist_session()
    {
        $pro_id =  $this->input->get('pro_id');
        $user_id = $this->input->get('user_id');

        $array = $this->Service->get_row(TBL_WISHLIST, '*', array('pid' => $pro_id, 'user_id' => $user_id));

        if (!empty($pro_id == $array['pid'])) {
            $this->db->delete(TBL_WISHLIST, ['id' => $array['id']]);
        } else {
            $data = $this->Service->get_row(TBL_PRODUCT, '*', array('id' => $pro_id));
            $rowData = $this->Service->get_row(TBL_PRODUCT_IMAGE, '*', array('product_id' => $pro_id));
            $userdata = $this->session->userdata('sign');

            $savedata = array(
                'pid' => $data['id'],
                'user_id' => $userdata['id'],
                'name' => $data['name'],
                'image' => $rowData['image'],
                'price' => $data['price'],
            );
            $this->Service->insert_row(TBL_WISHLIST, $savedata);
        }
        redirect('');
    }

    public function product($id)
    {
        $data['rowData'] = $this->Service->get_row(TBL_PRODUCT, '*', array('id' => $id));
        $data['arrow'] = $this->Service->get_all(TBL_PRODUCT_IMAGE, '*', array('product_id' => $id));

        $data['view'] = 'front/profile';
        $this->render($data);
    }

    public function cart()
    {
        if (!empty($this->input->post('submit'))) {
            $id = $this->input->post('id');
            $image = $this->input->post('image');
            $name = $this->input->post('name');
            $price = $this->input->post('price');
            $quantity = '';
            $total = $this->input->post('price');

            $cart_product = array(
                'id' => $id,
                'image' => $image,
                'name' => $name,
                'price' => $price,
                'quantity' => 1,
                'total' => $total,
            );

            $is_product_exist = 0;
            $total = 0;

            $cartdata = $this->session->userdata('addcart');  // session get data

            if (!empty($cartdata)) {
                foreach ($cartdata as $key => $row) {
                    if ($cart_product['id'] == $row['id']) {
                        $quantity = ($row['quantity'] + 1);
                        $total = ($row['total'] + $row['price']);
                        $_SESSION['addcart'][$key]['quantity'] = $quantity;
                        $_SESSION['addcart'][$key]['total'] = $total;
                        $is_product_exist = 1;
                    }
                }
            }
            if ($is_product_exist == 0) {
                if (!empty($cartdata)) {
                    $cartdata = array_push($_SESSION['addcart'], $cart_product);
                } else {
                    $this->session->set_userdata('addcart', array($cart_product));
                }
            }
        }

        if (!empty($_SESSION['sign'])) {
            $data['view'] = 'front/cart';
        } else {
            redirect('sign_in');
        }
        $this->render($data);
    }

    public function direct_cart($id)
    {
        $result = $this->Service->get_row(TBL_PRODUCT, '*', array('id' => $id));
        $rowData = $this->Service->get_row(TBL_PRODUCT_IMAGE, '*', array('product_id' => $id));

        $id = $result['id'];
        $image = $rowData['image'];
        $name = $result['name'];
        $price = $result['price'];
        $quantity = '';
        $total = $result['price'];

        //  unset($_SESSION['addcart']); die();      
        $cart_productadd = array(
            'id' => $id,
            'image' => $image,
            'name' => $name,
            'price' => $price,
            'quantity' => 1,
            'total' => $total,
        );

        $is_product_exist = 0;
        $total = 0;

        $cartdata = $this->session->userdata('addcart');  // session get data

        if (!empty($cartdata)) {
            foreach ($cartdata as $key => $row) {
                if ($cart_productadd['id'] == $row['id']) {
                    $quantity = ($row['quantity'] + 1);
                    $total = ($row['total'] + $row['price']);
                    $_SESSION['addcart'][$key]['quantity'] = $quantity;
                    $_SESSION['addcart'][$key]['total'] = $total;
                    $is_product_exist = 1;
                }
            }
        }
        if ($is_product_exist == 0) {
            if (!empty($cartdata)) {
                $cartdata = array_push($_SESSION['addcart'], $cart_productadd);
            } else {
                $this->session->set_userdata('addcart', array($cart_productadd));
            }
        }
        redirect('');
    }

    public function quantity_minus()
    {
        $id = $this->input->post('id');
        $result = $this->Service->get_row(TBL_PRODUCT, '*', array('id' => $id));

        $id = $result['id'];
        $image = $result['image'];
        $name = $result['name'];
        $price = $result['price'];
        $quantity = '';
        $total = $result['price'];

        //  unset($_SESSION['addcart']); die();
        $cart_productminus = array(
            'id' => $id,
            'image' => $image,
            'name' => $name,
            'price' => $price,
            'quantity' => 1,
            'total' => $total,
        );

        $total = 0;
        $cartdata = $this->session->userdata('addcart');  // session get data 

        if (!empty($cartdata)) {
            foreach ($cartdata as $key => $row) {
                if ($cart_productminus['id'] == $row['id']) {
                    if ($row['quantity'] > 1) {
                        $quantity = ($row['quantity'] - 1);
                        $total = ($row['total'] - $row['price']);
                        $_SESSION['addcart'][$key]['quantity'] = $quantity;
                        $_SESSION['addcart'][$key]['total'] = $total;
                    }
                }
            }
        }
        redirect('cart');
    }
    public function quantity_plus()
    {
        $id = $this->input->post('id');
        $result = $this->Service->get_row(TBL_PRODUCT, '*', array('id' => $id));

        $id = $result['id'];
        $image = $result['image'];
        $name = $result['name'];
        $price = $result['price'];
        $quantity = '';
        $total = $result['price'];

        $cart_productminus = array(
            'id' => $id,
            'image' => $image,
            'name' => $name,
            'price' => $price,
            'quantity' => 1,
            'total' => $total,
        );
        $total = 0;
        $cartdata = $this->session->userdata('addcart');  // session get data
        if (!empty($cartdata)) {
            foreach ($cartdata as $key => $row) {
                if ($cart_productminus['id'] == $row['id']) {
                    $quantity = ($row['quantity'] + 1);
                    $total = ($row['total'] + $row['price']);
                    $_SESSION['addcart'][$key]['quantity'] = $quantity;
                    $_SESSION['addcart'][$key]['total'] = $total;
                }
            }
        }
        redirect('cart');
    }

    // -------- session single product delete ------------
    public function session_remove_cart($id)
    {
        $this->session->userdata('addcart');  // session get data

        foreach ($_SESSION["addcart"] as $select => $val) {
            if ($val["id"] == $id) {
                unset($_SESSION["addcart"][$select]);
            }
        }
        redirect('home/cart');
    }

    public function session_remove_wishlist($id)
    {
        $this->db->delete(TBL_WISHLIST, ['pid' => $id]);

        redirect('home/wishlist');
    }
    // ------ session destroy ----------
    public function clear_all()
    {
        $this->session->userdata('addcart');
        // unset thi khali addcart sesseion destroy thai
        unset($_SESSION['addcart']);
        redirect('');
    }

    public function checkout()
    {
        $data['view'] = 'front/checkout';
        $this->render($data);
    }

    public function checkout_address()
    {
        $id = $this->input->post('id');
        $result = $this->Service->get_row(TBL_ADDRESS, '*', array('id' => $id));

        $data = array(
            'address' => $result['address'],
            'city' => $result['city'],
            'zipcode' => $result['zipcode'],
            'state' => $result['state'],
        );
        echo json_encode($data);
    }

    public function shopping_details()
    {
        if (!empty($this->input->post('submit_btn'))) {
            $id = $this->input->post('id');

            $userdata = $this->session->userdata('sign');
            $email = $userdata['email'];

            $data = array(
                'fname' => $this->input->post('Fname'),
                'lname' => $this->input->post('Lname'),
                'email' => $this->input->post('Email'),
                'sign_mail' => $email,
                'company' => $this->input->post('Company'),
                'phone' => $this->input->post('Phone'),
                'address' => $this->input->post('Address'),
                'city' => $this->input->post('City'),
                'zipcode' => $this->input->post('Pincode'),
                'country' => $this->input->post('County'),
                'created_at' => date('Y-m-d H:i:s'),
                'update_at' => date('Y-m-d H:i:s'),
            );

            $last_id = $this->Service->insert_row(TBL_ORDER_DETAILS, $data);

            if (!empty($last_id)) {
                $cartdata = $this->session->userdata('addcart');
                foreach ($cartdata as $orderitem) {
                    $order = array(
                        'order_id' => $last_id,
                        'product_id' => $orderitem['id'],
                        'name' => $orderitem['name'],
                        'image' => $orderitem['image'],
                        'price' => $orderitem['price'],
                        'quantity' => $orderitem['quantity'],
                        'total' => $orderitem['total'],
                        'created_at' => date('Y-m-d H:i'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    );
                    $this->Service->insert_row(TBL_ORDER_ITEM, $order);
                }
            }
        }
        unset($_SESSION["addcart"]);
        redirect('home/success_order');
    }

    public function success_order()
    {
        $this->load->view('front/success');
    }



    // ------ End product profile, cart, checkout -----------



}
