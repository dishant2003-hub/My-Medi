<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect('backend');
        }
        $this->load->model('product_model');
    }

    // 1/ view/back/product/list 
    // 2/ public/admin/script/general
    // 3/ view/back/table/product 
    // general.js/ controller/ view table/ table folder name same hoy 

    public function getAjaxList()
    {
        $filter = array();
        $this->get_table_data('product', $filter);
        // table list and controller same name apvu(product) product name database nai
    }

    public function product_detail()
    {
        $data['datares'] = $this->Service->get_all(TBL_CATEGORY, '*', array('category' => 0));

        $data['menu'] = "Add Product";
        $data['title'] = "Product";
        $data['view'] = 'backend/product/add';
        $this->renderAdmin($data);
    }

    public function product_table()
    {
        $data['result'] = $this->Service->get_all(TBL_PRODUCT);

        $data['menu'] = "Product";
        $data['title'] = "Product";
        $data['view'] = 'backend/product/list';

        $this->renderAdmin($data);
    }

    public function product_insert()
    {
        if ($this->input->post('submit')) {
            $id = $this->input->post('id');

            $saveData = array(
                'id' => $this->input->post('id'),
                'category' => $this->input->post('Category'),
                'subcategory' => $this->input->post('Subcategory'),
                'name' => $this->input->post('name'),
                'price' => $this->input->post('Productprice'),
                'description' => $this->input->post('description'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            );

            if ($id != "") {
                $this->db->where('id', $id);
                $this->db->update(TBL_PRODUCT, $saveData);
                $last_id = $id;
            } else {
                $last_id = $this->Service->insert_row(TBL_PRODUCT, $saveData);
            }

            if (!empty($last_id)) {
                // multiple image 
                if (isset($_FILES['images']['name']) && !empty($_FILES['images']['error'])) {
                    for ($i = 0; $i <= count($_FILES['images']['name']); $i++) {
                        if (isset($_FILES['images']['name'][$i]) && $_FILES['images']['error'][$i] == 0) {
                            $temp_file = $_FILES['images']['tmp_name'][$i];
                            $img_name = "images" . mt_rand(10000, 999999999) . time();
                            $path = $_FILES['images']['name'][$i];
                            $ext = pathinfo($path, PATHINFO_EXTENSION);
                            $data['images'] = $img_name . "." . $ext;
                            $fileurl = UPLOAD . $data['images'];
                            /*if (isset($rowData['document']) && $rowData['document'] != "" && file_exists(REMINDER . $rowData['document'])) {
                                unlink(REMINDER . $rowData['document']);
                            }*/
                            move_uploaded_file($temp_file, $fileurl);

                            $docData = array(
                                'product_id' => $last_id,
                                'image' => $data['images'],
                            );

                            $this->Service->insert_row(TBL_PRODUCT_IMAGE, $docData);
                        }
                    }
                }

                // if (!empty($_FILES['images']['name'])) {
                //     $name_array = array();
                //     $count = count($_FILES["images"]["size"]);

                //     foreach ($_FILES as $key => $value) {
                //         for ($i = 0; $i <= $count - 1; $i++) {
                //             if ($_FILES['images']['error'][$i] == 0) {
                //                 $name = $value["name"][$i];

                //                 $config = array(
                //                     'upload_path' => UPLOAD,
                //                     'allowed_types' => "jpg|png|jpeg",
                //                     'overwrite' => true,
                //                     'remove_spaces' => true,
                //                     'max_size' => 600000,
                //                     'max_width' => 1024,
                //                     'max_height' => 768,
                //                 );
                //                 $this->upload->initialize($config);

                //                 foreach ($_FILES['images'] as $key => $val) {
                //                     $i = 1;
                //                     foreach ($val as $v) {
                //                         $field_name = "images_" . $i;
                //                         $_FILES[$field_name][$key] = $v;
                //                         $i++;
                //                     }
                //                 }
                //                 $img_data = $_FILES['images']['name'];
                //                 $this->product_model->img_insert($img_data, $last_id);
                //             }
                //         }
                //     }
                // }
            }
        }
        redirect('backend/product_table');
    }

    public function product_update($id = '')
    {
        $data['rowData'] = $this->Service->get_row(TBL_PRODUCT, '*', array('id' => $id));
        $data['datares'] = $this->Service->get_all(TBL_CATEGORY, '*', array('category' => 0));

        $data['menu'] = "Edit Product";
        $data['view'] = 'backend/product/add';
        $this->renderAdmin($data);
    }

    public function product_delete()
    {
        $id = $this->input->post('id');

        if ($this->Service->update_row(TBL_PRODUCT, array('is_delete' => 1, 'updated_at' => date("Y-m-d H:i:s")), array('id' => $id))) {
            echo '1';
        } else {
            echo '0';
        }
    }

    // -------- Image Delete--------- 
    public function delete_image()
    {
        $id = $this->input->post('id');
        $this->db->delete(TBL_PRODUCT_IMAGE, array('id' => $id));
    }

    public function change_status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');

        if ($this->Service->update_row(TBL_PRODUCT, array('is_active' => $status), array('id' => $id))) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function sub_menu_change()
    {
        $id = $this->input->post('id');
        $data = $this->product_model->actived($id);
        echo json_encode($data);
    }
}
