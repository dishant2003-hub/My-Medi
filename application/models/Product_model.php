<?php

use PhpOffice\PhpSpreadsheet\Calculation\Financial\CashFlow\Constant\Periodic;

class Product_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function actived($id)
    {
        $this->db->where('category', $id);
        return $this->db->get(TBL_CATEGORY)->result_array();
    }
 
    // -------- multiple image insert data  ----------      
    public function img_insert($img_data, $id)
    {
        if ($id != '') {
            foreach ($img_data as $file) {
                $file_data = array(
                    'image' => $file,
                    "product_id" => $id,
                );
                $this->db->insert(TBL_PRODUCT_IMAGE, $file_data);
            }
        }
    }

    public function address_insert($data, $id)
    {
        if ($id != '') {
            foreach ($data as $file) {
                $file_data = array(
                    'address' => $file[0],
                    "ragister_id" => $id,
                );
                $this->db->insert(TBL_ADDRESS, $file_data);
            }
        }
    }

    public function countAll($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        // pr($this->db->last_query());die;  
        return $this->db->count_all($table);
    } 

    public function get_pagination($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get(TBL_PRODUCT);
        return $query->result_array();
    }
  
    public function countuser($use_id)
    {
        $this->db->where('user_id', $use_id);
        return $this->db->count_all_results(TBL_WISHLIST);
    }

    public function get_pagination_category($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get(TBL_CATEGORY);
        return $query->result_array();
    }

    public function countData($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('is_active', 1);
        // pr($this->db->last_query());die;  
        return $this->db->count_all($table);
    }
    public function get_pagi($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->where('is_active', 1);
        $query = $this->db->get(TBL_BLOG);
        return $query->result_array();
    }
    public function get_pagina($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->where('is_active', 1);
        $query = $this->db->get(TBL_PORTFOLIO);
        return $query->result_array();
    }

    public function get_total($category, $subcategory)
    {
        $this->db->where('category', $category);
        $this->db->where('subcategory', $subcategory);
        return $this->db->count_all_results(TBL_PRODUCT);
    }

    public function get_current_page_records($limit, $start, $category = '', $subcategory = '')
    {
        $this->db->limit($limit, $start);
        $this->db->where('category', $category);
        $this->db->where('subcategory', $subcategory);
        $query = $this->db->get(TBL_PRODUCT);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
}
